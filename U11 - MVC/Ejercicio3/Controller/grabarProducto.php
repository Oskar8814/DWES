<?php
require_once '../Model/Avion.php';

 // sube la imagen al servidor
move_uploaded_file($_FILES["imagen"]["tmp_name"], "../View/img/" . $_FILES["imagen"]["name"]);

$imagen = "img/".$_FILES["imagen"]["name"];
//Insert en la bbdd el avion
$avionAux = new Avion("",$_REQUEST['nombre'],$_REQUEST['precio'],$imagen,$_REQUEST['descripcion'],$_REQUEST['stock']);
$avionAux->insert();
header("Location: ../Controller/index.php");
?>