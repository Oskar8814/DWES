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
    $contador = isset($_REQUEST['contador']) ? $_REQUEST['contador'] : 0;
    echo "<h2>Intento $contador</h2>"
    ?>

    <table>
        <tr>
            <td><a href="ejer1_muestra.php?num=1&contador=<?= $contador ?>"><img src="img/gray-textured-wall.jpg" alt=""></a></td>
            <td><a href="ejer1_muestra.php?num=2&contador=<?= $contador ?>"><img src="img/gray-textured-wall.jpg" alt=""></a></td>
            <td><a href="ejer1_muestra.php?num=3&contador=<?= $contador ?>"><img src="img/gray-textured-wall.jpg" alt=""></a></td>
        </tr>
        <tr>
            <td><a href="ejer1_muestra.php?num=4&contador=<?= $contador ?>"><img src="img/gray-textured-wall.jpg" alt=""></a></td>
            <td><a href="ejer1_muestra.php?num=5&contador=<?= $contador ?>"><img src="img/gray-textured-wall.jpg" alt=""></a></td>
            <td><a href="ejer1_muestra.php?num=6&contador=<?= $contador ?>"><img src="img/gray-textured-wall.jpg" alt=""></a></td>
        </tr>
        <tr>
            <td><a href="ejer1_muestra.php?num=7&contador=<?= $contador ?>"><img src="img/gray-textured-wall.jpg" alt=""></a></td>
            <td><a href="ejer1_muestra.php?num=8&contador=<?= $contador ?>"><img src="img/gray-textured-wall.jpg" alt=""></a></td>
            <td><a href="ejer1_muestra.php?num=9&contador=<?= $contador ?>"><img src="img/gray-textured-wall.jpg" alt=""></a></td>
        </tr>
    </table>
    <br><br>

        <form action="ejer1_comprueba.php" method="post">
            <input type="text" name="comprobacion">
            <input type="hidden" name ="contador" value="<?= $contador ?>">
            <input type="submit" value="Comprobar">
            
        </form>    
</body>
</html>