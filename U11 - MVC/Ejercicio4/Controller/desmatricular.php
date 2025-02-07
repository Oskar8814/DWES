<?php
require_once '../Model/Alumno_Asignatura.php';

if (isset($_REQUEST['codigoAsignatura']) && isset($_REQUEST['matricula'])) {
    $alumno_asignaturaAux = new Alumno_Asignatura($_REQUEST['matricula'],$_REQUEST['codigoAsignatura']);
    $alumno_asignaturaAux->delete();
    header('location:'.getenv('HTTP_REFERER'));//Vuelve a la pagina anterior
} else {
    header('Location:../Controller/index.php');
}

?>