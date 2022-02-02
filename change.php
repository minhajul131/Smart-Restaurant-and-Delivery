<?php
include('connection/connector.php');
include("functions.php");
session_start();
$active='Cart';
 
?>
<?php
$ip_add=getRealIpUser();
 
 
    $food_id=$_POST['food_id'];
    $qty=$_POST['quantity'];
    $update_qty="update cart set quantity='$quantity' where food_id='$food_id' and ip_add='$ip_add'";
    $run_qty=mysqli_query($conn,$update_qty);
    echo "kjdhfgsdfh";
     
 
?>