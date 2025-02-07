<?php
require_once '../Model/Articulo.php';
//Añadir el articulo a la BBDD
$articuloAux = new Articulo("",$_REQUEST['titulo'],"",$_REQUEST['contenido']);
$articuloAux->insert();
header('Location: ../Controller/index.php');
?>