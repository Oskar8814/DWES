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
    $suma = $a + $b;
    $resta = $a - $b;
    $multiplicacion = $a * $b;
    $division = $a / $b;
    ?>
    <h2>Las operaciones de los numeros <?= $a ?> y <?= $b ?> son: </h2>
    <p>Suma <?= $suma ?></p>
    <p>Resta <?= $resta ?></p>
    <p>Multiplicacion <?= $multiplicacion ?></p>
    <p>Division <?= $division ?></p>
</body>
</html>