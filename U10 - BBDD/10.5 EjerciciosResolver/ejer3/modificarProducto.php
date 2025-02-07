<?php
    if (!isset($_REQUEST['modificar'])) {
        header('Location:index.php');
    }

    if (isset($_REQUEST['nombreMod'])) {

        try {
            $conexion = new PDO("mysql:host=localhost;dbname=aviones;charset=utf8", "root", "");
        } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die("Error: " . $e->getMessage());
        }
        
        $update= "UPDATE productos SET nombre=\"$_REQUEST[nombreMod]\", 
        precio=\"$_REQUEST[precioMod]\", imagen=\"$_REQUEST[imagenMod]\", descripcion=\"$_REQUEST[descripcionMod]\" WHERE id=\"$_REQUEST[id]\"";

        $conexion->exec($update);
        echo "Producto modificado correctamente.";
        $conexion = null;
        header('Location:index.php'); // nos redirije al index
        
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
    <h1>Modificar los Datos del Producto</h1>
    <?php
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=aviones;charset=utf8", "root", "");
        } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die("Error: " . $e->getMessage());
        }

        //Obtenemos el producto que deseamos modificar de la BBDD
        $consulta = $conexion->query("SELECT nombre, precio, imagen, descripcion FROM productos WHERE id='$_REQUEST[modificar]'");
        $avion = $consulta->fetchObject();
        $conexion = null;
    ?>
    <h3>Modificación del Producto <?= $avion->nombre ?></h3>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $_REQUEST['modificar'] ?>">
        <label for="">Nombre:</label>
        <input type="text" name="nombreMod" id="" value="<?= $avion->nombre ?>"><br><br>
        <label for="">Precio:</label>
        <input type="number" name="precioMod" id="" value="<?= $avion->precio ?>"><br><br>
        <label for="">Imagen:</label>
        <input type="text" name="imagenMod" id="" value="<?= $avion->imagen ?>"><br><br>
        <label for="">Descripción</label>
        <textarea name="descripcionMod" id=""><?= $avion->descripcion ?></textarea><br><br>
        <input type="submit" value="Modificar">
        <input type="hidden" name="modificar" <?= $_REQUEST['modificar'] ?>> <!-- Necesario para el primer iss  -->
    </form>
</body>
</html>