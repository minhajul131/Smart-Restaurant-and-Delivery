<?php include('hd-ft/header.php'); ?>

    <div class="manage">
        <div class = "wrapper">
            <h1>Update Admin Detail</h1>

            <?php 
                //Get ID of Admin
                $id=$_GET['id'];

                //SQL Query to Get data
                $sql="SELECT * FROM table_admin WHERE id=$id";

                $res=mysqli_query($conn, $sql);

                if($res==TRUE){

                    // Check whether the data is available or not
                    $count = mysqli_num_rows($res);
                    //Check whether we have admin data or not
                    if($count==1){

                        // Get the Details
                        //echo "Admin Available";
                        $row=mysqli_fetch_assoc($res);

                        $full_name = $row['full_name'];
                        $contact_number = $row['contact_number'];
                        $email = $row['email'];
                        $username = $row['username'];
                    }
                    else{
                        //Redirect to Manage Admin PAge
                        header('location:'.SITEURL.'admin/admin-control.php');
                    }
                }
            
            ?>

            <form action="" method="POST">

                <table class="table-30">
                    <tr>
                        <td>Full Name: </td>
                        <td>
                            <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Contact Number: </td>
                        <td>
                            <input type="text" name="contact_number" value="<?php echo $contact_number; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Email: </td>
                        <td>
                            <input type="text" name="email" value="<?php echo $email; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Username: </td>
                        <td>
                            <input type="text" name="username" value="<?php echo $username; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="submit" value="Update Admin" class="btn-update">
                        </td>
                    </tr>
                </table>
                
            </form>

        </div>
    </div>

<?php include('hd-ft/footer.php'); ?>

<?php 

    //Check whether the Submit Button is Clicked or not
    if(isset($_POST['submit']))
    {
        //echo "Button CLicked";
        //Get all the values from form to update
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $contact_number = $_POST['contact_number'];
        $email = $_POST['email'];
        $username = $_POST['username'];

        //SQL Query to Update Admin
                
        $sql = "UPDATE table_admin SET `full_name`='$full_name',
        `contact_number`='$contact_number',`email`='$email',`username`='$username' WHERE id='$id' ";

        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //Check whether the query executed successfully or not
        if($res==true)
        {
            //Query Executed and Admin Updated
            $_SESSION['update'] = "<div class='success'>Admin Updated Successfully.</div>";
            //Redirect to Admin
            header('location:'.SITEURL.'admin/admin-control.php');
        }
        else
        {
            //Failed to Update
            $_SESSION['update'] = "<div class='error'>Failed to Delete Admin.</div>";
            //Redirect to Admin
            header('location:'.SITEURL.'admin/admin-control.php');
        }
    }

?>