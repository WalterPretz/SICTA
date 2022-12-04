<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Docentes extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('docentes_model');
	}

	private function restringirAcceso() {
		if (!isset($this->session->USUARIO)) {
			redirect("/inicio");
		}
	}

	public function index()	{
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		if (isset($_GET['CUI'])) {
			$data['CUI'] = "";
			$data['CUI'] = $_GET['CUI'];
		}

		$data['boton'] = "";
		$data['nombre_d'] ="";
		$data['apellido_d'] ="";
		$data['fecha_nacimiento'] = "";
		$data['CUI'] ='';
		$data['partida'] ='';
		$data['nit'] ='';
		$data['seguro'] ='';
		$data['email'] ="";
		$data['direccion'] ="";
		$data['num1'] ="";
		$data['num2'] ="";
		$data['docente_id_municipio'] = "";
		$data['docente_id_escuela'] = "";
		$data['fecha_inicio'] = "";
		$data['puesto'] ="";
		$data['fuente_ingreso'] ="";
		$data['docente_id_usuario'] = $this->session->IDUSUARIO;
		$data['boton'] = "<input class=\"btn btn-outline-primary btn-md\" type=\"submit\" role=\"button\" name=\"guardar\" value=\"Guardar Registro\">";
		
		
		if (isset($_POST['guardar'])) {
			$data['nombre_d'] = str_replace(["<",">"], "", $_POST['nombre_d']);
			$data['apellido_d'] = str_replace(["<",">"], "", $_POST['apellido_d']);
			$data['fecha_nacimiento'] = $_POST['fecha_nacimiento'];
			$data['CUI'] = $_POST['CUI'];
			$data['partida'] = str_replace(["<",">"], "", $_POST['partida']);
			$data['nit'] = str_replace(["<",">"], "", $_POST['nit']);
			$data['seguro'] = str_replace(["<",">"], "", $_POST['seguro']);
			$data['email'] = str_replace(["<",">"], "", $_POST['email']);
			$data['direccion'] = str_replace(["<",">"], "", $_POST['direccion']);
			$data['num1'] = str_replace(["<",">"], "", $_POST['num1']);
			$data['num2'] = str_replace(["<",">"], "", $_POST['num2']);
			$data['docente_id_escuela'] = str_replace(["<",">"], "", $_POST['docente_id_escuela']);
			$data['fecha_inicio'] = str_replace(["<",">"], "", $_POST['fecha_inicio']);
			$data['puesto'] = str_replace(["<",">"], "", $_POST['puesto']);
			$data['fuente_ingreso'] = str_replace(["<",">"], "", $_POST['fuente_ingreso']);
			$data['docente_id_municipio'] = $_POST['municipio'];			
			
			$validacion = $this->docentes_model->seleccionarDocente($data['CUI']);//valida que no hayan cui duplicados
			
			if ($validacion == 0 and $data['docente_id_municipio'] != 0){
			$this->docentes_model->crearDocente($data['nombre_d'], $data['apellido_d'], $data['fecha_nacimiento'], $data['CUI'],$data['partida'],$data['nit'],$data['seguro'], $data['email'],$data['direccion'], $data['fecha_inicio'], $data['puesto'], $data['fuente_ingreso'], $data['docente_id_usuario'], $data['docente_id_municipio'], $data['docente_id_escuela']);//ingresa datos en la tabla docente

			$id_docente = $this->docentes_model->seleccionarIdDocente($data['CUI']);
			$this->docentes_model->crearTelefono($id_docente, $data['num1'], $data['num2']);//ingresar da la tabla tel
			$data['mensaje'] = "<script>alertify.set('notifier','position', 'top-right');alertify.success('Datos guardados exitosamente');</script>";
			$data['boton'] = "<a class=\"btn btn-outline-success\" href=\"Docentes/\" role=\"button\">Ingresar otro Docente</a>";//exite un CUI o Numero duplicado
				
				}elseif ($validacion == 1 ) {
					$data['mensaje'] = "<script>alertify.set('notifier','position', 'top-right');alertify.error('El CUI ya se encuentra registrado o mal digitado');</script>"; 
				}elseif ($data['municipio_id_municipio'] == 0) {
						$data['mensaje'] = "<script>alertify.set('notifier','position', 'top-right');alertify.error('Debe de seleccionar Departamento y municipio');</script>";
				}
		}
		$data['arr'] = $this->docentes_model->seleccionarEscuela();
		$this->load->view('regis_docente', $data);
	}
