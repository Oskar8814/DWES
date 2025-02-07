<?php
require_once '../Model/Asignatura.php';
require_once '../Model/Alumno_Asignatura.php';

if (isset($_REQUEST['eliminarAsignatura'])) {
    $asignaturaAux = Asignatura::getAsignaturasById($_REQUEST['eliminarAsignatura']);
    $asignaturaAlumnoAux = new Alumno_Asignatura("",$_REQUEST['eliminarAsignatura']);

    if ($asignaturaAux) {
        $asignaturaAux->delete();
        $asignaturaAlumnoAux->deleteAsignatura();
        header('Location:../Controller/index.php');
    }
}
?>