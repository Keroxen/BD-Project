<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );
//// connect to database
//$conn = mysqli_connect('localhost', 'alin', 'alin00', 'games_db');
//
//// check connection
//if (!$conn) {
//    echo 'Connection error: ' . mysqli_connect_error();
//}

// PDO

$servername = "localhost";
$username = "alin";
$password = "alin00";

try {
    $conn = new PDO("mysql:host=$servername;dbname=games_db", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
