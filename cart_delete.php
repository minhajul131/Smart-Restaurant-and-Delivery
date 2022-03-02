<?php
    include('connection/connector.php');
    //get admin id
    $food_id = $_GET['food_id'];
    $ip_add=$_GET['ip_add'];
    //delete data from table
    $sql = "DELETE FROM cart WHERE  ip_add='$ip_add' AND food_id='$food_id'";
    
    $res = mysqli_query($conn, $sql);

    if($res==TRUE){
        //echo "Admin deleted";
        $_SESSION['delete'] = "<div class='success'>Deleted successfully.</div>";
        //reirect control page
        //header("location:".SITEURL.'admin/admin-control.php');
        header("location:".SITEURL.'cart.php');
    }
    else{
        //echo "Failed to delete admin";
        $_SESSION['delete'] = "<div class='error'>Failed to delete.</div>";
        //reirect control page
        //header("location:".SITEURL.'admin/admin-control.php');
        header("location:".SITEURL.'cart.php');
    }
?>