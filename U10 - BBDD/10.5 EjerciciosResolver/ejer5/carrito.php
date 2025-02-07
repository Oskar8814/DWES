<?php
include('funciones.php');

if (session_status() == PHP_SESSION_NONE) session_start();
if (!isset($_REQUEST['carrito'])) {
    header('Location:index.php');
}
if (isset($_REQUEST['eliminarCarrito'])) {
    unset($_SESSION['carrito']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/carrito.css">
</head>
<body>

    <h1>Carrito de Articulos seleccionados</h1>
    <?php
    if (isset($_SESSION['carrito'])) {
    ?>
    <table>
        <tr>
            <th>Código</th>
            <th>Cantidad</th>
            <th>Precio Venta</th>
            <th>Precio Total</th>
            <?php
            foreach ($_SESSION['carrito'] as $key => $cantidad) {
                ?>
                <tr>
                    <td><?= $key?></td>
                    <td><?= $cantidad ?></td>
                    <td><?php
                        $conexion = conexion();
                        $consulta = $conexion->query("SELECT precioVenta FROM articulo WHERE codigo='$key'");
                        $articulo = $consulta->fetchObject();
                        echo "$articulo->precioVenta";
                        $conexion= null;
                    ?></td>
                    <td><?= $articulo->precioVenta * $cantidad ?></td>
                </tr>
                <?php
            }
            ?>
    </table><br>
    <?php
    }else {
        ?>
        <p>No hay articulos en el carrito</p>
        <?php
    }
    ?>
    <form action="" method="post">
        <input type="hidden" name="procesar">
        <input type="hidden" name="carrito">
        <input type="submit" value="Procesar Pedido">
    </form>
    <form action="index.php" method="post">
        <input type="submit" value="Inicio">
    </form>
    <form action="" method="post">
        <input type="hidden" name="eliminarCarrito">
        <input type="hidden" name="carrito">
        <input type="submit" value="Eliminar Carrito">
    </form>
    <?php
    if (isset($_REQUEST['procesar']) && isset($_SESSION['carrito'])) {
        echo generaFactura();
        
    }
    ?>
</body>
</html>