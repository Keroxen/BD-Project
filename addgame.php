<?php


include('header.php');
//extract($_POST);
//
//$UploadedFileName = $_FILES['UploadImage']['name'];
//if ($UploadedFileName != '') {
//    $upload_directory = "../uploads/"; //This is the folder which you created just now
//    $TargetPath = time() . $UploadedFileName;
//    if (move_uploaded_file($_FILES['files']['tmp_name'], $upload_directory . $TargetPath)) {
//        $QueryInsertFile = "INSERT INTO games SET image ='$TargetPath'";
//        // Write Mysql Query Here to insert this $QueryInsertFile   .
//    }
//}

//if (isset($_POST['submit'])) {
//    $name = $_POST['name'];
//    $img = $_FILES['image']['name'];
//  //  $insert = "INSERT INTO games(image) VALUES ($img)";
//    $insert = $conn->query("INSERT INTO games(image) VALUES ($img)");
//    if($insert) {
//        move_uploaded_file($_FILES['image']['tmp_name'], "/upload/$img");
//        echo 'it worked';
//    } else {
//        echo 'nope';
//    }
//}

// insert form data in database
//if (isset($_POST["submit"])) {
//    $title = $_POST['title'];
//    $check = getimagesize($_FILES["image"]["tmp_name"]);
//    if ($check !== false) {
//        $image = $_FILES['image']['tmp_name'];
//        $imgContent = addslashes(file_get_contents($image));
//        $insert = $conn->query("INSERT INTO games (image, title) VALUES ('$imgContent','$title')");
//        if ($insert) {
//            echo "File uploaded successfully.";
//            header('Location: index.php');
//        } else {
//            echo "File upload failed, please try again.";
//        }
//    } else {
//        echo "Please select an image file to upload.";
//    }
//}

//$con = mysqli_connect($servername, $username, $password, "games_db");


$sql = "SELECT developer_id, name FROM developer;
SELECT publisher_id, name FROM publisher;
SELECT platform_id, name FROM digital_platform";

$stmt = $conn->prepare($sql);
//$stmt->bindParam(':id', $pub_id);
$stmt->execute();


$devs = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt->nextRowset();
$pubs = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt->nextRowset();
$platforms = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>



<?php //if (isset($_POST['submit'])) {
//    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, 1);

//    $title = $_POST["title"];
//    $name = $_FILES['image']['name'];
//    $tempName = $_FILES['image']['tmp_name'];
//    $target_dir = "uploads/";
//
//    $fullPath = $target_dir . "/" . $name;
//    $target_file = $target_dir . basename($_FILES["image"]["name"]);
//
//    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
//
//    $extensions_arr = array("jpg", "jpeg", "png", "gif");
//
//    if (in_array($imageFileType, $extensions_arr)) {
//        $stmt = $conn->prepare("INSERT INTO 'game' (title) VALUES ('$title')");
////        $stmt->execute(['title' => $title]);
//        $stmt->execute();
//        move_uploaded_file($tempName, $target_dir . $name);
//    }


if (isset($_FILES['image'])) {

    $title = $_POST["title"];
    $genre = $_POST['genre'];
    $mode = $_POST['mode'];
    $release = $_POST['release'];
    $developer = $_POST['developer'];
    $publisher = $_POST['publisher'];
    $platf = $_POST['platform'];

    $file_name = $_FILES['image']['name'];

    $required = array($title, $genre, $mode, $release, $developer, $publisher, $platf);
//    $error = false;
//    foreach($required as $field) {
//        if (empty($_POST[$field])) {
//            $error = true;
//        }
//    }
//
//    if ($error) {
//        $message = "All fields are required";
//        header("Refresh: 0; url=addgame.php");
//        echo "<script type='text/javascript'>alert('$message');</script>";
//        die;
//    } else {
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $exploded = explode('.', $_FILES['image']['name']);
    $file_ext = strtolower(end($exploded));


    $file_name = strtolower($title) . ".jpg";

    echo $file_name;
    move_uploaded_file($file_tmp, "uploads/" . $file_name);

    $file_path = "uploads/" . $file_name;
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
//    echo $gameId[0];

    $stmt = $conn->prepare("INSERT INTO game_platform (game_id, platform_id) VALUES (:game_id, :platform_id)");
    $stmt->bindParam(':game_id', $gameId[0]);
    $stmt->bindParam(':platform_id', $platf);
    $stmt->execute();
//    }
}


//if (isset($_POST['submit'])) {
//    $t = $_POST['title'];
//    $q = "INSERT INTO games (title) VALUES ($t)";
//    if ($r = mysqli_query($con, $q)) {
//        echo 'yes';
//    } else {
//        echo 'no' . mysqli_error($con);
//    }
//}


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
<h1 class="">Add a game</h1>
<!--<div class="container">-->


<form action="addgame.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>

    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="validationCustom01">Title</label>
            <input type="text" class="form-control" id="validationCustom01" name="title" required>
        </div>
        <div class="form-group col-md-3">
            <label for="validationCustom02">Genre</label>
            <input type="text" class="form-control" id="validationCustom02"
                   placeholder="First-person shooter, Action-adventure..." name="genre" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="validationCustom03">Modes</label>
            <input type="text" class="form-control" id="validationCustom03" placeholder="Single-player, multiplayer..."
                   name="mode" required>
        </div>
        <div class="form-group col-md-3">
            <label for="validationCustom04">Release date</label>
            <input type="date" class="form-control" id="validationCustom04" name="release" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="validationCustom05">Choose developer</label>
            <select id="validationCustom05" class="custom-select" name="developer" required>
                <option selected disabled value="">Choose...</option>
                <?php foreach ($devs as $dev)
                    echo "<option value='" . $dev['developer_id'] . "'>" . $dev['name'] . "</option>";
                ?>
            </select>
        </div>
        <div class="form-group col-md-2">
            <label for="validationCustom06">Choose publisher</label>
            <select id="validationCustom06" class="custom-select" name="publisher" required>
                <option selected disabled value="">Choose...</option>
                <?php foreach ($pubs as $pub)
                    echo "<option value='" . $pub['publisher_id'] . "'>" . $pub['name'] . "</option>";
                ?>
            </select>
        </div>
        <div class="form-group col-md-2">
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
    <!--    <div class="form-group">-->
    <!--        <label for="validationCustom08">Upload 3 carousel image</label>-->
    <!--        <input type="file" class="form-control-file" id="validationCustom08" name="imageC" required>-->
    <!--    </div>-->
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            let forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
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
