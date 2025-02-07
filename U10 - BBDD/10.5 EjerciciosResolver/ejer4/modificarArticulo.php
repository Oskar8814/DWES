<?php
    if (!isset($_REQUEST['modificar'])) {
        header('Location:index.php');
    }

    if (isset($_REQUEST['descripcionMod'])) {

        try {
            $conexion = new PDO("mysql:host=localhost;dbname=almacen;charset=utf8", "root", "");
        } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die("Error: " . $e->getMessage());
        }
        
        $update= "UPDATE articulo SET codigo=\"$_REQUEST[codigoMod]\",descripcion=\"$_REQUEST[descripcionMod]\", 
        precioCompra=\"$_REQUEST[compraMod]\", precioVenta=\"$_REQUEST[ventaMod]\", stock=\"$_REQUEST[stockMod]\" WHERE codigo=\"$_REQUEST[modificar]\"";

        $conexion->exec($update);
        echo "Articulo modificado correctamente.";
        $conexion = null;
        header('Location:index.php'); // nos redirije en al index
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Modificar los Datos del Articulo</h1>
    <?php
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=almacen;charset=utf8", "root", "");
        } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die("Error: " . $e->getMessage());
        }

        //Obtenemos el producto que deseamos modificar de la BBDD
        $consulta = $conexion->query("SELECT codigo, descripcion, precioCompra, precioVenta, stock FROM articulo WHERE codigo='$_REQUEST[modificar]'");
        $articulo = $consulta->fetchObject();
        $conexion = null;
    ?>
    <h3>Modificación del Articulo <?= $_REQUEST['modificar'] ?></h3>
    <form action="" method="post">
        <input type="hidden" name="modificar" value="<?= $_REQUEST['modificar'] ?>">
        <label for="codigo">Codigo:</label>
        <input type="text" name="codigoMod" id="" value="<?= $articulo->codigo ?>"><br><br>
        <label for="">Descripción:</label>
        <input type="text" name="descripcionMod" id="" value="<?= $articulo->descripcion ?>"><br><br>
        <label for="">Precio Compra:</label>
        <input type="number" name="compraMod" id="" step="0.01" value="<?= $articulo->precioCompra ?>"><br><br>
        <label for="">Precio Venta:</label>
        <input type="number" name="ventaMod" id="" step="0.01" value="<?= $articulo->precioVenta ?>"><br><br>
        <label for="">Stock</label>
        <input type="number" name="stockMod" id="" value="<?= $articulo->stock ?>"><br><br>
        <input type="submit" value="Modificar">
    </form>
</body>
</html>