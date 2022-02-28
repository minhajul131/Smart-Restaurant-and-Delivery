<?php 

    /*
    //database connection
    $conn = mysqli_connect("localhost","root","","smart-restaurant-and-delivery") or die(mysqli_error()); 
*/

?>

<?php 
    
    
    
    //Create Constants to Store Non Repeating Values
    define('SITEURL', 'http://localhost/Smart-Restaurant-and-Delivery/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'smart-restaurant-and-delivery');
    
    //database connection
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); 
    //selecting database
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());

?>