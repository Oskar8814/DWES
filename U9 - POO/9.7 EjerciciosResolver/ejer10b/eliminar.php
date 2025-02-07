<?php
include_once 'BombillaB.php';
include_once 'funciones.php';

if (session_status() == PHP_SESSION_NONE) session_start();
if (!$_SESSION['bombillas']) {
    header('Location:index2.php');
}

if (isset($_REQUEST['eliminar'])) {
    //Eliminar una bombilla y reajustar el consumo general
    if (isset($_REQUEST['eliminar']) && isset($_REQUEST['indice'])) {
        $indice = $_REQUEST['indice'];

        if (isset($_SESSION['bombillas'][$indice])) {
            
            //Antes de eliminarla recalcular/reajustar la potencia Global.
            $bombilla = unserialize($_SESSION['bombillas'][$indice]);
            if ($bombilla->getEstado() && Bombilla::getinterruptorGen()) {
                $_SESSION['potenciaGlobal'] -= $bombilla->getPotencia();
            }

            unset($_SESSION['bombillas'][$indice]); //Elimina la bombilla (no es necesario unserializarla para eliminarla)

        }
    }
    //Elimina la bombilla dle txt
    guardar();
    header('Location:index2.php');
}
?>