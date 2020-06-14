<?php


// local database

//$servername = "localhost";
//$username = "alin";
//$password = "alin00";
//
//try {
//    $conn = new PDO("mysql:host=$servername;dbname=alin-jocuri", $username, $password);
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);;
//} catch (PDOException $e) {
//    echo "Connection failed: " . $e->getMessage();
//}


// heroku database
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$servername = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);


$conn = new PDO("mysql:host=$servername; dbname=$db", $username, $password);


