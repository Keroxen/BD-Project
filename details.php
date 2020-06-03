<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


include('config/db_connect.php');
include('header.php');

// delete a game from DB
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $stmt = $conn->prepare("DELETE FROM games WHERE id = :id");
    $stmt->bindParam(':id', $id);
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

    $id = $_GET['id'];

//    $stmt = $conn->prepare("SELECT * FROM games WHERE id = :id");
    $sql = "
    SELECT title, genre, modes, release_date FROM games WHERE id = :id;

    SELECT games.developer_id, developer.name
    FROM games
    INNER JOIN developer ON games.developer_id = developer.id_developer
    WHERE games.id = :id;
    
    SELECT games.publisher_id, publishers.name
    FROM games
    INNER JOIN publishers ON games.publisher_id = publishers.id_publisher
    WHERE games.id = :id;

    SELECT game_platform.platform_id, digital_platform.name
    FROM game_platform
    INNER JOIN digital_platform
    ON game_platform.platform_id = digital_platform.id_ddp
    WHERE game_platform.game_id = :id";

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


    //  echo $games['title'];
    //  print_r($result);

}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $games['title'] ?></title>
</head>

<body>
<div class="h1 text-center">
    <!--        --><?php //foreach ($games

    //            as $game) :
    echo $games['title'] . '<br>';


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
                        <img src="uploads/cyberpunk%202077.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="uploads/cyberpunk%202077.jpg" class="d-block w-100" alt="...">
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
<!--            <img class="about-img" src="--><?//= IMAGE_URL . $games['title'] . ".JPG" ?><!--">-->
            <!--         '<img style="border-radius: 30px; height: 300px; width: 250px"; src="data:image/jpeg;base64,' . base64_encode($game['image']) . '">';-->
            <!--            --><?php //endforeach;
            ?>
<!--            <form action="details.php" method="POST">-->
<!--                <input type="hidden" name="id" value="--><?php //echo $_GET['id']; ?><!--">-->
<!--                --><?php //if ($_SESSION['userUid'] != 'guest') {
//                    echo '<input type="submit" name="delete" value="Delete game" class="btn">';
//                } ?>
<!--            </form>-->
        </div>
        <div class="col-md-6">
            <?php
            echo "Title: " . $games['title'] . '<br>';
            echo "Developer: " . $dev['name'] . '<br>';
            echo "Publisher: " . $pub['name'] . '<br>';
            echo "Modes: " . $games['modes'] . '<br>';
            echo "Genre: " . $games['genre'] . '<br>';
            echo "Platforms: ";
            foreach ($platf as $key => $item) {
                $platfName = $item['name'];
                echo $platfName . ' ';
            }
            echo '<br>';
            echo "Release date: " . $games['release_date'] . '<br>';

            ?>

        </div>
    </div>

</body>

</html>