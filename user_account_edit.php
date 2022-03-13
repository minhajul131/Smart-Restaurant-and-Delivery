<?php include('hf-ft-front/header.php'); ?>


<main id="main">

  <section>
    <div class="container">
      <div class="section-title">
        <p>Update Your Details</p>
      </div>
      <?php
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
            
            ?>

      <div class="row mt-5">
        <div class="offset-md-3 col-lg-12 mt-5 mt-lg-0">
          <!-- edit -->
          <?php 
        
            //Check whether the id is set or not
            if(isset($_GET['id']))
            {
                //Get the ID and all other details
                //echo "Getting the Data";
                $id = $_GET['id'];
                //Create SQL Query to get all other details
                $sql = "SELECT * FROM user_signup WHERE user_id=$id";

                //Execute the Query
                $res = mysqli_query($conn, $sql);

                //Count the Rows to check whether the id is valid or not
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    //Get all the data
                    $row = mysqli_fetch_assoc($res);
                    $full_name = $row['full_name'];
                    $contact_number = $row['contact_number'];
                    $current_image = $row['image_name'];
                }
                else
                {
                    //redirect to manage category with session message
                    $_SESSION['no-category-found'] = "<div class='error'>Not Found.</div>";
                    header('location:'.SITEURL.'user-account.php');
                }

            }
            else
            {
                //redirect to Manage CAtegory
                header('location:'.SITEURL.'user-account.php');
            }
        
        ?>
                      
          <form action="" method="POST" enctype="multipart/form-data">

            <div class=" form-group mt-3">
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <label class="form-label" for="form1Example13">Your Name</label>
                <input type="text" class="form-control" value="<?php echo $full_name; ?>" name="full_name" placeholder="Your Full Name" >
              </div>
              <br>        
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <label class="form-label" for="form1Example13">Your Contact Number</label>
                <input type="text" class="form-control" value="<?php echo $contact_number; ?>" name="contact_number" placeholder="Your contact number">
                </div>
              <br>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <label class="form-label" for="form1Example13">Your Current Image</label>
                <?php 
                        if($current_image == "")
                        {
                            //Image not Available 
                            echo "<div class='error'>Image not Available.</div>";
                        }
                        else
                        {
                            //Image Available
                            ?>
                            <img src="<?php echo SITEURL; ?>images/user/<?php echo $current_image; ?>" width="150px">
                
                <?php
                        }
                    ?>
              </div>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <label class="form-label" for="form1Example13">New Image</label>
                <input type="file" class="form-control" name="image">
              </div>
              <br>
              <div>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                <button type="submit" class="btn btn-primary btn-lg btn-block col-md-6" name="submit">Update Account</button>
              </div>
                      
            </div>

          </form>

          <!-- edit -->
          <?php 
        
            if(isset($_POST['submit']))
            {
                //echo "Clicked";
                //1. Get all the values from our form
                //$id = $_POST['user_id'];
                $full_name = $_POST['full_name'];                
                $contact_number = $_POST['contact_number'];
                $current_image = $_POST['current_image'];

                //2. Updating New Image if selected
                //Check whether the image is selected or not
                if(isset($_FILES['image']['name']))
                {
                    //Get the Image Details
                    $image_name = $_FILES['image']['name'];

                    //Check whether the image is available or not
                    if($image_name != "")
                    {
                        //Image Available

                        //A. UPload the New Image

                        //Auto Rename our Image
                        //Get the Extension of our image (jpg, png, gif, etc) e.g. "specialfood1.jpg"
                        $ext = end(explode('.', $image_name));

                        //Rename the Image
                        $image_name = "user_img_".rand(000, 999).'.'.$ext; // e.g. Food_Category_834.jpg
                        

                        $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = "images/user/".$image_name;

                        //Finally Upload the Image
                        $upload = move_uploaded_file($source_path, $destination_path);

                        //Check whether the image is uploaded or not
                        //And if the image is not uploaded then we will stop the process and redirect with error message
                        if($upload==false)
                        {
                            //SEt message
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload Image. </div>";
                            //Redirect to Add Category Page
                            header('location:'.SITEURL.'user-account.php');
                            //STop the Process
                            die();
                        }

                        //B. Remove the Current Image if available
                        if($current_image!="")
                        {
                            $remove_path = "images/user/".$current_image;

                            $remove = unlink($remove_path);

                            //CHeck whether the image is removed or not
                            //If failed to remove then display message and stop the processs
                            if($remove==false)
                            {
                                //Failed to remove image
                                $_SESSION['failed-remove'] = "<div class='error'>Failed to remove current Image.</div>";
                                //header('location:'.SITEURL.'user-account.php');
                                die();//Stop the Process
                            }
                        }
                        

                    }
                    else
                    {
                        $image_name = $current_image;
                    }
                }
                else
                {
                    $image_name = $current_image;
                }

                //3. Update the Database
                $sql2 = "UPDATE user_signup SET 
                    user_id = '$id',
                    full_name = '$full_name',
                    contact_number = '$contact_number',
                    image_name = '$image_name'
                    WHERE user_id=$id
                ";

                //Execute the Query
                $res2 = mysqli_query($conn, $sql2);

                //4. REdirect to Manage Category with MEssage
                //CHeck whether executed or not
                if($res2==true)
                {
                    //Category Updated
                    $_SESSION['update'] = "<div class='success'>Profile Updated Successfully.</div>";
                    //header('location:'.SITEURL.'user-account.php');
                    echo"<script> window.open('user-account.php','_self')</script>";
                }
                else
                {
                    //failed to update category
                    $_SESSION['update'] = "<div class='error'>Failed to Update Profile.</div>";
                    //header('location:'.SITEURL.'user-account.php');
                    echo"<script> window.open('user-account.php','_self')</script>";
                }

            }
        
        ?>
              
        </div>
      </div>
                  
    </div>
  </section>
</main>

<?php include('hf-ft-front/footer.php'); ?>