<?php include('hf-ft-front/header.php'); ?>


<!-- order detail -->
<section class="fsearch">
    <div class="container">
            
        <h2 class="text-center text-white">Enter Details</h2>

        <form action="#" class="order">
            <fieldset>
                <legend>Selected Food</legend>

                <div class="food-menu-img">
                    <img src="images/burger.jpg" alt="burger" class="img-responsive img-curve">
                </div>
    
                <div class="food-menu-desc">
                    <h3>Food Title</h3>
                    <p class="food-price">tk.250</p>

                    <div class="order-label">Quantity</div>
                    <input type="number" name="qty" class="input-responsive" value="1" required>        
                </div>
            </fieldset>
                
            <fieldset>
                <legend>Delivery Details</legend>

                <div class="order-label">Table Number</div>
                <input type="tel" name="table" placeholder="enter table number" class="input-responsive" required>

                <div class="order-label">Full Name</div>
                <input type="text" name="full-name" placeholder="Enter your name" class="input-responsive" required>

                <div class="order-label">Phone Number</div>
                <input type="tel" name="contact" placeholder="enter your number" class="input-responsive" required>

                <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
            </fieldset>
        </form>

    </div>
</section>
<!-- order detail -->


<?php include('hf-ft-front/footer.php'); ?>