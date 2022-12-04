<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Correo extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('correo_model');
	}

	private function restringirAcceso() {
		if (!isset($this->session->USUARIO)) {
			redirect("/Inicio");
		}
	}

	public function index()
	{
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
	}
	
	public function envio() {
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		$data['asunto'] = "";
		$data['texto_mail'] = "";
		$data['headers'] = "MIME-Version: 1.0\r\n";//opcional acuedo de envio de emails
		$data['headers'].="Content-type: text/html; charset=utf8\r\n";
		$data['headers'].="From: Sistema Informático de Coordinación \r\n ";
		$enviados = 0;
		$noEnviados = 0;
		$data["confirmacion"] = "";

		if (isset($_POST['enviar'])) {
			$data['asunto'] = $_POST['asunto'];
			$data['texto_mail'] = $_POST['mensaje'];

			$data['arr'] = $this->correo_model->seleccionarEstablecimiento();
			foreach ($data['arr'] as $a ) {
				$destinatario = str_replace(["<",">"], "", $a['Email']);
				//echo $a['Email'],$data['asunto'],$data['texto_mail'],$data['headers'], "otro parrafo ";
				if ($destinatario == "") {
					$noEnviados = $noEnviados + 1;
					continue;
				}
				$exito = mail($destinatario,$data['asunto'],$data['texto_mail'],$data['headers']);

				if ($exito) {
					$enviados = $enviados + 1;
				}
			}
			$data["confirmacion"] = '<div class="alert alert-success"><strong>Mensajes exitosos: '.$enviados.'<br>Mensajes no enviados '.$noEnviados.' </strong></div>';
			}
		$this->load->view('correo_envio', $data);
	}

	public function recibir()
	{
		$data['base_url'] = $this->config->item('base_url');
		$this->load->view('correo', $data);
	}
}