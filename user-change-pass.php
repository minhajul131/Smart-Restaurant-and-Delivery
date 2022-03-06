<?php include('hf-ft-front/header.php'); ?>

<section>
    <div class="container">
      <div class="section-title">
        <p>Enter Your Details</p>
      </div>

        
        <div class="row mt-5">
        <div class="offset-md-3 col-lg-12 mt-5 mt-lg-0">
        <?php 
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
                
            }
        ?>

<form action="" method="POST">

    <div class=" form-group mt-3">
        <div class="col-md-6 form-group mt-3 mt-md-0">
            <label class="form-label" for="form1Example13">Current Password</label>
            <input type="password" class="form-control" name="current_password" placeholder="Your password">
        </div>
        <br>
        <div class="col-md-6 form-group mt-3 mt-md-0">
            <label class="form-label" for="form1Example13">New Password</label>
            <input type="password" class="form-control" name="new_password" placeholder="Your password">
        </div>
        <br>
        <div class="col-md-6 form-group mt-3 mt-md-0">
            <label class="form-label" for="form1Example13">Confirm Password</label>
            <input type="password" class="form-control" name="confirm_password" placeholder="Your password">
        </div>
        <br>
        <div>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
            <button type="submit" class="btn btn-primary btn-lg btn-block col-md-6" name="submit">Change Password</button>
        </div>
            
    </div>

</form>
<?php 

            //CHeck whether the Submit Button is Clicked on Not
            if(isset($_POST['submit']))
            {
                //echo "CLicked";

                //1. Get the DAta from Form
                $id=$_POST['id'];
                $current_password = $_POST['current_password'];
                $new_password = $_POST['new_password'];
                $confirm_password = $_POST['confirm_password'];


                //2. Check whether the user with current ID and Current Password Exists or Not
                $sql = "SELECT * FROM user_signup WHERE user_id=$id AND password='$current_password'";

                //Execute the Query
                $res = mysqli_query($conn, $sql);

                if($res==true)
                {
                    //CHeck whether data is available or not
                    $count=mysqli_num_rows($res);

                    if($count==1)
                    {
                        //User Exists and Password Can be CHanged
                        //echo "User FOund";

                        //Check whether the new password and confirm match or not
                        if($new_password==$confirm_password)
                        {
                            //Update the Password
                            $sql2 = "UPDATE user_signup SET 
                                password='$new_password' 
                                WHERE user_id=$id
                            ";

                            //Execute the Query
                            $res2 = mysqli_query($conn, $sql2);

                            //CHeck whether the query exeuted or not
                            if($res2==true)
                            {
                                //Display Succes Message
                                //REdirect to Manage Admin Page with Success Message
                                $_SESSION['change-pwd'] = "<div class='success'>Password Changed Successfully. </div>";
                                //Redirect the User
                                header('location:'.SITEURL.'user-account.php');
                            }
                            else
                            {
                                //Display Error Message
                                //REdirect to Manage Admin Page with Error Message
                                $_SESSION['change-pwd'] = "<div class='error'>Failed to Change Password. </div>";
                                //Redirect the User
                                header('location:'.SITEURL.'user-account.php');
                            }
                        }
                        else
                        {
                            //REdirect to Manage Admin Page with Error Message
                            $_SESSION['pwd-not-match'] = "<div class='error'>Password Did not Patch. </div>";
                            //Redirect the User
                            header('location:'.SITEURL.'user-account.php');

                        }
                    }
                    else
                    {
                        //User Does not Exist Set Message and REdirect
                        $_SESSION['user-not-found'] = "<div class='error'>User Not Found. </div>";
                        //Redirect the User
                        header('location:'.SITEURL.'user-account.php');
                    }
                }

                //3. CHeck Whether the New Password and Confirm Password Match or not

                //4. Change PAssword if all above is true
            }

?>

    </div>
</div>
</div>
</div>
</div>
<section>




<?php include('hf-ft-front/footer.php'); ?>