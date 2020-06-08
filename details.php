<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


//include('config/db_connect.php');
include('header.php');

// delete a game from DB
if (isset($_POST['delete'])) {
    $game_id = $_POST['id'];
    $stmt = $conn->prepare("DELETE FROM game WHERE game_id = :id");
    $stmt->bindParam(':id', $game_id);
    $stmt->execute();
    if ($stmt->rowCount()) {
        header('Location: index.php');
    } else {
        print_r($stmt->errorInfo());
    }
}


// fetch all the data about a game
if (isset($_GET['id'])) {
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, 1);

    $game_id = $_GET['id'];


    $stmt = $conn->prepare("SELECT * FROM game WHERE game_id = :id");
    $sql = "
    SELECT title, genre, modes, release_date FROM game WHERE game_id = :id;

    SELECT game.developer_id, developer.name
    FROM game
    INNER JOIN developer ON game.developer_id = developer.developer_id
    WHERE game.game_id = :id;

    SELECT game.publisher_id, publisher.name
    FROM game
    INNER JOIN publisher ON game.publisher_id = publisher.publisher_id
    WHERE game.game_id = :id;

    SELECT game_platform.platform_id, digital_platform.name
    FROM game_platform
    INNER JOIN digital_platform
    ON game_platform.platform_id = digital_platform.platform_id
    WHERE game_platform.game_id = :id";

    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $game_id);
        $stmt->execute();

        $game = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt->nextRowset();
        $dev = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt->nextRowset();
        $pub = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->nextRowset();
        $platf = $stmt->fetchAll(PDO::FETCH_ASSOC);


        $developer_id = $dev['developer_id'];
        $publisher_id = $pub['publisher_id'];
//        $platform_id = $platf[''];

    } catch (PDOException $e) {
        echo $e->getMessage();
        die();
    }


}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $game['title'] ?></title>
</head>

<body>
<div class="h1 text-center">
    <!--        --><?php //foreach ($game

    //            as $game) :
    echo $game['title'] . '<br>';


    ?>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="uploads/cyberpunk%202077.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="uploads/apex%20legends.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="uploads/the%20elder%20scrolls%20v%20skyrim.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <!--            <img class="about-img" src="--><?php //= IMAGE_URL . $game['title'] . ".JPG" ?><!--">-->
            <!--         '<img style="border-radius: 30px; height: 300px; wgame_idth: 250px"; src="data:image/jpeg;base64,' . base64_encode($game['image']) . '">';-->
            <!--            --><?php //endforeach;
            ?>
            <!--            <form action="details.php" method="POST">-->
            <!--                <input type="hgame_idden" name="game_id" value="-->
            <?php //echo $_GET['game_id']; ?><!--">-->
            <!--                --><?php //if ($_SESSION['userUgame_id'] != 'guest') {
            //                    echo '<input type="submit" name="delete" value="Delete game" class="btn">';
            //                } ?>
            <!--            </form>-->
        </div>
        <div class="col-md-6">
            <?php
            echo "Title: " . $game['title'] . '<br>';
            echo "Developer: " . "<a href='developer.php?id=$developer_id'>" . $dev['name'] . "</a>" . "<br>";
            echo "Publisher: " . "<a href='publisher.php?id=$publisher_id'>" . $pub['name'] . "</a>" . "<br>";
            echo "Modes: " . $game['modes'] . '<br>';
            echo "Genre: " . $game['genre'] . '<br>';
            echo "Digital distribution service: ";
            foreach ($platf as $key => $item) {
                $platfName = $item['name'];
                echo $platfName . ' ';
            }
            echo '<br>';
            echo "Release date: " . $game['release_date'] . '<br>';

            ?>

        </div>
    </div>

</body>

</html>