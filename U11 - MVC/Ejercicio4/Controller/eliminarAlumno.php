<?php
require_once '../Model/Alumno.php';
require_once '../Model/Alumno_Asignatura.php';

if (isset($_REQUEST['eliminar'])) {
    $alumnoAux = Alumno::getAlumnosById($_REQUEST['eliminar']);
    $alumnoAsignaturaAux = new Alumno_Asignatura($_REQUEST['eliminar'],0);

    if ($alumnoAux) {
        $alumnoAux ->delete(); //Elimina el alumno de la bd 
        $alumnoAsignaturaAux->deleteAlumno(); // Elimina las asignaturas en las que estaba el alumno matriculado de la bd
        header('Location:../Controller/index.php');
    }
}
?>