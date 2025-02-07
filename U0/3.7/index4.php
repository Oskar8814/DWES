<!-- Diseñar un desarrollo web simple con php que pida al usuario el precio de un producto en tres establecimientos distintos denominados “Tienda 1”, “Tienda 2” y “Tienda 3”. 
Una vez se introduzca esta información se debe calcular y mostrar el precio medio del producto en las tres tiendas. 
Mostrar en la página resultado, una tabla con un título, el precio en cada una de las tiendas, 
la media de los tres precios y la diferencia del precio de cada tienda con la media. Combina celdas para que quede visualmente agradable. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form action="tienda.php" method="post">
        <fieldset>
            <legend>Tienda 1</legend>
            <label for="precio1">Precio del producto</label>
            <input type="number" name="precio1" id="precio1" step="0.01">
        </fieldset>
        <fieldset>
            <legend>Tienda 2</legend>
            <label for="precio2">Precio del producto</label>
            <input type="number" name="precio2" id="precio2" step="0.01">
        </fieldset>
        <fieldset>
            <legend>Tienda 3</legend>
            <label for="precio3">Precio del producto</label>
            <input type="number" name="precio3" id="precio3" step="0.01">
        </fieldset><br><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>