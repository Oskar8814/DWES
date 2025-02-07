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
            <td colspan="2"><a href="../Controller/mostrarCarrito.php">Cesta <?= $cantidadProd ?> Prod</a></td>
        </tr>
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Imagen</th>
            <th>Stock</th>
            <th >
                <form action="../Controller/validacion.php" method="post">
                    <input type="submit" value="Administrar Productos">
                </form>
            </th>
        </tr>
        <?php
        foreach ($data['aviones'] as $avion) {
            ?>
            <tr>
                <td><?= $avion->getNombre() ?></td>
                <td><?= $avion->getPrecio() ?></td>
                <td><a href="../Controller/descripcion.php?descripcion=<?= $avion->getCodigo() ?>"><img src="../View/<?= $avion->getImagen() ?>" alt="imagen de avion"></a></td>
                <td><?= $avion->getStock() ?></td>
                <form action="../Controller/añadirCarrito.php" method="post">
                    <td><input type="submit" value="Añadir al carrito"></td>
                    <input type="hidden" name="añadir" value="<?= $avion->getCodigo() ?>">
                </form>
            </tr>
            <?php
        }
        ?>
    </table>
</body>
</html>