<?php
require_once 'AvionesDB.php';

class Clientes{
    private $id;
    private $nombre;
    private $token;
    private $peticiones;

    function __construct($id=0, $nombre="", $token="", $peticiones=0)
    {
        $this->id=$id;
        $this->nombre=$nombre;
        $this->token=$token;
        $this->peticiones=$peticiones;
    }

    //GETTERS
    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function getPeticiones()
    {
        return $this->peticiones;
    }

    public static function getClientesById($id){
        $conexion = AvionesDB::connectDB();
        $seleccion = "SELECT id, nombre, token, peticiones FROM cliente WHERE id='$id'";
        $consulta = $conexion->query($seleccion);

        if ($consulta->rowCount()>0) {
            $registro = $consulta->fetchObject();
            $cliente = new Clientes($registro->id,$registro->nombre,$registro->token,$registro->peticiones);
            return $cliente;
        }else {
            return false;
        
        }
    }
    public static function getClientesByToken($token){
        $conexion = AvionesDB::connectDB();
        $seleccion = "SELECT * FROM clientes WHERE token='$token'";
        $consulta = $conexion->query($seleccion);

        if ($consulta->rowCount()>0) {
            $registro = $consulta->fetchObject();
            $cliente = new Clientes($registro->id,$registro->nombre,$registro->token,$registro->peticiones);
            return $cliente;
        }else {
            return false;
        }
    }

    public function updatePeticiones(){
        $conexion = AvionesDB::connectDB();
        $peticiones = $this->peticiones + 1;
        $actualizar = "UPDATE clientes SET peticiones='$peticiones' WHERE id='$this->id'";
        $conexion->exec($actualizar);
        $conexion = null;
    }
}
?>