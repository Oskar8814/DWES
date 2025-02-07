<!-- Escribe  un  programa  que  genere  100  números  aleatorios  del  0  al  20  y  que  los  muestre  por  pantalla 
separados por espacios. El programa pedirá entonces por teclado dos valores y a continuación cambiará 
todas las ocurrencias del primer valor por el segundo en la lista generada anteriormente. Los números que 
se han cambiado deben aparecer resaltados de un color diferente. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        li{
            list-style: none;
            display: inline;
        }
    </style>
</head>
<body>
    
    <?php
    $numerosAleatorios = [];
    for ($i=0; $i <100 ; $i++) { 
        $valor = rand(0,20);
        $numerosAleatorios[$i] = $valor;
    }

    //Muestra el listado de 100 aleatorios separados por un espacio
    foreach ($numerosAleatorios as $value) {
        echo "$value ";
    }

    ?>
    <!-- Solicitar dos valores mediante un formulario -->
        <form action="#" method="post">
            <h3>Introduce dos valores</h3>
            <label for="n1">Valor 1</label>
            <input type="number" name="n1">
            <label for="n2">Valor 2</label>
            <input type="number" name="n2">
            <input type="submit" value="Enviar">
        </form>
    <?php
    //recoger los dos valores en variables
    if (isset($_REQUEST['n1'])&&isset($_REQUEST['n2'])) {
        $valor1 = $_REQUEST['n1'];
        $valor2 = $_REQUEST['n2'];
    }else{
        $valor1 = 0;
        $valor2 = 0;
    }
    
    //Mostrar los valores en una lista cambiando el valor1 por el valor2
    echo "<ul>";
    for ($i=0; $i < count($numerosAleatorios) ; $i++) { 
        if ($numerosAleatorios[$i]==$valor1){
            ?>
            <li style="color: red;"><?= $valor2 ?></li>
            <?php
        }else {
            ?>
            <li><?= $numerosAleatorios[$i] ?></li>
            <?php
        }
    }
    echo "</ul>";
    ?>
</body>
</html>