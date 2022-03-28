<?php include('hd-ft/header.php'); 
    if(isset($_SESSION['role']) && $_SESSION['role']!='1'){
        header("location:".SITEURL.'admin/home.php');
        die();
    }
?>

    <div class="manage">
        <div class = "wrapper">
            <h1>Update Why Us</h1>

            <?php 
                //Get ID of Admin
                $id=$_GET['id'];

                //SQL Query to Get data
                $sql="SELECT * FROM why_us WHERE id=$id";

                $res=mysqli_query($conn, $sql);

                if($res==TRUE){

                    // Check whether the data is available or not
                    $count = mysqli_num_rows($res);
                    //Check whether we have admin data or not
                    if($count==1){

                        // Get the Details
                        //echo "Admin Available";
                        $row=mysqli_fetch_assoc($res);

                        $why_title = $row['why_title'];
                        $why_description = $row['why_description'];
                    }
                    else{
                        //Redirect to Manage Admin PAge
                        header('location:'.SITEURL.'admin/why_us.php');
                    }
                }
            
            ?>

            <form action="" method="POST">

                <table class="table-30">
                    <tr>
                        <td>Full Name: </td>
                        <td>
                            <input type="text" name="why_title" value="<?php echo $why_title; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Contact Number: </td>
                        <td>
                            <textarea type="text" name="why_description" cols="30" rows="5" value="<?php echo $why_description; ?>"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="submit" value="Update Why Us" class="btn-update">
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
        $why_title = $_POST['why_title'];
        $why_description = $_POST['why_description'];

        //SQL Query to Update Admin
                
        $sql = "UPDATE why_us SET `why_title`='$why_title',
        `why_description`='$why_description' WHERE id='$id' ";

        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //Check whether the query executed successfully or not
        if($res==true)
        {
            //Query Executed and Admin Updated
            $_SESSION['update'] = "<div class='success'>Admin Updated Successfully.</div>";
            //Redirect to Admin
            header('location:'.SITEURL.'admin/why_us.php');
        }
        else
        {
            //Failed to Update
            $_SESSION['update'] = "<div class='error'>Failed to Delete Admin.</div>";
            //Redirect to Admin
            header('location:'.SITEURL.'admin/why_us.php');
        }
    }

?>