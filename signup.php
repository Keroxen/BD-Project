<?php
require "header.php";
?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="login/includes/css/form-style.css">
        <title>Signup</title>
    </head>
    <body>
    <div class="container">
    <form action="login/includes/signup.inc.php" method="POST">
        <div class="form">
            <div class="form-head">Sign up!</div>
            <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == "emptyfields") {
                    echo '<p class = "error-message">Fill in all fields! </p>';
                } else if ($_GET['error'] == "invalidmailuid") {
                    echo '<p class = "error-message">Invalid username and e-mail! </p>';
                } else if ($_GET['error'] == "invaliduid") {
                    echo '<p class = "error-message">Invalid username! </p>';
                } else if ($_GET['error'] == "invalidmail") {
                    echo '<p class = "error-message">Invalid e-mail! </p>';
                } else if ($_GET['error'] == "passwordcheck") {
                    echo '<p class = "error-message">Your passwords do not match! </p>';
                } else if ($_GET['error'] == "usertaken") {
                    echo '<p class = "error-message">Username is already taken! </p>';
                } else if ($_GET['error'] == "mailtaken") {
                    echo '<p class = "error-message">Email is already taken! </p>';
                } else if ($_GET['error'] == "nouser") {
                    echo '<p class = "error-message">That user doesn\'t exist! </p>';
                }
            }
            if ($_GET['signup'] == "success") {
                echo '<p class = "success-message">Signup successful! </p>';
            }
            ?>
            <div class="form-group">
                <input class="form-control" type="text" name="uid" placeholder="Username">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="mail" placeholder="E-mail">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="pwd" placeholder="Password">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="pwd-repeat" placeholder="Repeat password">
            </div>
            <button class="btnRegister" type="submit" name="signup-submit">Sign up!</button>
        </div>
    </form>
    </div>

    </body>

