<?php
    require "header.php";


    ?>

<main>
    <div class="container">
        <?php
        if (isset($_SESSION['userId'])) {
           echo '<p class="success-message">You are logged in!</p>';
        } else {
            echo '<p class="error-message">You are logged out!</p>';
        }
        ?>



    </div>
</main>

<?php require "footer.php";
?>