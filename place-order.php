<?php include('functions.php'); 

if(isset($_GET['user_id']))
{

  $user_id=$_GET['user_id'];

}

$ip_add=getRealIpUser();
$status="Pending";
$select_cart="select * from cart where ip_add='$ip_add'";
$run_cart=mysqli_query($conn,$select_cart);
while($row_cart = mysqli_fetch_array($run_cart))
{
  $food_id=$row_cart['food_id'];
  $quantity=$row_cart['quantity'];
  $price=$row_cart['price'];

  $sub_total=$price*$quantity;
  $insert_customer_order="insert into order_delivery (user_id,user_name,address,food_id,food_title,food_quantity,total_price,order_time,order_status) values
    ('$user_id','$full_name','$address','$food_id','$title',$quantity,$sub_total,NOW(),'$status')";

  $run_customer_order=mysqli_query($conn,$insert_customer_order);


}


?>

