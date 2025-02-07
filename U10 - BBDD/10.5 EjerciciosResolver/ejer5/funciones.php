<?php
function generaFactura(){
    $fp = fopen("file/factura.txt","w");
    $carrito = $_SESSION['carrito'];
    $total = count($carrito); // Contar el total de articulos en el carrito para evitar un salto de linea al final del txt
    $contador = 0;
    $totalFactura = 0;
    
    foreach ($_SESSION['carrito'] as $key => $cantidad) {
        $contador++;
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=almacen;charset=utf8", "root", "");
            // echo "Se ha establecido una conexión con el servidor de bases de datos.";
        } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die("Error: " . $e->getMessage());
        }
        $consulta = $conexion->query("SELECT precioVenta FROM articulo WHERE codigo='$key'");
        $articulo = $consulta->fetchObject();
        $conexion = null;
        $precioIva = $articulo->precioVenta * $cantidad + (($articulo->precioVenta*$cantidad)*0.21);
        $totalFactura += $precioIva;
        $linea = $key . "-" . $cantidad . "-" . $precioIva;
        $linea1 = "Codigo - Cantidad - Precio";
        $linea2 = "Total de la factura $totalFactura euros";
        
        if ($contador == 1) {
            fwrite($fp,$linea1 . PHP_EOL);
        }
        // Agregar salto de línea sólo si no es la última línea
        if ($contador < $total) {
            fwrite($fp, $linea . PHP_EOL);
        } else {
            fwrite($fp, $linea. PHP_EOL);
            fwrite($fp, $linea2);
        }
    }
    fclose($fp);
    return  "<p>Factura generada correctamente</p> <a href='file/factura.txt' target='_blank'>Consultar la Factura</a></p>"; // target='_blank' En enlace se abre en una pestaña diferente
}
function conexion(){
    try {
        $conexion = new PDO("mysql:host=localhost;dbname=almacen;charset=utf8", "root", "");
        // echo "Se ha establecido una conexión con el servidor de bases de datos.";
    } catch (PDOException $e) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die("Error: " . $e->getMessage());
    }
    return $conexion;
}
?>