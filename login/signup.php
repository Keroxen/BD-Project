<?php
require "header.php";
?>
    <head>
        <link rel="stylesheet" href="includes/style.css">
    </head>
    <body>
    <form action="includes/signup.inc.php" method="POST">
        <div class="form">
            <div class="form-head">Signup</div>
            <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == "emptyfields") {
                    echo '<p class = "error-message">Fill in all fields! </p>';
                } else if ($_GET['error'] == "invaliduidmail") {
                    echo '<p class = "error-message">Invalid username and e-mail! </p>';
                } else if ($_GET['error'] == "invaliduid") {
                    echo '<p class = "error-message">Invalid username! </p>';
                } else if ($_GET['error'] == "invalidmail") {
                    echo '<p class = "error-message">Invalid e-mail! </p>';
                } else if ($_GET['error'] == "passwordcheck") {
                    echo '<p class = "error-message">Your passwords do not match! </p>';
                } else if ($_GET['error'] == "usertaken") {
                    echo '<p class = "error-message">Username is already taken! </p>';
                }
            } else if ($_GET['signup'] == "success") {
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
            <button class="btnRegister" type="submit" name="signup-submit">Signup</button>
        </div>
    </form>


    </body>

<?php require "footer.php";
?>