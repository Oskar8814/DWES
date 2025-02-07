<?php
include('funciones.php');
session_start();
if (!$_SESSION['usuario']) {
    header('location:index.php');
}
if (isset($_REQUEST['salir'])) {
    unset($_SESSION['usuario']);
    unset($_SESSION['pass']);
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

        img {
            height: 100px;
            width: 300px;
        }
    </style>
</head>
<body>
    <h1>Panel de Administración de Productos</h1>
    <?php
    if ($_SESSION['usuario']=="admin" && $_SESSION['pass']=="admin") {
        $conexion = conexion();
        $consulta = $conexion ->query("SELECT id, nombre, precio, imagen, descripcion FROM productos");
        ?>
        <table>
            <?php
            while ($avion = $consulta->fetchObject()) {
                ?>
                <tr>
                    <td><a href="descripcion.php?descripcion=<?= $avion->id ?>"><img src="<?= $avion->imagen ?>" alt="imagen de avion"></a><br><?= $avion->nombre ?></td>
                    <td>
                        <form action="eliminarProductos.php" method="post">
                            <input type="hidden" name="eliminar" value="<?= $avion->id ?>">
                            <input id="eliminar" type="submit" value="Eliminar">
                        </form>
                    </td>
                    <td>
                        <form action="modificarProductos.php" method="post">
                            <input type="hidden" name="modificar" value="<?= $avion->id ?>" >
                            <input type="submit" value="Modificar">
                        </form>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table><br>
        <form action="añadirProducto.php" method="post" style="display: inline;">
            <input type="submit" value="Añadir">
            <input type="hidden" name="añadir">
        </form>
        <form id="form" action="index.php" method="post" style="display: inline;">
            <input type="submit" value="Volver">
        </form>
        <form id="form" action="#" method="post">
            <input type="submit" value="Cerrar sesión Admin">
            <input type="hidden" name="salir">
        </form>
        <?php
    }else {
        header('location:index.php');
        //Si la contraseña y usuario son incorrectos elimina la session para poder entrar de nuevo en la página de validación.
        unset($_SESSION['pass']);
        unset($_SESSION['usuario']);
    }
    ?>
</body>
</html>