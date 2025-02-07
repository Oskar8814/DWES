<!-- Crear una página que permita generar un archivo de texto con las líneas que se vallan escribiendo a través de un 
formulario de manera indefinida, hasta que se pulse un botón terminar, y a continuación mostrar el contenido del 
fichero completo en la página.  -->
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
            <label for="">Introduce el texto:</label>
            <input type="text" name="texto" id="">
            <input type="submit" value="Añadir">
        </form>
        <form action="">
        <input type="submit" value="Terminar">
        <input type="hidden" name="fin" value="fin">
        </form>
    <?php
    function añadirTexto($text){
        $fp = fopen("file/text.txt", "a");
        fwrite($fp, $text.PHP_EOL);
        fclose($fp);
    }
    if (isset($_REQUEST['texto'])) {
        añadirTexto($_REQUEST['texto']);
    }
    if (isset($_REQUEST['fin'])) {
        $fichero = "text.txt";
        leerContenidoFichero($fichero);
    }
    ?>
</body>
</html>