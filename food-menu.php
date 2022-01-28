<?php include('hf-ft-front/header.php'); ?>
<?php include('connection/connector.php'); ?>

    <!-- food-menu start-->
    <section class = "food-menu">
        <div class = "container">
            <h2 class = "text-center">Food Menu</h2>

            <?php
            $sql = " SELECT * FROM table_food WHERE active ='Yes' AND featured ='Yes' LIMIT 6 ";

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

                <div class="food-menu-img">
                  <?php
                    //check image
                    if($image_name==""){
                      echo "not available";
                    }
                    else{
                      //available
                      ?>
                      <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name ?>" class="img-responsive img-curve" alt="Pizza With Tomato Basil">
                      <?php
                    }
                  ?>
                  
                  <div class="food-menu-desc">
                    <h4><?php echo $title; ?></h4>
                    <p class="food-prize"><?php echo $price; ?></p>
                    <p class="food-detail"><?php echo $description; ?></p>
                    <br>
                    <a href="#" class="btn btn-primary">Order now</a>
                </div>
                </div>

                <?php
                
              }
            }
            else{
              echo "Not avilable";
            }
          ?>
            
            <div class = "clearfix"></div>
        </div>
    </section>
    <!-- food-menu ends-->

    <?php include('hf-ft-front/footer.php'); ?>