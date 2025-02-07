<?php
require_once 'TiendaDB.php';
class Avion {
    private $codigo;
    private $nombre;
    private $precio;
    private $imagen;
    private $descripcion;
    private $stock;

    function __construct($codigo = 0, $nombre="" , $precio=0 , $imagen="" , $descripcion="" , $stock=0 ){
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->imagen = $imagen;
        $this->descripcion = $descripcion;
        $this->stock = $stock;
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

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function insert() {
        $conexion = TiendaDB::connectDB();
        $insercion = "INSERT INTO avion (nombre, precio, imagen, descripcion, stock) VALUES ('$this->nombre', '$this->precio', '$this->imagen','$this->descripcion','$this->stock')";
        $conexion->exec($insercion);
        $conexion = null;
    }

    public function delete(){
        $conexion = TiendaDB::connectDB();
        $eliminar = "DELETE FROM avion WHERE codigo='$this->codigo'";
        $conexion->exec($eliminar);
        $conexion = null;
    }

    public function update(){
        $conexion = TiendaDB::connectDB();
        $actualizar = "UPDATE avion SET nombre='$this->nombre', precio='$this->precio', imagen='$this->imagen', descripcion='$this->descripcion', stock='$this->stock' WHERE codigo='$this->codigo'";
        $conexion->exec($actualizar);
        $conexion = null;
    }

    public static function getAviones(){
        $conexion = TiendaDB::connectDB();
        $seleccion = "SELECT codigo, nombre, precio, imagen, descripcion, stock FROM avion";
        $consulta = $conexion->query($seleccion);

        $aviones = [];

        while ($avion = $consulta->fetchObject()) {
            $aviones [] = new Avion($avion->codigo,$avion->nombre,$avion->precio, $avion->imagen, $avion->descripcion,$avion->stock);
        }

        return $aviones;
    }

    public static function getAvionesById($codigo){
        $conexion = TiendaDB::connectDB();
        $seleccion = "SELECT codigo,nombre, precio, imagen, descripcion, stock FROM avion WHERE codigo='$codigo'";
        $consulta = $conexion->query($seleccion);

        if ($consulta->rowCount()>0) {
            $registro = $consulta->fetchObject();
            $avion = new Avion($registro->codigo,$registro->nombre, $registro->precio,  $registro->imagen, $registro->descripcion, $registro->stock);
            return $avion;
        }else {
            return false;
        }

    }

    public static function reponer($cantidad, $codigo){
        $conexion = TiendaDB::connectDB();
        $avion = Avion::getAvionesById($codigo);
        $stock = $avion->stock;
        $nuevoStock = $stock + $cantidad;

        $reponer = "UPDATE avion SET stock='$nuevoStock' WHERE codigo='$codigo'";
        $conexion->exec($reponer);
        $conexion=null;
    }

    public static function vender($cantidad, $codigo){
        $conexion = TiendaDB::connectDB();
        $avion = Avion::getAvionesById($codigo);
        $stock = $avion->stock;

        if ($cantidad<=$stock) {
            $nuevoStock = $stock - $cantidad;
            $venta = "UPDATE avion SET stock='$nuevoStock' WHERE codigo='$codigo'";
            $conexion->exec($venta);
            $conexion=null;
        }else{
            return false;
        }
    }
}

?>