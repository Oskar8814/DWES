<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include_once 'Cubo.php';
    $cubo1 = new Cubo(10,3);
    $cubo2 = new Cubo(11,4);

    echo "La capacidad del cubo 1 es". $cubo1->verCapacidad() ." litros y tiene un contenido de".$cubo1->verContenido() ;
    echo "<br>";
    echo "La capacidad del cubo 2 es". $cubo2->verCapacidad() ." litros y tiene un contenido de".$cubo2->verContenido() ;
    echo "<br>";
    
    $cubo1->verter($cubo2);

    echo "La capacidad del cubo 1 es". $cubo1->verCapacidad() ." litros y tiene un contenido de".$cubo1->verContenido() ;
    echo "<br>";
    echo "La capacidad del cubo 2 es". $cubo2->verCapacidad() ." litros y tiene un contenido de".$cubo2->verContenido() ;
    echo "<br>";
    ?>
</body>
</html>