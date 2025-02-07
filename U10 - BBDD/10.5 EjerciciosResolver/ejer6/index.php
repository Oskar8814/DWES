<?php
    try {
        $conexion = new PDO("mysql:host=localhost;dbname=escuela;charset=utf8", "root", "");
        // echo "Se ha establecido una conexión con el servidor de bases de datos.";
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die("Error: " . $e->getMessage());
    }

    $consulta = $conexion->query("SELECT * FROM horario");
    $horas = ["primera","segunda","tercera","cuarta","quinta","sexta"]; 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horario de Clase</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <h1>Horario Semanal</h1>
    <table>
        <thead>
            <tr>
                <th>Día</th>
                <th>Primera</th>
                <th>Segunda</th>
                <th>Tercera</th>
                <th>Cuarta</th>
                <th>Quinta</th>
                <th>Sexta</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($fila = $consulta->fetchObject() ) {
                ?>
                <tr>
                    <td class="dia"><?= $fila->dia ?></td>
                    <?php
                    foreach ($horas as $key => $hora) {
                        ?>
                        <td>
                            <form action="modificar.php" method="post">
                                <input type="hidden" name="dia" value="<?= $fila->dia  ?>">
                                <input type="hidden" name="hora" value="<?=$hora?>">
                                <input type="submit" value="<?= $fila->$hora?>">
                            </form>
                        </td>
                        <?php
                    }
                    ?>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>