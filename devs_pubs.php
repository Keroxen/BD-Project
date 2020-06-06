<?php

include('config/db_connect.php');
include('header.php');

//$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, 1);

//$id = $_GET['id'];

//    $stmt = $conn->prepare("SELECT * FROM games WHERE id = :id");
$sql = "
    SELECT ";



try {
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $games = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->nextRowset();
    $dev = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->nextRowset();
    $pub = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->nextRowset();
    $platf = $stmt->fetchAll(PDO::FETCH_ASSOC);


} catch (PDOException $e) {
    echo $e->getMessage();
    die();
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/tables.css">
    <title>Game modes</title>

</head>
<body>
<div class="content">
    <table class="table table-borderless ">
        <thead>
        <tr>
            <th scope="col">Companies</th>
            <th scope="col">Developed</th>
            <th scope="col">Published</th>
            <th scope="col">Developed and published</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>
