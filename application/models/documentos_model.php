<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class documentos_model extends CI_Model {

function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function crearCircular($titulo, $descripcion, $tamanio, $tipo, $nombre, $id_usuario_registro){
		$sql = "INSERT INTO circular(titulo, descripcion, tamanio, tipo, nombre, id_usuario_registro)
				VALUES (?, ?, ?, ?, ?, ?)";

		$valores = array($titulo, $descripcion, $tamanio, $tipo, $nombre, $id_usuario_registro);
		$dbres = $this->db->query($sql, $valores);
		return $dbres;
	}

	function seleccionarCircular(){
		$sql = "SELECT  a.id_circular id_circular, a.titulo motivo, a.descripcion descripcion, a.nombre nombre, a.id_usuario_registro id_usuario_registro
				FROM 	circular a
				ORDER BY id_circular ASC
				LIMIT 	100";

			$dbres = $this->db->query($sql);
			$rows = $dbres->result_array();
			return $rows;
	}

	function darBajaCircular($id_circular) {
		return $this->db->delete("circular", array("id_circular" => $id_circular));
		$dbres = $this->db->query($sql, $valores);
		return $dbres;
	}
}


