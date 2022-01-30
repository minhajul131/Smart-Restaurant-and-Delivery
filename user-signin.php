<?php include('hf-ft-front/header.php') ?>

<!-- Header -->
<header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="home.php">Restaurant</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <a href="<?php echo SITEURL;?>user-signup.php" class="book-a-table-btn scrollto d-none d-lg-flex">Create New Account</a>
    </div>
</header>
  <!-- End Header -->

<main id="main">
    
    <section class="vh-100">
          <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 col-lg-7 col-xl-6">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg" class="img-fluid" alt="Phone image">
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                <form>
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="email" id="form1Example13" class="form-control form-control-lg" />
                    <label class="form-label" for="form1Example13">Email address</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" id="form1Example23" class="form-control form-control-lg" />
                    <label class="form-label" for="form1Example23">Password</label>
                </div>

                <div class="d-flex justify-content-around align-items-center mb-4">
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-lg btn-block col-md-7">Sign in</button>
                </div>

                </form>
            </div>
            </div>
            </div>
    </section>

</main>

  
<?php include('hf-ft-front/footer.php') ?>