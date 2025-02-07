<?php
require_once '../Model/Usuario.php';

if (isset($_REQUEST['nuevoUsuario']) && isset($_REQUEST['nuevaPass']) && isset($_REQUEST['nuevoRol'])) {
    $usuarioAux = new Usuario("",$_REQUEST['nuevoUsuario'],$_REQUEST['nuevaPass'],$_REQUEST['nuevoRol']);
    $usuarioAux->insert();
    header('Location:login.php');
}

include '../View/registroUsuario_view.php';
?>