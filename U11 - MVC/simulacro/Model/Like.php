<?php
require_once 'FotografiasDB.php';
require_once 'Usuario.php';
require_once 'Foto.php';
class Like {
	private $id_foto;
	private $id_usuario;

	function __construct($id_foto=0, $id_usuario=0) {
		$this->id_foto = $id_foto;
		$this->id_usuario = $id_usuario;	
	}

	public function insert() {
		$conexion = FotografiasDB::connectDB();
		$insercion = "INSERT INTO likes (id_foto, id_usuario) VALUES ($this->id_foto, $this->id_usuario)";
		$conexion->exec($insercion);
	}
	public function delete() {
		$conexion = FotografiasDB::connectDB();
		$borrado = "DELETE FROM likes WHERE id_foto=$this->id_foto AND id_usuario=$this->id_usuario";
		$conexion->exec($borrado);
	}

	public function deleteByfoto(){
		$conexion = FotografiasDB::connectDB();
		$borrado = "DELETE FROM likes WHERE id_foto=$this->id_foto";
		$conexion->exec($borrado);
	}
	public static function cuentaLikes($idFoto){
		$conexion = FotografiasDB::connectDB();
		$seleccion = "SELECT * FROM likes WHERE id_foto='$idFoto'";
		$consulta = $conexion->query($seleccion);
		$cantidad = $consulta->rowCount();
		return $cantidad;
	}
	public static function getUsuariosByLike($id_foto){
		$conexion = FotografiasDB::connectDB();
		$seleccion = "SELECT id_usuario FROM likes WHERE id_foto='$id_foto'";
		$consulta = $conexion->query($seleccion);

		$usuarios=[];
		while ($registro = $consulta->fetchObject()) {
			$usuario = Usuario::getUsuarioById($registro->id_usuario);
			$usuarios[] = $usuario;
		}
		return $usuarios;
	}
	public static function compruebaLike($id_foto, $id_usuario) {
		$conexion = FotografiasDB::connectDB();
		$seleccion ="SELECT * FROM likes WHERE id_foto='$id_foto' AND id_usuario='$id_usuario'";
		$consulta = $conexion->query($seleccion);

		if ($consulta->rowCount()>0) {
			return true;
		}else {
			return false;
		}
	}
}