<?php
session_start();
if (isset($_REQUEST['eliminar'])) {
    $keyEliminar = $_REQUEST['eliminar'];
    unset($_SESSION['catalogo'][$keyEliminar]);
    setcookie("catalogo", base64_encode(serialize($_SESSION['catalogo'])),time()+3600);
    header('location:administrarProductos_ejer3.php');
}else {
    header('location:ejer3.php');
}
?>