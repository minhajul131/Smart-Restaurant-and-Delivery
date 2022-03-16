<?php include('connection/connector.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Smart Restaurant and Delivery</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="" rel="icon">
  <link href="" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-center justify-content-md-between">
    <?php 

      //Query to Get all Categories from Database
      $sql = "SELECT * FROM restaurant_info";

      //Execute Query
      $res = mysqli_query($conn, $sql);

      //Count Rows
      $count = mysqli_num_rows($res);

      //Check whether we have data in database or not
      if($count>0)
      {
          //We have data in database
          //get the data and display
          while($row=mysqli_fetch_assoc($res))
          {
              $id = $row['id'];
              
              $open_hours = $row['open_hours'];
              
              $contact = $row['contact'];

              ?>
              

      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-phone d-flex align-items-center"><span><?php echo $contact; ?></span></i>
        <i class="bi bi-clock d-flex align-items-center ms-4"><span><?php echo $open_hours; ?></span></i>
        <?php

                        }
                    }
                    else
                    {
                      
                    }
                    
                ?>
        <i class="bi d-flex align-items-center ms-4"><span> <a href="user-account.php"  >
                   <?php
                   if(isset($_SESSION['username']))
                   {
                        echo "Welcome : ".$_SESSION['username']."";
                        echo "  <a href='../user-account.php'>"; 
                        echo "  </a>";
                   }
                   else 
                   {
                    echo "Welcome : Guest ";
                    echo "  <a href='../checkout.php'>"; 
                    echo "  </a>";
                   }
                   ?>
               </a></span></i>

      </div>
      <div class="languages d-none d-md-flex align-items-center">
        <ul>
        <li></li>
        <li><a href="cart.php"><img src="https://img.icons8.com/external-flatart-icons-flat-flatarticons/64/000000/external-cart-marketing-flatart-icons-flat-flatarticons.png" width="30px"/>Cart</a></li>
        </ul>
      </div>
    </div>
  </div>
  <!--top bar -->
  