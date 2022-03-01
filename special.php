<?php include('hf-ft-front/header.php'); ?>
<section id="specials" class="specials">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Specials</h2>
            <p>Check Our Specials</p>
        </div>



        <div class="row" data-aos="fade-up" data-aos-delay="100">


            <?php
            $sql = " SELECT * FROM table_food WHERE active ='Yes' AND featured ='Yes' AND special = 'Yes' ";

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
            <div class="col-lg-3">
                <ul class="nav nav-tabs flex-column">
                    <li class="nav-item">
                        <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1"><?php echo $title; ?></a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-9 mt-4 mt-lg-0">
                <div class="tab-content">
                    <div class="tab-pane active show" id="tab-1">
                      <div class="row">
                        <div class="col-lg-8 details order-2 order-lg-1">
                          <p class="fst-italic"><?php echo $description; ?></p>
                        </div>
                        <?php
                  
                          //check image
                          if($image_name==""){
                            echo "not available";
                          }
                          else{
                            //available
                            ?>
                            <div class="col-lg-4 text-center order-1 order-lg-2">
                              <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name ?>" class="img-fluid"
                                alt="">
                            </div>
                            <?php
                          }
                        ?>
                          

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
    
</section><!-- End Menu Section -->

<?php include('hf-ft-front/footer.php'); ?>