<?php
// connect to database
$conn = mysqli_connect('localhost', 'alin', 'alin00', 'games_db');

// check connection
if (!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
}