<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $nombre= "Oscar Garcia Sanchez";
    $direccion = "Alfonso de Orleans";
    $telf = "6457115654";
    echo $nombre, "<br>", $direccion, "<br>", $telf;
    ?>
    <p><?= $nombre ?></p>
    <p><?= $direccion ?></p>
    <p><?= $telf ?></p>
</body>
</html>