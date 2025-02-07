<?php
session_start();

//MODIFICAR PARA SI NO HA NADA EN EL CARRITO MOSTRAR UN MENSAJE DE CARRITO VACIO

if (!$_SESSION['carrito']) {
    header('location:ejer3.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compra</title>
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
<table>
        <tr><td colspan="4">Productos en tu cesta</td></tr>
        <?php
        $cantidadTotal = 0;
        $precioTotal = 0;
        foreach ($_SESSION['carrito'] as $key => $cantidad) {
            $cantidadTotal += $cantidad;
            $precioTotal += $_SESSION['catalogo'][$key]["precio"]*$cantidad;
            ?>
            <tr>
                <td><?= $_SESSION['catalogo'][$key]["nombre"] ?></td>
                <td><?= $cantidad ?></td>
                <td>
                    <a href="descripcion_ejer3.php?descripcion=<?= $key ?>"><img src="<?= $_SESSION['catalogo'][$key]["imagen"]  ?>" alt=""><br></a>
                    <?= $_SESSION['catalogo'][$key]["nombre"] ?><br>
                    <?= $_SESSION['catalogo'][$key]["precio"] ?> euros <br>
                </td>
                <td>
                    <form action="eliminarProductoCarrito_ejer3.php" method="post">
                        <input type="submit" value="Eliminar">
                        <input type="hidden" name="eliminar" value="<?= $key ?>">
                    </form>
                </td>
            </tr>
            <?php
        }
        
        ?>
        <tr>
            <td>Total</td>
            <td><?= $cantidadTotal ?></td>
            <td><?= $precioTotal ?></td>
            <td>
                <a href="vaciarCesta_ejer3.php">VACIAR CESTA</a>
            </td>
        </tr>
        <tr ><td colspan="4"><a href="ejer3.php">Volver a la tienda</a></td></tr>
    </table>
</body>
</html>