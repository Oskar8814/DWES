<!-- Una función denominada obtenerArrNum (tipo función, devolverá un array de valores numéricos) que reciba una 
ruta de  archivo como  parámetro, lea los números existentes en cada línea del archivo, y devuelva un array cuyo 
índice 0  contendrá el  número  existente en  la  primera línea,  cuyo  índice  1 contendrá el  número existente en  la 
segunda línea y así sucesivamente (no usar la función file). -->
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
        <input type="submit" value="Obtener números">
    </form>

    <?php
    if (isset($_REQUEST['fichero'])) {
        $num = obtenerArrNum($_REQUEST['fichero']);

        foreach ($num as $key => $numero) {
            $key+=1;
            echo "El $key"."º número es $numero <br>";
        }
    }
    ?>
</body>
</html>