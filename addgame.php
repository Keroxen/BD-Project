<?php

include('config/db_connect.php');
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

?>



<?php if (isset($_POST['submit'])) {
//    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, 1);

    $title = $_POST["title"];

    $name = $_FILES['image']['name'];
    $target_dir = "uploads/";
    $fullPath = $target_dir . "/" . $name;
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
// Select file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Valid file extensions
    $extensions_arr = array("jpg", "jpeg", "png", "gif");
// Check extension
    if (in_array($imageFileType, $extensions_arr)) {
// Insert record
//        $query = "INSERT INTO games (title, image, release_date) values('$title', '$fullPath' , '2018-04-12')";
//         $query = "INSERT INTO games (title, release_date) VALUES ($title, '2018-02-03')";
//        mysqli_query($conn, $query) or trigger_error("Query Failed! SQL: $query - Error: ".mysqli_error($conn), E_USER_ERROR);
        $stmt = $conn->prepare("INSERT INTO games (title, release_date) VALUES (:title, '2018-02-03')");
        $stmt->execute(['title' => $title]);
//    mysqli_query($con, $query) or die(mysqli_error($con);

// Upload file
        move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $name);
    }
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

<form action="addgame.php" method="POST" enctype="multipart/form-data">
    <label>Title: </label>
    <input type="text" name="title">
    <input type="file" name="image">
    <input type="submit" name="submit" value="Add game">
</form>
</body>
</html>
