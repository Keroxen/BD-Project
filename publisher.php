<?php
//
include('header.php');
echo "publisher";

//
//// delete a game from DB
//if (isset($_POST['delete'])) {
//    $id = $_POST['id'];
//    $stmt = $conn->prepare("DELETE FROM game WHERE game_id = :id");
//    $stmt->bindParam(':id', $id);
//    $stmt->execute();
//    if ($stmt->rowCount()) {
//        header('Location: index.php');
//    } else {
//        print_r($stmt->errorInfo());
//    }
//}
//// fetch all the data about a game
//if (isset($_GET['id'])) {
//    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, 1);
//
//    $id = $_GET['id'];
//
////    $stmt = $conn->prepare("SELECT * FROM games WHERE id = :id");
//    $sql = "
//    SELECT title, genre, modes, release_date FROM game WHERE game_id = :id";
//}