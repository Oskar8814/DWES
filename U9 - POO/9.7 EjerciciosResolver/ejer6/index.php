<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include_once 'Vehiculo.php';
    include_once 'Coche.php';
    include_once 'Bicicleta.php';

    $coche1 = new Coche();
    $bici1 = new Bicicleta();

    echo  $coche1->recorrekm(150)."<br>";
    echo  $bici1->recorrekm(15)."<br>";
    
    echo $bici1->caballito()."<br>";
    echo $coche1->quemaRueda()."<br>";

    $coche1->recorrekm(50);
    $bici1->recorrekm(5);

    echo "El coche ha recorrido ".$coche1->getKmRecorridos()." km. <br>";
    echo "La bicicleta ha recorrido ".$bici1->getKmRecorridos()." km. <br>";

    echo "El kilometraje total es ". Vehiculo::getKmTotales()." km.";
    ?>
</body>
</html>