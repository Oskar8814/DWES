<?php
require_once '../Model/Alumno.php';
if (isset($_REQUEST['matricula']) && isset($_REQUEST['nombreMod']) && isset($_REQUEST['apellidosMod']) && isset($_REQUEST['cursoMod'])) {
    $alumnoAux = new Alumno($_REQUEST['matricula'],$_REQUEST['nombreMod'],$_REQUEST['apellidosMod'],$_REQUEST['cursoMod']);
    $alumnoAux->update();
    header('Location:../Controller/index.php');
}else {
    header('Location:../Controller/index.php');
}
?>