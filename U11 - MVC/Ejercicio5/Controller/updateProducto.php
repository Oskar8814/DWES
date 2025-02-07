<?php
require_once '../Model/Avion.php';
$imagen = $_REQUEST['imagenAnterior'];
if ($_FILES["imagen"]["name"]!="") {
    // sube la imagen al servidor
    move_uploaded_file($_FILES["imagen"]["tmp_name"], "../View/img/" . $_FILES["imagen"]["name"]);
    $imagen="img/".$_FILES["imagen"]["name"];
}

//Actualiza el avion en la bd
$avionAux = new Avion($_REQUEST['keymod'],$_REQUEST['nombre'],$_REQUEST['precio'],$imagen, $_REQUEST['descripcion'],$_REQUEST['stock']);
$avionAux->update();
header('Location:../Controller/administrarProductos.php');
?>