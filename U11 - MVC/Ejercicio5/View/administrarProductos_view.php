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

        img {
            height: 100px;
            width: 300px;
        }
    </style>
</head>
<body>
    <h1>Panel de Administración de Productos</h1>
    <?php
    if ($_SESSION['rol']=="admin") {
        ?>
        <table>
            <?php
            foreach ($data['aviones'] as $avion) {
                ?>
                <tr>
                    <td><a href="../Controller/descripcion.php?descripcion=<?= $avion->getCodigo() ?>"><img src="../View/<?= $avion->getImagen() ?>" alt="imagen de avion"></a><br><?= $avion->getNombre() ?></td>
                    <td>
                        <p>Stock: <?= $avion->getStock() ?></p>
                        <form action="../Controller/añadirStock.php" method="post">
                            <input type="hidden" name="restock" value="<?= $avion->getCodigo()?>" >
                            <input type="submit" value="Añadir Stock">
                        </form>
                    </td>
                    <td>
                        <form action="../Controller/modificarProductos.php" method="post">
                            <input type="hidden" name="modificar" value="<?= $avion->getCodigo()?>" >
                            <input type="submit" value="Modificar">
                        </form>
                        <form action="../Controller/confirmacion.php" method="post">
                            <input type="hidden" name="eliminar" value="<?= $avion->getCodigo() ?>">
                            <input id="eliminar" type="submit" value="Eliminar">
                        </form>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table><br>
        <form action="../Controller/añadirProducto.php" method="post" style="display: inline;">
            <input type="submit" value="Añadir">
            <input type="hidden" name="añadir">
        </form>
        <form id="form" action="../Controller/index.php" method="post" style="display: inline;">
            <input type="submit" value="Volver">
        </form>
        <!-- Se cierra automaticamente al deslogear el usuario 
        <form id="form" action="" method="post">
            <input type="submit" value="Cerrar sesión Admin">
            <input type="hidden" name="salir">
        </form> -->
        <?php
    }else {
        header('location:index.php');
        //Si la contraseña y usuario son incorrectos elimina la session para poder entrar de nuevo en la página de validación.
        // unset($_SESSION['passAdm']);
        // unset($_SESSION['usuarioAdm']);
    }
    ?>
</body>
</html>