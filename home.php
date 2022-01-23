<?php include('hf-ft-front/header.php'); ?>

    <!-- FoodSearch start-->
    <section class = "food-search text-center">
        <div class = "container">
            <form action="">
                <input type="search" name = "search" placeholder = "Search for food">
                <input type="submit" name = "submit" value = "search" class= "btn btn-primary">
            </form>
        </div>
    </section>
    <!-- FoodSearch ends-->

    <!-- category start-->
    <section class = "category">
        <div class = "container">
            <h2 class = "text-center">Categories</h2>
            <a href="#">
            <div class = "box-3 float-container" >
                <img src="images/Pizza.jpg" alt="pizza" class = "img-responsive img-curve">
                <h3 class = "float-text text-white">Pizza</h3>
            </div>
            </a>

            <a href="#">
            <div class = "box-3 float-container">
                <img src="images/burger.jpg" alt="burger" class = "img-responsive img-curve">
                <h3 class = "float-text text-white">Burger</h3>
            </div>
            </a>

            <a href="#">
            <div class = "box-3 float-container">
                <img src="images/nicholas.jpg" alt="nicholas" class = "img-responsive img-curve">
                <h3 class = "float-text text-white">Nicholas</h3>
            </div>
            </a>
            
            <div class = "clearfix"></div>
        </div>

    </section>
    <!-- category ends-->

    <!-- food-menu start-->
    <section class = "food-menu">
        <div class = "container">
            <h2 class = "text-center">Explore Foods</h2>
            <div class = "food-menu-box">
                <div class = "food-menu-img">
                    <img src="images/pizza-with-tomato-basil.jpg" alt="Pizza With Tomato Basil" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>food title</h4>
                    <p class="food-prize">$2.9</p>
                    <p class="food-detail">pizza with tomato and basil</p>
                    <br>
                    <a href="#" class="btn btn-primary">Order now</a>
                </div>
                <div class = "clearfix"></div>
            </div>
            <div class = "food-menu-box">
                <div class = "food-menu-img">
                    <img src="images/Jimmy-Willy-Pizza.jpg" alt="Jimmy Willy Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>food title</h4>
                    <p class="food-prize">$2.9</p>
                    <p class="food-detail">Jimmy Willy Pizza</p>
                    <br>
                    <a href="#" class="btn btn-primary">Order now</a>
                </div>
                <div class = "clearfix"></div>
            </div>
            <div class = "food-menu-box">
                <div class = "food-menu-img">
                    <img src="images/Edible-Chocolate-Bowls.jpg" alt="Edible Chocolate Bowls" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>food title</h4>
                    <p class="food-prize">$2.9</p>
                    <p class="food-detail">Edible Chocolate Bowls</p>
                    <br>
                    <a href="#" class="btn btn-primary">Order now</a>
                </div>
                <div class = "clearfix"></div>
            </div>
            <div class = "food-menu-box">
                <div class = "food-menu-img">
                    <img src="images/coffee.jpg" alt="coffee" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>food title</h4>
                    <p class="food-prize">$1</p>
                    <p class="food-detail">coffee</p>
                    <br>
                    <a href="#" class="btn btn-primary">Order now</a>
                </div>
                <div class = "clearfix"></div>
            </div>
            <div class = "food-menu-box">
                <div class = "food-menu-img">
                    <img src="images/burger-off.jpg" alt="burger-off" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4>food title</h4>
                    <p class="food-prize">$1.7</p>
                    <p class="food-detail">burger</p>
                    <br>
                    <a href="#" class="btn btn-primary">Order now</a>
                </div>
                <div class = "clearfix"></div>
            </div>
            <div class = "clearfix"></div>
        </div>
    </section>
    <!-- food-menu ends-->

<?php include('hf-ft-front/footer.php'); ?>