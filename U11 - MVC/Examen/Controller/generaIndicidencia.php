<?php
require_once '../Model/Usuario.php';
require_once '../Model/Incidencia.php';
if (session_status() == PHP_SESSION_NONE) session_start();

if (isset($_REQUEST['nuevaIncidencia'])) {
    $fecha = date("d-m-Y",time());
    include '../View/nuevaIncidencia_view.php';
}else {
    header('Location:../Controller/index.php');
}
if (isset($_REQUEST['generaIncidencia'])) {
    $incidenciaAux = new Incidencia(0,$_REQUEST['descripcion'],$_SESSION['nombre'],"","PENDIENTE",null);
    $incidenciaAux->insert();
    header('Location:../Controller/index.php');
}
?>