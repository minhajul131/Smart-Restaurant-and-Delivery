<?php include('hd-ft/header.php'); ?>

<div class="manage">
    <div class = "wrapper">
        <h1>Chef Detail</h1>
        <br>
        <br>
        
        <?php 
        
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        
        ?>
        <br>
        <br>

        <!-- Chef Form Starts -->
        <form action="" method="POST" enctype="multipart/form-data">

            <table class="table-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" placeholder="Name">
                    </td>
                </tr>
                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td>
                        <input type="text" name="email" placeholder="Email">
                    </td>
                </tr>
                <tr>
                    <td>Contact Number: </td>
                    <td>
                        <input type="text" name="contact_number" placeholder="Contact Number">
                    </td>
                </tr>
                <tr>
                    <td>Position: </td>
                    <td>
                        <input type="text" name="position" placeholder="Position">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Chef" class="btn-update">
                    </td>
                </tr>

            </table>

        </form>
        <!-- chef Form Ends -->

        <?php 
        
            //CHeck whether the Submit Button is Clicked or Not
            if(isset($_POST['submit']))
            {
                //echo "Clicked";

                //1. Get the Value from CAtegory Form
                $full_name = $_POST['full_name'];
                $email = $_POST['email'];
                $contact_number = $_POST['contact_number'];
                $position = $_POST['position'];                

                //Check whether the image is selected or not and set the value for image name accoridingly
                //print_r($_FILES['image']);

                //die();//Break the Code Here

                if(isset($_FILES['image']['name']))
                {
                    //Upload the Image
                    //To upload image we need image name, source path and destination path
                    $image_name = $_FILES['image']['name'];
                    
                    // Upload the Image only if image is selected
                    if($image_name != "")
                    {

                        //Auto Rename our Image
                        //Get the Extension of our image (jpg, png, gif, etc) e.g. "specialfood1.jpg"
                        $ext = end(explode('.', $image_name));

                        //Rename the Image
                        $image_name = "chef_".rand(000, 999).'.'.$ext; // e.g. Food_Category_834.jpg
                        

                        $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = "../images/chef/".$image_name;

                        //Finally Upload the Image
                        $upload = move_uploaded_file($source_path, $destination_path);

                        //Check whether the image is uploaded or not
                        //And if the image is not uploaded then we will stop the process and redirect with error message
                        if($upload==false)
                        {
                            //SEt message
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload Image. </div>";
                            //Redirect to Add CAtegory Page
                            header('location:'.SITEURL.'admin/new-chef.php');
                            //Stop the Process
                            die();
                        }

                    }
                }
                else
                {
                    //Don't Upload Image and set the image_name value as blank
                    $image_name="";
                }

                //2. Create SQL Query to Insert CAtegory into Database
                $sql = "INSERT INTO table_chef SET 
                    full_name='$full_name',
                    image_name='$image_name',
                    email='$email',
                    contact_number='$contact_number',
                    position='$position'
                ";

                //3. Execute the Query and Save in Database
                $res = mysqli_query($conn, $sql);

                //4. Check whether the query executed or not and data added or not
                if($res==true)
                {
                    //Query Executed and Category Added
                    $_SESSION['add'] = "<div class='success'>Added Successfully.</div>";
                    //Redirect to Manage Category Page
                    header('location:'.SITEURL.'admin/control-chef.php');
                }
                else
                {
                    //Failed to Add CAtegory
                    $_SESSION['add'] = "<div class='error'>Failed to Add.</div>";
                    //Redirect to Manage Category Page
                    header('location:'.SITEURL.'admin/new-chef.php');
                }
            }
        
        ?>

    </div>
</div>

<?php include('hd-ft/footer.php'); ?>