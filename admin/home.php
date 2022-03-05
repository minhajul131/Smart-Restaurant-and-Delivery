<?php include('hd-ft/header.php'); ?>
    
    <div class="manage">
        <div class = "wrapper">
            <h1>Dashboard</h1>
            <br>
            <br>
            <?php 
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                ?>
                <br><br>

                <div class="col-4 text-center">

                    <?php 
                        //Sql Query 
                        $sql = "SELECT * FROM table_category";
                        //Execute Query
                        $res = mysqli_query($conn, $sql);
                        //Count Rows
                        $count = mysqli_num_rows($res);
                    ?>

                    <h1><?php echo $count; ?></h1>
                    <br />
                    Categories
                </div>

                <div class="col-4 text-center">

                    <?php 
                        //Sql Query 
                        $sql2 = "SELECT * FROM table_food";
                        //Execute Query
                        $res2 = mysqli_query($conn, $sql2);
                        //Count Rows
                        $count2 = mysqli_num_rows($res2);
                    ?>

                    <h1><?php echo $count2; ?></h1>
                    <br />
                    Foods
                </div>

                <div class="col-4 text-center">

                    <?php 
                        //Sql Query 
                        $sql5 = "SELECT * FROM table_chef";
                        //Execute Query
                        $res5 = mysqli_query($conn, $sql5);
                        //Count Rows
                        $count5 = mysqli_num_rows($res5);
                    ?>

                    <h1><?php echo $count5; ?></h1>
                    <br />
                    Chefs
                </div>

                <div class="col-4 text-center">
                    
                    <?php 
                        //Sql Query 
                        $sql3 = "SELECT * FROM order_delivery";
                        //Execute Query
                        $res3 = mysqli_query($conn, $sql3);
                        //Count Rows
                        $count3 = mysqli_num_rows($res3);

                        $sql7 = "SELECT * FROM order_table";
                        //Execute Query
                        $res7 = mysqli_query($conn, $sql7);
                        //Count Rows
                        $count7 = mysqli_num_rows($res7);
                    ?>

                    <h1><?php echo $count3+$count7; ?></h1>
                    <br />
                    Total Orders
                </div>

                <div class="col-4 text-center">
                    
                    <?php 
                        //Creat SQL Query to Get Total Revenue Generated
                        //Aggregate Function in SQL
                        $sql4 = "SELECT SUM(total_price) AS Total FROM order_delivery WHERE order_status='delivered' ";

                        //Execute the Query
                        $res4 = mysqli_query($conn, $sql4);

                        //Get the VAlue
                        $row4 = mysqli_fetch_assoc($res4);
                        
                        //GEt the Total REvenue
                        $total_revenue1 = $row4['Total'];

                        $sql6 = "SELECT SUM(total_price) AS Total FROM order_table WHERE order_status='delivered' ";

                        //Execute the Query
                        $res6 = mysqli_query($conn, $sql6);

                        //Get the VAlue
                        $row6 = mysqli_fetch_assoc($res6);
                        
                        //GEt the Total REvenue
                        $total_revenue2 = $row6['Total'];

                    ?>

                    <h1>TK <?php echo $total_revenue1+$total_revenue2; ?></h1>
                    <br />
                    Revenue Generated
                </div>

                <div class="clearfix"></div>

            

        </div>
    </div>

<?php include('hd-ft/footer.php'); ?>