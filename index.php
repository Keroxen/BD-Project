<?php


include('header.php');

//$sql = 'SELECT id_game, title FROM games ORDER BY id';
//$result = mysqli_query($conn, $sql);
//$games = mysqli_fetch_all($result, MYSQLI_ASSOC);
//mysqli_free_result($result);
//mysqli_close($conn);


//$con = mysqli_connect($servername, $username, $password, "games_db");
// PDO
//$stmt = $conn->prepare("SELECT games.id_game, games.title FROM games INNER JOIN images ON games.id_game = images.id_image");
$stmt = $conn->prepare("SELECT game_id, title, imagePath FROM game");
//$sql = "SELECT images.path FROM images INNER JOIN games ON games.id_game = images.id_image";
//$res = mysqli_query($con, $sql);
$stmt->execute();
//$st->execute();
$result = $stmt->fetchAll();
//$res = $st->fetchAll();
//$re = mysqli_fetch_all($res);

// set the resulting array to associative
//    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
//    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
//        echo $v;
//    }
//}
//catch(PDOException $e) {
//    echo "Error: " . $e->getMessage();
//}
//$conn = null;


//
//$sql = "SELECT name FROM images WHERE id_image = id_gameFK";
//$result = mysqli_query($con, $sql);
//$row = mysqli_fetch_array($result);
//$image = $row['name'];

//$q = "SELECT images.path FROM images INNER JOIN games ON games.id_imageFK = images.id_image";
//$st = $conn->prepare("SELECT images.path FROM images INNER JOIN games ON games.id_imageFK = images.id_image");
//$st->execute();
//$re = $st->fetchAll();


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Video Games</title>
</head>

<body>

<div class="content">
    <div class="container">
        <h1 class="header">All games</h1>
        <div class="row">
            <?php foreach ($result
                           as $game) : ?>
                <div class="card">
                    <a class="details" href="details.php?id=<?php echo $game['game_id'] ?>">
<!--                        <img src="--><?//= IMAGE_URL . $game['title'] . ".JPG" ?><!--">-->
                        <?php echo '<img src="'.$game['imagePath'].'"  />';
                        //echo '<img src="<?= IMAGE_URL . $game[\'title\'] . ".JPG" "'  ?>
                        <!--                             '<img style="border-radius: 30px; height: 300px; width: 250px" src="data:image/jpeg;base64,' . base64_encode($game['image']) . '"/>'; ?>-->
                    </a>
                    <div class="card-body">
                        <a class="details" href="details.php?id=<?php echo $game['game_id'] ?>">
                            <h6 class="card-title"><?php echo htmlspecialchars($game['title']);
                                ?></h6>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>


</body>

</html>