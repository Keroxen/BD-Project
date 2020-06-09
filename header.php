<?php

include('config/db_connect.php');
session_start();
define('IMAGE_URL', 'uploads/');
//if (isset($_POST['login-submit'])) {
//    $sessionUid = $_POST['mailuid'];
//    $_SESSION['mailuid'] = $sessionUid;
//} else {
//    $sessionUid = 'Guest';
//    $_SESSION['mailuid'] = $sessionUid;
//}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
            integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
            crossorigin="anonymous"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link btn btn-primary" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="hello">
                You are logged in as <?php if (isset($_SESSION['userUid'])) {
                    echo $_SESSION['userUid'];


                } else {
                    $_SESSION['userUid'] = 'guest';
                    echo $_SESSION['userUid'];
                } ?>
            </li>
            <li class="nav-item active">
                <a class="nav-link btn btn-primary" href="devs_pubs.php">Show developers and publishers</a>
            </li>
            <li class="nav-item active">

                <a class="nav-link btn btn-primary" href="mode.php">Show games by mode</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link btn btn-primary" href="unreleased.php">Show unreleased games</a>
            </li>
        </ul>
        <?php if ($_SESSION['userUid'] != "guest") {
            echo '<ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link btn btn-primary" href="addgame.php">Add a game</a>
            </li>
            
           </ul>';
        } ?>

        <ul class="navbar-nav">
            <?php if ($_SESSION['userUid'] == 'guest') {
                echo '<li class="nav-item">
                                <a href="login.php" class="btn btn-success">Admin log in</a>
                        </li>';
            }
            ?>
        </ul>
        <?php if (isset($_SESSION['userId'])) {
            echo '<form class="form-inline" action="login/includes/logout.inc.php" method="POST">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                            <button class="nav-link btn btn-outline-danger" type="submit" name="logout-submit" href="">
                                Logout
                            </button>
                            </li>
                            </ul>
                        </form>';
        } ?>
    </div>
</nav>
</body>
</html>
