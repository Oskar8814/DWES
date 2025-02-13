<?php
require_once '../Model/Foto.php';
require_once '../Model/Like.php';
require_once '../Model/Usuario.php';
if (session_status() == PHP_SESSION_NONE) session_start();
if (isset($_REQUEST['id'])) {
    $foto = Foto::getFotoById($_REQUEST['id']);
    $id_user = $foto->getId_usuario();
    $usuario = Usuario::getUsuarioById($id_user);
    $usuarios = Like::getUsuariosByLike($_REQUEST['id']);
    include '../View/detalles_view.php';
}else {
    header('Location:..Controller/index.php');
}
?>