<?php
  session_start();

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
<!--            <link rel="stylesheet" href="includes/style.css">-->
    <title>Login</title>
</head>
<body>
<header>
    <nav class="navbar navbar-light bg-light">
        <ul>
            <li><a class="navbar-brand" href="index.php">Home</a></li>
        </ul>
        <?php
        if (isset($_SESSION['userId'])) {
            echo '<form class="form-inline" action="includes/logout.inc.php" method="POST">
                <button class="btn navbar-nav ml-auto d-flex justify-content-end" type="submit" name="logout-submit">
                    Logout
                </button>
            </form>';
        } else {
            echo ' <form class="form-inline" action="includes/login.inc.php" method="POST">
                <input class="form-control mr-sm-2 d-flex flex-row" type="text" name="mailuid"
                       placeholder="Username/E-mail...">
                <input class="form-control mr-sm-2 d-flex flex-row" type="password" name="pwd"
                       placeholder="Password...">
                <button class="btn navbar-nav ml-auto d-flex justify-content-end" type="submit" name="login-submit">
                    Login
                </button>
            </form>
            <a class="btn navbar-nav ml-auto d-flex justify-content-end" href="signup.php">Signup</a>';
        }
        ?>




    </nav>
</header>
</body>
</html>