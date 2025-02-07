<?php
require_once '../Model/Cesta.php';
if (session_status() == PHP_SESSION_NONE) session_start();

//Obtener la cesta del usuario
$data['cesta'] = Cesta::getCestasById($_SESSION['id']);

if ($data['cesta']!=null) {
    
    Cesta::deleteAll($_SESSION['id']);

    header('location:../Controller/mostrarCarrito.php');
}else {
    header('location:../Controller/index.php');
}
?>