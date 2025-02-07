<!-- Una función denominada obtenerSuma (tipo función, devolverá un valor numérico) que reciba una ruta de archivo 
como parámetro, lea los números existentes en cada línea del archivo, y devuelva la suma de todos esos números. -->

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
    <form action="" method="post">
        <label for="fichero">Nombre del fichero</label>
        <input type="text" name="fichero" id=""><br>
        <input type="submit" value="Sumar">
    </form>
    <?php
    
    if (isset($_REQUEST['fichero'])) {
        $suma = obtenerSuma($_REQUEST['fichero']);
        echo "La suma es $suma";
    }
    ?>
</body>
</html>