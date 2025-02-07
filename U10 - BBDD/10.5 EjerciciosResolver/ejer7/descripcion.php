<?php
include('funciones.php');
if (session_status() == PHP_SESSION_NONE) session_start();

if (isset($_REQUEST['descripcion'])) {
    $id = $_REQUEST['descripcion'];
}else {
    header('Location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img{
            height: 280px;
            width: 600px;
        }
    </style>
</head>
<body>
    <h2>Descripción del Avión</h2>
    <?php
    $conexion = conexion();
    $consulta = $conexion ->query("SELECT id, nombre, precio, imagen, descripcion FROM productos WHERE id='$id'");
    $avion = $consulta->fetchObject();
    ?>
    <img src="<?= $avion->imagen ?>" alt="imagen del avión">
    <h4>Nombre: <?= $avion->nombre ?></h4>
    <h4>Precio: <?= $avion->precio ?></h4>
    <h4>Detalles: <?= $avion->descripcion ?></h4>
    <!-- Formularios para reenviarnos a la ppl y añadir el avion al carrito segun su identificador -->
    <form action="añadirCarrito.php" method="post">
        <input type="hidden" name="añadir" value="<?= $avion->id?>">
        <input type="submit" value="Añadir al carrito"><br><br>
    </form>
    <form action="index.php" method="post">
        <input type="submit" value="Volver"><br><br>
    </form>
    <form action="administrarProductos.php" method="post">
        <input type="submit" value="Modificar el producto"><br><br>
    </form>
</body>
</html>