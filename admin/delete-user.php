<?php
    include('../connection/connector.php');
    //get admin id
    $id = $_GET['user_id'];
    //delete data from table
    $sql = "DELETE FROM user_signup WHERE user_id=$id";
    
    $res = mysqli_query($conn, $sql);

    if($res==TRUE){
        //echo "Admin deleted";
        $_SESSION['delete'] = "<div class='success'>Deleted successfully.</div>";
        //reirect control page
        //header("location:".SITEURL.'admin/admin-control.php');
        header("location:".SITEURL.'admin/control-user.php');
    }
    else{
        //echo "Failed to delete admin";
        $_SESSION['delete'] = "<div class='error'>Failed to delete.</div>";
        //reirect control page
        //header("location:".SITEURL.'admin/admin-control.php');
        header("location:".SITEURL.'admin/control-user.php');
    }
?>