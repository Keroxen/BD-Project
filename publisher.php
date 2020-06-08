<?php

include('header.php');

$pub_id = $_GET['id'];


$sql = "SELECT * FROM publisher WHERE publisher_id = :id;
SHOW COLUMNS FROM publisher;

SELECT publisher.management_id, management_pub.management_id, management_pub.name
FROM publisher
INNER JOIN management_pub
ON publisher.management_id = management_pub.management_id
WHERE publisher.publisher_id = :id";

//SELECT digital_platform.platform_id, digital_platform.name, developer.platform_id
//FROM digital_platform
//INNER JOIN
//developer
//ON digital_platform.platform_id = developer.platform_id
//WHERE developer.developer_id = :id";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $pub_id);
$stmt->execute();


$pub = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt->nextRowset();
$columns = $stmt->fetchAll(PDO::FETCH_ASSOC);
//print_r($dev);

$stmt->nextRowset();
$manag = $stmt->fetchAll(PDO::FETCH_ASSOC);
array_shift($columns); //skip id column
array_splice($columns, -1);

//$stmt->nextRowset();
//$platform = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/tables.css">
    <title><?php echo $pub[0]['name'] ?></title>
</head>
<body>
<div class="content">
    <div class="container-md">
        <table class="table table-borderless">
            <thead>
            <tr>
                <?php foreach ($columns as $item)
                    echo "<th scope='row'>" . $item['Field'];
                ?>
                <?php echo "<th scope='row'>" . "Managed by";
                ?>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($pub as $item)
                echo "<tr>";
            echo "<td>" . $item['name'];
            echo "<td>" . $item['HQ'];
            echo "<td>" . $item['founded'];
            echo "<td>" . $manag[0]['name'];
            ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
