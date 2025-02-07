<?php
require_once ('../Model/Avion.php');
$data['avion'] = Avion::getAvionesById($_REQUEST['descripcion']);

include '../View/descripcion_view.php';
?>