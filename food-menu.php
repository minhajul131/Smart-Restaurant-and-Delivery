<?php include('hf-ft-front/header.php'); ?>

  <?php
  //check id pass or not
    if(isset($_GET['category_id'])){
      //id set and get
      $category_id = $_GET['category_id'];
      //get category title
      $sql = "SELECT title FROM table_category WHERE id=$category_id";

      $res = mysqli_query($conn, $sql);

      $row = mysqli_fetch_assoc($res);

      $category_title = $row['title'];

    }
    else{
      //not passed
      //redirect to home
      header('location:'.SITEURL);
    }
  ?>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="home.php">Restaurant</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      
      <a href="<?php echo SITEURL;?>food-category.php" class="book-a-table-btn scrollto d-none d-lg-flex">Foods By Category</a>

    </div>
  </header>
  <!-- End Header -->

  <main id="main">
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Menu</h2>
        </div>

        <!-- ======= Menu Section ======= -->
        <section id="menu" class="menu section-bg">
          <div class="container" data-aos="fade-up">
            <div class="section-title">
              <h2><?php echo $category_title?></h2>
            </div>

            <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">


              <?php
                $sql2 = " SELECT * FROM table_food WHERE category_id=$category_id AND active ='Yes' ";

                $res2 = mysqli_query($conn, $sql2);

                $count2 = mysqli_num_rows($res2);

                if($count2>0){
                  //food available
                  while($row2 = mysqli_fetch_assoc($res2)){
                    $id = $row2['id'];
                    $title = $row2['title'];
                    $price = $row2['price'];
                    $description = $row2['description'];
                    $image_name = $row2['image_name'];
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
                        <a href="#"><?php echo $title; ?></a><span>$<?php echo $price; ?></span>
                      </div>
                      <div class="menu-ingredients">
                        <?php echo $description; ?>
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

      </div>
    </section>

    <?php include('hf-ft-front/footer.php'); ?>