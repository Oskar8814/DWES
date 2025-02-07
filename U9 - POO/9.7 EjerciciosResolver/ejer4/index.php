<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include_once 'Factura.php';
    $factura = new Factura(date("d-m-Y",time()));
    
    $factura->añadeProducto("Madera", 25, 2);
    $factura->añadeProducto("Clavos", 1, 10);
    $factura->setEstado("pagada");
    $facturaHtml = $factura->imprimeFactura();

    echo $facturaHtml;
?>
</body>
</html>