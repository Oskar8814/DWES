<?php
require_once '../Model/Avion.php';
require_once '../Model/Usuario.php';
require_once '../Model/Cesta.php';
if (session_status() == PHP_SESSION_NONE) session_start();

//Cierra la sesion del usuario logeado
if (isset($_REQUEST['salir'])) {
    unset($_SESSION['usuario']);
    unset($_SESSION['id']);
    unset($_SESSION['rol']);
}

//Inicio de session de un usuario
$bandera=false;
if (isset($_REQUEST['usuario']) && isset($_REQUEST['pass'])) {
    //Obtener los datos de los usuarios
    $data['usuarios'] = Usuario::getUsuarios();

    //Comprobar que esta en la bd
    foreach ($data['usuarios'] as $usuario) {
        if ($usuario->getNombre()===$_REQUEST['usuario'] && $usuario->getPass()===$_REQUEST['pass']) {
            $bandera =true;

            //Guardar en session los datos del usuario logeado
            $_SESSION['usuario'] = $_REQUEST['usuario'];
            $_SESSION['id'] = $usuario->getId();
            $_SESSION['rol'] = $usuario->getRol();

            break; //Necesario para que no continue el for y cambie los datos de la ss
        }
    }
}

//Si el usuario esta en la BD muestra el index
if ($bandera || isset($_SESSION['usuario'])) {
    //Obtener los aviones y la cesta
    $data['aviones'] = Avion::getAviones();
    $data['cesta']=Cesta::getCestasById($_SESSION['id']);
    //Cargar la vista
    include '../View/index_view.php';
}else {
    header('Location:login.php');
}

?>