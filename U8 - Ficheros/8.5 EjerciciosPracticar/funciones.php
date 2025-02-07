
<!--Una  función  (tipo  procedimiento,  no  hay  valor  devuelto)  denominada  leerContenidoFichero  que  reciba  como 
parámetro la ruta del fichero y muestre por pantalla el contenido de cada una de las líneas del fichero.  -->
<?php
function escribirTresNumeros($num,$fichero){
    $fp = fopen("file/".$fichero,"a");
    foreach ($num as $key => $numero) {
        fputs($fp,$numero.PHP_EOL);
    }
    fclose($fp); 
}

function obtenerSuma($fichero){
    $fp = fopen("file/".$fichero,"r");
    $suma = 0;
    while (!feof($fp)) {
        $suma +=(int) fgets($fp);
    }
    fclose($fp);
    return $suma;
}

function obtenerArrNum($fichero){
    $fp = fopen("file/".$fichero,"r");
    $num=[];
    while (!feof($fp)) {
        $num[]=fgets($fp);
    }

    fclose($fp);
    return $num;

}

function escribirNumerosMod($arrayValores, $modo) {
    if (strtolower($modo) =="sobreescribir") {
        $mod = "w";
    }elseif(strtolower($modo) == "ampliar"){
        $mod = "a";
    }

    $fp = fopen("file/datosEjercicio.txt","$mod");
    foreach ($arrayValores as $key => $value) {
        fwrite($fp,$value.PHP_EOL);
    }
    fclose($fp);
}

function leerContenidoFichero($fichero){
    $fp = fopen("file/".$fichero,"r");
    while (!feof($fp)) {
        $linea = fgets($fp);
        echo "$linea <br>";
    }
    fclose($fp);
}
?>