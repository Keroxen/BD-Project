<?php

include('config/db_connect.php');
include('header.php');

$sql = "
    SELECT DISTINCT modes FROM games;

    SELECT title FROM games WHERE modes = 'Single-player';
    SELECT title FROM games WHERE modes = 'Single-player, multiplayer';
    SELECT title FROM games WHERE modes = 'Multiplayer'
    ";



try {
    $stmt = $conn->prepare($sql);
//    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $modes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->nextRowset();
    $sg = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->nextRowset();
    $sgMp = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->nextRowset();
    $mp = $stmt->fetchAll(PDO::FETCH_ASSOC);

//    print_r($sg);

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
            <?php foreach ($modes as $mode)
             echo  "<th scope='row'>" . $mode['modes']; ?>

        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
        </tr>
        <tr>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>