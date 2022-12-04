<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class docentes_model extends CI_Model {

//Constructor
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function seleccionarDocente($CUI) {
		$sql = "SELECT 	CUI
				FROM 	docente
				WHERE 	CUI = ?
				LIMIT 1 ;";
		$dbres = $this->db->query($sql, array($CUI));
		$rows = $dbres->result_array();
		if (count($rows) == 0){
			return 0;
		}else{
			return 1;
		}
	}

	function crearDocente($nombre_d, $apellido_d, $fecha_nacimiento, $CUI, $partida, $nit, $seguro, $email, $direccion, $fecha_inicio, $puesto, $fuente_ingreso, $docente_id_usuario, $municipio_id_municipio, $docente_id_escuela){
		$sql = "INSERT INTO docente(nombre_d, apellido_d, fecha_nacimiento, CUI, partida, nit, seguro, email, direccion, fecha_inicio, puesto, fuente_ingreso, docente_id_usuario, docente_id_municipio, docente_id_escuela)
				VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		
			$valores = array($nombre_d, $apellido_d, $fecha_nacimiento, $CUI, $partida, $nit, $seguro, $email, $direccion, $fecha_inicio, $puesto, $fuente_ingreso, $docente_id_usuario, $municipio_id_municipio, $docente_id_escuela);
		$dbres = $this->db->query($sql, $valores);
		return $dbres;
	}
	
	function crearTelefono($id_docente, $num1, $num2) {
		$sql = "INSERT INTO telefono(num1, num2, telefono_id_docente)
				VALUES (?, ?, ?)";
		$valores = array($num1, $num2, $id_docente);
		$dbres = $this->db->query($sql, $valores);
		return $dbres;
	}

	function seleccionarIdDocente($CUI) {
		$sql = "SELECT 	id_docente
				FROM 	docente
				WHERE 	CUI = ?
				";
		$dbres = $this->db->query($sql, array($CUI));
		$rows = $dbres->result_array();
		return $rows[0]['id_docente'];
	}

	function seleccionarEscuela() {
		$sql = "SELECT 	id_escuela, nombre, estado
				FROM 	escuela 
				WHERE 	estado = 'Abierta'
				ORDER BY id_escuela ASC
				LIMIT 	50";
		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
	}
//selecciona todos los docentes del sector
	function seleccionarDocentesEscuelas(){
		$sql = "SELECT  a.id_docente id_docente, a.nombre_d nombre_d, a.apellido_d apellido_d, a.CUI CUI, a.nit nit, a.email email, a.direccion direccion, g.id_telefono as id_telefono, g.num1 as num1, g.num2 as num2, a.fecha_inicio fecha_inicio, a.puesto puesto, a.fuente_ingreso fuente_ingreso, a.docente_id_usuario docente_id_usuario, a.docente_id_municipio docente_id_municipio, a.docente_id_escuela docente_id_escuela, d.nombre as nombreE
				FROM 	docente a
				JOIN	usuario b on a.docente_id_usuario = b.id_usuario
				JOIN	municipio c on a.docente_id_municipio = c.id_municipio
				JOIN	telefono g on a.id_docente = g.telefono_id_docente
				JOIN	escuela d on a.docente_id_escuela = d.id_escuela
				ORDER BY id_docente ASC
				LIMIT 	100";

			$dbres = $this->db->query($sql);
			$rows = $dbres->result_array();
			return $rows;
	}

	function seleccionarEscuelasDocentes($escuela){
		$sql = "SELECT  a.id_docente id_docente, a.nombre_d nombre_d, a.apellido_d apellido_d, a.CUI CUI, a.email email, a.direccion direccion, g.id_telefono as id_telefono, g.num1 as num1, g.num2 as num2, a.fecha_inicio fecha_inicio, a.puesto puesto, a.fuente_ingreso fuente_ingreso, a.docente_id_usuario docente_id_usuario, a.docente_id_municipio municipio_id_municipio, a.docente_id_escuela docente_id_escuela, d.nombre as nombreE
				FROM 	docente a
				JOIN	usuario b on a.docente_id_usuario = b.id_usuario
				JOIN	municipio c on a.docente_id_municipio = c.id_municipio
				JOIN	telefono g on a.id_docente = g.telefono_id_docente
				JOIN	escuela d on a.docente_id_escuela = d.id_escuela
				WHERE 	fuente_ingreso = ?
				ORDER BY id_docente ASC
				LIMIT 	1000";

			$dbres = $this->db->query($sql, array($escuela));
			$rows = $dbres->result_array();
			return $rows;
	}

	function DocenteEditar($id){	
		$sql = "SELECT  a.id_docente id_docente, a.nombre_d nombre_d, a.apellido_d apellido_d, a.fecha_nacimiento fecha_nacimiento, a.CUI CUI, a.email email, a.direccion direccion, a.fecha_inicio fecha_inicio,  g.id_telefono as id_telefono, g.num1 as num1, g.num2 as num2, a.fecha_inicio fecha_inicio, a.puesto puesto, a.fuente_ingreso fuente_ingreso, a.docente_id_usuario docente_id_usuario, a.docente_id_municipio docente_id_municipio, c.nombre_mun as nombre_mun, a.docente_id_escuela docente_id_escuela, d.nombre as nombreE
				FROM 	docente a
				JOIN	usuario b on a.docente_id_usuario = b.id_usuario
				JOIN	municipio c on a.docente_id_municipio = c.id_municipio
				JOIN	telefono g on a.id_docente = g.telefono_id_docente
				JOIN	escuela d on a.docente_id_escuela = d.id_escuela
				WHERE 	id_docente = ?
				LIMIT 	1";
		$dbres = $this->db->query($sql,array($id));
		$rows = $dbres->result_array();
		return $rows;
	}

	function actualizarDocente($id, $nombre_d, $apellido_d, $fecha_nacimiento, $CUI, $email, $direccion, $fecha_inicio, $puesto, $fuente_ingreso, $docente_id_municipio, $docente_id_escuela){
		$sql = "UPDATE docente
				SET	Nombre_d ='$nombre_d', Apellido_d = '$apellido_d', Fecha_nacimiento = '$fecha_nacimiento',  cUI = '$CUI', Email = '$email', Direccion = '$direccion', Fecha_inicio = '$fecha_inicio', Puesto = '$puesto', Fuente_ingreso = '$fuente_ingreso', Docente_id_municipio = '$docente_id_municipio', Docente_id_escuela = '$docente_id_escuela'
				WHERE id_docente = '$id' ";
		$dbres = $this->db->query($sql);
		return $dbres;
	} 

	function actualizarTelefono($id, $num1, $num2) {
		$sql = "UPDATE telefono
				SET Num1 = '$num1', Num2 = '$num2'
				WHERE	Telefono_id_docente = '$id'";
		$dbres = $this->db->query($sql, $valores);
		return $dbres;
	}

//envia los datos a listard para mostrar los docentes del sector
	function listarDocentes(){
	$sql = "SELECT  a.id_docente id_docente, a.nombre_d nombre_d, a.apellido_d apellido_d,
					a.CUI CUI, a.nit nit, a.seguro seguro, a.partida partida, a.email email, 
					a.direccion direccion, g.id_telefono as id_telefono, g.num1 as num1, 
					g.num2 as num2, a.fecha_inicio fecha_inicio, a.puesto puesto, 
					a.fuente_ingreso fuente_ingreso, a.docente_id_usuario docente_id_usuario, 
					a.docente_id_municipio docente_id_municipio, 
					c.nombre_mun as municipio, a.docente_id_escuela docente_id_escuela, 
					d.nombre as nombreE, j.nombre_depto departamento
			FROM 	docente a
			JOIN	usuario b on a.docente_id_usuario = b.id_usuario
			JOIN	municipio c on a.docente_id_municipio = c.id_municipio
			JOIN 	departamento j on j.id_departamento = c.departamento_id_departamento
			JOIN	telefono g on a.id_docente = g.telefono_id_docente
			JOIN	escuela d on a.docente_id_escuela = d.id_escuela
			ORDER BY id_docente ASC
			LIMIT 	1000";

	$dbres = $this->db->query($sql);
	$rows = $dbres->result_array();
	return $rows;
	}

	function darBaja($id_docente) {
		return $this->db->delete("docente", array("id_docente" => $id_docente));
		$dbres = $this->db->query($sql, $valores);
		return $dbres;
	}
//selecciona los datos del docente elegido
	function seleccionarDocenteId($id){
		$sql = "SELECT  a.id_docente id_docente, CONCAT(nombre_d, ' ' , apellido_d) as nombres, DATE_FORMAT(fecha_nacimiento, '%d/%m/%Y') as fecha_nacimiento, a.CUI CUI, a.nit nit, a.seguro seguro, a.partida partida, a.email email, a.direccion direccion,  g.id_telefono as id_telefono, g.num1 as num1, g.num2 as num2, DATE_FORMAT(fecha_inicio, '%d/%m/%Y') as fecha_inicio, a.puesto puesto, a.fuente_ingreso fuente_ingreso, a.docente_id_usuario docente_id_usuario, a.docente_id_municipio docente_id_municipio, c.nombre_mun as municipio, a.docente_id_escuela docente_id_escuela, d.nombre as nombreE, j.nombre_depto departamento
				FROM 	docente a
				JOIN	usuario b on a.docente_id_usuario = b.id_usuario
				JOIN	municipio c on a.docente_id_municipio = c.id_municipio
				JOIN 	departamento j on j.id_departamento = c.departamento_id_departamento
				JOIN	telefono g on a.id_docente = g.telefono_id_docente
				JOIN	escuela d on a.docente_id_escuela = d.id_escuela
				WHERE 	id_docente = ?
				LIMIT 	1";
		$dbres = $this->db->query($sql,array($id));
		$rows = $dbres->result_array();
		return $rows;
	}
//SOLO MUESTRA EL listado de usuarios creados por el user logeado
	function listarDocentesEscuela($id_usuario_creador){
	$sql = "SELECT a.id_docente id_docente, a.nombre_d nombre_d, a.apellido_d apellido_d,
					a.CUI CUI, a.nit, a.seguro, a.email email, a.direccion direccion,
					g.id_telefono as id_telefono, g.num1 as num1, g.num2 as num2,
					a.fecha_inicio fecha_inicio, a.puesto puesto, a.fuente_ingreso fuente_ingreso,
					a.docente_id_usuario docente_id_usuario, a.docente_id_municipio municipio_id_municipio,
					a.docente_id_escuela docente_id_escuela, d.nombre as nombreE

			FROM 	docente a
			JOIN	municipio c on a.docente_id_municipio = c.id_municipio
			JOIN	telefono g on a.id_docente = g.telefono_id_docente
			JOIN	escuela d on a.docente_id_escuela = d.id_escuela
			where 	a.docente_id_usuario = $id_usuario_creador
			ORDER BY id_docente ASC
			LIMIT 	1000";

	$dbres = $this->db->query($sql);
	$rows = $dbres->result_array();
	return $rows;
	}
	
}