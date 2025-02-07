<?php
include_once 'BombillaB.php';
if (session_status() == PHP_SESSION_NONE) session_start();

function guardar(){
    $fp = fopen("file/bombillas.txt","w");
    $total = count($_SESSION['bombillas']);
    $aux = 0;


    foreach ($_SESSION['bombillas'] as $key => $bombilla) {
        $bombillaObj = unserialize($bombilla);
        $cadena = $bombillaObj->getUbicacion()."-".$bombillaObj->getPotencia();
        $aux++;

        //Evita que la ultima linea tenga salto y asi genenrar una linea en blanco
        // if ($total>$aux) {
            fwrite($fp, $cadena . PHP_EOL);
        // }else {
        //     fwrite($fp,$cadena);
        // }
    }
    fclose($fp);
}


function cargar(){
    $fp2 = fopen("file/bombillas.txt", "r");
    $bombillas = [];
    while(!feof($fp2)){
        $linea = fgets($fp2);
        $linea = trim($linea); //Siempre antes de cualquier otra accion hacer que la linea no tenga espacios

        //Por si acaso la ultima linea del fichero es una linea vacia debido al salto de lina de la escritura.
        if($linea!=""){
            $partes = explode("-",$linea);
            $bombillas [] = serialize(new Bombilla($partes[1],$partes[0]));
        }
    }
    fclose($fp2);
    return $bombillas;
}
?>