<?php include('../connection/connector.php'); ?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <title>Smart-Restaurant-and-Delivery</title>
    <link rel="stylesheet" href="../css/back-end.css">
</head>
    <body>

        <section class = "signUp py-5 bg-light">
            <div class = "container">
                <div class = "row g-0">
                    <div class = "col-lg-5">
                        <img src="../images/coffee.jpg" class="img-fluid" alt="">
                    </div>
                    <div class = "col-lg-7 text-center py-5">
                        <h4 class = "up">Sign Up</h4>
                        <?php 
                            if(isset($_SESSION['login'])){

                                echo $_SESSION['login'];
                                unset($_SESSION['login']);
                            }
                        ?>
                        <form action="" method="POST">
                            <div class = form-row py-3 py-5>
                                <div class = "offset-1 col-lg-10">
                                    <input type="text" name="username" class = "inp px-3" placeholder="username">
                                </div>
                            </div>
                            <div class = form-row py-3>
                                <div class = "offset-1 col-lg-10">
                                    <input type="text" name="password" class = "inp px-3" placeholder="password">
                                </div>
                            </div>
                            <div class = form-row py-3>
                                <div class = "offset-1 col-lg-10">
                                    <input type="submit" name="submit" value="Sign Up" class="signUpBtn">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
</html>

<?php 

    //CHeck whether the Submit Button is Clicked or NOt
    if(isset($_POST['submit']))
    {
        //Process for Login
        //1. Get the Data from Login form
         $username = $_POST['username'];
         $password = md5($_POST['password']);
        //$username = mysqli_real_escape_string($conn, $_POST['username']);
        
        //$raw_password = ($_POST['password']);
        //$password = mysqli_real_escape_string($conn, $raw_password);

        //2. SQL to check whether the user with username and password exists or not
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        //3. Execute the Query
        $res = mysqli_query($conn, $sql);

        //4. Count rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //User Available and Login Success
            $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $username; //TO check whether the user is logged in or not and logout will unset it

            //Redirect to HOme Page/Dashboard
            header('location:'.SITEURL.'admin/home.php');
        }
        else
        {
            //User not Available and Login FAil
            $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
            //Redirect to HOme Page/Dashboard
            header('location:'.SITEURL.'admin/login.php');
        }


    }

?>