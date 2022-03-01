<?php include('hd-ft/header.php'); ?>

<div class="manage">
    <div class = "wrapper">
        <h1>Why Us</h1>

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
                    <td>Why title</td>
                    <td>
                        <input type="text" name="why_title" placeholder="Enter title">
                    </td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td>
                        <input type="text" name="why_description" placeholder="Enter Open Hours">
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
                $why_title = $_POST['why_title'];
                $why_description = $_POST['why_description'];
                

                $sql = "INSERT INTO why_us SET 
                    why_title='$why_title',
                    why_description='$why_description'
                ";

                $res = mysqli_query($conn, $sql);
                //4. Check whether the query executed or not and data added or not
                if($res==true)
                {
                    //Query Executed and Category Added
                    $_SESSION['add'] = "<div class='success'>Added Successfully.</div>";
                    //Redirect to Manage Category Page
                    header('location:'.SITEURL.'admin/why_us.php');
                }
                else
                {
                    //Failed to Add CAtegory
                    $_SESSION['add'] = "<div class='error'>Failed to Add.</div>";
                    //Redirect to Manage Category Page
                    header('location:'.SITEURL.'admin/why_us_add.php');
                }
            }
        ?>
    </div>
</div>



<?php include('hd-ft/footer.php'); ?>