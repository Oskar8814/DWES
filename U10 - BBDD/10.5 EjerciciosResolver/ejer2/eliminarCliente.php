<?php
if (isset($_REQUEST['eliminar'])) {
    try {
        $conexion = new PDO("mysql:host=localhost;dbname=banco;charset=utf8", "root", "");
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die("Error: " . $e->getMessage());
    }

    $delete = "DELETE FROM cliente WHERE dni='$_REQUEST[eliminar]'";
    $conexion->exec($delete);
    echo "Cliente dado de baja correctamente.";
    $conexion = null;
    header("refresh:3;url=index.php"); // nos redirije en 3 seg al index
} else {
    header('Location:index.php');
}
?>