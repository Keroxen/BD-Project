<?php

//include('config/db_connect.php');
include('header.php');

//$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, 1);

//$id = $_GET['id'];

//    $stmt = $conn->prepare("SELECT * FROM games WHERE id = :id");
$sql = "
SELECT name, developer_id FROM developer
UNION DISTINCT 
SELECT name, publisher_id FROM publisher;

SELECT game.title, game.game_id, developer.name, publisher.name, developer.developer_id, publisher.publisher_id 
FROM game
INNER JOIN developer 
ON developer.developer_id = game.developer_id
INNER JOIN publisher
ON publisher.publisher_id = game.publisher_id";


try {
    $stmt = $conn->prepare($sql);
//    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $devs_pubs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->nextRowset();
    $games = $stmt->fetchAll(PDO::FETCH_ASSOC);
//    $stmt->nextRowset();
//    $pub = $stmt->fetch(PDO::FETCH_ASSOC);
//    $stmt->nextRowset();
//    $platf = $stmt->fetchAll(PDO::FETCH_ASSOC);

    print_r($games);

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
        <?php foreach ($devs_pubs as $item)

            echo "<tr>" .
                "<td>" . $item['name'];
                foreach ($games as $game)
                if ($game['developer_id'] == $item['developer_id']) {
                    echo "<td>" . $game['title'];
                }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
