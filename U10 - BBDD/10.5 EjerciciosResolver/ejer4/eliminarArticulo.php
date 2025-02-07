<?php
if (isset($_REQUEST['eliminar'])) {
    try {
        $conexion = new PDO("mysql:host=localhost;dbname=almacen;charset=utf8", "root", "");
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die("Error: " . $e->getMessage());
    }

    $delete = "DELETE FROM articulo WHERE codigo='$_REQUEST[eliminar]'";
    $conexion->exec($delete);
    echo "Articulo dado de baja correctamente.";
    $conexion = null;
    header("refresh:2;url=index.php"); // nos redirije en 3 seg al index
} else {
    header('Location:index.php');
}
?>