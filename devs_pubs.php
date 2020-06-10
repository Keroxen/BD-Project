<?php

include('header.php');

$sql = "


SELECT name, developer_id as id
FROM
(
    SELECT name, developer_id FROM developer
    UNION ALL
    SELECT name, publisher_id FROM publisher
) id
GROUP BY name
;

SELECT game.title, game.game_id, developer.name AS 'dName', publisher.name AS 'pName', developer.developer_id, publisher.publisher_id 
FROM game
INNER JOIN developer 
ON developer.developer_id = game.developer_id
INNER JOIN publisher
ON publisher.publisher_id = game.publisher_id";

$count = 0;

try {
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $devs_pubs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->nextRowset();
    $games = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
    <title>Developers and publishers</title>

</head>
<body>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="bg">
                <div class="col">
                    <?php foreach ($devs_pubs as $item):
                        $count++;
                        echo "<h2 class='h2_dp'>" . $item['name'] . "</h2>";

                        foreach ($games as $game):
                            if ($game['dName'] == $item['name'] && $game['pName'] != $item['name']) {
                                echo "<li class='li_dp'>" . "Developed: " . "<a href=\"details.php?id={$game['game_id']}\">" . $game['title'] . "</a>" . "</li>";
                            }
                            if ($game['pName'] == $item['name'] && $game['dName'] != $item['name']) {
                                echo "<li class='li_dp'>" . "Published: " . "<a href=\"details.php?id={$game['game_id']}\">" . $game['title'] . "</a>" . "</li>";
                            }
                            if ($game['dName'] == $item['name'] && $game['pName'] == $item['name']) {
                                echo "<li class='li_dp'>" . "Developed and published: " . "<a href=\"details.php?id={$game['game_id']}\">" . $game['title'] . "</a>" . "</li>";
                            }
                            if ($count >= 10) {
                                echo "</div>";
                                echo "<div class='col'>";

                            }
                        endforeach;
                    endforeach;

                    ?>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
