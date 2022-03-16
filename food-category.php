<?php include('hf-ft-front/header.php'); ?>

  <!-- Header -->
  <header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="home.php">Restaurant</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <!--<li><a class="nav-link scrollto" href="cart.php"><img src="https://img.icons8.com/external-flatart-icons-flat-flatarticons/64/000000/external-cart-marketing-flatart-icons-flat-flatarticons.png" width="40px"/></a></li>-->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>
  <!-- End Header -->

  <main id="main">
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>All Categories</h2>
        </div>

      </div>
    </section>

    <section class="chefs" >
      <div class="container">
        <div class="section-title">
          <h2>Categories</h2>
          
        </div>

        <div class="row">

          <?php
            $sql = " SELECT * FROM table_category WHERE featured='Yes' AND active='Yes' ";

            $res = mysqli_query($conn, $sql);

            $count = mysqli_num_rows($res);

            if($count>0){
              //category available
              while($rows = mysqli_fetch_assoc($res)){
                $id = $rows['id'];
                $title = $rows['title'];
                $image_name = $rows['image_name'];
                
                ?>

                  <div class="col-lg-4 col-md-6">
                    <div class="member" data-aos="zoom-in" data-aos-delay="100">
                    <a href="<?php echo SITEURL;?>food-menu.php?category_id=<?php echo $id?>">
                    <?php
                      //check image
                      if($image_name==""){
                        echo "not available";
                      }
                      else{
                      //available
                      ?>
                      <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name ?>" class="img-fluid" alt="" >
                      <?php
                      }
                      ?>

                    <div class="member-info">
                      <div class="member-info-content">
                        <h4><?php echo $title ?></h4>
                      </div>
                    </div>
                    </a>
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
    </section>

  </main><!-- End #main -->

  <?php include('hf-ft-front/footer.php'); ?>