<!-- Define tres arrays de 20 números enteros cada una, con nombres “numero”, “cuadrado” y “cubo”. Carga 
el array “numero” con valores aleatorios entre 0 y 100. En el array “cuadrado” se deben almacenar los 
cuadrados de los valores que hay en el array “numero”. En el array “cubo” se deben almacenar los cubos 
de los valores que hay en “numero”. A continuación, muestra el contenido de los tres arrays dispuesto en 
tres columnas -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            border-spacing:10px;
        }
        td{
            font-size: 14px;
        }
        body{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
</head>
<body>
    <?php
        $numero=[];
        $cuadrado=[];
        $cubo=[];
        for ($i=0; $i <20 ; $i++) { 
            $numero[$i]= rand(0,100);
            $cuadrado[$i] = pow($numero[$i],2);
            $cubo[$i]=pow($numero[$i],3);
        }

        echo"<table>";
        echo "<tr><th>Numero</th><th>Cuadrado</th><th>Cubo</th></tr>";
        for ($i=0; $i < 20 ; $i++) { 
            echo "<tr><td>$numero[$i]</td><td>$cuadrado[$i]</td><td>$cubo[$i]</td></tr>";
        }
        echo "<tr><th>Numero</th><th>Cuadrado</th><th>Cubo</th></tr>";
        foreach ($numero as $i => $value) {
            echo "<tr><td>$numero[$i]</td><td>$cuadrado[$i]</td><td>$cubo[$i]</td></tr>";
        }
        echo"</table>";
    ?>
</body>
</html>