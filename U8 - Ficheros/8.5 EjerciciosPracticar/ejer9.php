<!-- Escribe un programa que guarde en un fichero el contenido de otros dos  ficheros, de tal forma que en el  fichero 
resultante aparezcan las líneas de los primeros dos ficheros mezcladas, es decir, la primera línea será del primer  
fichero, la segunda será del segundo fichero, la tercera será la siguiente del  primer fichero, etc. Los nombres de los 
dos ficheros origen y el  nombre del fichero  destino se deben  pasar a través de  un formulario. Hay que tener en 
cuenta que los ficheros de donde se van cogiendo las líneas pueden tener tamaños diferentes. -->
<?php
function juntaArchivos($fichero1,$fichero2, $ficheroMerg) {
    $fp = fopen("file/".$fichero1,"r");
    $fp2 = fopen("file/".$fichero2,"r");
    $fp3 = fopen("file/".$ficheroMerg,"w");

    while (!feof($fp) || !feof($fp2)) {
        $linea1 = fgets($fp);
        fwrite($fp3,$linea1);
        $linea2 = fgets($fp2);
        fwrite($fp3,$linea2);
    }
    
    while (!feof($fp)) {
        $linea = fgets($fp);
        fwrite($fp3,$linea.PHP_EOL);
    }
    while (!feof($fp2)) {
        $linea = fgets($fp2);
        fwrite($fp3,$linea.PHP_EOL);
    }
    
    fclose($fp);
    fclose($fp2);
    fclose($fp3);
    
}
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
        <label for="">Fichero 1</label>
        <input type="text" name="fichero1" id="">
        <label for="">Fichero 2</label>
        <input type="text" name="fichero2" id="">
        <label for="">Fichero Merge</label>
        <input type="text" name="ficheroMerge" id="">
        <input type="submit" value="Juntar">
    </form>
</body>

<?php
if (isset($_REQUEST['fichero1']) && isset($_REQUEST['fichero2'])&& isset($_REQUEST['ficheroMerge'])) {
    juntaArchivos($_REQUEST['fichero1'],$_REQUEST['fichero2'],$_REQUEST['ficheroMerge']);
}
?>
</html>