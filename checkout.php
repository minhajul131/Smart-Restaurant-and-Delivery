<?php include('hf-ft-front/header.php'); ?>

<?php
    if(!isset($_SESSION['user']))
    {
        include('user-signin.php');
    }
    else
    {
        include('place-order.php');

    }
?>


<?php include('hf-ft-front/footer.php'); ?>