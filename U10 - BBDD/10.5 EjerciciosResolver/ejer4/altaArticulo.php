<?php
if (isset($_REQUEST['codigo'])) {
    try {
        $conexion = new PDO("mysql:host=localhost;dbname=almacen;charset=utf8", "root", "");
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die("Error: " . $e->getMessage());
    }

    $insercion = "INSERT INTO articulo (codigo, descripcion, precioCompra, precioVenta, stock) VALUES
    ('$_REQUEST[codigo]','$_REQUEST[descripcion]','$_REQUEST[compra]', '$_REQUEST[venta]', '$_REQUEST[stock]')";

    $conexion ->exec($insercion);
    echo "Articulo dado de alta correctamente.";
    $conexion = null;
    header('refresh:2;url=index.php');
}else {
    header('Location:index.php');
}
?>