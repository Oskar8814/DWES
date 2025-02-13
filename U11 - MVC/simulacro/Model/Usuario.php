<?php
require_once 'FotografiasDB.php';
class Usuario {
	private $id;
	private $nombre;

	function __construct($id=0, $nombre="") {
		$this->id = $id;	
		$this->nombre = $nombre;
	}

	public function insert() {
		$conexion = FotografiasDB::connectDB();
		$insercion = "INSERT INTO usuarios VALUES (null, '$this->nombre')";
		$conexion->exec($insercion);
	}
	public function delete() {
		$conexion = FotografiasDB::connectDB();
		$borrado = "DELETE FROM usuarios WHERE id=$this->id";
		$conexion->exec($borrado);
	}
	public function update() {
		$conexion = FotografiasDB::connectDB();
		$actualiza = "UPDATE usuarios SET nombre='$this->nombre' WHERE id=$this->id";
		$conexion->exec($actualiza);
	}
	public static function getUsuarios() {
		$conexion = FotografiasDB::connectDB();
		$seleccion = "SELECT * FROM usuarios ORDER BY nombre";
		$consulta = $conexion->query($seleccion);
		$usuarios = [];
		while ($registro = $consulta->fetchObject()) {
			$usuarios[] = new Usuario($registro->id, $registro->nombre);
		}
		return $usuarios;
	}

	public static function getUsuarioById($id){
		$conexion = FotografiasDB::connectDB();
		$seleccion = "SELECT * FROM usuarios WHERE id='$id'";
		$consulta = $conexion->query($seleccion);
		if ($consulta->rowCount()>0) {
			$registro = $consulta->fetchObject();
			$usuario = new Usuario($registro->id,$registro->nombre);
			return $usuario;
		}else {
			return false;
		}
	}

	public static function compruebaUsuario($nombre){
		$usuarios = Usuario::getUsuarios();
		$existe = false;
		foreach ($usuarios as $usuario) {
			$usuName = $usuario->getNombre();
			if ($usuName==$nombre) {
				$existe = true;
			}
		}
		return $existe;
	}
	public static function getUsuarioByName($nombre){
		$conexion = FotografiasDB::connectDB();
		$seleccion = "SELECT * FROM usuarios WHERE nombre='$nombre'";
		$consulta = $conexion->query($seleccion);

		if ($consulta->rowCount()>0) {
			$registro = $consulta->fetchObject();
			$usuario = new Usuario($registro->id,$registro->nombre);
			return $usuario;
		}else{
			return false;
		}
	}
	
	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;

		return $this;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;

		return $this;
	}
}
