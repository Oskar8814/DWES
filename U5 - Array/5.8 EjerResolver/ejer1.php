<!-- Diseñar una página que esté compuesta por una tabla de 10 filas por 10 columnas, y en cada 
celda habrá una imagen de un ojo cerrado. Cada vez que el usuario pulse un ojo, ser recargará 
la página con todos los ojos cerrados salvo los que se han ido pulsando que corresponderá a un 
ojo abierto. Conforme se vallan pulsando más ojos se irá completando la tabla de ojos abiertos. 
Si  se  pulsa  en  un  ojo  abierto  se  volverá  a  cerrar.  Usar  la  función  explode()  para  pasar  arrays 
como cadenas.  -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            border-spacing:0px;
        }
        body{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        img{
            width: 80px;
            height: 80px;
        }
    </style>
</head>
<body>
    <table>
        <?php
            if (isset($_REQUEST['seleccion'])) {
                $clickeado = $_REQUEST['seleccion'];
                $arrayOjos = explode(" ", $_REQUEST['text']);
                //Ternario $arrayOjos[$clickeado] = ($arrayOjos[$clickeado]==0)?1:0;
                
                if ($arrayOjos[$clikeado] == 0) {
                    $arrayOjos[$clikeado] = 1;
                } else {
                    $arrayOjos[$clikeado] = 0;
                }

            }else{
                $arrayOjos = array_fill(0,101,0);
            }

            $texto = implode(",", $arrayOjos);
            $aux = 0;

            for ($i=0; $i < 10 ; $i++) { 
                echo "<tr>";
                for ($j=0; $j < 10; $j++) { 
                    
                    ?>
                    <td><a href="ejer1b.php?seleccion=<?= $aux ?>&text=<?= $texto ?>"><img src="<?php
                    if ($arrayOjos[$aux]== 1){
                        echo "img/abierto.jpg";
                    }else{
                        echo "img/cerrado.jpg";
                    }
                    /* TERNARIO DEL IF echo ($arrayOjos[$aux] == 1)? "img/abierto.jpg" : "img/cerrado.jpg"*/ ?>" alt="ojo cerrado o abierto"></a></td>
                    <?php
                    $aux++;
                }
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>