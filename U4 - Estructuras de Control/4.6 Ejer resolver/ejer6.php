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
        td{
            border:1px solid red;
        }
        body{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        img{
            width: 332px;
            height: 500px;
        }
    </style>
</head>
<body>
    <?php
        $contador = isset($_REQUEST['contador']) ? $_REQUEST['contador'] : null;
        echo "Intentos $contador";
    ?>
    <h1>Averigua la imagen escondida detras del mosaico</h1>
    <p>Pulsa en cada recuadro para ver la imagen que esconde, y cuando lo tengas claro prueba a acertarlo.</p>
    <table>
        <?php
        $aux = 0;
        for ($i=0; $i < 3; $i++) { 
            echo "<tr>";
            for ($j=0; $j < 3; $j++) { 
                $aux++;
                ?>
                <td><a href="ejer6_muestra.php?num6=<?= $aux ?>&contador=<?= $contador ?>"><img src="img/gray-textured-wall.jpg" alt=""></a></td>
                <?php
            }
            echo "</tr>";
        }
        ?>
    </table>

    <br><br>

    <form action="ejer1_comprueba.php" method="post">
        <input type="text" name="comprobacion">
        <input type="hidden" name ="contador" value="<?= $contador ?>">
        <input type="submit" value="Comprobar">
        
    </form>    
</body>
</html>