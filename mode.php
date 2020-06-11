<?php

//include('config/db_connect.php');
include('header.php');

$sql = "
    SELECT DISTINCT modes FROM game;

    SELECT game_id, title FROM game WHERE modes = 'Single-player';
    SELECT game_id, title FROM game WHERE modes = 'Single-player, multiplayer';
    SELECT game_id, title FROM game WHERE modes = 'Multiplayer'";


try {
    $stmt = $conn->prepare($sql);
//    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $modes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->nextRowset();
    $sg = $stmt->fetchAll(PDO::FETCH_ASSOC);
//    $sg = $stmt->fetch();
    $sgCount = $stmt->rowCount();

    $stmt->nextRowset();
    $sgMp = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $sgMpCount = $stmt->rowCount();
    $stmt->nextRowset();
    $mp = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $mpCount = $stmt->rowCount();

    $maxRows = max($sgCount, $sgMpCount, $mpCount);

//    echo $sgCount;
//    echo $sgMpCount;
//    echo $mpCount;


//    $resultsArray = array();
//    while ($row = mysqli_fetch_array($sg)) {
//        $single = $row['modes'];
//        $resultsArray[$single][] = $row['title'];
//    }
//
//
//    $x = count($resultsArray);
//
//    $sgData = ( !empty($resultsArray['Single-player'][$x]) ) ? $resultsArray['Single-player'][$x] : "";


//    echo "\n";
////    print_r($sg);
//    echo $sg[0]['title'];
//    echo "\n";
////    print_r($sgMp);
//    echo "\n";
////    print_r($mp);
//    echo "\n";

} catch (PDOException $e) {
    echo $e->getMessage();
    die();
}

$printedRecords = 0;

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
    <div class="container-md">
        <table class="table table-borderless">
            <thead>
            <tr>
                <?php foreach ($modes as $mode)
                    echo "<th scope='row'>" . $mode['modes']; ?>
            </tr>
            </thead>
            <tbody>
            <?php
            for ($i = 0;
                 $i < $maxRows;
                 $i++) {
                echo "<tr>";
                if (isset($sg[$i]['title'])) {
                   echo "<td>" .  "<a href=\"details.php?id={$sg[$i]['game_id']}\">" . $sg[$i]['title'] . "</a>" . "</li>";
                } else {
                    echo "";
                }
                if (isset($sgMp[$i]['title'])) {
                    echo "<td>" .  "<a href=\"details.php?id={$sgMp[$i]['game_id']}\">" . $sgMp[$i]['title'] . "</a>" . "</li>";
                } else {
                    echo "";
                }
                if (isset($mp[$i]['title'])) {
                    echo "<td>" .  "<a href=\"details.php?id={$mp[$i]['game_id']}\">" . $mp[$i]['title'] . "</a>" . "</li>";
                } else {
                    echo "";
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>