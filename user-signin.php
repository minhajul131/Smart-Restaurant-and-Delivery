<?php  
    include("functions.php");
?>
<header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="home.php">Restaurant</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <a href="<?php echo SITEURL;?>user-signup.php" class="book-a-table-btn scrollto d-none d-lg-flex">Create New Account</a>
    </div>
</header>
<main id="main">
    
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="images/draw2.svg" class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    
                    <form action="" method="POST">
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="username" id="form1Example13" class="form-control form-control-lg" />
                            <label class="form-label" for="form1Example13">Username</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" name="password" id="form1Example23" class="form-control form-control-lg" />
                            <label class="form-label" for="form1Example23">Password</label>
                        </div>

                        <div class="d-flex justify-content-around align-items-center mb-4">
                            <!-- Submit button -->
                            <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block col-md-7">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php 

        //CHeck whether the Submit Button is Clicked or NOt
        if(isset($_POST['submit']))
        {
            //Process for Login
            //1. Get the Data from Login form
            $username = $_POST['username'];
            $password = $_POST['password'];
            //$username = mysqli_real_escape_string($conn, $_POST['username']);
            
            //$raw_password = ($_POST['password']);
            //$password = mysqli_real_escape_string($conn, $raw_password);

            //2. SQL to check whether the user with username and password exists or not
            $sql = "SELECT * FROM user_signup WHERE username='$username' AND password='$password'";

            //3. Execute the Query
            $res = mysqli_query($conn, $sql);
            $get_ip = getRealIpUser();
            $check_customer = mysqli_num_rows($res);

            $select_cart="SELECT * FROM cart WHERE ip_add='$get_ip'";
            $run_cart =mysqli_query($conn, $select_cart);
            $check_cart = mysqli_num_rows($run_cart);
            if($check_customer==0){
                echo "<script>alert('error')</script>";
                exit();
            }
            if($check_customer==1 AND $check_cart==0){
                $_SESSION['username'] = $username;
                echo "<script>alert('logged In')</script>";
                echo "<script>window.open('home.php','_self')</script>";
            }else{
                $_SESSION['username'] = $username;
                echo "<script>alert('logged In okk')</script>";
                echo "<script>window.open('checkout.php','_self')</script>";
            }

        }

    ?>

</main>