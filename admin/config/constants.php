<?php 
    //Start Session
    session_start();


    //Create Constants to Store Non Repeating Values
    define('SITEURL', 'http://localhost/food-order/');
    // define('LOCALHOST', 'localhost');
    // define('DB_USERNAME', 'root');
    // define('DB_PASSWORD', '');
    // define('DB_NAME', 'food-order');
    // $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error($conn)); //Database Connection
    // $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn)); //Selecting Database
    $db = new SQLite3('../SQL import file/food-order.db');
?>
