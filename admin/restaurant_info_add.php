<?php include('hd-ft/header.php'); ?>

<div class="manage">
    <div class = "wrapper">
        <h1>Restaurant Detail</h1>

        <?php 
        
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
                   
        ?>

        <form action="" method="POST">
            <table class="table-30">
                <tr>
                    <td>Location</td>
                    <td>
                        <input type="text" name="location" placeholder="Enter Location">
                    </td>
                </tr>
                <tr>
                    <td>Open Hours:</td>
                    <td>
                        <input type="text" name="open_hours" placeholder="Enter Open Hours">
                    </td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>
                        <input type="text" name="email" placeholder="Enter Email">
                    </td>
                </tr>
                <tr>
                    <td>Call:</td>
                    <td>
                        <input type="text" name="contact" placeholder="Enter Phone Number">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Info" class="btn-update">
                    </td>
                </tr>
            </table>
        </form>

        <?php 
        
            //CHeck whether the Submit Button is Clicked or Not
            if(isset($_POST['submit']))
            {
                //echo "Clicked";

                //1. Get the Value from CAtegory Form
                $location = $_POST['location'];
                $open_hours = $_POST['open_hours'];
                $email = $_POST['email'];
                $contact = $_POST['contact'];

                $sql = "INSERT INTO restaurant_info SET 
                    location='$location',
                    open_hours='$open_hours',
                    email='$email',
                    contact='$contact'
                ";

                $res = mysqli_query($conn, $sql);
                //4. Check whether the query executed or not and data added or not
                if($res==true)
                {
                    //Query Executed and Category Added
                    $_SESSION['add'] = "<div class='success'>Added Successfully.</div>";
                    //Redirect to Manage Category Page
                    header('location:'.SITEURL.'admin/restaurant_info.php');
                }
                else
                {
                    //Failed to Add CAtegory
                    $_SESSION['add'] = "<div class='error'>Failed to Add.</div>";
                    //Redirect to Manage Category Page
                    header('location:'.SITEURL.'admin/restaurant_info_add.php');
                }
            }
        ?>
    </div>
</div>



<?php include('hd-ft/footer.php'); ?>