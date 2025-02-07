<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $pesetas = $_REQUEST['pesetas'];
    $euro = $pesetas / 166.386;
    ?>
    <p><?= $pesetas ?> pesetas son <?= $euro ?> € </p>
</body>
</html>