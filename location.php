<?php
$session_user=$_SESSION['username'];
$select_customar = "SELECT * FROM user_signup WHERE username = '$session_user'";
$run_cust = mysqli_query($conn,$select_customar);
$row_customar = mysqli_fetch_array($run_cust);
$customar_id = $row_customar['user_id'];
?>
<main id="main">
  <section>
    <div class="container">
      <div class="section-title">
        <p>Enter Your location</p>
      </div>
      
      <div class="row mt-5">
        <div class="offset-md-3 col-lg-12 mt-5 mt-lg-0">
          <form action="" method="POST">
            <div class=" form-group mt-3">
              <div class="col-md-6 form-group mt-3 mt-md-0">
                <label class="form-label" for="form1Example13">Your Location</label>
                  <input type="text" class="form-control" name="d_address" placeholder="Your location" required>
                  <a href="order.php?c_id=<?php echo $customar_id ?>" type = "submit" class="btn btn-dark btn-block btn-lg" data-mdb-ripple-color="dark">confirm</a>
              </div>              
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</main>

