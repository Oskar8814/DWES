<!-- Vamos a hacer el ejercicio de adivinar la imagen oculta del tema 3 más interesante. 
Para empezar, vamos a hacer el mosaico un poco más grande, de 10x10. Además la imagen no se va a dividir sino 
que formará parte del fondo de la tabla y para ocultar o mostrar cada parte del mosaico, el fondo de cada celda será transparente u opaco.
Cada vez que se pulse un cuadrado, la parte de la imagen correspondiente a ese cuadrado se mostrará de manera definitiva,
así que cada vez se irán mostrando más partes de la imagen. Por último, para rematar y hacerlo todavía más interesante, 
vamos a poner un límite en el número de cuadrados volteados, de modo que, si no se adivina la imagen antes de superar ese límite, 
se mostrará un mensaje indicando que ha perdido junto a la imagen completa. Si se acierta introduciendo el nombre correcto 
en la caja de texto antes de superar el límite, también se indicará con un mensaje junto a la imagen completa. 
Ayuda: La tabla con las partes visibles y no visibles de la imagen, se encuentra en una única página que se recarga con cada pulsación, 
pero el resultado del juego tanto si ha ganado como si ha perdido, se puede realizar en otra página distinta. 
Almacenar en un array la situación de cada celda (vista u oculta) y pasar el array con la función serialize para mayor comodidad. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            border-collapse: collapse;
            margin: 20px;
            background-image: url('img/japon.jpg'); /* Cambia esto por la ruta real de la imagen */
            background-size: 500px 500px; /* Ajustamos el tamaño del fondo de la tabla */
        }
        
        td {
            width: 50px;
            height: 50px;
            border: 1px solid black;
            text-align: center;
            vertical-align: middle;
            
            background-position: center;
        }
        .opaco {
            background-color: gray; /* Fondo opaco por defecto */
        }
        .transparente {
            background-color: transparent; /* Fondo transparente para mostrar la imagen */
        } 
        a {
            display: block;
            width: 100%;
            height: 100%;
            text-decoration: none;
            color: black;
        }
        img {
            width: 600px;
            height: 600px;
        }

    </style>
</head>
<body>
    <h1>Averigua la imagen escondida detras del mosaico</h1>
    <p>Pulsa en cada recuadro para ver la imagen que esconde, y cuando lo tengas claro prueba a acertarlo.</p>
    <table>
        <?php
            if (isset($_REQUEST['seleccionado'])){
                
                $arrayImagen = unserialize(base64_decode($_REQUEST['arrayImagen']));
                $click = $_REQUEST['seleccionado'];
                $contador = $_REQUEST['contador'];
                ++$contador;
                if ($arrayImagen[$click] == "opaco") {
                    $arrayImagen[$click] = "transparente";
                }else{
                    $arrayImagen[$click] = "opaco";
                }
                //var_dump($arrayImagen);
            }else{
                $arrayImagen = array_fill(0,101,"opaco");
                $contador = 0;
                $click = 0;
            }

            if ($contador<11) {
                
                $textArrImagen = base64_encode(serialize($arrayImagen));
                $aux = 0;
                echo "<h3>Llevas $contador intentos.</h3>";
                //var_dump($contador);
                for ($i=0; $i < 10 ; $i++) { 
                    echo "<tr>";
                    for ($j=0; $j < 10; $j++) { 
                        $clase = $arrayImagen[$aux];
                        ?>
                        <td class="<?= $clase ?>">
                            <a href="ejer3.php?seleccionado=<?= $aux ?>&arrayImagen=<?= $textArrImagen ?>&contador=<?= $contador ?>"><!--<?= $aux ?>--></a>
                        </td>
                        <?php
                        $aux++;
                    }
                    echo "</tr>";
                }
                
                ?>
                <form action="ejer3_resolver.php" method="post">
                    <label for="solucion">Solución: </label>
                    <input type="text" name="solucion">
                    <input type="submit" value="Prueba!!">
                    <input type="hidden" name="contador" value="<?= $contador ?>">
                    <input type="hidden" name="arrayImagen" value="<?= $textArrImagen ?>">
                    <input type="hidden" name="seleccionado" value="<?= $aux ?>">
                    
                </form>
                <?php
            }else{
                echo "<h3>Superaste el limite de intentos</h3>";
                echo "<h3>La imagen era:</h3>";
                ?>
                <img src="img/japon.jpg" alt="Imagen de Japon">
                <?php
            }
            
        ?>

    </table>

</body>
</html>