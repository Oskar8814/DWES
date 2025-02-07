<?php
session_start();
include('funciones.php');
if (isset($_REQUEST['fecha'])) {
    $_SESSION['mascotas'] = obtenerMascotas($_REQUEST['fecha']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        tr,td,th,table{
            border: solid 1px black;
            text-align: center;
        }
        
    </style>
</head>
<body>
    <?php
    $fechas = obtenerFechas();
    ?>
    <form action="" method="post">
        <select name="fecha" id="">
            <?php
            foreach ($fechas as $key => $value) {
                ?>
                <option value="<?= $value ?>"><?= $value ?></option>
                <?php
            }
            ?>
            <input type="submit" value="Mostrar">
        </select>
    </form>
<table>
        <tr>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Edad</th>
        </tr>
    <?php
    if (isset($_SESSION['mascotas'])) {
        foreach ($_SESSION['mascotas'] as $nombre => $datos) {
            echo "<tr>";
                ?>
                <td><?= $nombre ?></td>
                <td><?= $datos["tipo"] ?></td>
                <td><?= $datos["edad"] ?></td>
                <?php
        }
        echo "<tr>";
    }
    ?>
</table>
</body>
</html>