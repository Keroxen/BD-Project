<?php


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

$url = parse_url(getenv("mysql://ba8f75e0844322:2e6d5d3e@us-cdbr-east-05.cleardb.net/heroku_b08a38a08abfba0?reconnect=true"));

$servername = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);


$conn = new PDO("mysql:host=$servername; dbname=$db", $username, $password);
////$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

