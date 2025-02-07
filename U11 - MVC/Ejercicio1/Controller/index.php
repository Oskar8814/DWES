<?php
require_once '../Model/Articulo.php';
//Obtenemos los articulos
$data['articulos'] = Articulo::getArticulos();
//Cargar la vista
include '../View/index_view.php';
?>