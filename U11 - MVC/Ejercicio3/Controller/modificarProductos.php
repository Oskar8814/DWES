<?php
require_once '../Model/Avion.php';

//Obtener el avion a modificar
$data['avion']=Avion::getAvionesById($_REQUEST['modificar']);

//Carga la vista del form para modificar el producto/avion.
include_once '../View/modificaProducto_view.php';
?>