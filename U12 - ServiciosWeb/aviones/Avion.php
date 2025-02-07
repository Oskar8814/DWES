<?php
require_once 'AvionesDB.php';
class Avion {
    private $codigo;
    private $nombre;
    private $precio;
    private $imagen;


    function __construct($codigo = 0, $nombre="" , $precio=0 , $imagen=""  ){
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->imagen = $imagen;
    }

    //GETERS
    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getPrecio()
    {
        return $this->precio;
    }
    

    public function getImagen()
    {
        return $this->imagen;
    }


    public function insert() {
        $conexion = AvionesDB::connectDB();
        $insercion = "INSERT INTO avion (nombre, precio, imagen) VALUES ('$this->nombre', '$this->precio', '$this->imagen')";
        $conexion->exec($insercion);
        $conexion = null;
    }

    public function delete(){
        $conexion = AvionesDB::connectDB();
        $eliminar = "DELETE FROM avion WHERE codigo='$this->codigo'";
        $conexion->exec($eliminar);
        $conexion = null;
    }

    public function update(){
        $conexion = AvionesDB::connectDB();
        $actualizar = "UPDATE avion SET nombre='$this->nombre', precio='$this->precio', imagen='$this->imagen' WHERE codigo='$this->codigo'";
        $conexion->exec($actualizar);
        $conexion = null;
    }

    public static function getAviones(){
        $conexion = AvionesDB::connectDB();
        $seleccion = "SELECT codigo, nombre, precio, imagen FROM avion";
        $consulta = $conexion->query($seleccion);

        $aviones = [];

        while ($avion = $consulta->fetchObject()) {
            $aviones [] = new Avion($avion->codigo,$avion->nombre,$avion->precio, $avion->imagen );
        }

        return $aviones;
    }

    public static function getAvionesById($codigo){
        $conexion = AvionesDB::connectDB();
        $seleccion = "SELECT codigo,nombre, precio, imagen FROM avion WHERE codigo='$codigo'";
        $consulta = $conexion->query($seleccion);

        if ($consulta->rowCount()>0) {
            $registro = $consulta->fetchObject();
            $avion = new Avion($registro->codigo,$registro->nombre, $registro->precio,  $registro->imagen);
            return $avion;
        }else {
            return false;
        }

    }

    public static function getAvionesByNombre($nombre){
        $avionesAux = Avion::getAviones();
        $aviones =[];
        foreach ($avionesAux as $avion) {
            if (str_contains(strtolower($avion->nombre),strtolower($nombre))) {
                $aviones[]=$avion;
            }
        }

        return $aviones;
    }

    public static function getAvionesByPrecio($min,$max){
        $avionesAux = Avion::getAviones();
        $aviones=[];
        foreach ($avionesAux as $avion) {
            if ($avion->precio<=$max && $avion->precio>=$min) {
                $aviones[]=$avion;
            }
        }
        return $aviones;
    }

    // public static function reponer($cantidad, $codigo){
    //     $conexion = TiendaDB::connectDB();
    //     $avion = Avion::getAvionesById($codigo);
    //     $stock = $avion->stock;
    //     $nuevoStock = $stock + $cantidad;

    //     $reponer = "UPDATE avion SET stock='$nuevoStock' WHERE codigo='$codigo'";
    //     $conexion->exec($reponer);
    //     $conexion=null;
    // }

    // public static function vender($cantidad, $codigo){
    //     $conexion = AvionesDB::connectDB();
    //     $avion = Avion::getAvionesById($codigo);
    //     $stock = $avion->stock;

    //     if ($cantidad<=$stock) {
    //         $nuevoStock = $stock - $cantidad;
    //         $venta = "UPDATE avion SET stock='$nuevoStock' WHERE codigo='$codigo'";
    //         $conexion->exec($venta);
    //         $conexion=null;
    //     }else{
    //         return false;
    //     }
    // }
}

?>