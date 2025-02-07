<?php
require_once '../Model/Alumno.php';
require_once '../Model/Alumno_Asignatura.php';

if (session_status() == PHP_SESSION_NONE) session_start();

if (isset($_REQUEST['verAsignaturas']) || $_SESSION['alumno']!=null) {
    if (!isset($_SESSION['alumno'])) {
        $_SESSION['alumno']=[];
    }

    if (isset($_REQUEST['verAsignaturas'])) {
        $alumno = Alumno::getAlumnosById($_REQUEST['verAsignaturas']);
        $_SESSION['alumno'] = $alumno;    
    }

    $asignaturas = Alumno_Asignatura::getAsignaturasByAlumno($_SESSION['alumno']->getMatricula());
    
    include '../View/asignaturasMatriculado_view.php';
}else {
    header('Location:../Controller/index.php');
}
?>