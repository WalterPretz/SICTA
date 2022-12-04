<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('usuario_model');
	}

	private function restringirAcceso() {
		if (!isset($this->session->USUARIO)) {
			redirect("/Inicio");
		}
	}

	public function index(){
	$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		$data['usuario'] = "";
		$data['nombre'] = "";
		$data['rol'] = "";
		$data['clave'] = "";
		$data['clave2'] = "";
		$data['mensaje'] = "";

		if (isset($_POST['guardar'])) {
			
			$data['usuario'] = str_replace(["<",">"], "", $_POST['usuario']);
			$data['nombre'] = str_replace(["<",">"], "", $_POST['nombre']);
			$data['rol'] = str_replace(["<",">"], "", $_POST['rol']);
			$data['clave'] = $_POST['clave'];
			$data['clave2'] = $_POST['clave2'];

			if ($data['clave'] != $data['clave2']) {
				$data['mensaje'] = "Las claves no coinciden.";
			} else if (strlen($data['clave']) < 8) {
				$data['mensaje'] = "<script>alertify.set('notifier','position', 'top-right');alertify.error('La Clave debe tener al menos 8 caracteres');</script>";
			} else if (count($arr) > 0) {
				$data['mensaje'] = "El usuario ${data['usuario']} ya existe!";
			} else {
					//Todos los datos son correctos, guardar en la BD.
				$this->usuario_model->crearUsuario($data['usuario'], $data['nombre'], $data['rol'], $data['clave']);
				redirect("/Usuario");
			}
		}
		$this->load->view('regis_user', $data);
	}

	public function login() {
		$data['base_url'] = $this->config->item('base_url');

		if (isset($this->session->USUARIO)) {
			redirect('/Inicio/'); // /controller/method
		}

		if ($this->input->post('login') == 'Login') {
			$usuario = $this->input->post('usuario');
			$clave = $this->input->post('clave');
			$id = $this->usuario_model->autenticarUsuario($usuario, $clave);
			if ($id > 0) {
				//Establecer variables de sesion
				$this->session->USUARIO = $usuario;
				$this->session->IDUSUARIO = $id[0]['id_usuario'];
				$this->session->ROL = $id[0]['rol'];
				$this->session->NOMBRE = $id[0]['nombre'];
				redirect("/Bien/");
			} else {
				$data["mensaje"] = "<script>alertify.set('notifier','position', 'top-right');alertify.error('Usuario o Clave Incorrectos');</script>";
			}
		}

		$this->load->view('login', $data);
	}

	public function logout() {
		$this->session->sess_destroy(); // Destruir todas las variables de sesión
		redirect("/Inicio");
	}

	public function listar(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data['arr'] = $this->usuario_model->seleccionarUs();
		$this->load->view('lista_us', $data);
	}

	public function baja($id = 0) {
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$this->usuario_model->darBaja($id);
		redirect("/Usuario/listar");
	}

	public function editar($id_us = 0) {
	$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data['arr'] = $this->usuario_model->seleccionarUsuarioEditar($id_us);

		$data['usuario'] = "";
		$data['nombre'] = "";
		$data['rol'] = "";
		$id_usuario = "";
		if (isset($_POST['actualizar'])) {
			$data['usuario'] = str_replace(["<",">"], "", $_POST['usuario']);
			$data['nombre'] = str_replace(["<",">"], "", $_POST['nombre']);
			$data['id_usuario'] = $_POST['id_user'];

				$this->usuario_model->actualizar_us($data['id_usuario'], $data['usuario'], $data['nombre']);
				redirect("/Usuario/listar");
		}
		$this->load->view('edit_us', $data);
	}

	function cambioContrasenia(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data['arr'] = $this->usuario_model->selectUsEditarContra($this->session->IDUSUARIO);

		$data['clave'] = "";
		$data['claveN'] = "";
		$data['claveN2'] = "";
		$id_usuario = $this->session->IDUSUARIO;
		
		if (isset($_POST['actualizar'])) {
			
			$data['clave'] = $_POST['clave'];
			$data['claveN'] = $_POST['claveN'];
			$data['claveN2'] = $_POST['claveN2'];
			$data['id_usuario'] = $_POST['id_user'];

			if ($data['claveN'] != $data['claveN2']) {
				$data['mensaje'] = "Las claves no coinciden.";
			} else if (strlen($data['claveN']) < 8) {
				$data['mensaje'] = "<script>alertify.set('notifier','position', 'top-right');alertify.error('La Clave debe tener al menos 8 caracteres');</script>";
			} else {
					//Todos los datos son correctos, guardar en la BD.
				$this->usuario_model->actualizar_us($data['id_usuario'], $data['claveN']);
				redirect("/Establecimientos/info");
			}
		}
		$this->load->view('regis_userActualizar', $data);
	}
//
}

