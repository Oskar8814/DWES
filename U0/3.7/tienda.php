<!-- Diseñar un desarrollo web simple con php que pida al usuario el precio de un producto en tres establecimientos distintos denominados “Tienda 1”, “Tienda 2” y “Tienda 3”. 
Una vez se introduzca esta información se debe calcular y mostrar el precio medio del producto en las tres tiendas. 
Mostrar en la página resultado, una tabla con un título, el precio en cada una de las tiendas, 
la media de los tres precios y la diferencia del precio de cada tienda con la media. Combina celdas para que quede visualmente agradable. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link rel="stylesheet" href="tienda.css">
</head>
<body>
    <h1 style="text-align: center;">Tabla de precios</h1>
    <?php
        $precio1 = $_REQUEST['precio1'];
        $precio2 = $_REQUEST['precio2'];
        $precio3 = $_REQUEST['precio3'];
        $media = round(($precio1 + $precio2 + $precio3)/3,2);
        $dif1 = $precio1 - $media;
        $dif2 = $precio2 - $media;
        $dif3 = $precio3 - $media;
    ?>
    <table>
        <tr>
            <th>Tienda 1</th>
            <th>Tienda 2</th>
            <th>Tienda 3</th>
        </tr>
        <tr>
            <td>Precio <?= $precio1 ?></td>
            <td>Precio <?= $precio2 ?></td>
            <td>Precio <?= $precio3 ?></td>
        </tr>
        <tr>
            <td colspan="3">Media <?= $media ?></td>
        </tr>
        <tr>
            <td>diferencia 1 <?= $dif1 ?></td>
            <td>diferencia 2 <?= $dif2 ?></td>
            <td>diferencia 3 <?= $dif3 ?></td>
        </tr>
    </table>
</body>
</html>