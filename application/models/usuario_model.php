<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class usuario_model extends CI_Model {

//Constructor
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

function crearUsuario($usuario, $nombre, $rol, $clave) {
		$sql = "INSERT INTO usuario(usuario, nombre, hash_clave, salt, estado, rol)
				VALUES (?, ?, ?, ?, ?, ?)";

		$salt = rand(0,999999); //calcular un número aleatorio
		$hash_clave = hash('sha256', $clave.$salt); //calcular el hash de clave + salt
		$estado = "A";

		$valores = array( $usuario, $nombre, $hash_clave, $salt, $estado, $rol);

		$dbres = $this->db->query($sql, $valores);

		return $dbres;
	}


function autenticarUsuario($txtusuario, $txtClave) {
		$sql = "SELECT 	id_usuario, usuario, nombre, hash_clave, salt, rol
				FROM 	usuario
				WHERE 	usuario = ? AND estado = 'A'
				LIMIT 	1;";

		$dbres = $this->db->query($sql, array($txtusuario));
		$rows = $dbres->result_array();

		if (count($rows) < 1) // El usuario no existe o no está activo
			return 0;

		$id = $rows[0]['id_usuario'];
		$salt = $rows[0]['salt'];
		$hashClave = hash('sha256', $txtClave.$salt); // Calcular sha512 de clave + salt

		$sql = "SELECT 	id_usuario, usuario, nombre, hash_clave, salt, rol
		FROM 	usuario
		WHERE 	id_usuario = ? AND hash_clave = ?
		LIMIT 	1;";

		$dbres = $this->db->query($sql, array($id, $hashClave));
		$rows = $dbres->result_array();

		if (count($rows) > 0) {
			return $rows; // El usuario existe y cumple con la clave
		}

		return 0; // El usuario existe pero no cumple la clave
	}
	
	function seleccionarUs(){
		$sql = "SELECT 	id_usuario, usuario, nombre, estado, rol
				FROM 	usuario
				WHERE	estado = 'A'
				LIMIT 	100;";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
		}

	function darBaja($id_usuario) {
		is_numeric($id_usuario) or exit("Número esperado!");

		$sql = "UPDATE 	usuario
				SET 	estado = ?
				WHERE 	id_usuario = ?
				LIMIT 	1;";

		$valores = array('B', $id_usuario);
		$dbres = $this->db->query($sql, $valores);
		return $dbres;
	}

	function seleccionarUsuarioEditar($id_us){
		$sql = "SELECT 	id_usuario, usuario, nombre, estado, rol
				FROM 	usuario
				where 	id_usuario = ?
				LIMIT 	1";
		$dbres = $this->db->query($sql,array($id_us));
		$rows = $dbres->result_array();
		return $rows;
	}

	function actualizar_us($id_us, $usuario, $nombre) {
		$sql = "UPDATE usuario
				SET Usuario = '$usuario', Nombre = '$nombre'
				WHERE id_usuario = '$id_us' "; 
		
		$dbres = $this->db->query($sql);
		return $dbres;
	}

	//cambio de contraseña
	 function selectUsEditarContra($id_usuario_creador){
	 	$sql = "SELECT 	id_usuario as id_usuario, hash_clave as clave, salt as salt
				FROM 	usuario
				WHERE 	id_usuario = $id_usuario_creador AND hash_clave = ?
				LIMIT 	1;";

		/*$salt = $rows[0]['salt'];
		$hashClave = hash('sha256', $txtClave.$salt); // Calcular sha512 de clave + salt

		$dbres = $this->db->query($sql, array($hashClave));
		$rows = $dbres->result_array();
*/
		$dbres = $this->db->query($sql,array($id_usuario_creador));
		$rows = $dbres->result_array();
		return $rows; 
	}

}