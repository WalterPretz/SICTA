<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estadistica extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('estadistica_model');
	}


	private function restringirAcceso() {
		if (!isset($this->session->USUARIO)) {
			redirect("/inicio");
		}
	}

	public function reporte() {
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		$data['arr'] = $this->estadistica_model->seleccionarEscuelaJornada();
		$data['nivel'] = $this->estadistica_model->seleccionarEsNivel();
		$this->load->view('estadis_escuela', $data);
	}

	public function reporteDocentes() {
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data['presupuesto'] = $this->estadistica_model->seleccionarPresupuesto();
		$this->load->view('estadis_doc', $data);
	}

}
