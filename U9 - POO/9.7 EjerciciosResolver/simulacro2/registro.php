<?php
if (session_status() == PHP_SESSION_NONE) session_start();

if (isset($_REQUEST['usuarioRegistro']) && isset($_REQUEST['contraseñaRegistro'])) {

    $rutaArchivo = $_REQUEST['usuarioRegistro']. ".rsv";
    if (!file_exists($rutaArchivo)) {
        $fp = fopen($rutaArchivo,"w");
        $contraseña = $_REQUEST['contraseñaRegistro'];
        fwrite($fp, $contraseña.PHP_EOL);
        fclose($fp);

        header('Location:login.php');
    }
}
?>