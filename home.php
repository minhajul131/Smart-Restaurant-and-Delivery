<?php include('hf-ft-front/header.php'); ?>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="home.php">Restaurant</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#menu">Menu</a></li>
          <li><a class="nav-link scrollto" href="#specials">Specials</a></li>
          <li><a class="nav-link scrollto" href="#chefs">Chefs</a></li>
          <li><a class="nav-link scrollto" href="#gallery">Gallery</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li>
           <?php  
                              
                if(isset($_SESSION['username']))
                {
                  echo "<a class='nav-link scrollto' href='user-signout.php'>Sign Out</a>";
                }
                else
                {
                  echo  "<a class='nav-link scrollto'  href='user-sign2.php'>Sign In</a>";
                }
              ?>
          
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
      <div class="row">
        <div class="col-lg-8">
          <h1>Welcome to <span>Smart Restaurant & Delivery</span></h1>
          <h2>Delivering great food for yours!</h2>

          <div class="btns">
            <a href="#menu" class="btn-menu animated fadeInUp scrollto">Our Menu</a>
          </div>
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
        <?php 

          //Query to Get all Categories from Database
          $sql = "SELECT * FROM rt_image WHERE active ='Yes' LIMIT 1";

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
                  
                  $image_name = $row['image_name'];
                  $active = $row['active'];

                   
                                        //Chcek whether image name is available or not
                                        if($image_name!="")
                                        {
                                            //Display the Image
                                            ?>
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
            <div class="about-img">
              <img src="<?php echo SITEURL; ?>images/rt_img/<?php echo $image_name; ?>" alt="">
            </div>
          </div>
          <?php
                                        }
                                        else
                                        {
                                            //DIsplay the MEssage
                                            echo "<div class='error'>Image not Added.</div>";
                                        }
                                        

                        }
                    }
                    else
                    {
                        //WE do not have data
                        //We'll display the message inside table
                        
                    }
                    
                ?>


          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>Smart Restaurant & Delivery</h3>
            <p class="fst-italic">
              Welcome to our restaurant. Hope you will enjoy.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> Online order.</li>
              <li><i class="bi bi-check-circle"></i> Home delivery</li>
              <li><i class="bi bi-check-circle"></i> Cash on delivery</li>
            </ul>
            <p>
              We want to serve best food for you. You can trust us. First you check then trust.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Specials Section ======= -->
    <section id="specials" class="specials">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Specials</h2>
          <p>Check Our Specials</p>
        </div>

        <div class="row">

          <?php
            $sql = " SELECT * FROM table_food WHERE featured='Yes' AND active='Yes' AND special='Yes' LIMIT 6 ";

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            if($count>0){
              //category available
              while($rows = mysqli_fetch_assoc($res)){
                $id = $rows['id'];
                $title = $rows['title'];
                $description = $rows['description'];
                $image_name = $rows['image_name'];
                
                ?>

                  <div style="text-align: center" class="col-lg-4 col-md-6">
                    <div class="member" data-aos="zoom-in" data-aos-delay="100">
                    
                    <?php
                      //check image
                      if($image_name==""){
                        echo "not available";
                      }
                      else{
                      //available
                      ?>
                      <img style="border-radius: 50%" src="<?php echo SITEURL; ?>images/food/<?php echo $image_name ?>" class="img-fluid" alt="" width="200px">
                      <?php
                      }
                      ?>

                    <div class="member-info">
                      <div class="member-info-content">
                        <h4 ><?php echo $title ?></h4>
                        <p><?php echo $description; ?></p>
                      </div>
                      
                    </div>
                    
                    
                  </div>
                
              </div> 
              
              <?php 
              }
            }
            else{
               echo "Not avilable";
            }
          ?>       
        </div>

      </div>
    </section><!-- End Specials Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Why Us</h2>
          <p>Why Choose Our Restaurant</p>
        </div>

        <div class="row">
        <?php 

          //Query to Get all Categories from Database
          $sql = "SELECT * FROM why_us";

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
                  
                  $why_title = $row['why_title'];
                  $why_description = $row['why_description'];
                  

                  ?>

          <div class="col-lg-4">
            <div class="box" data-aos="zoom-in" data-aos-delay="100">
              <span><?php echo $id; ?></span>
              <h4><?php echo $why_title; ?></h4>
              <p><?php echo $why_description; ?></p>
            </div>
          </div>
          <?php

                        }
                    }
                    else
                    {
                        //WE do not have data
                        //We'll display the message inside table
                        ?>

                        

                        <?php
                    }
                    
                ?>

          

        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Menu</h2>
          <p>Check Our Tasty Menu</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="menu-flters">
              
              <a class='filter-active' href="food-category.php"> ---- >>>> Explore All Food <<<< ---- </a>
              
            </ul>
          </div>
        </div>

        <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">


          <?php
            $sql = " SELECT * FROM table_food WHERE active ='Yes' AND featured ='Yes' LIMIT 10 ";

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            if($count>0){
              //food available
              while($rows = mysqli_fetch_assoc($res)){
                $id = $rows['id'];
                $title = $rows['title'];
                $price = $rows['price'];
                $description = $rows['description'];
                $image_name = $rows['image_name'];
                ?>

                <div class="col-lg-6 menu-item filter-starters">
                  <?php
                    //check image
                    if($image_name==""){
                      echo "not available";
                    }
                    else{
                      //available
                      ?>
                      <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name ?>" class="menu-img" alt="">
                      <?php
                    }
                  ?>
                  
                  <div class="menu-content">
                    <span><?php echo $title; ?></span><span>TK <?php echo $price; ?></span>
                  </div>
                  <div class="menu-ingredients">
                    <?php echo $description; ?> <br>
                    <a class='btn btn-dark btn-block ' href="cart.php?id=<?php echo $rows['id']; ?>"  ><i class="fa fa-shopping-cart"></i> Add to Cart</a>
                  </div>
                  
                </div>

                <?php
                
              }
            }
            else{
              echo "Not avilable";
            }
          ?>

        </div>

      </div>
    </section><!-- End Menu Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Testimonials</h2>
          <p>What they're saying about us</p>
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
          <?php 

            //Query to Get all Categories from Database
            $sql = "SELECT * FROM testimonials";

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
                    $c_id = $row['c_id'];
                    $c_name = $row['c_name'];
                    $c_subject = $row['c_subject'];
                    $c_message = $row['c_message'];
                    

                    ?>

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  <?php echo $c_message; ?>
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/stay-healthy.png" class="testimonial-img" alt="">
                <h3><?php echo $c_name; ?></h3>
                <h4><?php echo $c_subject; ?></h4>
              </div>
            </div><!-- End testimonial item -->
            <?php

                        }
                    }
                    else
                    {
                      
                    }
                    
                ?>

            

            

            

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">

      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Gallery</h2>
          <p>Some photos from Our Restaurant</p>
        </div>
      </div>

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-0">
        <?php 

          //Query to Get all Categories from Database
          $sql = "SELECT * FROM rt_image";

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
                  
                  $image_name = $row['image_name'];
                  

                  ?>

                  <tr>
                      

                      <td>

                          <?php  
                              //Chcek whether image name is available or not
                              if($image_name!="")
                              {
                                  //Display the Image
                                  ?>

                    <div class="col-lg-3 col-md-4">
                      <div class="gallery-item">
                        <a href="<?php echo SITEURL; ?>images/rt_img/<?php echo $image_name; ?>" class="gallery-lightbox" data-gall="gallery-item">
                          <img src="<?php echo SITEURL; ?>images/rt_img/<?php echo $image_name; ?>" alt="" class="img-fluid" >
                        </a>
                      </div>
                    </div>
                    <?php
                                                  }
                                                  else
                                                  {
                                                      //DIsplay the MEssage
                                                      echo "<div class='error'>Image not Added.</div>";
                                                  }
                                                  ?>
                                                  <?php

          }
          }
          else
          {
          //WE do not have data
          //We'll display the message inside table
          ?>



          <?php
          }

        ?>

          

        </div>

      </div>
      
    </section><!-- End Gallery Section -->

    <!-- ======= Chefs Section ======= -->
    <section id="chefs" class="chefs">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Chefs</h2>
          <p>Our Proffesional Chefs</p>
        </div>

        <div class="row">

          <?php
            $sql = " SELECT * FROM table_chef LIMIT 3 ";

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            if($count>0){
              //food available
              while($rows = mysqli_fetch_assoc($res)){
                $full_name = $rows['full_name'];
                $position = $rows['position'];
                $image_name = $rows['image_name'];
                ?>
                <div class="col-lg-4 col-md-6">
                <div class="member" data-aos="zoom-in" data-aos-delay="100">
                <?php
                  //check image
                  if($image_name==""){
                    echo "not available";
                  }
                  else{
                    //available
                ?>
                    <img src="<?php echo SITEURL; ?>images/chef/<?php echo $image_name ?>" class="img-fluid" alt="">
                    <?php
                  }
                    ?>

                  <div class="member-info">
                    <div class="member-info-content">
                      <h4><?php echo $full_name ?></h4>
                      <span><?php echo $position ?></span>
                    </div>
                  <div class="social">
                    <a href=""><i class="bi bi-twitter"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div> 
            <?php 
              }
            }
            else{
              echo "Not avilable";
            }
          ?>       
        </div>
      </div>
    </section><!-- End Chefs Section -->
        
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </div>
      </div>

      <div class="container" data-aos="fade-up">

        <div class="row mt-5">
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
                  $location = $row['location'];
                  $open_hours = $row['open_hours'];
                  $email = $row['email'];
                  $contact = $row['contact'];

                  ?>

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p><?php echo $location; ?></p>
              </div>

              <div class="open-hours">
                <i class="bi bi-clock"></i>
                <h4>Open Hours:</h4>
                <p>
                <?php echo $open_hours; ?>
                </p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p><?php echo $email; ?></p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p><?php echo $contact; ?></p>
              </div>

            </div>

          </div>
          <?php

          }
          }
          else
          {
          }                    
        ?>

        <div class="col-lg-8 mt-5 mt-lg-0">

        <form action="" method="POST" >
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" name="c_name" class="form-control" id="name" placeholder="Your Name" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="c_email" id="email" placeholder="Your Email" required>
            </div>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="c_subject" id="subject" placeholder="Subject" required>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="c_message" rows="8" placeholder="Message" required></textarea>
          </div>
          <div class="my-3"></div>
                        
          <div class="text-center"><button type="submit" name="submit" class="btn btn-primary  col-md-5">Send Message</button></div>
        </form>

        <?php 
        
            //CHeck whether the Submit Button is Clicked or Not
            if(isset($_POST['submit']))
            {
                //echo "Clicked";

                //1. Get the Value from CAtegory Form
                $c_name = $_POST['c_name'];
                $c_email = $_POST['c_email'];
                $c_subject = $_POST['c_subject'];
                $c_message = $_POST['c_message'];
                

                $sql = "INSERT INTO testimonials SET 
                    c_name='$c_name',
                    c_email='$c_email',
                    c_subject='$c_subject',
                    c_message='$c_message'
                ";

                $res = mysqli_query($conn, $sql);
                //4. Check whether the query executed or not and data added or not
                if($res==true)
                {
                    //Query Executed and Category Added
                    $_SESSION['add'] = "<div class='success'>Added Successfully.</div>";
                    //Redirect to Manage Category Page
                    header('location:'.SITEURL.'home.php');
                }
                else
                {
                    //Failed to Add CAtegory
                    $_SESSION['add'] = "<div class='error'>Failed to Add.</div>";
                    //Redirect to Manage Category Page
                    header('location:'.SITEURL.'home.php');
                }
            }
        ?>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

<?php include('hf-ft-front/footer.php'); ?>