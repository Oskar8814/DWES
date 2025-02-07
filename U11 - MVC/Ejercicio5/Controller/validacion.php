<?php
//No se esta usando al controlarlo mediante el rol del usuario

if (session_status() == PHP_SESSION_NONE) session_start();
if (isset($_REQUEST['usuarioAdm'])  && isset($_REQUEST['passAdm'])){
    $_SESSION['usuarioAdm'] = $_REQUEST['usuarioAdm'] ;
    $_SESSION['passAdm'] = $_REQUEST['passAdm'] ;
    header("location:../Controller/administrarProductos.php");
}

if (isset($_SESSION['usuarioAdm'])) {
    header('location:../Controller/administrarProductos.php');  
}

include '../View/validacion_view.php';
?>