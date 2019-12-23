<?php

session_start();

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
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
        <ul class="navbar-nav mx-auto">
            <li class="nav-item hello">Hello, <?php if (isset($_SESSION['userUid'])) {
                    echo $_SESSION['userUid'] . '!';
                } else {
                    $_SESSION['userUid'] = 'guest';
                    echo $_SESSION['userUid'] . '!';
                } ?>
            </li>
        </ul>


        <ul class="navbar-nav ml-auto">

            <?php if ($_SESSION['userUid'] != "guest") {
                echo '<li class="nav-item addGame">
                <a class="btn btn-primary" href="upload.php">Add a game</a>
            </li>
           </ul>
           
           <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="btn btn-outline-primary logout" href="login/includes/logout.inc.php">Logout</a>
            </li>';
            }
            ?>

        </ul>
        <ul class="navbar-nav ml-auto">
            <?php if ($_SESSION['userUid'] == 'guest') {
                echo '<li class="nav-item active">
                    <a href="login.php" class="btn btn-outline-warning">Log in</a>
            </li>
            <li class="nav-item active">
                <a class="btn btn-outline-primary" href="signup.php">Signup</a>
            </li>';
            }
            ?>
        </ul>
    </div>
</nav>
<!--        search bar?-->
<!--        <form class="form-inline my-2 my-lg-0">-->
<!--            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">-->
<!--            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
<!--        </form>-->


<!--//if (isset($_SESSION['userId'])) {-->
<!--//    echo '<form class="form-inline" action="login/includes/logout.inc.php" method="POST">-->
<!--//                <button class="btn navbar-nav ml-auto d-flex justify-content-end" type="submit" name="logout-submit">-->
<!--//                    Logout-->
<!--//                </button>-->
<!--//            </form>';-->


</body>
</html>