//lista los docentes por renglón presupuestario
	public function docentes_establecimiento(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data['arr'] = $this->docentes_model->seleccionarDocentesEscuelas();
		$data['escuela'] = "";

			if (isset($_POST['BtnEscuela'])) {
				$data['escuela'] = $_POST['selectEscuela'];
				if ($data['escuela'] == "Todos") {
						$data['arr'] = $this->docentes_model->seleccionarDocentesEscuelas();
				}else {
					$data['arr'] = $this->docentes_model->seleccionarEscuelasDocentes($data['escuela']);
				}
			}
		$this->load->view('doc_est', $data);
	}

	function editarDocente($id = 0){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data['arr'] = $this->docentes_model->DocenteEditar($id);

		$data['nombre_d'] ="";
		$data['apellido_d'] ="";
		$data['CUI'] ='';
		$data['fecha_nacimiento'] = "";
		$data['email'] ="";
		$data['direccion'] ="";
		$data['num1'] ="";
		$data['num2'] ="";
		$data['municipio_id_municipio'] = "";
		$data['nombreE'] = "";
		$data['docente_id_escuela'] = "";
		$data['fecha_inicio'] = "";
		$data['puesto'] ="";
		$data['fuente_ingreso'] ="";
		$id_docente = "";
		
		if (isset($_POST['actualizar'])) {
			$data['nombre_d'] = str_replace(["<",">"], "", $_POST['nombre_d']);
			$data['apellido_d'] = str_replace(["<",">"], "", $_POST['apellido_d']);
			$data['fecha_nacimiento'] = str_replace(["<",">"], "", $_POST['fecha_nacimiento']);
			$data['CUI'] = $_POST['CUI'];
			$data['email'] = str_replace(["<",">"], "", $_POST['email']);
			$data['direccion'] = str_replace(["<",">"], "", $_POST['direccion']);
			$data['num1'] = str_replace(["<",">"], "", $_POST['num1']);
			$data['num2'] = str_replace(["<",">"], "", $_POST['num2']);
			$data['fecha_inicio'] = str_replace(["<",">"], "", $_POST['fecha_inicio']);
			$data['puesto'] = str_replace(["<",">"], "", $_POST['puesto']);
			$data['fuente_ingreso'] = str_replace(["<",">"], "", $_POST['fuente_ingreso']);
			$data['docente_id_escuela'] = $_POST['docente_id_escuela'];
			$data['municipio_id_municipio'] = $_POST['municipio'];	
			$data['id_docente'] = $_POST['id_maestro'];		
			
			if ($data['municipio_id_municipio'] == 0) {
				$data['mensaje'] = "<script>alertify.set('notifier','position', 'top-right');alertify.error('Debe de seleccionar Departamento y municipio');</script>";
				}else {
			$this->docentes_model->actualizarDocente($data['id_docente'], $data['nombre_d'], $data['apellido_d'], $data['fecha_nacimiento'], $data['CUI'], $data['email'],$data['direccion'], $data['fecha_inicio'], $data['puesto'], $data['fuente_ingreso'], $data['municipio_id_municipio'], $data['docente_id_escuela']);//ingresa datos en la tabla docente
			$this->docentes_model->actualizarTelefono($data['id_docente'], $data['num1'], $data['num2']);//ingresar da la tabla tel
			redirect("/Docentes/listarDocenteEscuela");
			}
		}
		$data['arr1'] = $this->docentes_model->seleccionarEscuela();
		$this->load->view('editarDocente', $data);
	}
	
	function SelecEscuelaLabora(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data['director'] =  $this->establecimientos_model->seleccionarDocente(); //Selelcciona al director
		echo '<option selected disabled value="">Seleccionar</option>';
		foreach ($data['director'] as $key) {
		echo '<option value="'.$key['id_docente'].'">'.$key['nombre_d'].'</option>'."\n";
		}
	}

//PARA listar docentes por grado y nivel	
	public function docentes_grado()
	{
		$data['base_url'] = $this->config->item('base_url');
		$this->load->view('doc_grado', $data);
	}

	public function docentes_jornada()
	{
		$data['base_url'] = $this->config->item('base_url');
		$this->load->view('doc_jornada', $data);
	}
//LISTADO GENERAL DEL SECTOR:VISTA CTA
	function listard(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data['array'] = $this->docentes_model->listarDocentes();
		$this->load->view('listDocentesGene', $data);
	}

	public function baja($id_docente) {
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$this->docentes_model->darBaja($id_docente);
		redirect("Docentes/docentes_establecimiento");
	}

//lista los docente que estan adjudicados a al escuela logeada
	public function listarDocenteEscuela(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data['arr'] = $this->docentes_model->listarDocentesEscuela($this->session->IDUSUARIO);
		$this->load->view('listadodocentesDirector', $data);
	}

}