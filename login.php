<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="login/includes/css/form-style.css">
    <title>Login</title>
</head>
<body>
<div class="container">
    <div class="form">
        <?php
        require 'header.php';
        if (isset($_GET['error'])) {
            if ($_GET['error'] == "emptyfields") {
                echo '<p class = "error-message">Fill in all fields! </p>';
            } else if ($_GET['error'] == "invalidmailuid") {
                echo '<p class = "error-message">Invalid username and e-mail! </p>';
            } else if ($_GET['error'] == "nouser") {
                echo '<p class = "error-message">Invalid username/email! </p>';
            } else if ($_GET['error'] == "wrongpwd") {
                echo '<p class = "error-message">Wrong password! </p>';
            }
        }
        if ($_SESSION['userUid'] == 'guest') {
            echo ' 
 <form action="login/includes/login.inc.php" method="POST">
 <div class="form-head">Log in to your account!</div>
 <div class="form-group">
                <input class="form-control" type="text" name="mailuid"
                       placeholder="Username/E-mail...">
                 </div>
                  <div class="form-group">
                <input class="form-control" type="password" name="pwd"
                       placeholder="Password...">
                 </div>
                 <div class="form-group">
                <button class="btnLogin login" type="submit" name="login-submit">
                    Login
                </button>
                </div>
            </form>
            ';
        }
        ?>
    </div>
</body>
</html>
