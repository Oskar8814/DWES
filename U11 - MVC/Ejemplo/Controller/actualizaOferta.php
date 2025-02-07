<?php
require_once '../Model/Oferta.php'; 
$data['ofertas'] = Oferta::getOfertaById($_REQUEST['id']);

//Carga la vista del formulario de la alta de oferta
include '../View/actualizaOferta_view.php'; 
?>