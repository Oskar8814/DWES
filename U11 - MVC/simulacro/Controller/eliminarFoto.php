<?php
require_once '../Model/Foto.php';
require_once '../Model/Like.php';
require_once '../Model/Usuario.php';
if (session_status() == PHP_SESSION_NONE) session_start();

if (isset($_REQUEST['idfoto'])) {
    $foto = Foto::getFotoById($_REQUEST['idfoto']);
    $like = new Like($_REQUEST['idfoto'],0);
    
    $foto->delete();
    $like->deleteByfoto();

    header('Location:../Controller/usuario.php');
}else {
    header('Location:../Controller/index.php');
}
?>