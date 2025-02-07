<?php
include('funciones.php');

if (isset($_REQUEST['codigo'])) {
    $conexion = conexion();
    $consulta = $conexion->query("SELECT codigo FROM articulo WHERE codigo='$_REQUEST[codigo]'");

    if ($consulta->rowCount()>0) {
        ?>
        Ya existe un articulo con el codigo <?= $_REQUEST['codigo'] ?>
        Ingrese de nuevo el articulo con otro codigo <a href="index.php">Inicio</a>
        <?php
    }else {
        
        $insercion = "INSERT INTO articulo (codigo, descripcion, precioCompra, precioVenta, stock) VALUES
        ('$_REQUEST[codigo]','$_REQUEST[descripcion]','$_REQUEST[compra]', '$_REQUEST[venta]', '$_REQUEST[stock]')";

        $conexion ->exec($insercion);
        echo "Articulo dado de alta correctamente.";
        $conexion = null;
        header('refresh:2;url=index.php');
    }


}else {
    header('Location:index.php');
}
?>