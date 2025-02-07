<?php
require_once 'InstitutoDB.php';
class Asignatura{
    private $codigo;
    private $nombre;

    function __construct($codigo=0, $nombre="")
    {
        $this->codigo = $codigo;
        $this->nombre= $nombre;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function insert() {
        $conexion = InstitutoDB::connectDB();
        $inserccion = "INSERT INTO asignatura (codigo, nombre ) VALUES('$this->codigo', '$this->nombre')";
        $conexion->exec($inserccion);
        $conexion = null;
    }
    public function delete(){
        $conexion = InstitutoDB::connectDB();
        $eliminar = "DELETE FROM asignatura WHERE codigo='$this->codigo'";
        $conexion->exec($eliminar);
        $conexion = null;
    }
    public function update(){
        $conexion = InstitutoDB::connectDB();
        $actualizar = "UPDATE asignatura SET codigo='$this->codigo', nombre='$this->nombre'";
        $conexion->exec($actualizar);
        $conexion = null;
    }

    public static function getAsignaturas(){
        $conexion = InstitutoDB::connectDB();
        $seleccion = "SELECT codigo, nombre FROM asignatura";
        $consulta = $conexion->query($seleccion);

        $asignaturas = [];

        while ($asignatura=$consulta->fetchObject()) {
            $asignaturas[]= new Asignatura($asignatura->codigo,$asignatura->nombre);
        }
        return $asignaturas;
    }

    public static function getAsignaturasById($codigo){
        $conexion = InstitutoDB::connectDB();
        $seleccion = "SELECT codigo, nombre FROM asignatura WHERE codigo='$codigo'";
        $consulta = $conexion->query($seleccion);
    
        if ($consulta->rowCount()>0) {
            $registro = $consulta->fetchObject();
            $asignatura = new Asignatura ($registro->codigo, $registro->nombre);
            return $asignatura;
        }else {
            return false;
        }
    }
}
?>