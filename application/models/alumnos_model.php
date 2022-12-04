<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class alumnos_model extends CI_Model {

//Constructor
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function verifAlumno($codigo, $cui){
		$sql = "SELECT 	codigo, cui
				FROM 	alumno
				WHERE 	codigo = ? AND cui = ?
				LIMIT 1 ;";
		$dbres = $this->db->query($sql, array($codigo, $cui));
		$rows = $dbres->result_array();
		if (count($rows) == 0){
			return 0;
		}else{
			return 1;
		}
	}

	function crearAlumno($codigo, $nombre_alum, $apellido_alum, $fecha_nacimiento, $cui, $direccion, $telefono, $alumno_id_municipio, $alumno_id_usuario){
		$sql = "INSERT INTO alumno(codigo, nombre_alum, apellido_alum, fecha_nacimiento, cui,direccion, telefono, alumno_id_municipio,  alumno_id_usuario)
		VALUES	(?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$valores = array($codigo, $nombre_alum, $apellido_alum, $fecha_nacimiento, $cui, $direccion, $telefono, $alumno_id_municipio, $alumno_id_usuario);
		$dbres = $this->db->query($sql, $valores);
		return $dbres;
	}

	function selIidAlumno($codigo){
		$sql = "SELECT 	id_alumno
				FROM 	alumno
				WHERE 	codigo = ?
				";
		$dbres = $this->db->query($sql, array($codigo));
		$rows = $dbres->result_array();
		return $rows[0]['id_alumno'];
	}
	function crearMadre($id_alumno, $nomadre, $apmadre, $cuimadre){
		$sql = "INSERT INTO madre(nombre_madre, apellido_madre, CUI, madre_id_alumno)
					VALUES (?, ?, ?, ?)";
		$valores = array($nomadre, $apmadre, $cuimadre, $id_alumno);
		$dbres = $this->db->query($sql, $valores);
		return $dbres;
	}

	function crearPadre($id_alumno, $nopadre, $appadre, $cuipadre){
		$sql = "INSERT INTO padre(nombre_padre, apellido_padre, CUI, padre_id_alumno)
					VALUES (?, ?, ?, ?)";
		$valores = array($nopadre, $appadre, $cuipadre, $id_alumno);
		$dbres = $this->db->query($sql, $valores);
		return $dbres;
	}
}

