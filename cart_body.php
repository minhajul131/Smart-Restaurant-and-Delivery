<?php 
 include("functions.php");
 if(isset($_GET['id'])){
   $food_id=$_GET['id'];
   echo $_GET['id']; 
   
   $ip_add=getRealIpUser();
   echo $ip_add;
 
   $sql = " SELECT * FROM cart WHERE ip_add= '$ip_add' AND food_id='$food_id' ";

   $res = mysqli_query($conn, $sql);

   $count = mysqli_num_rows($res);
   if($count>0){
           echo "already added";   
   }else{
     $sql2 = " SELECT * FROM table_food WHERE id='$food_id'  ";

     $res2 = mysqli_query($conn, $sql2);

     $count2 = mysqli_num_rows($res2);

     if($count2>0){
       //food available
       while($row2 = mysqli_fetch_assoc($res2)){
         $image_name = $row2['image_name'];
         $title = $row2['title'];
         $price = $row2['price'];
       }
                   /*$insert_pending_order= "insert into cart (ip_add,food_id,quantity,price) values
         ('$ip_add','$food_id',1,'$price')";
         $run_pending_order=mysqli_query($con,$insert_pending_order);*/
       $sql3 = "INSERT INTO cart SET 
         ip_add='$ip_add',
         food_id='$food_id',
         quantity=1,
         price='$price'
       ";

       //3. Execute the Query and Save in Database
       $res = mysqli_query($conn, $sql3);

       //4. Check whether the query executed or not and data added or not
       if($res==true)
       {
                     
       }
       else
       {
         echo $res;
         
       }
     }
   }
 } 
?>


<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-center justify-content-md-between">

      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-phone d-flex align-items-center"><span>+8801000000000</span></i>
        <i class="bi bi-clock d-flex align-items-center ms-4"><span> Sat-Thu: 10AM - 08PM</span></i>
      </div>
    </div>
  </div>
  <!--top bar -->
 
<!-- Header -->
<header id="header" class="fixed-top d-flex align-items-cente">

   <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

     <h1 class="logo me-auto me-lg-0"><a href="home.php">Restaurant</a></h1>
     <!-- Uncomment below if you prefer to use an image logo -->
     <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

     
     <a href="<?php echo SITEURL;?>food-category.php" class="book-a-table-btn scrollto d-none d-lg-flex">Foods By Category</a>

   </div>
</header>
<!-- End Header -->

 <!--cart-->
 <section class="inner-page">
   <div class="container py-5 h-100">
     <div class="row d-flex justify-content-center align-items-center h-100">
       <div class="col-12">
         <div class="card card-registration card-registration-2 bg-black" style="border-radius: 15px;">
           <div class="card-body p-0 ">
             <div class="row g-0 ">
               <div class="col-lg-8 ">
                 <div class="p-5 ">
                 <div class="d-flex justify-content-between align-items-center mb-5 ">
                   <h1 class="fw-bold mb-0 text-white ">Your Cart</h1>
                 </div>
                   <hr class="my-4">
                   <?php
                   $sql4 = " SELECT ct.*,tf.* FROM cart ct,table_food tf WHERE ct.food_id=tf.id ";

                   $res4 = mysqli_query($conn, $sql4);

                   $count4 = mysqli_num_rows($res4);

                   if($count4>0){
                     //food available
                     $total=0;
                     while($row4 = mysqli_fetch_assoc($res4)){
                       $ip_add = $row4['ip_add'];
                       $food_id = $row4['food_id'];
                       $quantity = $row4['quantity'];
                       $price = $row4['price'];
                       $image_name = $row4['image_name'];
                       $title = $row4['title'];
                       $price=$quantity*$price;
                       $total+=$price;
                   ?>
                     
                   <div class="row mb-4 d-flex justify-content-between align-items-center">
                     <div class="col-md-2 col-lg-2 col-xl-2">
                       <img
                         src="<?php echo SITEURL; ?>images/food/<?php echo $image_name ?>"
                         class="img-fluid rounded-3" alt="">
                     </div>
                     <div class="col-md-3 col-lg-3 col-xl-3">
                       <h6 class="text-muted"><?php echo $title; ?></h6>
                       <h6 class="text-black mb-0"> none</h6>
                     </div>
                     <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                       

                       <input type='text' name='quantity' data-food_id='<?php echo $food_id ?>' value='<?php echo $quantity ?>' class='form-control form-control-sm'>
                         

                        

                       
                     </div>
                     <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                       <h6 class="mb-0"><?php echo $price; ?></h6>
                     </div>
                     <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                       <a href="#!" class="text-muted"><i class="fas fa-times"></i></a>
                     </div>
                   </div>
                   <?php
                 }
               }
               
             ?>
                   <hr class="my-4">

                   <div class="pt-5">
                     <h6 class="mb-0"><a href="#!" class="text-body"><i
                           class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                   </div>
                 </div>
               </div>
               <div class="col-lg-4">
                 <div class="p-5">
                   <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                   <hr class="my-4">

                   <div class="d-flex justify-content-between mb-4">
                     <h5 class="text-uppercase">items <?php echo $count4; ?></h5>
                     
                     <h5>TK <?php echo $total;
                     $total+=50;?>
                     
                     </h5>
                     
                   </div>
                         
                         

                   <h5 class="text-uppercase mb-3">Delivery Charge</h5>

                   <div class="mb-4 pb-2">
                     <select class="select">
                       <option value="1">Standard-Delivery- Tk 50</option>
                       <option value="2">Two</option>
                       <option value="3">Three</option>
                       <option value="4">Four</option>
                     </select>
                   </div>
                   <hr class="my-4">

                   <div class="d-flex justify-content-between mb-5">
                     <h5 class="text-uppercase">Total price</h5>
                     <h5>TK <?php echo $total?></h5>
                   </div>

                   <button type="button" class="btn btn-dark btn-block btn-lg"
                     data-mdb-ripple-color="dark">Check Out</button>

                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
<!-- end cart -->





    <!-- ======= Footer ======= -->
    <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>Restaurantly</h3>
              <p>
                A108 Adam Street <br>
                NY 535022, USA<br><br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> info@example.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Restaurant</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/restaurantly-restaurant-template/ -->
        Designed by <a href="Minhajul Islam">Minhajul Islam</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
<script src="js/jquery-331.min.js"></script>
   <script src="js/bootstrap-337.min.js"></script>
   <script>
       $(document).ready(function(data){
           $(document).on('keyup','.quantity',function(){
               var id =$(this).data("food_id");
               var quantity=$(this).val();
               if(quantity !='')
               {
                   $.ajax({
                       url: "change.php",
                       method: "POST",
                       data: {id:id, quantity:quantity},
                       success:function(){
                           $("body").load("cart_body.php");

                       }

                   });
               }

           });
       });
   </script>

