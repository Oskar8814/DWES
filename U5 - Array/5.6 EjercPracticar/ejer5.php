<!-- Realiza un programa que pida la temperatura media que ha hecho en cada mes de un determinado año 
y que muestre a continuación un diagrama de barras horizontales con esos datos.
Las barras del diagrama se pueden dibujar a base de la concatenación de una imagen. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Introduzca las temperaturas medias de cada mes:</h2>
    <form action="ejer5.2.php" method="post">
        <?php
        $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
        foreach ($meses as $key => $mes) {
            echo "$mes: <input type='number' name='temperatura[]' required><br>";
        }
        ?>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>