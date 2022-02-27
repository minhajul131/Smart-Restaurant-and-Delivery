<?php include('hf-ft-front/header.php'); ?>

<?php
    if(!isset($_SESSION['username']))
    {
        include('user-signin.php');
    }
    else
    {
        include('location.php');

    }
?>


<?php include('hf-ft-front/footer.php'); ?>