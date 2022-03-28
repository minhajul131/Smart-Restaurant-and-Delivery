<?php 
    session_start();
    include("connection/db.php");
    include("functions.php");
?>

<?php
$session_user=$_SESSION['username'];
$select_customar = "SELECT * FROM user_signup WHERE username = '$session_user'";
$run_cust = mysqli_query($conn,$select_customar);
$row_customar = mysqli_fetch_array($run_cust);
$customar_id = $row_customar['user_id'];
?>
<?php
  
        $customar_location = $_SESSION['d_address'];
  
    $ip_add=getRealIpUser();
    $status="ordered"; //placed,accepted, packed, shipped, delivered
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
            $tit = $row_pro['title'];
            $sub_total=$pri*$qty;
            if(is_numeric($customar_location) )
            {
                  $insert_customar_order= "INSERT INTO `order_table`(`user_id`,`table_no`, `food_id`,`food_title`, `food_quantity`, `total_price`, `order_time`, `order_status`) 
                VALUES ('$customar_id','$customar_location','$fd_id','$tit','$qty','$sub_total',NOW(),'$status')";
                $run_cus_order=mysqli_query($conn,$insert_customar_order);
            }else
            {
               $insert_customar_order= "INSERT INTO `order_delivery`(`user_id`,`address`, `food_id`,`food_title`, `food_quantity`, `total_price`, `order_time`, `order_status`) 
            VALUES ('$customar_id','$customar_location','$fd_id','$tit','$qty','$sub_total',NOW(),'$status')";
            $run_cus_order=mysqli_query($conn,$insert_customar_order);
            }
           
            
            $delete_cart="DELETE FROM cart WHERE ip_add='$ip_add'";
            $run_del=mysqli_query($conn,$delete_cart);
            echo "<script>alert('Order placed')</script>";
            echo"<script> window.open('home.php','_self')</script>";
        }
    }

?>