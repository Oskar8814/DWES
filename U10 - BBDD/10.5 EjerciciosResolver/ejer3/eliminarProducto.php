<?php
if (isset($_REQUEST['eliminar'])) {
    try {
        $conexion = new PDO("mysql:host=localhost;dbname=aviones;charset=utf8", "root", "");
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die("Error: " . $e->getMessage());
    }
    //Anadir una comprobacion del id
    $delete = "DELETE FROM productos WHERE id='$_REQUEST[eliminar]'";
    $conexion->exec($delete);
    echo "Producto dado de baja correctamente.";
    $conexion = null;
    header("refresh:3;url=index.php"); // nos redirije en 3 seg al index
} else {
    header('Location:index.php');
}
?>