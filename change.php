<?php
include('connection/connector.php');
include("functions.php");
session_start();
 
 
?>
<?php
$ip_add=getRealIpUser();
 
 
     
 
    $id=$_POST['id'];
    $qty=$_POST['quantity'];
    $update_qty="update cart set quantity='$qty' where food_id='$id' and ip_add='$ip_add'";
    $run_qty=mysqli_query($conn,$update_qty);
     
 
?>