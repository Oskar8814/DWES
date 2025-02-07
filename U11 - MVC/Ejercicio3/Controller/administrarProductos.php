<?php
session_start();
if (!$_SESSION['usuario']) {
    header('location: ../Controller/index.php');
}
if (isset($_REQUEST['salir'])) {
    unset($_SESSION['usuario']);
    unset($_SESSION['pass']);
}

require_once '../Model/Avion.php';
//Obtener los aviones
$data['aviones'] = Avion::getAviones();

include '../View/administrarProductos_view.php';
?>