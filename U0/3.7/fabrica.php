<!-- Diseñar un desarrollo web simple con PHP que dé respuesta a la necesidad que se plantea a continuación:
Un operario de una fábrica recibe cada cierto tiempo un depósito cilíndrico de dimensiones variables, 
que debe llenar de aceite a través de una toma con cierto caudal disponible. 
Se desea crear una aplicación web que le indique cuánto tiempo transcurrirá hasta el llenado del depósito. 
Para calcular dicho tiempo el usuario introducirá los siguientes datos: diámetro y altura del cilindro y caudal de aceite (litros por minuto). 
Una vez introducidos se mostrará el tiempo total en horas y minutos que se tardará en llenar el cilindro. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fábrica</title>
</head>
<body>
    <?php
        $diametro = $_REQUEST['diametro'];
        $altura = $_REQUEST['altura'];
        $caudal = $_REQUEST['caudal'];

        $radio = $diametro/2;
        $volumenMetros = M_PI * pow($radio,2) * $altura;
        $volumenLitros = $volumenMetros * 1000;

        $tiempoTotalMinutos = $volumenLitros/$caudal;
        $horas = intval($tiempoTotalMinutos / 60);
        $minutos = intval($tiempoTotalMinutos - ($horas*60));
    ?>

    <h1>Calcular el tiempo de llenado</h1>
        <h3>Diámetro</h3>
            <p><?= $diametro ?> metros</p>
        <h3>Altura</h3>
            <p><?= $altura ?> metros</p>
        <h3>Caudal</h3>
            <p><?= $caudal ?> Litros/min</p>
        <h3>Tiempo estimado para el llenado del cilindro</h3>
            <p>Horas: <?= $horas ?></p>
            <p>Minutos: <?= $minutos ?></p>
</body>
</html>