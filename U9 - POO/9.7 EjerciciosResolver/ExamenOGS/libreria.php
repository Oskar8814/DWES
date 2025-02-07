<?php
include_once 'Email.php';
if (session_status() == PHP_SESSION_NONE) session_start();


function usuariosFichero($ruta){
    $usuarios = [];

    $fp = fopen($ruta,"r");
    while (!feof($fp)) {
        $linea = fgets($fp);
        $linea = trim($linea);
        if ($linea != "") {
            $partes = explode(",",$linea);
            if (!in_array($partes[0],$usuarios)) {
                $usuarios []= $partes[0];
            }
            if (!in_array($partes[1],$usuarios)) {
                $usuarios []= $partes[1];
            }
        }
    }
    fclose($fp);
    // print_r($usuarios);
    return $usuarios;
}   

function añadirEmail($objetoEmail){
    $fp2 = fopen("emails.txt","a");
    // $objetoEmail = unserialize(base64_decode($objetoEmail));
    $linea = $objetoEmail->getEmisor().",".$objetoEmail->getReceptor().",". $objetoEmail->getFecha().",".$objetoEmail->getAsunto();
    fwrite($fp2,$linea.PHP_EOL);
    fclose($fp2);
}

function actualizarFichero(){
    $fp3 = fopen("emails.txt", "w");
    $emails = $_SESSION['emails'];
    foreach ($emails as $key => $value) {
        $value = unserialize(base64_decode($value));
        $linea = $value->getEmisor().",".$value->getReceptor().",". $value->getFecha().",".$value->getAsunto();
        fwrite($fp3,$linea.PHP_EOL);
    }
    fclose($fp3);
}

?>