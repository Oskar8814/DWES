<?php
session_start();
include('funciones.php');
if (!isset($_SESSION['catalogo'])) {
    $catalogo = cargaCatalogo();
    $_SESSION['catalogo'] = $catalogo;
}

if (isset($_COOKIE['carrito'])) {
    $_SESSION['carrito'] = $_COOKIE['carrito'];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi tiendecita de aviones</title>
    <style>
        tr,
        td,
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
            <td colspan="3">La tiendecita</td>
            <td><a href="mostrarCarrito_ejer3.php">Cesta <?= $cantidadProd ?> Prod</a></td>
        </tr>
        <tr>
            <td>Producto</td>
            <td>Precio</td>
            <td>Imagen</td>
            <td>
                <form action="validacion.php" method="post">
                    <input type="submit" value="Administrar Productos">
                </form>
            </td>
        </tr>
        <?php
        foreach ($_SESSION['catalogo'] as $key => $avion) {
        ?>
            <tr>
                <td><?= $avion['nombre'] ?></td>
                <td><?= $avion['precio'] ?></td>
                <td><a href="descripcion_ejer3.php?descripcion=<?= $key ?>"><img src="<?= $avion['imagen'] ?>" alt="Avion"></a></td>
                <form action="añadirCarrito_ejer3.php" method="post">
                    <td><input type="submit" value="Añadir"></td>
                    <input type="hidden" name="añadir" value="<?= $key ?>">
                </form>
            </tr>
        <?php
        // var_dump($_SESSION['catalogo']);
        }
        ?>
    </table>
    <br>
    <br>
</body>

</html>