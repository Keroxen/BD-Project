<?php

include('../config/db_connect.php');
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
if (isset($_POST["submit"])) {
    $title = $_POST['title'];
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
        $insert = $conn->query("INSERT INTO games (title, image) VALUES ('$title','$imgContent')");
        if ($insert) {
            echo "File uploaded successfully.";
        } else {
            echo "File upload failed, please try again.";
        }
    } else if ($check = @getimagesize($_FILES["image"]["tmp_name"])) {
        echo "Please select an image file to upload.";
    }
}


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
    <title>Upload</title>
</head>
<body>
<form action="upload.php" method="POST" enctype="multipart/form-data">
    <label>Title: </label>
    <input type="text" name="title">
    <input type="file" name="image">
    <input type="submit" name="submit" value="UPLOAD">
</form>
</body>
</html>
