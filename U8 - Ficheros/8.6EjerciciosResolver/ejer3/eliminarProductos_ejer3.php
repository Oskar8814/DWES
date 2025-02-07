<?php
session_start();
include('funciones.php');
if (isset($_REQUEST['eliminar'])) {
    $keyEliminar = $_REQUEST['eliminar'];
    unlink($_SESSION['catalogo'][$keyEliminar]["imagen"]);//Elimina la imagen del avión
    unset($_SESSION['catalogo'][$keyEliminar]);
    renovarCatalogo();

    header('location:administrarProductos_ejer3.php');
}else {
    header('location:ejer3.php');
}
?>