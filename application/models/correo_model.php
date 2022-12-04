<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class correo_model extends CI_Model {
//Constructor
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function seleccionarEstablecimiento() {
		$sql = "SELECT  usuario
						FROM 	usuario
						ORDER BY numero ASC
						LIMIT 	6000";
		$dbres = $this->db->query($sql);
		$rows = $dbres->result_array();

		return $rows;
	}

}
