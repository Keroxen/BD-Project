<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
error_reporting(E_ALL);
ini_set('display_errors', 1);
// TODO register/login
// TODO add/delete a game
// TODO move nav in header
// TODO search and sort
include('config/db_connect.php');

//$sql = 'SELECT id_game, title FROM games ORDER BY id';
//$result = mysqli_query($conn, $sql);
//$games = mysqli_fetch_all($result, MYSQLI_ASSOC);
//mysqli_free_result($result);
//mysqli_close($conn);

// PDO
$stmt = $conn->prepare("SELECT id_game, title, image FROM games");
$stmt->execute();

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

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--    <link rel="stylesheet" href="css/materialize.css">-->
    <link rel="stylesheet" href="css/style.css">
    <!--    <link rel="stylesheet" href="templates/sign_in.css">-->
    <title>BD-Games</title>
</head>
<body>

<div class="content">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark navbar-default fixed-top">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active home">
                    <a class="nav-link btn btn-primary btn-lg" href="index.php">HOME<span
                                class="sr-only">(current)</span></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                    <a class=" btn btn-primary" href="templates/upload.php" role="button">Add a game</a>
                </li>
                <li class="nav-item active">
                    <div class="box">
                        <a href="#" class="btn btn-outline-warning">Log in</a>
                    </div>
                </li>
                <li class="nav-item active">
                    <a class="btn btn-outline-primary" href="#">Register</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <div class="container">
        <h1 class="header">Test</h1>
        <div class="row">
            <?php foreach ($result
                           as $game) : ?>
                <div class="card">
                    <a class="details" href="templates/details.php?id=<?php echo $game['id_game'] ?>">
                        <?php echo '<img style="border-radius: 30px; height: 300px; width: 250px" src="data:image/jpeg;base64,' . base64_encode($game['image']) . '"/>'; ?>
                    </a>
                    <div class="card-body">
                        <a class="details" href="templates/details.php?id=<?php echo $game['id_game'] ?>">
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
