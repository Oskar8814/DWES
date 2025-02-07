<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $a = $_REQUEST['a'];
    $b = $_REQUEST['b'];
    $resultado = $a * $b;
    ?>
    <p>El resultado de la multiplicación de <?= $a ?> y <?= $b ?> es : <?= $resultado ?></p>
</body>
</html>