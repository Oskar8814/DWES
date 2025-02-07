<!-- Escribe un programa capaz de quitar las etiquetas html (<etiqueta>) de un documento web. Por ejemplo como en 
esta línea: <h1>Título</h1> -> Titulo 
Crea un fichero con mismo nombre y la coletilla “Sin” al final, que contiene el  contenido del documento original 
pero sin etiquetas html. -->

<?php
function quitaEtiquetas($fichero) {
    $fp = fopen("file/".$fichero,"r");
    
    $partes = explode(".",$fichero);
    $ficheroSalida = $partes[0]."_sin.txt";
    
    $fp2 = fopen("file/".$ficheroSalida,"w");

    while (!feof($fp)) {
        $linea = fgets($fp);
        $comienzaEtiqueta = false;
        $lineaSinEtiqueta = "";

        for ($i=0; $i < strlen($linea) ; $i++) { 
            $caracter = $linea[$i];
            if ($caracter === '<') {
                $comienzaEtiqueta = true;
            }elseif ($caracter === '>'){
                $comienzaEtiqueta = false;
            }elseif(!$comienzaEtiqueta){
                $lineaSinEtiqueta .= $caracter;
            }
        }

        fwrite($fp2,$lineaSinEtiqueta);
    }
    fclose($fp);
    fclose($fp2);
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
        <label for="">Nombre del Fichero</label>
        <input type="text" name="fichero" id="">
        <input type="submit" value="Enviar">
    </form>
</body>

<?php
if (isset($_REQUEST['fichero'])) {
    quitaEtiquetas($_REQUEST['fichero']);

    $partes = explode(".",$_REQUEST['fichero']);
    $ficheroSalida = $partes[0]."_sin.txt";
    header('location:file/'.$ficheroSalida);
}
?>
</html>