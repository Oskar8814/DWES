<?php
require_once '../Model/Asignatura.php';
if (isset($_REQUEST['nombreAsignatura'])) {
    $asignaturaAux = new Asignatura(0, $_REQUEST['nombreAsignatura']);
    $asignaturaAux->insert();
    header('Location: ../Controller/asignaturas.php');
}

include '../View/nuevaAsignatura_view.php';
?>