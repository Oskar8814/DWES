<?php
include('funciones.php');
if (!isset($_REQUEST['salida'])) {
    header('Location:index.php');
}
$conexion = conexion();

$consulta = $conexion->query("SELECT codigo, stock FROM articulo WHERE codigo='$_REQUEST[salida]'");
$articulo = $consulta -> fetchObject();
$conexion = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Retirar Stock del articulo <?= $_REQUEST['salida'] ?></h1>
    <h3>Stock actual del articulo: <?= $articulo->stock ?></h3>
    <form action="" method="post">
        <label for="">Cantidad que se va a retirar:</label>
        <input type="number" name="cantidad" id="" min="1" max="<?= $articulo->stock ?>">
        <input type="submit" value="Retirar">
        <input type="hidden" name="salida" value="<?= $_REQUEST['salida'] ?>">
    </form>

    <?php
    if (isset($_REQUEST['cantidad'])) {
        $conexion = conexion();
    
        $consulta = $conexion->query("SELECT codigo, stock FROM articulo WHERE codigo='$_REQUEST[salida]'");
        $articulo = $consulta -> fetchObject();
    
        if ($articulo->stock < $_REQUEST['cantidad']) {
            echo "<p style='color: red;'>Stock insuficiente</p>";
            header('Refresh:3;index.php');
        }else {
            $nuevoStock = $articulo->stock - $_REQUEST['cantidad'];
            $update= "UPDATE articulo SET stock=\"$nuevoStock\" WHERE codigo=\"$_REQUEST[salida]\"";
            $conexion->exec($update);
            echo "<p style='color: green;'>Stock retirado correctamente</p>";
            $conexion = null;
            header('Refresh:3;url=index.php');
        }
    }
    ?>
</body>
</html>