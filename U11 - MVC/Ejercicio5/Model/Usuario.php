<?php
require_once 'TiendaDB.php';
class Usuario
{
    private $id;
    private $nombre;
    private $pass;
    private $rol;

    function __construct($id=0,$nombre="",$pass="", $rol=""){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->pass = $pass;
        $this->rol = $rol;
    }

    // Getters
    
    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getPass()
    {
        return $this->pass;
    }  

    public function getRol()
    {
        return $this->rol;
    }

    public function insert() {
        $conexion = TiendaDB::connectDB();
        $insercion = "INSERT INTO usuario (nombre, pass, rol) VALUES ('$this->nombre', '$this->pass', '$this->rol')";
        $conexion->exec($insercion);
        $conexion = null;
    }

    public function delete(){
        $conexion = TiendaDB::connectDB();
        $eliminar = "DELETE FROM usuario WHERE id='$this->id'";
        $conexion->exec($eliminar);
        $conexion = null;
    }

    public function update(){
        $conexion = TiendaDB::connectDB();
        $actualizar = "UPDATE usuario SET nombre='$this->nombre', pass='$this->pass', '$this->rol' WHERE id='$this->id'";
        $conexion->exec($actualizar);
        $conexion = null;
    }

    public static function getUsuarios(){
        $conexion = TiendaDB::connectDB();
        $seleccion = "SELECT id, nombre, pass, rol FROM usuario";
        $consulta =$conexion->query($seleccion);

        $usuarios = [];
        while ($usuario = $consulta->fetchObject()) {
            $usuarios [] = new Usuario($usuario->id, $usuario->nombre, $usuario->pass, $usuario->rol);
        }

        return $usuarios;
    }

    public static function getUsuarioById($id){
        $conexion = TiendaDB::connectDB();
        $seleccion = "SELECT id, nombre, pass, rol FROM usuario WHERE id='$id'";
        $consulta = $conexion->query($seleccion);

        if ($consulta->rowCount()>0) {
            $registro = $consulta->fetchObject();
            $usuario = new Usuario($registro->id,$registro->nombre, $registro->pass, $registro->rol);

            return $usuario;
        }else {
            return false;
        }
    }


}
?>