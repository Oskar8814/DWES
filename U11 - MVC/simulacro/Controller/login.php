
<?php
require_once '../Model/Foto.php';
require_once '../Model/Like.php';
require_once '../Model/Usuario.php';
if (session_status() == PHP_SESSION_NONE) session_start();

$data['usuarios']= Usuario::getUsuarios();

include '../View/login_view.php';

if (isset($_REQUEST['acceso'])) {
    $user = Usuario::getUsuarioByName($_REQUEST['usuario']);
    
    if ($user) {
        $_SESSION['usuario'] = $_REQUEST['usuario'];
        header('Location:../Controller/index.php');
    }else {
        echo "Usuario no registrado";
    }
}

if (isset($_REQUEST['registro'])) {
    $usuario = new Usuario(0,$_REQUEST['usuario']);
    $usuario->insert();
    $_SESSION['usuario'] = $_REQUEST['usuario'];
    header('Location:../Controller/index.php');
}
?>