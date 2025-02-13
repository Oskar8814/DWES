<?php
require_once '../Model/Foto.php';
require_once '../Model/Like.php';
require_once '../Model/Usuario.php';
if (session_status() == PHP_SESSION_NONE) session_start();

$data['fotos']=Foto::getFotos();

if (isset($_REQUEST['darlike'])) {
    $like = new Like($_REQUEST['idfoto'],$_REQUEST['idusuario']);
    $like ->insert();
}

if (isset($_SESSION['usuario'])) {
    include '../View/index_view2.php';
}else {
    include '../View/index_view.php';
}

?>