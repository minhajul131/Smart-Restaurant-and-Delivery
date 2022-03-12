<?php 
 
  include('hf-ft-front/header.php'); 
  include("functions.php");
  if(isset($_GET['id'])){
    $food_id=$_GET['id'];
    echo $_GET['id']; 
    
    $ip_add=getRealIpUser();
    //echo $ip_add;
  
    $sql = " SELECT * FROM cart WHERE ip_add= '$ip_add' AND food_id='$food_id' ";

    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);
    if($count>0){
      //echo "already added";
      echo"<script>alert('Already added' )</script>";   
    }
    else{
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
        if($res==true){
                      
        }
        else{
          echo $res;
          
        }
      }
    }
  } 
?>

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

                  <form action="cart.php" method="post" enctype="multipart/form-data"><!-- form start -->
                    <hr class="my-4">
                    <?php
                    $ip_add=getRealIpUser();
                      $sql4 = " SELECT ct.*,tf.* FROM cart ct,table_food tf WHERE ct.food_id=tf.id  and ct.ip_add='$ip_add' ";
  
                      $res4 = mysqli_query($conn, $sql4);

                      $count4 = mysqli_num_rows($res4);
                      $total=0;
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
                          $item_price=$quantity*$price;
                          $total+=$item_price;
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

                                <input type='text' name='quantity' data-food_id1='<?php echo $food_id ?>' value='<?php echo $quantity ?>' class='quantity form-control form-control-sm'>

                              </div>
                              <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                <h6 class="mb-0">TK: <?php echo $item_price; ?></h6>
                              </div>
                              <div class="col-md-3 col-lg-2 col-xl-1 offset-lg-1">
                                <h5><a href="<?php echo SITEURL; ?>cart_delete.php?food_id=<?php echo $food_id; ?>&ip_add=<?php echo $ip_add; ?>" class="text-danger">X</a></h5>
                              </div>
                              
                              <hr class="my-4">
                            </div>
                          <?php
                        }
                      }                
                    ?>
                  </form><!-- form end -->

                </div>
              </div>

              <div class="col-lg-4">
                <div class="p-5">
                  <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                  <hr class="my-4">

                  <div class="d-flex justify-content-between mb-4">
                    <h5 class="text-uppercase">items <?php echo $count4; ?></h5>
                      
                    <h5>TK <?php echo $total; ?> </h5>  
                  </div>
                  
                  <h5 class="text-uppercase mb-3">Payment Option</h5>

                    <div class="mb-4 pb-2">
                      <select class="select">
                        <option value="1">Cash on delivery</option>
                        
                      </select>
                    </div>
                  <hr class="my-4">

                  <div class="d-flex justify-content-between mb-5">
                    <h5 class="text-uppercase">Total price</h5>
                    <h5>TK <?php echo $total?></h5>
                  </div>
                  <?php if($count4>0){ ?>
                  <a href="<?php echo SITEURL;?>checkout.php" name="submit" class="btn btn-dark btn-block btn-lg" data-mdb-ripple-color="dark">Check Out</a>
                  <?php } ?>
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

<script src="js/jquery-331.min.js"></script>
  <script src="js/bootstrap-337.min.js"></script>
  <script>
    $(document).ready(function(data){
         
      $(document).on('keyup','.quantity',function(){
              
        var id =$(this).data("food_id1");
        var quantity=$(this).val();
                 
        if(quantity !=''){
          $.ajax({
            url: "change.php",
            method: "POST",
            data: {id:id, quantity:quantity},
            success:function(){
  
              //$("body").load("cart_body.php");
              location.reload();
            }

          });
        }

      });
    });
  </script>

<?php include('hf-ft-front/footer.php'); ?>
