<?php

include('header.php');

$dev_id = $_GET['id'];


$sql = "SELECT * FROM developer WHERE developer_id = :id;


SELECT developer.management_id, management_dev.management_id, management_dev.name
FROM developer
INNER JOIN management_dev
ON developer.management_id = management_dev.management_id
WHERE developer.developer_id = :id;

SELECT digital_platform.platform_id, digital_platform.name, developer.platform_id
FROM digital_platform
INNER JOIN
developer
ON digital_platform.platform_id = developer.platform_id
WHERE developer.developer_id = :id";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $dev_id);
$stmt->execute();



$dev = $stmt->fetchAll(PDO::FETCH_ASSOC);
//$stmt->nextRowset();
//$columns = $stmt->fetchAll(PDO::FETCH_ASSOC);
//print_r($dev);

$stmt->nextRowset();
$manag = $stmt->fetchAll(PDO::FETCH_ASSOC);

//array_shift($columns); //skip id column
//array_splice($columns, -2);

$stmt->nextRowset();
$platform = $stmt->fetch(PDO::FETCH_ASSOC);


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/tables.css">
    <title><?php echo $dev[0]['name'] ?></title>
</head>
<body>
<div class="content">
    <div class="container-md">
        <table class="table table-borderless">
            <thead>
            <tr>

                <?php echo "<th scope='row'>" . "Name";
                echo "<th scope='row'>" . "HQ";
                echo "<th scope='row'>" . "Founded";
                echo "<th scope='row'>" . "Managed by";
                if (isset($platform['name']))
                    echo "<th scope='row'>" . "Platform";
                ?>
            </tr>
            </thead>
            <tbody>
            <!--            --><?php
            foreach ($dev as $item)
                echo "<tr>";
            echo "<td>" . $item['name'];
            echo "<td>" . $item['HQ'];
            echo "<td>" . $item['founded'];
            echo "<td>" . $manag[0]['name'];
            if (isset($platform['name'])) {
                echo "<td>" . $platform['name'];
            }
           ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
