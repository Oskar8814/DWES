<?php
require_once 'InstitutoDB.php';
class Alumno 
{
    private $matricula;
    private $nombre;
    private $apellidos;
    private $curso;

    function __construct($matricula = "", $nombre = "", $apellidos="",$curso="")
    {
        $this->matricula = $matricula;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->curso = $curso;
    }

    public function getMatricula()
    {
        return $this->matricula;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function getCurso()
    {
        return $this->curso;
    }

public function insert() {
    $conexion = InstitutoDB::connectDB();
    $inserccion = "INSERT INTO alumno (matricula, nombre, apellidos, curso) VALUES('$this->matricula', '$this->nombre', '$this->apellidos','$this->curso')";
    $conexion->exec($inserccion);
    $conexion = null;
}
public function delete(){
    $conexion = InstitutoDB::connectDB();
    $eliminar = "DELETE FROM alumno WHERE matricula='$this->matricula'";
    $conexion->exec($eliminar);
    $conexion = null;
}
public function update(){
    $conexion = InstitutoDB::connectDB();
    $actualizar = "UPDATE alumno SET nombre='$this->nombre', apellidos='$this->apellidos',curso='$this->curso' WHERE matricula='$this->matricula'";
    $conexion->exec($actualizar);
    $conexion = null;
}

public static function getAlumnos(){
    $conexion = InstitutoDB::connectDB();
    $seleccion = "SELECT matricula, nombre, apellidos, curso FROM alumno";
    $consulta = $conexion -> query($seleccion);

    $alumnos=[];

    while ($alumno = $consulta->fetchObject()) {
        $alumnos[]= new Alumno($alumno->matricula, $alumno->nombre, $alumno->apellidos, $alumno->curso);
    }
    return $alumnos;
}

public static function getAlumnosById($matricula){
    $conexion = InstitutoDB::connectDB();
    $seleccion = "SELECT matricula, nombre, apellidos, curso FROM alumno WHERE matricula='$matricula'";
    $consulta = $conexion->query($seleccion);

    if ($consulta->rowCount()>0) {
        $registro = $consulta->fetchObject();
        $alumno = new Alumno ($registro->matricula, $registro->nombre, $registro->apellidos, $registro->curso);
        return $alumno;
    }else {
        return false;
    }
}
}
?>