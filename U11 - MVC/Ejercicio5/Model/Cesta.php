<?php
require_once '../Model/TiendaDB.php';

class Cesta 
{
    private $id_cliente;
    private $cod_producto;
    private $cantidad;

    function __construct($id_cliente=0, $cod_producto=0,$cantidad=0){
        $this->id_cliente=$id_cliente;
        $this->cod_producto=$cod_producto;
        $this->cantidad=$cantidad;
    }

    // Getters

    public function getId_cliente()
    {
        return $this->id_cliente;
    }

    public function getCod_producto()
    {
        return $this->cod_producto;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function insert() {
        $conexion = TiendaDB::connectDB();
        $insercion = "INSERT INTO cesta (id_cliente, cod_producto, cantidad) VALUES ('$this->id_cliente', '$this->cod_producto', '$this->cantidad')";
        $conexion->exec($insercion);
        $conexion = null;
    }

    public function delete(){
        $conexion = TiendaDB::connectDB();
        $eliminar = "DELETE FROM cesta WHERE id_cliente='$this->id_cliente' AND cod_producto = '$this->cod_producto'";
        $conexion->exec($eliminar);
        $conexion = null;
    }
    public static function deleteAll($id){
        $conexion = TiendaDB::connectDB();
        $eliminar = "DELETE FROM cesta WHERE id_cliente='$id'";
        $conexion->exec($eliminar);
        $conexion = null;
    }

    public function update(){
        $conexion = TiendaDB::connectDB();
        $actualizar = "UPDATE cesta 
                    SET cantidad = '$this->cantidad' 
                    WHERE cod_producto = '$this->cod_producto' 
                    AND id_cliente = '$this->id_cliente'";
        $conexion->exec($actualizar);
        $conexion = null;
    }

    public static function getCestas(){
        $conexion = TiendaDB::connectDB();
        $seleccion = "SELECT id_cliente, cod_producto, cantidad FROM cesta";
        $consulta = $conexion->query($seleccion);

        $cestas = [];

        while ($cesta = $consulta->fetchObject()) {
            $cestas [] = new Cesta($cesta->id_cliente,$cesta->cod_producto,$cesta->cantidad);
        }

        return $cestas;
    }

    //Cesta de un usuario
    public static function getCestasById($codigo){
        $conexion = TiendaDB::connectDB();
        $seleccion = "SELECT id_cliente, cod_producto, cantidad FROM cesta WHERE id_cliente='$codigo'";
        $consulta = $conexion->query($seleccion);

        $cestas = [];

        while ($cesta = $consulta->fetchObject()) {
            $cestas [] = new Cesta($cesta->id_cliente,$cesta->cod_producto,$cesta->cantidad);
        }

        return $cestas;

    }

    public static function getProducto($id_cliente,$cod_producto){
        $conexion = TiendaDB::connectDB();
        $seleccion = "SELECT id_cliente, cod_producto, cantidad FROM cesta WHERE id_cliente='$id_cliente' AND cod_producto='$cod_producto' ";
        $consulta = $conexion->query($seleccion);

        if ($consulta->rowCount()>0) {
            $registro=$consulta->fetchObject();
            $producto = new Cesta($registro->id_cliente,$registro->cod_producto,$registro->cantidad);
            return $producto;
        }else {
            return null;
        }

    }
}

?>