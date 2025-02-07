<?php
require_once '../Model/Avion.php';

$data['avion']= Avion::getAvionesById($_REQUEST['eliminar']);
$imagen = $data['avion']->getImagen();
$rutaActual = "../View/".$imagen;

//ELiminar la imagen del servidor
if (file_exists($rutaActual)) {
    unlink($rutaActual);
}

//Eliminar el avion de la bd
$avionAux = new Avion ($_REQUEST['eliminar']);
$avionAux ->delete();

header("Location: ../Controller/administrarProductos.php");
?>