<!-- Introducir filas y columnas para generar una tabla rellena con numeros consecutivos -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        td {
            text-align: center;
            padding: 10px;
        }
    </style>
</head>

<body>
    <?php
    if (!isset($_REQUEST['fila'])) {
    ?>
        <h1>Ingresa el número de filas y columnas de la tabla</h1>
        <form action="index.php" method="post">
            Filas (max 50) : <input type="number" name="fila" min="1" max="50">
            Columnas (max 50) : <input type="number" name="columna" min="1" max="50">
            <input type="submit" value="Crear la tabla">
        </form>
    <?php
    } else {
    ?>
    <h1 style="text-align: center;">Tabla con <?= $_REQUEST['fila'] ?> filas y <?= $_REQUEST['columna'] ?> columnas solicitadas</h1>
        <table>
            <?php
            $filas = $_REQUEST['fila'];
            $columnas = $_REQUEST['columna'];
            $num = 1;

            for ($i = 0; $i < $filas; $i++) {
                echo "<tr>";
                for ($j = 0; $j < $columnas; $j++) {
                    echo "<td>$num</td>";
                    $num++;
                }
                echo "</tr>";
            }
            ?>
        </table>
    <?php
    }
    ?>
</body>

</html>