<?php include('hd-ft/header.php'); ?>

    <div class="manage">
        <div class = "wrapper">
            <h1>Update Admin Detail</h1>

            <?php 
                //Get ID of Admin
                $id=$_GET['id'];

                //SQL Query to Get data
                $sql="SELECT * FROM tbl_admin WHERE id=$id";

                $res=mysqli_query($conn, $sql);

                if($res==TRUE){

                    // Check whether the data is available or not
                    $count = mysqli_num_rows($res);
                    //Check whether we have admin data or not
                    if($count==1){

                        // Get the Details
                        //echo "Admin Available";
                        $row=mysqli_fetch_assoc($res);

                        $full_name = $rows['full_name'];
                        $contact_number = $rows['contact_number'];
                        $email = $rows['email'];
                        $username = $rows['username'];
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