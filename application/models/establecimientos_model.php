<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class establecimientos_model extends CI_Model {

//Constructor
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function seleccionarDirector() {
		$sql = "SELECT 	id_usuario, nombre, estado
				FROM 	usuario 
				WHERE 	estado = 'A'
				ORDER BY id_usuario ASC
				LIMIT 	50";
		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
	}
	
	function seleccionarDepartamento() {
		$sql = "SELECT 	id_departamento, nombre_depto
				FROM 	departamento
				order by id_departamento ASC
				LIMIT 	25";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
	}

	function seleccionarMunicipio($id){
		$sql = "SELECT id_municipio, nombre_mun, departamento_id_departamento
			FROM 	municipio
			where 	departamento_id_departamento = ?
			order by nombre_mun DESC
			LIMIT 	50";

		$dbres = $this->db->query($sql, $id);
		$rows = $dbres->result_array();
		return $rows;
	}

	function seleccionarEscuela($codigo) {
		$sql = "SELECT 	codigo
				FROM 	escuela
				WHERE 	codigo = ? 
				LIMIT 1 ;";
		$dbres = $this->db->query($sql, array($codigo));
		$rows = $dbres->result_array();
		if (count($rows) == 0){
			return 0;
		}else{
			return 1;
		}
	}

	function crearEscuela($codigo, $nombre, $id_director ,$sector, $plan, $area, $estado, $modalidad, $mail, $telefono, $direccion, $id_usuario_registro, $escuela_id_municipio){
		$sql = "INSERT INTO escuela(codigo, nombre, id_director ,sector, plan, area, estado, modalidad, mail, telefono, direccion, id_usuario_registro, escuela_id_municipio)
				VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$valores = array($codigo, $nombre, $id_director ,$sector, $plan, $area, $estado, $modalidad, $mail, $telefono, $direccion, $id_usuario_registro, $escuela_id_municipio);
		$dbres = $this->db->query($sql, $valores);
		return $dbres;
	}

	function seleccionarIdEscuela($codigo){
		$sql = "SELECT 	id_escuela
				FROM 	escuela
				WHERE 	codigo = ?
				";

		$dbres = $this->db->query($sql, array($codigo));
		$rows = $dbres->result_array();
		return $rows[0]['id_escuela'];
	}

	function crearJornada($id_escuela, $jornada) {
		$sql = "INSERT INTO jornada(jornada, jornada_id_escuela)
				VALUES (?, ?)";
		$valores = array($jornada, $id_escuela);
		$dbres = $this->db->query($sql, $valores);
		return $dbres;
	}

	function crearNivel($id_escuela, $nivel) {
		$sql = "INSERT INTO nivel(nivel, nivel_id_escuela)
				VALUES (?, ?)";
		$valores = array($nivel, $id_escuela);
		$dbres = $this->db->query($sql, $valores);
		return $dbres;
	}

	function crearCta($id_escuela, $cta) {
			$sql = "INSERT INTO cta(coordinacion, cta_id_escuela)
					VALUES (?, ?)";
			$valores = array($cta, $id_escuela);
			$dbres = $this->db->query($sql, $valores);
			return $dbres;
		}

	function seleccionarEscuelas(){
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

	function seleccionarEscuelasG($id){
		$sql = "SELECT a.id_escuela id_escuela, a.codigo codigo, a.nombre nombre, b.nombre as nombred, d.jornada as jornada, a.sector sector, e.nivel as nivel, a.plan plan, a.area area, a.estado estado, a.modalidad modalidad, a.mail mail, a.telefono telefono, f.coordinacion as coordinacion, a.direccion direccion, a.id_usuario_registro id_usuario_registro, m.nombre_mun municipio, j.nombre_depto departamento
				FROM 	escuela a
				JOIN	usuario b on a.id_director = b.id_usuario
				JOIN	jornada d on a.id_escuela = d.jornada_id_escuela
				JOIN	nivel e on a.id_escuela = e.nivel_id_escuela
				JOIN	cta f on a.id_escuela = f.cta_id_escuela
				JOIN 	municipio m on m.id_municipio = a.escuela_id_municipio
				JOIN 	departamento j on j.id_departamento = m.departamento_id_departamento
				where  	id_escuela = ?
				LIMIT 	1";
		$dbres = $this->db->query($sql, $id);
		$rows = $dbres->result_array();
		return $rows;
	}

	function seleccionarEscuelaEditar($id){
		$sql = "SELECT a.id_escuela id_escuela, a.codigo codigo, a.nombre nombre, a.id_director as id_director, b.nombre as nombred, d.Jornada jornada, a.sector sector, e.nivel as nivel, a.plan plan, a.area area, a.estado estado, a.modalidad modalidad, a.mail mail, a.telefono telefono, f.coordinacion as cta, a.direccion direccion, a.id_usuario_registro id_usuario_registro,  a.escuela_id_municipio escuela_id_municipio, m.nombre_mun municipio
				FROM 	escuela a
				JOIN	usuario b on a.id_director = b.id_usuario
				JOIN	municipio c on a.escuela_id_municipio = c.id_municipio
				JOIN	jornada d on a.id_escuela = d.jornada_id_escuela
				JOIN	nivel e on a.id_escuela = e.nivel_id_escuela
				JOIN	cta f on a.id_escuela = f.cta_id_escuela
				JOIN 	municipio m on m.id_municipio = a.escuela_id_municipio
				where  	id_escuela = ?
				LIMIT 	1";
		$dbres = $this->db->query($sql, $id);
		$rows = $dbres->result_array();
		return $rows;
	}

	function actualizarEscuela($id, $codigo, $nombre, $id_director, $sector, $plan, $area, $estado, $modalidad, $mail, $telefono, $direccion, $escuela_id_municipio){
		$sql = "UPDATE 	escuela
				SET	Codigo = '$codigo', Nombre = '$nombre', Id_director = '$id_director', Sector = '$sector', Plan = '$plan', Area = '$area', Estado = '$estado', Modalidad = '$modalidad', Mail = '$mail', Telefono = '$telefono', Direccion = '$direccion', Escuela_id_municipio = '$escuela_id_municipio'
				WHERE id_escuela = '$id' ";
		$dbres = $this->db->query($sql);
		return $dbres;
	}

	function actualizarJornada($id, $jornada){
		$sql = "UPDATE jornada
				SET Jornada = '$jornada'
				WHERE jornada_id_escuela = '$id'";
		$dbres = $this->db->query($sql);
		return $dbres;
	}

	function actualizarNivel($id, $nivel){
		$sql = "UPDATE nivel
				SET Nivel = '$nivel'
				WHERE nivel_id_escuela = '$id'";
		$dbres = $this->db->query($sql);
		return $dbres;
	}

	function actualizarCta($id, $coordinacion){
		$sql = "UPDATE cta
				SET Coordinacion = '$coordinacion'
				WHERE cta_id_escuela = '$id'";
		$dbres = $this->db->query($sql);
		return $dbres;
	}

	function darBaja($id_escuela) {
		return $this->db->delete("escuela", array("id_escuela" => $id_escuela));
		$dbres = $this->db->query($sql, $valores);
		return $dbres;
	}

	function seleccionarEscuelasJornada($categoria) {
		$sql = "SELECT a.id_escuela id_escuela, a.codigo codigo, a.nombre nombre, a.id_director as id_director, b.nombre as nombred, d.Jornada jornada, a.sector sector, e.nivel as nivel, a.plan plan, a.area area, a.estado estado, a.modalidad modalidad, a.mail mail, a.telefono telefono, f.coordinacion as cta, a.direccion direccion, a.id_usuario_registro id_usuario_registro,  a.escuela_id_municipio escuela_id_municipio, m.nombre_mun municipio
				FROM 	escuela a
				JOIN	usuario b on a.id_director = b.id_usuario
				JOIN	municipio c on a.escuela_id_municipio = c.id_municipio
				JOIN	jornada d on a.id_escuela = d.jornada_id_escuela
				JOIN	nivel e on a.id_escuela = e.nivel_id_escuela
				JOIN	cta f on a.id_escuela = f.cta_id_escuela
				JOIN 	municipio m on m.id_municipio = a.escuela_id_municipio
				WHERE  	jornada = ?
				ORDER BY id_escuela ASC
				LIMIT 	100";

			$dbres = $this->db->query($sql, array($categoria));
			$rows = $dbres->result_array();
			return $rows;
	}

	function seleccionarEscuelasNivel($categoria13) {
		$sql = "SELECT a.id_escuela id_escuela, a.codigo codigo, a.nombre nombre, a.id_director as id_director, b.nombre as nombred, d.Jornada jornada, a.sector sector, e.nivel as nivel, a.plan plan, a.area area, a.estado estado, a.modalidad modalidad, a.mail mail, a.telefono telefono, f.coordinacion as cta, a.direccion direccion, a.id_usuario_registro id_usuario_registro,  a.escuela_id_municipio escuela_id_municipio, m.nombre_mun municipio
				FROM 	escuela a
				JOIN	usuario b on a.id_director = b.id_usuario
				JOIN	municipio c on a.escuela_id_municipio = c.id_municipio
				JOIN	jornada d on a.id_escuela = d.jornada_id_escuela
				JOIN	nivel e on a.id_escuela = e.nivel_id_escuela
				JOIN	cta f on a.id_escuela = f.cta_id_escuela
				JOIN 	municipio m on m.id_municipio = a.escuela_id_municipio
				WHERE  	nivel = ?
				ORDER BY id_escuela ASC
				LIMIT 	100";

			$dbres = $this->db->query($sql, array($categoria13));
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

	function seleccionarInfoEscuela($id){
		$sql = "SELECT a.id_escuela id_escuela, a.codigo codigo, a.nombre nombre, a.id_director as id_director, b.nombre as nombred, d.Jornada jornada, a.sector sector, e.nivel as nivel, a.plan plan, a.area area, a.estado estado, a.modalidad modalidad, a.mail mail, a.telefono telefono, f.coordinacion as cta, a.direccion direccion, a.id_usuario_registro id_usuario_registro,  a.escuela_id_municipio escuela_id_municipio, m.nombre_mun municipio, w.nombre_depto departamento
				FROM 	escuela a
				JOIN	usuario b on a.id_director = b.id_usuario
				JOIN	municipio c on a.escuela_id_municipio = c.id_municipio
				JOIN	departamento w on c.departamento_id_departamento = w.id_departamento
				JOIN	jornada d on a.id_escuela = d.jornada_id_escuela
				JOIN	nivel e on a.id_escuela = e.nivel_id_escuela
				JOIN	cta f on a.id_escuela = f.cta_id_escuela
				JOIN 	municipio m on m.id_municipio = a.escuela_id_municipio

				LIMIT 	1";
		$dbres = $this->db->query($sql, $id);
		$rows = $dbres->result_array();
		return $rows;
	}
//selecionar datos de los docentes adjuntos al establecimiento seleccionado
	function seleccionarEscuelasNomina($id){
		$sql = "SELECT 
				p.id_docente id_docente, p.nombre_d nombre_d, p.apellido_d apellido_d, p.CUI CUI, p.email email, p.direccion direccion, q.num1 num1, p.fuente_ingreso fuente_ingreso, p.docente_id_escuela docente_id_escuela, r.codigo codigo, r.nombre nombre_escuela
				FROM 	docente p
				JOIN	telefono q on p.id_docente = q.telefono_id_docente
				JOIN	escuela r on p.docente_id_escuela = r.id_escuela
				WHERE 	p.docente_id_escuela = $id
				LIMIT 	50";
		$dbres = $this->db->query($sql, $id);
		$rows = $dbres->result_array();
		return $rows;
	}
//solamente jala los datos como nombre y codiga de la escuela seleccionada
	function seleccionarEscuelasNominaD($id){
		$sql = "SELECT 
				r.id_escuela id_escuela, r.codigo codigo, r.nombre nombre_escuela
				FROM 	escuela r
				WHERE 	r.id_escuela = $id
				LIMIT 	1";
		$dbres = $this->db->query($sql, $id);
		$rows = $dbres->result_array();
		return $rows;
	}

	//mosatrar dias efectivos por escuela
	function seleccionarEscuelasDias($id){
	$sql = "SELECT a.id_dia id_dia, a.usuario_id_usuario usuario_id_usuario, DATE_FORMAT(dias, '%d/%m/%Y') as dias, m.descripcionMotivo descripcionMotivo, j.motivo motivo, a.descripcion descripcion
			FROM 	d_efectivo a
			JOIN 	tipomotivo m on m.id_tipoMotivo = a.dia_id_motivo
			JOIN 	motivo j on j.id_motivo = m.tipo_id_motivo

			WHERE 	a.usuario_id_usuario = $id and YEAR(dias) = YEAR(NOW()) AND MONTH(dias)=MONTH(NOW()) 
			LIMIT 	30";
	$dbres = $this->db->query($sql, $id);
	$rows = $dbres->result_array();
	return $rows;
	}

	//seleccionar usuario de escuelas para dias efectivos
	function selectEscuelasUser(){
		$sql = "SELECT a.id_usuario id_usuario, a.usuario usuario, a.nombre nombre, b.nombre as nombreEscuela, b.telefono as telefono
			FROM	usuario a
			JOIN	escuela b on id_director = id_usuario
			ORDER BY id_usuario ASC
			LIMIT 	100";
		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
	}
//muestra los datos del establecimiento seleccionado en dia efectivo
	function MostrarDatos($id){
		$sql = "
			SELECT a.id_usuario id_usuario, a.usuario usuario, b.nombre as nombreEscuela
			FROM	usuario a
			JOIN	escuela b on b.id_director = a.id_usuario
			WHERE 	a.id_usuario = $id
			ORDER BY id_usuario ASC
			LIMIT 	1";
		$dbres = $this->db->query($sql, $id);
		$rows = $dbres->result_array();
		return $rows;
	}

}
