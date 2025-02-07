<?php
session_start();
include('funciones.php');
if (!isset($_REQUEST['añadir'])) {
    header('location:ejer3.php');
}


if (isset($_REQUEST['nombre']) || isset($_REQUEST['precio']) || isset($_REQUEST['descripcion'])) {

    // Manejar el formulario de subida de imagen
    $fileName = '';

    if (isset($_FILES['imagen_file']) && $_FILES['imagen_file']['error'] === UPLOAD_ERR_OK) {
        $destPath = 'img/' . $_FILES['imagen_file']['name'];
        move_uploaded_file($_FILES['imagen_file']['tmp_name'], $destPath);
        $fileName = $_FILES['imagen_file']['name']; // Guarda el nombre para el producto

        // if (move_uploaded_file($_FILES['imagen_file']['tmp_name'], $destPath)) {
        //     echo "Archivo subido exitosamente: " . $_FILES['imagen_file']['name'];
        //     $fileName = $_FILES['imagen_file']['name']; // Guarda el nombre para el producto
        // } else {
        //     echo "Error al mover el archivo.";
        // }
    } else {
        echo "Error al subir el archivo.";
    }

    $ultimaKey = array_key_last($_SESSION['catalogo']); //Coge la ultima key del array

    $num = (int)substr($ultimaKey, 2); //Coge de "av1" solamente el numero
    $num += 1;

    $nuevaKey = 'av' . $num;
    // var_dump($num);
    $_SESSION['catalogo'][$nuevaKey] = [
        "nombre" => $_POST['nombre'],
        "precio" => $_POST['precio'],
        "imagen" => "img/".$fileName, // Guarda el nombre generado de la imagen
        "descripcion" => $_POST['descripcion'],
    ];
    
    renovarCatalogo();

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Producto</title>
    <link rel="stylesheet" href="css/añadirProducto.css">
</head>

<body>
    <div class="form-container">
        <h3>Añadir un nuevo Producto</h3>
        <!-- formulario para añadir nuevo producto -->
        <form action="#" enctype="multipart/form-data"  method="post" style="display: inline;">
            Introduce el nombre del producto : <input type="text" name="nombre" id=""><br>
            Introduce el precio del producto : <input type="number" name="precio" id=""><br>
            Subir una imagen del producto: <input type="file" name="imagen_file" accept="image/*" required><br>
            Introduce la descripción: <textarea name="descripcion" id="" cols="100" rows="10"></textarea><br><br>
            <input type="submit" value="Añadir">
        </form>

        <form id="form" action="administrarProductos_ejer3.php" method="post" style="display: inline;">
            <input type="submit" value="Volver">
        </form>
    </div>

</body>

</html>