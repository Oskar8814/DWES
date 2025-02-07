<?php

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
    <h1>Tienda de aviones a escala</h1>
    <table>
        <?php
        $cantidadProd = 0;
        // var_dump($_SESSION['id']);
        // var_dump($_SESSION['usuario']);
        if ($data['cesta'] != null) {
            
            foreach ($data['cesta'] as $producto) {
                $cantidadProd += $producto->getCantidad(); 
            } 
        }

        ?>
        <tr>
            <td colspan="2"><img src="../View/img/logo2.png" alt="" style="width: 120px;" ></td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="salir">
                    <input type="submit" value="Finalizar la sesión">
                </form>
            </td>
            <td colspan="2"><a href="../Controller/mostrarCarrito.php">Cesta <?= $cantidadProd ?> Prod</a></td>
        </tr>
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Imagen</th>
            <th>Stock</th>
            <th >
                <!-- Si la session rol no es admin el formulario tendra el hidden y no aparecera en cambio si es admin el form aparece (Otra forma de hacerlo sin tocar el boton) -->
                <form action="../Controller/administrarProductos.php" method="post" <?= ($_SESSION['rol'] !== 'admin') ? 'hidden' : ''; ?>>
                    <!-- Controla el tipo de boton segun el rol, si no es admin el boton será hidden y por lo tanto no se vera, si es admin sera un submit y podra clicarlo -->
                    <!-- <input value="Administrar Productos" type="<?= ($_SESSION['rol'] === 'admin') ? 'submit' : 'hidden'; ?>" >  -->
                    <input type="submit" value="Admininistrar Productos">
                </form>
            </th>
        </tr>
        <?php
        foreach ($data['aviones'] as $avion) {
            $productoAux = Cesta::getProducto($_SESSION['id'],$avion->getCodigo());
            $cantidad = $avion->getStock();
            if ($productoAux!=null) {
                $cantidadAux = $productoAux->getCantidad();
                $cantidad -= $cantidadAux;
            }else {
                $cantidadAux = 0;
                $cantidad -= $cantidadAux;
            }            

            ?>
            <tr>
                <td><?= $avion->getNombre() ?></td>
                <td><?= $avion->getPrecio() ?></td>
                <td><a href="../Controller/descripcion.php?descripcion=<?= $avion->getCodigo() ?>"><img src="../View/<?= $avion->getImagen() ?>" alt="imagen de avion"></a></td>
                <td><?= $cantidad ?></td>
                <?php
                if ($cantidad>0) {
                    ?>
                    <form action="../Controller/añadirCarrito.php" method="post">
                        <td><input type="submit" value="Añadir al carrito"></td>
                        <input type="hidden" name="añadir" value="<?= $avion->getCodigo() ?>">
                    </form>
                    <?php
                } else {
                    ?>
                        <td><h4>Sin Stock</h4></td>
                    <?php
                }
                
                ?>
            </tr>
            <?php
        }
        ?>
    </table>
</body>
</html>