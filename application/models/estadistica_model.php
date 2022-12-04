<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class estadistica_model extends CI_Model {
//Constructor
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function seleccionarEscuelaJornada(){
		$sql = "SELECT a.id_escuela, a.codigo, a.nombre, b.nombre as nombred, d.Jornada jornada, a.sector, a.plan, a.area, a.estado, a.modalidad, a.mail, a.telefono, a.direccion, a.id_usuario_registro, m.nombre_mun municipio, j.nombre_depto departamento
			FROM 	escuela a
			JOIN 	usuario b on a.id_director = b.id_usuario
			JOIN	jornada d on a.id_escuela = d.jornada_id_escuela
			JOIN 	municipio m on m.id_municipio = a.escuela_id_municipio
			JOIN 	departamento j on j.id_departamento = m.departamento_id_departamento
			ORDER BY id_escuela ASC
			LIMIT 	100";
	$dbres = $this->db->query($sql);
	$rows = $dbres->result_array();
	return $rows;
	}

	function seleccionarEsNivel() {
		$sql = "SELECT a.id_escuela id_escuela, a.codigo codigo, a.nombre nombre, a.id_director as id_director, b.nombre as nombred, d.Jornada jornada, a.sector sector, e.nivel as nivel, a.plan plan, a.area area, a.estado estado, a.modalidad modalidad, a.mail mail, a.telefono telefono, f.coordinacion as cta, a.direccion direccion, a.id_usuario_registro id_usuario_registro,  a.escuela_id_municipio escuela_id_municipio, m.nombre_mun municipio
				FROM 	escuela a
				JOIN	usuario b on a.id_director = b.id_usuario
				JOIN	municipio c on a.escuela_id_municipio = c.id_municipio
				JOIN	jornada d on a.id_escuela = d.jornada_id_escuela
				JOIN	nivel e on a.id_escuela = e.nivel_id_escuela
				JOIN	cta f on a.id_escuela = f.cta_id_escuela
				JOIN 	municipio m on m.id_municipio = a.escuela_id_municipio
				ORDER BY id_escuela ASC
				LIMIT 	1000";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
	}
	function seleccionarPresupuesto() {
		$sql = "SELECT a.id_docente id_docente, a.nombre_d nombre_d, a.apellido_d apellido_d, a.CUI CUI, a.email email, a.direccion direccion, g.id_telefono as id_telefono, g.num1 as num1, g.num2 as num2, a.fecha_inicio fecha_inicio, a.puesto puesto, a.fuente_ingreso fuente_ingreso, a.docente_id_usuario docente_id_usuario, a.docente_id_municipio municipio_id_municipio, a.docente_id_escuela docente_id_escuela, d.nombre as nombreE
				FROM 	docente a
				JOIN	usuario b on a.id_docente = b.id_usuario
				JOIN	municipio c on a.docente_id_municipio = c.id_municipio
				JOIN	telefono g on a.id_docente = g.telefono_id_docente
				JOIN	escuela d on a.docente_id_escuela = d.id_escuela
				ORDER BY id_docente ASC
				LIMIT 	1000";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
	}

	
}
