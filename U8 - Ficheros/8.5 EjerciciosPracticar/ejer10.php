<!-- Realiza un programa que sea capaz de ordenar alfabéticamente las palabras  contenidas en un fichero de texto. El 
nombre del  fichero  que  contiene  las  palabras se  debe  pasar  a  través de  un  formulario. El  nombre  del  fichero 
resultado debe ser el mismo que el original añadiendo la coletilla sort, por ejemplo palabras_sort.txt. Suponemos 
que cada palabra ocupa una línea. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="nombre">Nombre del fichero</label>
        <input type="text" name="fichero" id="">
        <input type="submit" value="Ordenar">
    </form>
    <?php
    function ordenar($fichero) {
        $fp = fopen("file/".$fichero, "r");
        $palabras = [];
        while (!feof($fp)) {
            $fila = fgets($fp);
            $palabras []= $fila;
        }
        fclose($fp);
        
        sort($palabras);

        $partes = explode(".",$fichero);
        $ficheroSalida = $partes[0]."_sort.txt";

        $fp2 = fopen("file/".$ficheroSalida, "a");
        foreach ($palabras as $key => $value) {
            fputs($fp2,$value);
        }

        fclose($fp2);

    }

    if (isset($_REQUEST['fichero'])) {
        ordenar($_REQUEST['fichero']);
    }
    ?>

    
</body>
</html>