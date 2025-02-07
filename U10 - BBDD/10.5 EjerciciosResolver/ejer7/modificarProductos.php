<?php
if (session_status() == PHP_SESSION_NONE) session_start();
include_once('funciones.php');
if (!isset($_REQUEST['modificar'])) {
    header('Location:administrarProductos.php');
}

if (isset($_REQUEST['nombre'])||isset($_REQUEST['precio'])||isset($_REQUEST['imagen_file'])||isset($_REQUEST['descripcion'])) {
    
    $conexion = conexion(); 
    $consulta = $conexion->query("SELECT * FROM productos WHERE id='$_REQUEST[keymod]'");
    $avion = $consulta -> fetchObject();
    
    $nuevaImagen = $avion->imagen;

    if (isset($_FILES['imagen_file']) && $_FILES['imagen_file']['name'] != "") {
        // Elimina la imagen del avion usada en el caso de subir una, sino no eliminara la imagen.
        $rutaActual = $avion->imagen;
        if (file_exists($rutaActual)) {
            unlink($rutaActual);
        }

        // subida de imagen nueva
        $fileName = '';

        if (isset($_FILES['imagen_file']) && $_FILES['imagen_file']['error'] === UPLOAD_ERR_OK) {
            $destPath = 'img/' . $_FILES['imagen_file']['name'];

            if (move_uploaded_file($_FILES['imagen_file']['tmp_name'], $destPath)) {
                echo "Archivo subido exitosamente: " . $_FILES['imagen_file']['name'];
                $fileName = $_FILES['imagen_file']['name']; // Guarda el nombre para el producto
            } else {
                echo "Error al mover el archivo.";
            }

            $nuevaImagen ="img/".$fileName;
        } else {
            echo "Error al subir el archivo.";
        }
    }


    $update= "UPDATE productos SET nombre=\"$_REQUEST[nombre]\", 
        precio=\"$_REQUEST[precio]\", imagen=\"$nuevaImagen\", descripcion=\"$_REQUEST[descripcion]\" WHERE id=\"$_REQUEST[keymod]\"";
    
    $conexion->exec($update);
    echo "Producto modificado correctamente.";
    $conexion = null;
    header('Location:administrarProductos.php'); // nos redirije a la pagina administracion
    
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
        $conexion = conexion(); 
        $consulta = $conexion->query("SELECT * FROM productos WHERE id='$_REQUEST[modificar]'");
        $avion = $consulta -> fetchObject();
        $conexion = null;
    ?>
    <div class="form-container">
    <h3>Modificacion del producto <?= $avion->nombre ?></h3>
    <form action="#" enctype="multipart/form-data" method="post" style="display: inline;">
        <label for="nombre">Introduce el nombre del producto:</label>
        <input type="text" name="nombre" value="<?= $avion->nombre ?>"><br>
        <label for="precio">Introduce el precio del producto:</label>
        <input type="number" name="precio" value="<?= $avion->precio ?>"><br>
        <label for="imagen">Subir una imagen del producto:</label>
        <input type="file" name="imagen_file" accept="image/*"><br>
        <label for="descripcion">Introduce la descripción:</label>
        <textarea name="descripcion" id="" cols="100" rows="10"><?= $avion->descripcion  ?></textarea><br><br>
        <input type="submit" value="Modificar">
        <input type="hidden" name="keymod" value="<?= $avion->id ?>">
    </form>
    <form id="form" action="administrarProductos.php" method="post" style="display: inline;">
        <input type="submit" value="Volver">
    </form>
</div>
</body>
</html>