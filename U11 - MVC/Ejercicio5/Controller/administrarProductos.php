<?php
session_start();
if (!$_SESSION['rol']=="admin") {
    header('location: ../Controller/index.php');
}

// if (isset($_REQUEST['salir'])) {
//     unset($_SESSION['usuarioAdm']);
//     unset($_SESSION['passAdm']);
// }

require_once '../Model/Avion.php';
//Obtener los aviones
$data['aviones'] = Avion::getAviones();

include '../View/administrarProductos_view.php';
?>