<?php
function generaFactura($carrito){
    $fp = fopen("file/factura.txt","w");
    // $carrito = $_SESSION['carrito'];
    $total = count($carrito); // Contar el total de articulos en el carrito para evitar un salto de linea al final del txt
    $contador = 0;
    $totalFactura = 0;
    
    foreach ($carrito as $key => $cantidad) {
        $contador++;

        $avion = Avion::getAvionesById($key);
        $precio = $avion->getPrecio()*$cantidad;
        $totalFactura+=$precio;

        $linea = $avion->getNombre() . "-" . $cantidad . "-" . $precio;
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
?>