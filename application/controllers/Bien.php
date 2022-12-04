<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bien extends CI_Controller {

function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->helper('url');
	}

	private function restringirAcceso() {
		if (!isset($this->session->USUARIO)) {
			redirect("Usuario/login");
		}
	}

	public function index()	{
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$this->load->view('principal', $data);
	}
}