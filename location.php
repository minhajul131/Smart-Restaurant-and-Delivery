
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
                <label class="form-label" for="form1Example13"><h2>Your Location / Table Number</h2></label>
                <p>For ordering form table just input your table number</p>
                <input type="text" class="form-control" name="d_address" placeholder="Your location" required>
                <br>
                <button type = "submit" name="submit" class="btn btn-dark btn-block btn-lg col-md-7" data-mdb-ripple-color="dark">Confirm</button>
              </div>              
            </div>
          </form>

        </div>
      </div>
    </div>
  </section>
  <?php 

        //CHeck whether the Submit Button is Clicked or NOt
        if(isset($_POST['submit']))
        {
            //Process for Login
            //1. Get the Data from Login form
            $d_address = $_POST['d_address'];
            
            
                $_SESSION['d_address'] = $d_address;
                //echo "<script>alert('logged In okk')</script>";
                echo "<script>window.open('order.php','_self')</script>";
  

        }

    ?>
</main>

