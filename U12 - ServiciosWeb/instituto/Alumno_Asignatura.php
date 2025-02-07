<?php
require_once 'InstitutoDB.php';
require_once 'Asignatura.php';
require_once 'Alumno.php';

class Alumno_Asignatura{
    private $matricula;
    private $codigo_asignatura;

    public function __construct($matricula = "", $codigo_asignatura=0)
    {
        $this->matricula = $matricula;
        $this->codigo_asignatura = $codigo_asignatura;
    }

    public function getMatricula()
    {
        return $this->matricula;
    }

    public function getCodigo_asignatura()
    {
        return $this->codigo_asignatura;
    }

    public function insert(){
        $conexion = InstitutoDB::connectDB();
        $inserccion = "INSERT INTO alumno_asignatura (matricula, codigo_asignatura) VALUES('$this->matricula', '$this->codigo_asignatura')";
        $conexion->exec($inserccion);
        $conexion=null;
    }
    public function delete(){
        $conexion = InstitutoDB::connectDB();
        $eliminar = "DELETE FROM alumno_asignatura WHERE matricula='$this->matricula' AND codigo_asignatura='$this->codigo_asignatura'";
        $conexion->exec($eliminar);
        $conexion = null;
    }

    public function deleteAlumno(){
        $conexion = InstitutoDB::connectDB();
        $eliminar = "DELETE FROM alumno_asignatura WHERE matricula='$this->matricula'";
        $conexion->exec($eliminar);
        $conexion = null;
    }
    public function deleteAsignatura(){
        $conexion = InstitutoDB::connectDB();
        $eliminar = "DELETE FROM alumno_asignatura WHERE codigo_asignatura='$this->codigo_asignatura'";
        $conexion->exec($eliminar);
        $conexion = null;
    }

    public static function getAlumnosByAsignatura($codigo_asignatura){
        $conexion = InstitutoDB::connectDB();
        $seleccion = "SELECT matricula, codigo_asignatura FROM alumno_asignatura WHERE codigo_asignatura='$codigo_asignatura'";
        $consulta = $conexion->query($seleccion);

        $alumnos = [];

        while ($alumno = $consulta->fetchObject()) {
            $alumnos [] = Alumno::getAlumnosById($alumno->matricula);
        }
        return $alumnos;
    }

    public static function getAsignaturasByAlumno($matricula){
        $conexion = InstitutoDB::connectDB();
        $seleccion = "SELECT matricula, codigo_asignatura FROM alumno_asignatura WHERE matricula='$matricula'";
        $consulta = $conexion->query($seleccion);

        $asignaturas = [];

        while ($asignatura = $consulta->fetchObject()) {
            $asignaturas[]= Asignatura::getAsignaturasById($asignatura->codigo_asignatura);
        }
        return $asignaturas;
    }

    public static function getAsignaturasLibreByAlumno($matricula){
        $conexion = InstitutoDB::connectDB();
        $seleccion = "SELECT * FROM asignatura WHERE codigo NOT IN (SELECT codigo_asignatura FROM alumno_asignatura WHERE matricula='$matricula')";
        $consulta = $conexion->query($seleccion);
        
        $asignaturas =[];

        while ($asignatura = $consulta->fetchObject()) {
            $asignaturas[] = new Asignatura($asignatura->codigo,$asignatura->nombre);
        }
        return $asignaturas;
    }
}
?>