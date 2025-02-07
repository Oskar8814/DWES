<!-- Realiza un programa que diga cuántas ocurrencias de una palabra hay en un fichero. Tanto el nombre del fichero 
como la palabra se deben pasar como argumentos en la línea de comandos. -->

<?php
function cuentaOcurrencias($fichero, $palabra) {
    $fp = fopen("file/".$fichero,"r");
    $palabras = [];
    $aux = 1 ;
    while (!feof($fp)) {
        $linea = fgets($fp);
        $palabrasLinea = explode(" ", $linea);
        foreach ($palabrasLinea as $key => $value) {
            $palabras[]= $value;
        }
    }
    foreach ($palabras as $key => $value) {
        if ($value == $palabra) {
            $aux++;
        }
    }
    return $aux;
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
        <label for="">Nombre del fichero:</label>
        <input type="text" name="fichero">
        <label for="">Palabra a buscar:</label>
        <input type="text" name="palabra" id="">
        <input type="submit" value="Enviar">
    </form>

    <?php
        if (isset($_REQUEST['fichero']) && isset($_REQUEST['palabra'])) {
            $cantidad = cuentaOcurrencias($_REQUEST['fichero'], $_REQUEST['palabra']);
            echo "La cantidad de palabras es $cantidad";
        }
    ?>
</body>
</html>
