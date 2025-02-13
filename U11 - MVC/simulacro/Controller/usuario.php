<?php
require_once '../Model/Foto.php';
require_once '../Model/Like.php';
require_once '../Model/Usuario.php';
if (session_status() == PHP_SESSION_NONE) session_start();

if (isset($_REQUEST['cerrar'])) {
    unset($_SESSION['usuario']);
    header('Location:../Controller/index.php');
}

if (isset($_REQUEST['img'])) {
    $fileName = '';

    if (isset($_FILES['imagen_file']) && $_FILES['imagen_file']['error'] === UPLOAD_ERR_OK) {
        $destPath = '../View/imagen/' . $_FILES['imagen_file']['name'];
        move_uploaded_file($_FILES['imagen_file']['tmp_name'], $destPath);
        $fileName = $_FILES['imagen_file']['name']; // Guarda el nombre para el producto

    } else {
        echo "Error al subir el archivo.";
    }
    $usuarioAux = Usuario::getUsuarioByName($_SESSION['usuario']);
    $id = $usuarioAux->getId();
    $imagen = $fileName;
    $foto = new Foto(null,$imagen,$id);
    $foto->insert();
}

$usuarioAux = Usuario::getUsuarioByName($_SESSION['usuario']);
$data['fotos']=Foto::getFotosByUser($usuarioAux->getId());

include '../View/usuario_view.php';
?>