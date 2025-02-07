<?php
if (isset($_REQUEST['nombre'])) {
    try {
        $conexion = new PDO("mysql:host=localhost;dbname=aviones;charset=utf8", "root", "");
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die("Error: " . $e->getMessage());
    }

    $insercion = "INSERT INTO productos (nombre, precio, imagen, descripcion) VALUES
    ('$_REQUEST[nombre]','$_REQUEST[precio]','$_REQUEST[imagen]', '$_REQUEST[descripcion]')";

    $conexion ->exec($insercion);
    echo "Producto dado de alta correctamente.";
    $conexion = null;
    header('refresh:3;url=index.php');
}else {
    header('Location:index.php');
}
?>