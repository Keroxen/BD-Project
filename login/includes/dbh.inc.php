<?php

// local database

//$servername = "localhost";
//$dbUsername = "alin";
//$dbPassword = "alin00";
//$dbName = "loginsystem";
//
//$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);
//
//if(!$conn) {
//    die("Connection failed: " . mysqli_connect_error());
//}

//heroku database

$url = parse_url(getenv("CLEARDB_SILVER_URL"));

$servername = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$conn = new mysqli($servername, $username, $password, $db);