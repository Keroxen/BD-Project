<?php

$servername = "localhost";
$dbUsername = "alin";
$dbPassword = "alin00";
$dbName = "loginsystem";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}