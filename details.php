<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


include('config/db_connect.php');
include('header.php');

// delete a game from DB
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $stmt = $conn->prepare("DELETE FROM games WHERE id_game = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    if ($stmt->rowCount()) {
        header('Location: index.php');
    } else {
        print_r($stmt->errorInfo());
    }
}
// fetch all the data about a game
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM games WHERE id_game = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    // $result = $stmt;
    $games = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //  echo $games['title'];
    //  print_r($result);


}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="h1 text-center">
    <?php foreach ($games

    as $game) :
    echo $game['title'] . '<br>' ?>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <img class="about-img" src="<?= IMAGE_URL . $game['title'] . ".JPG" ?>">
            <!--         '<img style="border-radius: 30px; height: 300px; width: 250px"; src="data:image/jpeg;base64,' . base64_encode($game['image']) . '">';-->
            <?php endforeach;
            ?>
            <form action="details.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                <?php if ($_SESSION['userUid'] != 'guest') {
                    echo '<input type="submit" name="delete" value="Delete game" class="btn">';
                } ?>
            </form>
        </div>
        <div class="col-md-6">
        <?php echo $game['id_deve'] ?>

        </div>
    </div>

</body>
</html>
