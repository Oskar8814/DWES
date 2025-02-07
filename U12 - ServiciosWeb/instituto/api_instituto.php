<?php
    require_once 'Alumno.php';
    require_once 'Alumno_Asignatura.php';
    require_once 'Asignatura.php';

    $metodo = $_SERVER['REQUEST_METHOD'];
    $codEstado=200;
    $mensaje = "OK"; 
    $alumnos =[];
    $asignaturas =[];

    if ($metodo=='GET') {
        if (isset($_REQUEST['grupo'])) {
            $alumnos = Alumno::getAlumnosByCurso($_REQUEST['grupo']);
        }elseif (isset($_REQUEST['nombre'])) {
            $alumnos = Alumno::getAlumnosByNombre($_REQUEST['nombre']);
        }elseif (isset($_REQUEST['matricula'])) {
            $asignaturas = Alumno_Asignatura::getAsignaturasByAlumno($_REQUEST['matricula']);
        }

        if (count($alumnos) == 0 && count($asignaturas)== 0) {
            $mensaje = "NO ENCONTRADO";
            $codEstado = 404;
            $devolver = [];
        }elseif (count($alumnos)!=0 ) {
            foreach ($alumnos as $alumno) {
                $devolver[]=[
                    'matricula'=>$alumno->getMatricula(),
                    'nombre'=>$alumno->getNombre(),
                    'apellidos'=>$alumno->getApellidos(),
                    'curso'=>$alumno->getCurso()
                ];
            }
        }elseif (count($asignaturas)!=0) {
            foreach ($asignaturas as $asignatura) {
                $devolver[]=[
                    'codigo'=>$asignatura->getCodigo(),
                    'nombre'=>$asignatura->getNombre()
                ];
            }
        }

    }elseif ($metodo=='POST') {
        $matriculaAlumno = $_REQUEST['matriculaAlumno'];
        $codAsignatura = $_REQUEST['codAsignatura'];
        $matriculado = false;
        $alumno = Alumno::getAlumnosById($matriculaAlumno);

        //Comprueba que el alumno exista
        if ($alumno) {    
            $asignaturas = Alumno_Asignatura::getAsignaturasByAlumno($matriculaAlumno);
            foreach ($asignaturas as $asignatura) {
                if ($asignatura->getCodigo() == $codAsignatura) {
                    $matriculado = true;
                }
            }
            
            //Comprueba que este matriculado
            if ($matriculado) {
                $mensaje = "CONFLICTO, ALUMNO YA MATRICULADO";
                $codEstado = 409;
            }else {
                $matriculacion = new Alumno_Asignatura($matriculaAlumno,$codAsignatura);
                $matriculacion->insert();
                $mensaje = "ALUMNO MATRICULADO CORRECTAMENTE";
                $codEstado=200;
            }
        }else {
            $mensaje = "CONFLICTO, ALUMNO INEXISTENTE";
            $codEstado = 409;
            
        }
    }elseif ($metodo=='DELETE') {
        parse_str(file_get_contents("php://input"),$parametros);
        $alumno = Alumno::getAlumnosById($parametros['matricula']);

        if ($alumno) {
            $alumno->delete();
            $mensaje="ALUMNO ELIMINADO CORRECTAMENTE";
            $codEstado = 200;
        }else {
            $mensaje="ALUMNO NO ENCONTRADO";
            $codEstado=404;
        }
    }elseif ($metodo=='PUT') {
        parse_str(file_get_contents("php://input"),$parametros);
        $alumno = Alumno::getAlumnosById($parametros['matricula']);
        
        if ($alumno) {
            $alumno->setCurso($parametros['curso']);
            $alumno->update();
            $mensaje="CURSO MODIFICADO CORRECTAMENTE";
            $codEstado=200;
        }else{
            $mensaje="ALUMNO NO ENCONTRADO";
            $codEstado=404;
        }
    }

    setCabecera($codEstado,$mensaje);  
    echo json_encode($devolver); 

    function setCabecera($codEstado, $mensaje) {   
        header("HTTP/1.1 $codEstado $mensaje");   
        header("Content-Type: application/json;charset=utf-8");   
    }


?>