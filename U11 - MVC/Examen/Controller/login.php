<?php
require_once '../Model/Usuario.php';
require_once '../Model/Incidencia.php';
if (session_status() == PHP_SESSION_NONE) session_start();
$usuarios = Usuario::getUsuarios();


if (isset($_REQUEST['usuario'])) {
    $usuario = Usuario::getUsuarioByNombre($_REQUEST['usuario']);
    if ($usuario) {
        $_SESSION['nombre']=$_REQUEST['usuario'];
        $_SESSION['perfil']=$usuario->getPerfil();
        header('Location:../Controller/index.php');
    }else {
        $usuarioAux = new Usuario(0, $_REQUEST['usuario'],"user");
        $usuarioAux->insert();
        $_SESSION['nombre']=$_REQUEST['usuario'];
        $_SESSION['perfil']="user";
        header('Location:../Controller/index.php');
        
    }
}


include '../View/login_view.php';
?>