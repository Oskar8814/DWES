<!-- Escribe un programa que pida 10 números por teclado y que luego muestre los números introducidos junto 
con las palabras “máximo” y “mínimo” al lado del máximo y del mínimo respectivamente. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if (isset($_REQUEST['n'])) { 
        $contadorNumeros = $_REQUEST['contadorNumeros']; 
        $cadena = $_REQUEST['cadena'] . " ". $_REQUEST['n']; 
    } else { 
        $contadorNumeros = 0; 
        $cadena = ""; 
    }
    
    if ($contadorNumeros==10){
        $cadena = substr($cadena, 1); // quita el primer espacio 
        $numeros = explode(" ",$cadena); //Array conn los numeros del formulario

        $min = PHP_INT_MAX;
        $max = PHP_INT_MIN;

        //Comprobar min-max
        foreach ($numeros as $value) {
            if ($value < $min) {
                $min = $value;
            }
            if ($value > $max) {
                $max = $value;
            }
        }

        //mostrarlo en una pagina
        foreach ($numeros as $value) {
            echo "<br> $value";
            if ($value == $min) {
                echo " MINIMO";
            }
            if ($value == $max) {
                echo " MAXIMO";
            }
        }
        
    }else{
        ?> 
        <form action="#" method="post"> 
            Introduzca un número: 
            <input type="number" name="n" autofocus> 
            <input type="hidden" name="contadorNumeros" value="<?= ++$contadorNumeros ?>"> 
            <input type="hidden" name="cadena" value="<?= $cadena ?>"> 
            <input type="submit" value="OK"> 
        </form> 
    <?php 
    }
    ?>
</body>
</html>