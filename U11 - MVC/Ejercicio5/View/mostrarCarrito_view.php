
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
    <?php
    if ($data['cesta']!=null) {
    ?>
    <table>
        <tr><td colspan="4">Productos en tu cesta</td></tr>
        <?php
        $cantidadTotal=0;
        $precioTotal=0;
        foreach ($data['cesta'] as $producto) {

            $avion = Avion::getAvionesById($producto->getCod_producto());
            $cantidad = $producto->getCantidad();
            $cantidadTotal+=$cantidad;
            $precioTotal += $avion->getPrecio()*$cantidad;

            ?>
            <tr>
                <td><?= $avion->getNombre() ?></td>
                <td><?= $cantidad ?></td>
                <td>
                    <a href="descripcion.php?descripcion=<?= $avion->getCodigo() ?>"><img src="../View/<?= $avion->getImagen() ?>" alt="imagen de avion"></a><br>
                    <?= $avion->getNombre() ?><br>
                    <?= $avion->getPrecio() ?> euros<br>
                </td>
                <td>
                    <form action="../Controller/eliminarProductoCarrito.php" method="post">
                        <input type="submit" value="Eliminar">
                        <input type="hidden" name="eliminar" value="<?= $producto->getCod_producto() ?>">
                    </form>
                </td>
            </tr>
            <?php
        }
        ?>
        <tr>
            <td>Total</td>
            <td><?= $cantidadTotal ?></td>
            <td><?= $precioTotal ?> Euros</td>
            <td>
                <a href="../Controller/vaciarCesta.php">Vaciar la cesta</a>
            </td>
        </tr>
        <tr>
            <td colspan="3"><a href="../Controller/index.php">Volver a la tienda</a></td>
            <td>
                <form action="../Controller/mostrarCarrito.php" method="post">
                    <input type="submit" value="Comprar">
                    <input type="hidden" name="comprar">
                </form>
            </td>
        </tr>
    </table>
    <?php
    }else {
        ?>
        <p>Actualmente no hay productos en el carrito.</p>
        <a href="../Controller/index.php">Volver</a>
        <?php
    }
    ?>
</body>
</html>