<!-- Realiza un programa que pida la temperatura media que ha hecho en cada mes de un determinado año 
y que muestre a continuación un diagrama de barras horizontales con esos datos.
Las barras del diagrama se pueden dibujar a base de la concatenación de una imagen. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .barra {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }
        .label {
            width: 100px;
            text-align: right;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <h2>Diagrama de barras con las temperaturas de cada mes</h2>
    <?php
        if (isset($_REQUEST['temperatura'])) {
            $temperaturas = $_REQUEST['temperatura'];
        }else{
            $temperaturas = [];
        }

        $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
        foreach ($temperaturas as $key => $temperatura) {
            echo "<div class='label'>{$meses[$key]}</div>";
            //$anchura = $temperatura * 10;  // Escalado de la barra
            echo "<img src='Captura.JPG' style='width: {$temperatura}px; height: 15px;' alt='Barra'>";
            echo "<span> {$temperatura}°C</span>";
            echo "</div>";
        }
    ?>
</body>
</html>