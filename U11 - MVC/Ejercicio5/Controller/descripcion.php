<?php
require_once ('../Model/Avion.php');
if (session_status() == PHP_SESSION_NONE) session_start();

$data['avion'] = Avion::getAvionesById($_REQUEST['descripcion']);

include '../View/descripcion_view.php';
?>