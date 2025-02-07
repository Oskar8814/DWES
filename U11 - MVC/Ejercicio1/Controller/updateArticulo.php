<?php
require_once '../Model/Articulo.php';
// $articulo = Articulo::getArticuloById($_REQUEST['codigo']);

//Actualizar el articulo en la bbdd
$articuloAux = new Articulo($_REQUEST['codigo'],$_REQUEST['titulo'],"",$_REQUEST['contenido']);
$articuloAux->update();
header('Location:../Controller/index.php');
?>