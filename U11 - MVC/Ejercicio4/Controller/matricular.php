<?php
require_once '../Model/Alumno.php';
require_once '../Model/Alumno_Asignatura.php';
require_once '../Model/Asignatura.php';

if (session_status() == PHP_SESSION_NONE) session_start();

if (isset($_REQUEST['matricular']) || isset($_REQUEST['matricularAsignatura'])) {
    $asignaturasLibres = Alumno_Asignatura::getAsignaturasLibreByAlumno($_SESSION['alumno']->getMatricula());
    
    if (isset($_REQUEST['matricularAsignatura'])) {
        $alumno_asignaturaAux = new Alumno_Asignatura($_REQUEST['matricula'],$_REQUEST['codigoAsignatura']);
        $alumno_asignaturaAux->insert();

        header('Location:../Controller/asignaturasMatriculado.php');
    }
    // var_dump($asignaturasLibres);
    include '../View/matricular_view.php';

}else {
    header('location:../Controller/index.php');
}
?>