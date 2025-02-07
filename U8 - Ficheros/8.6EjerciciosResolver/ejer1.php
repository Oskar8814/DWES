<?php
session_start();
include('funciones.php');
if (!isset($_SESSION['mascota'])) {
    $_SESSION['mascota']=[];
}
if (isset($_REQUEST['nombre'])&&isset($_REQUEST['tipo'])&&isset($_REQUEST['edad'])) {
    
    $_SESSION['mascota'][$_REQUEST['nombre']]["tipo"]=$_REQUEST['tipo'];
    $_SESSION['mascota'][$_REQUEST['nombre']]["edad"]=$_REQUEST['edad'];
}
if (isset($_REQUEST['guardar'])) {
    guardar();
    unset($_SESSION['mascota']);
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
    $hoy = date("d-m-Y");
    ?>
    <h2>Añadir animal a la lista</h2>
    <table>

        <tr>
            <form action="" method="post">
                <td>Nombre: <input type="text" name="nombre" id=""></td>
                <td>Tipo: <input type="text" name="tipo" id=""></td>
                <td>Edad: <input type="number" name="edad" id=""></td>
                <td><input type="submit" value="Añadir"></td>
            </form>
        </tr>
        <tr>
            <th colspan="3">#<?= $hoy ?>#</th>
        </tr>
        <tr>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Edad</th>
        </tr>
        <?php
        if (isset($_SESSION['mascota'])) {
            foreach ($_SESSION['mascota'] as $nombre => $datos) {
                echo "<tr>";
                ?>
                <td><?= $nombre ?></td>
                <td><?= $datos["tipo"] ?></td>
                <td><?= $datos["edad"] ?></td>
                <?php
            } 
        }
        ?>
    </table>
    <form action="" method="post">
        <input type="submit" value="Guardar">
        <input type="hidden" name="guardar">
    </form>
</body>
</html>