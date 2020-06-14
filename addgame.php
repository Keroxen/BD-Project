<?php


include('header.php');


$sql = "SELECT developer_id, name FROM developer;
SELECT publisher_id, name FROM publisher;
SELECT platform_id, name FROM digital_platform";

$stmt = $conn->prepare($sql);

$stmt->execute();


$devs = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt->nextRowset();
$pubs = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt->nextRowset();
$platforms = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>



<?php


if (isset($_POST['submit'])) {

    $title = $_POST["title"];
    $genre = $_POST['genre'];
    $mode = $_POST['mode'];
    $release = $_POST['release'];
    $developer = $_POST['developer'];
    $publisher = $_POST['publisher'];
    $platf = $_POST['platform'];

    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $exploded = explode('.', $_FILES['image']['name']);
    $file_ext = strtolower(end($exploded));
    $file_name = strtolower($title) . ".jpg";
    echo $file_name;

    move_uploaded_file($file_tmp, "uploads/" . $file_name);
    $file_path = "uploads/" . $file_name;

    $i = 1;
    extract($_POST);
    $error = array();
    $extension = array("jpeg", "jpg", "png", "gif");
    foreach ($_FILES["files"]["tmp_name"] as $key => $tmp_name) {
        $file_name = $_FILES["files"]["name"][$key];
        $file_name = strtolower($title) . " $i" . ".jpg";
        $i++;
        $file_tmp = $_FILES["files"]["tmp_name"][$key];
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);

        if (in_array($ext, $extension)) {
            if (!file_exists("uploads/carousel" . $file_name)) {
                move_uploaded_file($file_tmp = $_FILES["files"]["tmp_name"][$key], "uploads/carousel" . "/" . $file_name);
            } else {
                $filename = basename($file_name, $ext);
                $newFileName = $filename . time() . "." . $ext;
                move_uploaded_file($file_tmp = $_FILES["files"]["tmp_name"][$key], "uploads/carousel" . "/" . $newFileName);
            }
        } else {
            array_push($error, "$file_name, ");
        }
    }


    $stmt = $conn->prepare("INSERT INTO game (title, genre, modes, release_date, imagePath, developer_id, publisher_id) VALUES (:title, :genre, :mode, :release, :imagePath, :developer, :publisher)");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':genre', $genre);
    $stmt->bindParam(':mode', $mode);
    $stmt->bindParam(':release', $release);
    $stmt->bindParam(':imagePath', $file_path);
    $stmt->bindParam(':developer', $developer);
    $stmt->bindParam(':publisher', $publisher);
    $stmt->execute();

    $stmt = $conn->prepare("SELECT game_id FROM game ORDER BY game_id DESC LIMIT 1");
    $stmt->execute();

    $gameId = $stmt->fetch();


    $stmt = $conn->prepare("INSERT INTO game_platform (game_id, platform_id) VALUES (:game_id, :platform_id)");
    $stmt->bindParam(':game_id', $gameId[0]);
    $stmt->bindParam(':platform_id', $platf);
    $stmt->execute();
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add a game</title>
</head>
<body>

<h1 class="addGame">Add a game</h1>
<div class="content">
    <div class="container">
        <form action="addgame.php" method="POST" enctype="multipart/form-data" class="needs-validation addForm"
              novalidate>
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="validationCustom01">Title</label>
                    <input type="text" class="form-control" id="validationCustom01" name="title" required>
                </div>
                <div class="form-group col-md-5">
                    <label for="validationCustom02">Genre</label>
                    <input type="text" class="form-control" id="validationCustom02"
                           placeholder="First-person shooter, Action-adventure..." name="genre" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="validationCustom03">Modes</label>
                    <input type="text" class="form-control" id="validationCustom03"
                           placeholder="Single-player, multiplayer..."
                           name="mode" required>
                </div>
                <div class="form-group col-md-5">
                    <label for="validationCustom04">Release date</label>
                    <input type="date" class="form-control" id="validationCustom04" name="release" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="validationCustom05">Choose developer</label>
                    <select id="validationCustom05" class="custom-select" name="developer" required>
                        <option selected disabled value="">Choose...</option>
                        <?php foreach ($devs as $dev)
                            echo "<option value='" . $dev['developer_id'] . "'>" . $dev['name'] . "</option>";
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="validationCustom06">Choose publisher</label>
                    <select id="validationCustom06" class="custom-select" name="publisher" required>
                        <option selected disabled value="">Choose...</option>
                        <?php foreach ($pubs as $pub)
                            echo "<option value='" . $pub['publisher_id'] . "'>" . $pub['name'] . "</option>";
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="validationCustom07">Choose platform</label>
                    <select id="validationCustom07" class="custom-select" name="platform" required>
                        <option selected disabled value="">Choose...</option>
                        <?php foreach ($platforms as $platform)
                            echo "<option value='" . $platform['platform_id'] . "'>" . $platform['name'] . "</option>";
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="validationCustom07">Upload game preview image</label>
                <input type="file" class="form-control-file" id="validationCustom07" name="image" required>
            </div>
            <div class="form-group">
                <label for="validationCustom08">Please upload 3 images</label>
                <input type="file" class="form-control-file" id="validationCustom08" name="files[]" multiple required>
            </div>
            <button type="submit" class="btn btn-primary submitBtn" name="submit">Submit</button>
        </form>
    </div>
</div>
<script>
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            let forms = document.getElementsByClassName('needs-validation');
            let validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
</body>
</html>
