<?php
require_once '../Model/Articulo.php';
$data['articulo'] = Articulo::getArticuloById($_REQUEST['codigo']);

include '../View/modificaArticulo_view.php';
?>