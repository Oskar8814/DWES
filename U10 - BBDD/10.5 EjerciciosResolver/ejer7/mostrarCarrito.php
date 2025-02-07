<?php
include('funciones.php');
if (session_status() == PHP_SESSION_NONE) session_start();
if (!$_SESSION['carrito']) {
    header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        tr,td,table{
            border: solid 1px black;
        }
        img{
            height: 100px;
            width: 300px;
        }
        a{
            text-decoration: none;
        }
        
    </style>
</head>
<body>
    <h1>Carrito de la compra</h1>
    <table>
        <tr><td colspan="4">Productos en tu cesta</td></tr>
        <?php
        $conexion = conexion();

        $cantidadTotal=0;
        $precioTotal=0;
        foreach ($_SESSION['carrito'] as $key => $cantidad) {

            $consulta = $conexion ->query("SELECT id, nombre, precio, imagen, descripcion FROM productos WHERE id='$key'");
            $avion = $consulta->fetchObject();
            
            $cantidadTotal+=$cantidad;
            $precioTotal += $avion->precio*$cantidad;

            ?>
            <tr>
                <td><?= $avion->nombre ?></td>
                <td><?= $cantidad ?></td>
                <td>
                    <a href="descripcion.php?descripcion=<?= $avion->id ?>"><img src="<?= $avion->imagen ?>" alt="imagen de avion"></a><br>
                    <?= $avion->nombre ?><br>
                    <?= $avion->precio ?> euros<br>
                </td>
                <td>
                    <form action="eliminarProductoCarrito.php" method="post">
                        <input type="submit" value="Eliminar">
                        <input type="hidden" name="eliminar" value="<?= $key ?>">
                    </form>
                </td>
            </tr>
            <?php
        }
        $conexion=null;
        ?>
        <tr>
            <td>Total</td>
            <td><?= $cantidadTotal ?></td>
            <td><?= $precioTotal ?> Euros</td>
            <td>
                <a href="vaciarCesta.php">VACIAR CESTA</a>
            </td>
        </tr>
        <tr ><td colspan="4"><a href="index.php">Volver a la tienda</a></td></tr>
    </table>
</body>
</html>