<?php
require_once '../Model/Alumno.php';

if (isset($_REQUEST['matricula']) && isset($_REQUEST['nombre'])&& isset($_REQUEST['apellidos']) && isset($_REQUEST['curso'])) {
    $alumnoAux = new Alumno($_REQUEST['matricula'],$_REQUEST['nombre'],$_REQUEST['apellidos'],$_REQUEST['curso']);
    $alumnoAux2 = Alumno::getAlumnosById($_REQUEST['matricula']);//Alumno para comprobar que la matricula no esta repetida. En caso de no existir devuelve falso

    //Si alumnoAux2 no existe (es bool falso) guardar el alumno en la bd
    if (!$alumnoAux2) {
        $alumnoAux->insert();

        header('Location:../Controller/index.php');
    }else {
        header('Location:../Controller/nuevoAlumno.php');
    }
    
}

include '../View/nuevoAlumno_view.php'
?>