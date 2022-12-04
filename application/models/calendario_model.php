<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class calendario_model extends CI_Model {

	
	public function ListarEventos(){
		$this->db->select('id_evento id, titulo title, descripcion descripcion, lugar lugar, color color, colorTexto colorTexto, comienzo start, FinEvento end');
		$this->db->from('eventos');

		return $this->db->get()->result();
	}

	public function ActualizaEvento($param){
		$campos = array(
			'comienzo' => $param['fecini'],
			'FinEvento' => $param['fecfin']
			);

		$this->db->where('id_evento',$param['id']);
		$this->db->update('eventos',$campos);

		if ($this->db->affected_rows() == 1) {
			return 1;
		}else{
			return 0;
		}
	}

	public function eliminarEvento($id){
		$this->db->where('id_evento', $id);
		return $this->db->delete('eventos');
	}

	public function ActualizarEventoCom($param){
		$campos = array(
			'titulo' => $param['tit'],
			'descripcion' => $param['des'],
			'lugar' => $param['lugar'],
			'color' => $param['col'],
			'colorTexto' => $param['coltext'],
			'comienzo' => $param['start'],
			'FinEvento' => $param['end'],
			);

		$this->db->where('id_evento',$param['id']);
		$this->db->update('eventos',$campos);

		if ($this->db->affected_rows() == 1) {
			return 1;
		}else{
			return 0;
		}
	}

	function crearEvento($data){
		$arr = array(
			'titulo' => $data['titulo'],
			'descripcion' => $data['descripcion'],
			'lugar' => $data['lugar'],
			'color' => $data['color'],
			'colorTexto' => $data['coltext'],
			'comienzo' => $data['start'],
			'FinEvento' => $data['end'],
			);

		$this->db->insert('eventos', $arr);

		if ($this->db->affected_rows() == 1) {
			return 1;
		}else{
			return 0;
		}
	}

//para seleccion ar el motivo en días efectivos
	function seleccionarMotivo() {
		$sql = "SELECT 	id_motivo, motivo
				FROM 	motivo
				LIMIT 	10";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();
		return $rows;
	}

	function seleccionarTipoMotivo($id){
		$sql = "SELECT id_tipoMotivo, descripcionMotivo, tipo_id_motivo
			FROM 	tipomotivo
			where 	tipo_id_motivo = ?
			LIMIT 	25";

		$dbres = $this->db->query($sql, $id);
		$rows = $dbres->result_array();
		return $rows;
	}
//datos para la tabla de dias efectivo
	function listarDiasEfectivos ($id_usuario_creador){
	$sql = "SELECT a.id_dia, a.usuario_id_usuario usuario_id_usuario, DATE_FORMAT(dias, '%d/%m/%Y') as dias, m.descripcionMotivo descripcionMotivo, j.motivo motivo, a.descripcion  
			FROM 	d_efectivo a
			JOIN 	tipomotivo m on m.id_tipoMotivo = a.dia_id_motivo
			JOIN 	motivo j on j.id_motivo = m.tipo_id_motivo
			JOIN	usuario b on b.id_usuario = a.usuario_id_usuario
			WHERE 	a.usuario_id_usuario = $id_usuario_creador and YEAR(dias) = YEAR(NOW()) AND MONTH(dias)=MONTH(NOW())
			ORDER BY dias ASC
			LIMIT 	25";
	$dbres = $this->db->query($sql);
	$rows = $dbres->result_array();
	return $rows;
	}

	function eliminarMotivoDia($id_dia){
		return $this->db->delete("d_efectivo", array("id_dia" => $id_dia));
		$dbres = $this->db->query($sql, $valores);
		return $dbres;
	}

	function DiasE($id_usuario_creador){
		$sql = "SELECT  a.id_dia id, a.usuario_id_usuario id_usuario, a.dias start, a.descripcion descripcion
					FROM 	d_efectivo a
					JOIN	usuario b on a.usuario_id_usuario = b.id_usuario
					WHERE 	a.usuario_id_usuario = $id_usuario_creador
					";

		$dbres = $this->db->query($sql);
		$rows = $dbres->result();
		return $rows;
	}

	function crearMotivoDia($usuario_id_usuario, $dias, $dia_id_motivo, $descripcion){
		$sql = "INSERT INTO d_efectivo(usuario_id_usuario, dias, dia_id_motivo, descripcion)
				VALUES (?, ?, ?, ?)";
		$valores = array($usuario_id_usuario, $dias, $dia_id_motivo, $descripcion);
		$dbres = $this->db->query($sql, $valores);
		return $dbres;
	}

	function seleccionarDias ($dias) {
		$sql = "SELECT 	dias
				FROM 	d_efectivo
				WHERE 	dias = ? 
				LIMIT 1 ;";
		$dbres = $this->db->query($sql, array($dias));
		$rows = $dbres->result_array();
		if (count($rows) == 0){
			return 0;
		}else{
			return 1;
		}
	}

	function seleccionar_id_dia($dias) {
		$sql = "SELECT 	id_dia
				FROM 	d_efectivo
				WHERE 	dias = ?
				";

		$dbres = $this->db->query($sql, array($dias));

		$rows = $dbres->result_array();

		return $rows[0]['id_dia'];
	}
	

}