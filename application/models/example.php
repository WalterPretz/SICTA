<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class corredor_model extends CI_Model{

	//Constructor
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

function seleccionarPais() {
	$sql = "SELECT id_pais, nombre_pais
			FROM 	pais
			order by id_pais ASC
			LIMIT 	1000";

	$dbres = $this->db->query($sql);

	$rows = $dbres->result_array();

	return $rows;
}
