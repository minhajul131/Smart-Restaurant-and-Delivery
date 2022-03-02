<?php include('hf-ft-front/header.php');?>

<?php
    if(!isset($_SESSION['username']))
    {
        include('sign-in-other.php');
    }
    else
    {
        include('location.php');

    }
?>


<?php include('hf-ft-front/footer.php');?>