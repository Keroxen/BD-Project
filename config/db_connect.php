<?php
// connect to database
$conn = mysqli_connect('localhost', 'alin', 'test1234', 'games_db');

// check connection
if (!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
}