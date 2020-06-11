<?php

include('header.php');


$sql =
    "SELECT game.game_id, game.title, game.modes, game.genre, game.release_date,
developer.developer_id, developer.name AS 'dName', 
publisher.publisher_id, publisher.name AS 'pName'
FROM game
INNER JOIN developer ON game.developer_id = developer.developer_id
INNER JOIN publisher ON game.publisher_id = publisher.publisher_id
WHERE game.release_date NOT IN(
SELECT release_date
FROM game
WHERE release_date < CURRENT_DATE)";


$stmt = $conn->prepare($sql);
$stmt->execute();
$unreleased = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/tables.css">
    <title>Unreleased games</title>
</head>
<body>
<div class="content">
    <div class="container-md">
        <table class="table table-borderless">
            <thead>
            <tr>
                <?php
                echo "<th scope='row'>" . "Title";
                echo "<th scope='row'>" . "Developer";
                echo "<th scope='row'>" . "Publisher";
                echo "<th scope='row'>" . "Genre";
                echo "<th scope='row'>" . "Modes";
                echo "<th scope='row'>" . "Release date";
                ?>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($unreleased as $item):
                echo "<tr>";
                echo "<td>" . "<a href=\"details.php?id={$item['game_id']}\">" . $item['title'] . "</a>" . "</li>";
                echo "<td>" . "<a href=\"developer.php?id={$item['developer_id']}\">" . $item['dName'] . "</a>" . "</li>";
                echo "<td>" . "<a href=\"publisher.php?id={$item['publisher_id']}\">" . $item['pName'] . "</a>" . "</li>";
                echo "<td>" . $item['genre'];
                echo "<td>" . $item['modes'];
                echo "<td>" . $item['release_date'];
            endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>