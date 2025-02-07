<?php
if (session_status() == PHP_SESSION_NONE) session_start();
if (isset($_REQUEST['usuario'])  && isset($_REQUEST['pass'])){
    $_SESSION['usuario'] = $_REQUEST['usuario'] ;
    $_SESSION['pass'] = $_REQUEST['pass'] ;
    header("location:../Controller/administrarProductos.php");
}

if (isset($_SESSION['usuario'])) {
    header('location:../Controller/administrarProductos.php');  
}

include '../View/validacion_view.php';
?>