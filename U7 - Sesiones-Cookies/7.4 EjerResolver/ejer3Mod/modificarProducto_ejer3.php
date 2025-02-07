<?php
session_start();
if (!isset($_REQUEST['modificar'])) {
    header('location:ejer3.php');
}


if (isset($_REQUEST['nombre'])||isset($_REQUEST['precio'])||isset($_REQUEST['imagen'])||isset($_REQUEST['descripcion'])) {
    $keyModRec = $_REQUEST['keymod'];
    $_SESSION['catalogo'][$keyModRec]["nombre"] = $_REQUEST['nombre'];
    $_SESSION['catalogo'][$keyModRec]["precio"] = $_REQUEST['precio'];
    $_SESSION['catalogo'][$keyModRec]["imagen"] = $_REQUEST['imagen'];
    $_SESSION['catalogo'][$keyModRec]["descripcion"] = $_REQUEST['descripcion'];

    setcookie("catalogo", base64_encode(serialize($_SESSION['catalogo'])),time()+3600);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Productos</title>
    <link rel="stylesheet" href="css/modificarProducto.css">
</head>
<body>
    <?php
        $keyMod = $_REQUEST['modificar'];
    ?>
    <div class="form-container">
    <h3>Modificacion del producto <?= $_SESSION['catalogo'][$keyMod]["nombre"] ?></h3>
    <form action="#" method="post" style="display: inline;">
        <label for="nombre">Introduce el nombre del producto:</label>
        <input type="text" name="nombre" value="<?= $_SESSION['catalogo'][$keyMod]["nombre"]  ?>"><br>
        <label for="precio">Introduce el precio del producto:</label>
        <input type="number" name="precio" value="<?= $_SESSION['catalogo'][$keyMod]["precio"]  ?>"><br>
        <label for="imagen">Introduce el nombre de la imagen:</label>
        <input type="text" name="imagen" value="<?= $_SESSION['catalogo'][$keyMod]["imagen"]  ?>"><br>
        <!-- Descripción: <input type="text" name="descripcion" value="<?= $_SESSION['catalogo'][$keyMod]["descripcion"]  ?>"> -->
        <label for="descripcion">Introduce la descripción:</label>
        <textarea name="descripcion" id="" cols="100" rows="10"><?= $_SESSION['catalogo'][$keyMod]["descripcion"]  ?></textarea><br><br>
        <input type="submit" value="Modificar">
        <input type="hidden" name="keymod" value="<?= $_REQUEST['modificar'] ?>">
    </form>
    <form id="form" action="administrarProductos_ejer3.php" method="post" style="display: inline;">
        <input type="submit" value="Volver">
    </form>
</div>
</body>
</html>