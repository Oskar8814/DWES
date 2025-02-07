<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $euro = $_REQUEST['euros'];
    $peseta = $euro * 166.386
    ?>
    <p><?= $euro ?>€ son <?= $peseta ?> pesetas </p>
</body>
</html>