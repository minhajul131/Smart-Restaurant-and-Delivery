<?php include('hf-ft-front/header.php'); ?>
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
                      <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name ?>" class="img-fluid" alt="">
                      <?php
                      }
                      ?>

                    <div class="member-info">
                      <div class="member-info-content">
                        <h4><?php echo $title ?></h4>
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
    <?php include('hf-ft-front/footer.php'); ?>