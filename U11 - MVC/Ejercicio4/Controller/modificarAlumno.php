<?php
require_once '../Model/Alumno.php';

if (isset($_REQUEST['modificar'])) {
    
    $alumnoAux=Alumno::getAlumnosById($_REQUEST['modificar']);

    require '../View/modificarAlumno_view.php';

}else {
    header('Location:../Controller/index.php');
}
?>