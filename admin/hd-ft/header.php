<?php include('../connection/connector.php'); ?>

<?php 

    //AUthorization - Access COntrol
    //CHeck whether the user is logged in or not
    if(!isset($_SESSION['user'])) //IF user session is not set
    {
        //User is not logged in
        //Redirect to login page with message
        $_SESSION['no-login-message'] = "<div class='error text-center'>Please login to access Admin Panel.</div>";
        //Redirect to Login Page
        header('location:'.SITEURL.'admin/signin.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart-Restaurant-and-Delivery</title>

    <link rel="stylesheet" href="../css/back-end.css">
</head>
<body>
    <!-- Menu Starts -->
    <div class="menu text-center">
        <div class="wrapper">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="control-user.php">User</a></li>
                <li><a href="control-admin.php">Admin</a></li>
                <li><a href="control-chef.php">Chef</a></li>
                <li><a href="control-category.php">Category</a></li>
                <li><a href="control-food.php">Food</a></li>
                <li><a href="signout.php">Sign Out</a></li>
                    
            </ul>
        </div>
    </div>
    <!-- Menu Ends -->