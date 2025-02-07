<?php
require_once '../Model/Articulo.php';
//Borrar el articulo de la BBDD
$articuloAux = new Articulo($_REQUEST['codigo'],"","","");
$articuloAux ->delete();
header('Location: ../Controller/index.php');
?>