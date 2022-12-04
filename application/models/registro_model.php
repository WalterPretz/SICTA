<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendario extends CI_Controller {

public function index()
	{
		$data['base_url'] = $this->config->item('base_url');
		$this->load->view('calendario', $data);
	}
}
