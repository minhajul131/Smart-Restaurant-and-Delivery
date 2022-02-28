<?php include('hd-ft/header.php'); ?>

<div class="manage">
    <div class="wrapper">
        <h1>Update Info</h1>

        <br><br>


        <?php 
        
            //Check whether the id is set or not
            if(isset($_GET['id']))
            {
                //Get the ID and all other details
                //echo "Getting the Data";
                $id = $_GET['id'];
                //Create SQL Query to get all other details
                $sql = "SELECT * FROM restaurant_info WHERE id=$id";

                //Execute the Query
                $res = mysqli_query($conn, $sql);

                //Count the Rows to check whether the id is valid or not
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    $row = mysqli_fetch_assoc($res);
                    $location = $row['location'];
                    $open_hours = $row['open_hours'];
                    $email = $row['email'];
                    $contact = $row['contact'];
                }
                else
                {
                    //redirect to manage category with session message
                    $_SESSION['no-info-found'] = "<div class='error'>Info not Found.</div>";
                    header('location:'.SITEURL.'admin/reataurant_info.php');
                }
            }
            else
            {
                //redirect to Manage CAtegory
                header('location:'.SITEURL.'admin/reataurant_info.php');
            }
        
        ?>
        <form action="" method="POST" enctype="multipart/form-data">

            <table class="table-30">
                <tr>
                    <td>location: </td>
                    <td>
                        <input type="text" name="location" value="<?php echo $location; ?>">
                    </td>
                </tr>
                <tr>
                    <td>open_hours: </td>
                    <td>
                        <input type="text" name="open_hours" value="<?php echo $open_hours; ?>">
                    </td>
                </tr>
                <tr>
                    <td>email: </td>
                    <td>
                        <input type="text" name="email" value="<?php echo $email; ?>">
                    </td>
                </tr>
                <tr>
                    <td>contact: </td>
                    <td>
                        <input type="text" name="contact" value="<?php echo $contact; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update info" class="btn-update">
                    </td>
                </tr>
            </table>

        </form>

        <?php 
        
            if(isset($_POST['submit']))
            {
                //echo "Clicked";
                //1. Get all the values from our form
                $id = $_POST['id'];
                $location = $_POST['location'];
                $open_hours = $_POST['open_hours'];
                $email = $_POST['email'];
                $contact = $_POST['contact'];
                
                $sql2 = "UPDATE restaurant_info SET 
                    location = '$location',
                    open_hours = '$open_hours',
                    email = '$email',
                    contact = '$contact' 
                    WHERE id=$id
                ";

                //Execute the Query
                $res2 = mysqli_query($conn, $sql2);

                //4. REdirect to Manage Category with MEssage
                //CHeck whether executed or not
                if($res2==true)
                {
                    //Category Updated
                    $_SESSION['update'] = "<div class='success'>Category Updated Successfully.</div>";
                    header('location:'.SITEURL.'admin/restaurant_info.php');
                }
                else
                {
                    //failed to update category
                    $_SESSION['update'] = "<div class='error'>Failed to Update Category.</div>";
                    header('location:'.SITEURL.'admin/restaurant_info.php');
                }

            }
        
        ?>

    </div>
</div>

<?php include('hd-ft/footer.php'); ?>