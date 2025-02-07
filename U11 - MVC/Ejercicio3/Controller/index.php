<?php
require_once '../Model/Avion.php';

if (session_status() == PHP_SESSION_NONE) session_start();

if (isset($_COOKIE['carrito'])) {
    $_SESSION['carrito'] = $_COOKIE['carrito'];
}

//Obtener los aviones
$data['aviones'] = Avion::getAviones();
//Cargar la vista
include '../View/index_view.php';


?>