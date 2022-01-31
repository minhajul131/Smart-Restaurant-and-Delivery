<?php include('hf-ft-front/header.php'); ?>

<?php
    if(isset($_POST['submit'])){
        //data from form
        $full_name = $_POST['full_name'];
        $contact_number = $_POST['contact_number'];
        $email = $_POST['email'];
        $image_name = $_POST['image_name'];
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        

        $errors = array();

        $u = "SELECT username FROM user_signup WHERE username = '$user_name' ";
        $uu = mysqli_query($conn, $u);

        $e = "SELECT email FROM user_signup WHERE email = '$email' ";
        $ee = mysqli_query($conn, $e);
        
        if(empty($user_name)){
            $errors['u']= "username required";
        }else if(mysqli_num_rows($uu)>0){
            $errors['u']= "username exits";
        }

        if(empty($email)){
            $errors['e']= "email required";
        }else if(mysqli_num_rows($ee)>0){
            $errors['e']= "email exits";
        }
        if(empty($password)){
            $errors['p']= "password required";
        }

        if(isset($_FILES['image']['name']))
        {
          //Upload the Image
          //To upload image we need image name, source path and destination path
          $image_name = $_FILES['image']['name'];
                    
          // Upload the Image only if image is selected
          if($image_name != "")
          {
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
              //Redirect to Add CAtegory Page
              header('location:'.SITEURL.'user-signup.php');
              //Stop the Process
              die();
            }

          }
        }
        else
        {
        //Don't Upload Image and set the image_name value as blank
        $image_name="";
        }

        //sql quary
        if(count($errors)==0){
          

            $sql = "INSERT INTO user_signup ( `full_name`, `contact_number`, `image_name`, `email`, `username`, `password`) 
            VALUES ('$full_name','$contact_number','$image_name','$email','$user_name','$password')";
            

            $res = mysqli_query($conn, $sql) or die(mysqli_error());

            //Check whether data is inserted or not
            if($res==TRUE){
                    //Data Inserted
                    //echo "Data Inserted";
                    //Create a Session Variable to Display Message
                    $_SESSION['add'] = "<div class='success'>User Added Successfully.</div>";
                    //Redirect Page to Manage Admin
                    header("location:".SITEURL.'user-signin.php');
            }
            else
            {
                //FAiled to Insert DAta
                //echo "Faile to Insert Data";
                //Create a Session Variable to Display Message
                $_SESSION['add'] = "<div class='error'>Failed to Add Admin.</div>";
                //Redirect Page to Add Admin
                header("location:".SITEURL.'user-signup.php');
            }
        }
    }

?>
<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-cente">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

    <h1 class="logo me-auto me-lg-0"><a href="home.php">Restaurant</a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
  </div>
</header>
<!-- End Header -->

<main id="main">

  <section class="breadcrumbs">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
      <h2>Create Account</h2>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="section-title">
        <p>Enter Your Details</p>
      </div>

      <div class="row mt-5">
        <div class="offset-md-3 col-lg-12 mt-5 mt-lg-0">
          <!-- edit -->
          <?php 
            if(isset($_SESSION['add'])) //Checking whether the Session is Set of Not
            {
              echo $_SESSION['add']; //Display the Session Message if Set
              unset($_SESSION['add']); //Remove Session Message
            }
            if(isset($_SESSION['upload']))
            {
              echo $_SESSION['upload'];
              unset($_SESSION['upload']);
            }
          ?>
                      
          <form action="" method="POST" enctype="multipart/form-data">

            <div class=" form-group mt-3">
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <label class="form-label" for="form1Example13">Your Name</label>
                <input type="text" class="form-control" name="full_name" placeholder="Your Full Name" required>
              </div>
              <br>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <label class="form-label" for="form1Example13">Your Email Address</label>
                <input type="email" class="form-control" name="email" placeholder="Your Email">
                <p><?php if(isset($errors['e'])) echo $errors['e']; ?></p>
              </div>
              <br>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <label class="form-label" for="form1Example13">Your Contact Number</label>
                <input type="text" class="form-control" name="contact_number" placeholder="Your contact number" required>
                </div>
              <br>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <label class="form-label" for="form1Example13">Your Image</label>
                <input type="file" class="form-control" name="image">
              </div>
              <br>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <label class="form-label" for="form1Example13">Your Username</label>
                <input type="text" class="form-control" name="user_name" placeholder="Your username">
                <p><?php if(isset($errors['u'])) echo $errors['u']; ?></p>
              </div>
              <br>
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <label class="form-label" for="form1Example13">Your Password</label>
                <input type="password" class="form-control" name="password" placeholder="Your password">
                <p><?php if(isset($errors['p'])) echo $errors['p']; ?></p>
              </div>
              <br>
              <div>
                <button type="submit" class="btn btn-primary btn-lg btn-block col-md-6" name="submit">Create Account</button>
              </div>
                      
            </div>

          </form>

          <!-- edit -->
              
        </div>
      </div>
                  
    </div>
  </section>
</main>

<?php include('hf-ft-front/footer.php'); ?>