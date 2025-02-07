<?php
require_once '../Model/Avion.php';

$data['avion'] = Avion::getAvionesById($_REQUEST['eliminar']);

include '../View/confirmacion_view.php'
?>