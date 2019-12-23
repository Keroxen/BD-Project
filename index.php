<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
error_reporting(E_ALL);
ini_set('display_errors', 1);
// TODO search and sort ?
// TODO the grid is broken...
// TODO some transitions
include('config/db_connect.php');
include('header.php');

//$sql = 'SELECT id_game, title FROM games ORDER BY id';
//$result = mysqli_query($conn, $sql);
//$games = mysqli_fetch_all($result, MYSQLI_ASSOC);
//mysqli_free_result($result);
//mysqli_close($conn);

// PDO
$stmt = $conn->prepare("SELECT id_game, title, image FROM games");
$stmt->execute();
$result = $stmt->fetchAll();

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



?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BD-Games</title>
</head>
<body>

<div class="content">
    <div class="container">
        <h1 class="header">Test</h1>
        <div class="row">
            <?php foreach ($result
                           as $game) : ?>
                <div class="card">
                    <a class="details" href="details.php?id=<?php echo $game['id_game'] ?>">
                        <?php echo '<img style="border-radius: 30px; height: 300px; width: 250px" src="data:image/jpeg;base64,' . base64_encode($game['image']) . '"/>'; ?>
                    </a>
                    <div class="card-body">
                        <a class="details" href="details.php?id=<?php echo $game['id_game'] ?>">
                            <h6 class="card-title"><?php echo htmlspecialchars($game['title']); ?></h6>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
