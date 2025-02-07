<?php
require_once '../Model/Alumno.php';
require_once '../Model/Alumno_Asignatura.php';

if (session_status() == PHP_SESSION_NONE) session_start();

if (isset($_REQUEST['codigo'])) {
    $_SESSION['asignatura'] = $_REQUEST['codigo'];
}

$data['alumnos']=Alumno_Asignatura::getAlumnosByAsignatura($_SESSION['asignatura']);
$asignaturaAux = Asignatura::getAsignaturasById($_SESSION['asignatura']);

include '../View/alumnosMatriculasdos_view.php';
?>