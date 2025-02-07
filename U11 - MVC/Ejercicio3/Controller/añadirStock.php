<?php
require_once '../Model/Avion.php';

$data['avion'] = Avion::getAvionesById($_REQUEST['restock']);

if (isset($_REQUEST['stock'])) {
    Avion::reponer($_REQUEST['stock'],$data['avion']->getCodigo());
    header('Location:../Controller/index.php');
}

include '../View/añadirStock_view.php';
?>