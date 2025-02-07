<!-- Realiza un programa que escoja al azar 10 cartas de la baraja española y que diga cuántos puntos suman según el juego de la brisca. 
Emplea un array asociativo para obtener los puntos a partir del nombre de la figura de la carta. 
Asegúrate de que no se repite ninguna carta, igual que si las hubieras cogido de una baraja de verdad. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $puntuacion = ['As' => 11, '2' => 0, '3' => 10,'4' => 0, '5' => 0, '6' => 0, '7' => 7, 'Sota' => 2, 'Caballo' => 3, 'Rey' => 4  ];
    $palos = ['Oro', 'Copa', 'Espada', 'Basto'];
    $cartas = ['As', '2', '3', '4', '5', '6', '7', 'Sota', 'Caballo', 'Rey'];

    $española = [];

    //Rellenar la baraja
    foreach ($palos as $palo) {
        foreach ($cartas as $carta){
            $española[] = "$carta $palo";
        }
    }

    // Escoger 10 cartas de la baraja.
    $eleccion = array_rand($española, 10);
    // var_dump($eleccion); Con los indices de eleccion pasamos a un array(cartasSeleccionadas) la carta en si que tenemos en la baraja española.
    $cartasSeleccionadas = [];
    for ($i=0; $i < count($eleccion); $i++) { 
        for ($j=0; $j < count($española); $j++) { 
            if ($eleccion[$i] == $j) {
                $cartasSeleccionadas [] = $española[$j];
            }
        }
    }
    // var_dump($cartasSeleccionadas);

    //Calculamos los puntos y mostramos

    $totalPuntos = 0;
    
    echo"<h1>Cartas seleccionadas</h1>";
    foreach ($cartasSeleccionadas as $carta){
        echo "<h3>$carta</h3>";
        $parte = explode(' ',$carta);
        $valor = $parte[0];

        if (isset($puntuacion[$valor])) {
            $totalPuntos += $puntuacion[$valor];
        }
    }
    echo"<h2>La puntuación total es: $totalPuntos</h2>";
    ?>
</body>
</html>