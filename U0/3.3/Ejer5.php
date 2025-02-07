<!-- Escribe un programa que utilice las variables $x y $y. 
Asignales los valores 144 y 999 respectivamente. A continuación, muestra por pantalla el valor de cada variable, la suma, la resta, la división y la multiplicación. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejer 5</title>
</head>
<body>
    <?php
        $x = 144;
        $y = 999;
        $suma = $x + $y;
        $resta = $x - $y;
        $division = $x / $y;
        $mult = $x * $y;
    ?>
    <h2>Operaciones</h2>
    <h3>Suma</h3>
    <p><?= $x ?> + <?= $y ?> = <?= $suma ?></p>
    <h3>Resta</h3>
    <p><?= $x ?> - <?= $y ?> = <?= $resta ?></p>
    <h3>Division</h3>
    <p><?= $x ?> / <?= $y ?> = <?= $division ?></p>
    <h3>Multiplicación</h3>
    <?= $x ?> * <?= $y ?> = <?= $mult ?>
</body>
</html>