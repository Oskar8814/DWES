<?php
session_start();
if (!$_SESSION['catalogo'] || !$_SESSION['usuario']) {
    header('location:ejer3.php');
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
    <link rel="stylesheet" href="css/administracionProductos_ejer3.css">
</head>

<body>
    <?php
    if($_SESSION['usuario']=="admin" && $_SESSION['pass']=="admin"){
    ?>
    <table>
        <?php
        foreach ($_SESSION['catalogo'] as $key => $value) {
        ?>
            <tr>
                <td><a href="descripcion_ejer3.php?descripcion=<?= $key ?>"><?= $value['nombre'] ?></a></td>
                <td>
                    <form action="eliminarProductos_ejer3.php" method="post">
                        <input type="hidden" name="eliminar" value="<?= $key ?>">
                        <input id="eliminar" type="submit" value="Eliminar">
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
    <div class="button-container">
    <form action="añadirProducto_ejer3.php" method="post">
        <input type="submit" value="Añadir">
        <input type="hidden" name="añadir">
    </form>
    <form id="form" action="ejer3.php" method="post">
        <input type="submit" value="Volver">
    </form>
    <form id="form" action="#" method="post">
        <input type="submit" value="Cerrar sesión Admin">
        <input type="hidden" name="salir">
    </form>
    </div>
    <?php
    }else {
        header('location:ejer3.php');
        //Si la contraseña y usuario son incorrectos elimina la session para poder entrar de nuevo en la página de validación.
        unset($_SESSION['pass']);
        unset($_SESSION['usuario']);
    }
    ?>
</body>

</html>