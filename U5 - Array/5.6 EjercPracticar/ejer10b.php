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

    <h2>¿Cuantas cartas quieres?</h2>
    <form action="#" method="post">
        <label for="cantidad">Cantidad: </label>
        <input type="number" name="cantidad" required>
        <input type="submit" value="Enviar">
    </form>
    <?php
    if (isset($_REQUEST['cantidad'])) {
            $puntuacion = ['As' => 11, '2' => 0, '3' => 10,'4' => 0, '5' => 0, '6' => 0, '7' => 0, 'Sota' => 2, 'Caballo' => 3, 'Rey' => 4  ];
            $palo = ['Oro', 'Copa', 'Espada', 'Basto'];
            $figura = ['As', '2', '3', '4', '5', '6', '7', 'Sota', 'Caballo', 'Rey'];
            
            $cartasSeleccionadas = [];
            $totalPuntos = 0;

            for ($i=0; $i < $_REQUEST['cantidad']; $i++) { 
                
                do {
                    $paloCarta = $palo[rand(0,3)];
                    $figuraCarta = $figura[rand(0,9)];
                    $carta = "$figuraCarta de $paloCarta" ;
                } while (in_array($carta, $cartasSeleccionadas));
                $cartasSeleccionadas[$i]=$carta;
            }

            echo "<h4>Cartas Seleccionadas</h4>";
            foreach ($cartasSeleccionadas as $key => $carta) {
                $parte = explode(' ',$carta);
                $valor = $parte[0];
                echo "$carta -- $puntuacion[$valor] <br>" ;

                if (isset($puntuacion[$valor])) {
                    $totalPuntos += $puntuacion[$valor];
                }
            }
            echo"<h2>La puntuación total es: $totalPuntos</h2>";

        }else{
            $cantidad = 0;
        }


    ?>
</body>
</html>