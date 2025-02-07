<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            border-spacing:10px;
        }
        td{
            font-weight: bold;
            font-size: 21px;
        }
        body{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
</head>
<body>
    <h1>Loteria -- Elección de números</h1>
    <form action="ejer7_loteria_comprueba.php" method="post">
        <table>
            <?php
                $aux = 1;
                for ($i=0; $i < 10 ; $i++) { 
                    echo "<tr>";
                    for ($j=0; $j < 5 ; $j++) { 
                        ?>
                        <td><input type="checkbox" name="numero<?= $aux ?>" id="" value="<?= $aux ?>"><?= $aux ?></td>
                        <?php
                        $aux++;
                    }
                    echo "</tr>";
                }
            ?>
        </table>
        <br>
        <label for="serie">Número de la serie</label><br>
        <input type="number" name="serie" id="serie">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>