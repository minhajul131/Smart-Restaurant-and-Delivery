<?php include('hf-ft-front/header.php'); ?>


  <!-- Header -->
  <header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="home.php">Restaurant</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="<?php echo SITEURL;?>food-category.php" class="book-a-table-btn scrollto d-none d-lg-flex">Foods By Category</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>
  <!-- End Header -->

<!------ Include the above in your HEAD tag ---------->
<main id="main">
    <section class="breadcrumbs chefs">

        <div class="container">
            <div class="section-title">
                <h2>Account Information</h2>            
            </div>

            <form method="post">
                <div class="row">
                <?php
                                        if(isset($_SESSION['username']))
                                        {
                                        $c_user=$_SESSION['username'];
                                        $get_pro="select * from user_signup where username='$c_user'";
                                        $run_get_pro=mysqli_query($conn,$get_pro);
                        
                                        while($row_categories=mysqli_fetch_array($run_get_pro))
                                        {
                                            $c_user=$row_categories['username'];
                                            $c_id=$row_categories['user_id'];
                                            $c_name=$row_categories['full_name'];
                                            $c_img=$row_categories['image_name'];
                                            $c_email=$row_categories['email'];
                                            $c_contact=$row_categories['contact_number'];
                                        }
                                        $get_order="select * from order_delivery where user_id='$c_id'";
                                        $run_get_order=mysqli_query($conn,$get_order);
                                        $i=0;
                                        while($row_categories=mysqli_fetch_array($run_get_order))
                                        {
                                            $i++;
                                            $order_id =$row_categories['order_id'];
                                            $food_id=$row_categories['food_id'];
                                            $food_title=$row_categories['food_title'];
                                            $food_quantity=$row_categories['food_quantity'];
                                            $total_price=$row_categories['total_price'];
                                            $order_time=$row_categories['order_time'];
                                            $order_status=$row_categories['order_status'];
                                            ?>
                                            <?php  
                                            }
                                        }   
                                        ?> 

                

                    <div class="col-md-4">
                        <div class="profile-img">
                        
                            <img src="images/Beverages.jpg" alt="" width="150px">  
                                                     
                        </div>
                    </div>
                    
                     
               
                    <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p><?php echo $c_name?></p>
                            <p><?php echo $c_email?></p>
                            <p><?php echo $c_contact?></p>
                            <a href="user_account_edit.php" class="btn btn-dark btn-block btn-lg">Edit Profile</a>
                            
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Orders</a>
                                    </li>    
                                </ul>
                            
                                <table class="table table-dark table-striped">
                                    
                                
                                
                                    <thead>
                                        <tr>
                                            <th scope="col">food_name</th>
                                            <th scope="col">food_quantity</th>
                                            <th scope="col">total_price</th>
                                            <th scope="col">Order Time</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    
                                            <tr>
                                                
                                                <td><?php echo $food_title?></td>
                                                <td><?php echo $food_quantity?></td>
                                                <td><?php echo $total_price?></td>
                                                <td><?php echo $order_time?></td>
                                                <td><?php echo $order_status?></td>
                                            </tr>     
                                                 
                                    </tbody>
                                
                                
                                    
                                </table>
                                
      
                            </div>
                        </div>
                    </div>
                                    </div>
                </div>

            </form>

        </div>
    </section>

</main><!-- End #main -->
<?php include('hf-ft-front/footer.php'); ?>
