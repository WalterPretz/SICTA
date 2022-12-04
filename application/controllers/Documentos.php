<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Documentos extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->helper('download');
		$this->load->helper('file');
		$this->load->model('documentos_model');
	}

	private function restringirAcceso() {
		if (!isset($this->session->USUARIO)) {
			redirect("Inicio");
		}
	}

	function index(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		
	
		$data['titulo'] ="";
		$data['descripcion'] = "";
		$data['tamanio'] = "";
		$data['tipo'] = "";
		$data['archivo'] ="";
		$data['nombre'] ="";
		$data['id_usuario_registro'] = $this->session->IDUSUARIO;
		
		if (isset($_POST['Guardar'])) {
			$data['titulo'] = str_replace(["<",">"], "", $_POST['titulo']);
			$data['descripcion'] = str_replace(["<",">"], "", $_POST['descripcion']);

			$data['nombre']    = $_FILES['archivo']['name'];
    		$data['tipo']      = $_FILES['archivo']['type'];
    		$data['tamanio']   = $_FILES['archivo']['size'];
    		
    		$ruta       = $_FILES['archivo']['tmp_name'];
    		$destino    = "resources/archivos/" . $data['nombre'];

    		if ($data['nombre'] != "") {
		        if (copy($ruta, $destino)) {
		            $titulo      = $_POST['titulo'];
		            $descripcion = $_POST['descripcion'];

				$this->documentos_model->crearCircular($data['titulo'], $data['descripcion'], $data['tamanio'], 
				$data['tipo'],  $data['nombre'], $data['id_usuario_registro']);//ingresa datos en el ta/circular
				$data['mensaje'] = "<script>alertify.set('notifier','position', 'top-right');alertify.success('Datos guardados exitosamente');</script>";
				}
			}else {
            echo "Error";
		} 
        }
		$data['arr'] = $this->documentos_model->seleccionarCircular();
		$this->load->view('subirInfo', $data);
		
	}
	
	public function fallecimiento()
	{
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$this->load->view('docu_fallecer', $data);
	}

	public function interinato()
	{
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$this->load->view('docu_interinato', $data);
	}

	public function jubilacion()
	{
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$this->load->view('docu_jubilacion', $data);
	}

	public function ingreso()
	{
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$this->load->view('docu_primeringre', $data);
	}

	public function pagos()	{
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$this->load->view('docu_pagos', $data);
	}
	public function suspension()
	{
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$this->load->view('docu_igss', $data);
	}

	function DescargarDocumentos($nombre){
		$this->restringirAcceso();
		$data = file_get_contents('./resources/archivos/'. $nombre); 
       	force_download($nombre, $data);
	}
//esta sección elimina por el cta
		function Elim($id_circular = 0) {
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$this->documentos_model->darBajaCircular($id_circular);
		redirect("Documentos");
	}

	function EliminarAr($nombre){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
       	$file = "./resources/archivos/" . $nombre;
		$do = unlink($file);
		redirect("Documentos");
	}

}
