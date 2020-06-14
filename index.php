<?php


include('header.php');


$stmt = $conn->prepare("SELECT game_id, title, imagePath FROM game");
$stmt->execute();
$result = $stmt->fetchAll();


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Video Games</title>
</head>
<body>

<div class="content">
    <div class="container">
        <h1 class="header">All games</h1>
        <div class="row">
            <?php foreach ($result
                           as $game) : ?>
                <div class="card">
                    <a class="details" href="details.php?id=<?php echo $game['game_id'] ?>">
                        <?php echo '<img src="' . $game['imagePath'] . '"  />';
                        ?>
                    </a>
                    <div class="card-body">
                        <a class="details" href="details.php?id=<?php echo $game['game_id'] ?>">
                            <h6 class="card-title"><?php echo htmlspecialchars($game['title']);
                                ?></h6>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</body>
</html>