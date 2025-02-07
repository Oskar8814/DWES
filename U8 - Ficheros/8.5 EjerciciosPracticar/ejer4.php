<!-- Crea código php donde a través de la función escribirTresNumeros escribas en el fichero los números 2, 8, 14. Luego, 
mediante la función obtenerSuma muestra por pantalla el resultado de sumar los números existentes en el archivo. 
Finalmente, mediante la función obtenerArrNum obtén el array, recórrelo y muestra cada uno de los elementos del 
array. -->
<?php
include('funciones.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $num = [2,8,14];
    ?>
    <form action="" method="post">
        <label for="fichero">Introduce el nombre:</label>
        <input type="text" name="fichero" id="">
        <input type="hidden" name="num" value="<?= serialize($num) ?>">
        <input type="submit" value="Enviar">
    </form>
    <?php
        if (isset($_REQUEST['fichero']) && isset($_REQUEST['num'])) {
            
            escribirTresNumeros(unserialize($_REQUEST['num']),$_REQUEST['fichero']);
            
            $suma = obtenerSuma($_REQUEST['fichero']);
            echo "La suma es $suma";
            echo "<br>";

            $numeros = obtenerArrNum($_REQUEST['fichero']);
            foreach ($numeros as $item) {
                echo "$item ";
            }
        }
    ?>
</body>
</html>