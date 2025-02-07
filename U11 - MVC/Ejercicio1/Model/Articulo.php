<?php
require_once 'BlogDB.php';
class Articulo{
    private $codigo;
    private $titulo;
    private $fechaHora;
    private $contenido;

    function __construct($codigo=0, $titulo="", $fechaHora="", $contenido="") {
        $this->codigo = $codigo;
        $this->titulo = $titulo;
        $this->fechaHora = $fechaHora;
        $this->contenido = $contenido;
    }

    //Getters
    public function getCodigo()
    {
        return $this->codigo;
    }
    
    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getFechaHora()
    {
        return $this->fechaHora;
    }

    public function getContenido()
    {
        return $this->contenido;
    }

    public function insert() {
        $conexion = BlogDB::connectDB();
        $insercion = "INSERT INTO articulo (titulo, fecha, contenido) VALUES ('$this->titulo', now(), '$this->contenido')";
        $conexion->exec($insercion);
        $conexion = null;
    }
    
    public function delete(){
        $conexion = BlogDB::connectDB();
        $borrado = "DELETE FROM articulo WHERE codigo='$this->codigo'";
        $conexion->exec($borrado);
        $conexion = null;
    }

    public function update(){
        $conexion = BlogDB::connectDB();
        $actualiza = "UPDATE articulo SET titulo='$this->titulo',fecha=now(), contenido='$this->contenido'
        WHERE codigo='$this->codigo'";
        $conexion->exec($actualiza);
        $conexion = null;
    }

    public static function getArticulos(){
        $conexion = BlogDB::connectDB();
        $seleccion = "SELECT * FROM articulo ORDER BY fecha DESC";
        $consulta = $conexion->query($seleccion);

        $articulos=[];

        while ($articulo = $consulta->fetchObject()){
            $fechaStr = strtotime($articulo->fecha);
            $fechaFormat = date("d-m-Y - H:i:s", $fechaStr);
            $articulos[] = new Articulo($articulo->codigo, $articulo->titulo, $fechaFormat, $articulo->contenido);
        }
        return $articulos;
    }

    public static function getArticuloById($codigo){
        $conexion = BlogDB::connectDB();
        $seleccion = "SELECT * FROM articulo WHERE codigo='$codigo' ";
        $consulta = $conexion->query($seleccion);

        if ($consulta->rowCount()>0) {
            $registro = $consulta->fetchObject();
            $fechaStr = strtotime($registro->fecha);
            $fechaFormat = date("d-m-Y - H:i:s", $fechaStr);
            $articulo = new Articulo($registro->codigo, $registro->titulo, $fechaFormat , $registro->contenido);
            return $articulo;
        }else {
            return false;
        }
    }
}
?>