<?php
session_start();
if (!$_SESSION['catalogo']) {
    header('location:ejer3.php');
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
        table {
            border: solid 1px black;
        }
        form{
            display: inline;
        }
    </style>
</head>

<body>
    <table>
        <?php
        foreach ($_SESSION['catalogo'] as $key => $value) {
        ?>
            <tr>
                <td><a href="descripcion_ejer3.php?descripcion=<?= $key ?>"><?= $value['nombre'] ?></a></td>
                <td>
                    <form action="eliminarProductos_ejer3.php" method="post">
                        <input type="hidden" name="eliminar" value="<?= $key ?>">
                        <input type="submit" value="Eliminar">
                    </form>
                </td>
                <td>
                    <form action="modificarProducto_ejer3.php" method="post">
                        <input type="hidden" name="modificar" value="<?= $key ?>" >
                        <input type="submit" value="Modificar">
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </table><br>
    <form action="añadirProducto_ejer3.php" method="post">
        <input type="submit" value="Añadir">
        <input type="hidden" name="añadir">
    </form>
    <form id="form" action="ejer3.php" method="post">
        <input type="submit" value="Volver">
    </form>
</body>

</html>