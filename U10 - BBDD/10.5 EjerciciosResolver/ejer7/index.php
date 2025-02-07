<?php
include('funciones.php');
if (session_status() == PHP_SESSION_NONE) session_start();

if (isset($_COOKIE['carrito'])) {
    $_SESSION['carrito'] = $_COOKIE['carrito'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        tr,
        td,
        th,
        table {
            border: solid 1px black;
        }

        img {
            height: 100px;
            width: 300px;
        }
    </style>
</head>
<body>
    
    <table>
        <?php
        $cantidadProd = 0;

        if (isset($_SESSION['carrito'])) {
            foreach ($_SESSION['carrito'] as $key => $value) {
                $cantidadProd += $value; 
            } 
        }

        ?>
        <tr>
            <td colspan="3">La tiendecita de Aviones</td>
            <td><a href="mostrarCarrito.php">Cesta <?= $cantidadProd ?> Prod</a></td>
        </tr>
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Imagen</th>
            <th>
                <form action="validacion.php" method="post">
                    <input type="submit" value="Administrar Productos">
                </form>
            </th>
        </tr>
        <?php
        $conexion = conexion();
        $consulta = $conexion ->query("SELECT id, nombre, precio, imagen, descripcion FROM productos");
        while ($avion = $consulta->fetchObject()) {
            ?>
            <tr>
                <td><?= $avion->nombre ?></td>
                <td><?= $avion->precio ?></td>
                <td><a href="descripcion.php?descripcion=<?= $avion->id ?>"><img src="<?= $avion->imagen ?>" alt="imagen de avion"></a></td>
                <form action="añadirCarrito.php" method="post">
                    <td><input type="submit" value="Añadir al Carrito"></td>
                    <input type="hidden" name="añadir" value="<?= $avion->id ?>">
                </form>
            </tr>
            <?php
        }
        $conexion=null;
        ?>
    </table>
</body>
</html>