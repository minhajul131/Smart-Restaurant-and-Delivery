<?php 
    session_start();
    include("connection/db.php");
    include("functions.php");
?>

<?php
    if(isset($_GET['c_id'])){
        $customar_id = $_GET['c_id'];
    }
    $ip_add=getRealIpUser();
    $status="pending";
    $select_cart= "SELECT * FROM cart WHERE ip_add = '$ip_add'";
    $run_cart= mysqli_query($conn,$select_cart);
    while($row_cart=mysqli_fetch_array($run_cart)){
        $fd_id = $row_cart['food_id'];
        $qty = $row_cart['quantity'];
        
        $get_product = "SELECT * FROM table_food WHERE id= '$fd_id' ";
        $run_pro = mysqli_query($conn,$get_product);
        //$sub_total=$run_pro['price']*$qty;
        while($row_pro= mysqli_fetch_array($run_pro)){
            $pri = $row_pro['price'];
            $sub_total=$pri*$qty;
            $insert_customar_order= "INSERT INTO `order_delivery`(`user_id`, `food_id`, `food_quantity`, `total_price`, `order_time`, `order_status`) 
            VALUES ('$customar_id','$fd_id','$qty','$sub_total',NOW(),'$status')";
            $run_cus_order=mysqli_query($conn,$insert_customar_order);
            
            $delete_cart="DELETE FROM cart WHERE ip_add='$ip_add'";
            $run_del=mysqli_query($conn,$delete_cart);
            echo "<script>alert('completed.')</script>";
            echo"<script> window.open('home.php','_self')</script>";
        }
    }

?>