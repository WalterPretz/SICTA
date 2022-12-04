<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('usuario_model');

	}

	private function restringirAcceso() {
		if (!isset($this->session->USUARIO)) {
			redirect("Usuario/login");
		}
	}

	public function index()
	{
		$data['base_url'] = $this->config->item('base_url');
		$this->load->view('inicio', $data);
	}

	public function acerca() {
		// Esta opción es accesible con o sin sesión iniciada
		$data['base_url'] = $this->config->item('base_url');
		$this->load->view('acerca', $data);
	}
}
