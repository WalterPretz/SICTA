<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumnos extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('alumnos_model');
	}
	private function restringirAcceso() {
		if (!isset($this->session->USUARIO)) {
			redirect("/Inicio");
		}
	}

	public function index()	{
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		if (isset($_GET['codigo'])) {
			$data['codigo'] = "";
			$data['codigo'] = $_GET['codigo'];
		}
		$data['boton'] = "";
		$data['codigo'] ="";
		$data['nombre_alum'] ="";
		$data['apellido_alum'] ="";
		$data['fecha_nacimiento'] = "";
		$data['cui'] ='';
		$data['direccion'] ="";
		$data['telefono'] ="";
		$data['alumno_id_municipio'] = "";
		$data['nomadre'] = "";
		$data['apmadre'] = "";
		$data['cuimadre'] = "";
		$data['nopadre'] = "";
		$data['appadre'] = "";
		$data['cuipadre'] = "";
		$data['alumno_id_usuario'] = $this->session->IDUSUARIO;
		$data['boton'] = "<input class=\"btn btn-outline-primary btn-md\" type=\"submit\" role=\"button\" name=\"guardar\" value=\"Registrar Inscripción\">";

		if (isset($_POST['guardar'])) {
			$data['codigo'] = $_POST['codigo'];
			$data['nombre_alum'] = str_replace(["<",">"], "", $_POST['nombre_alum']);
			$data['apellido_alum'] = str_replace(["<",">"], "", $_POST['apellido_alum']);
			$data['fecha_nacimiento'] = $_POST['fecha_nacimiento'];
			$data['cui'] = $_POST['cui'];
			$data['direccion'] = str_replace(["<",">"], "", $_POST['direccion']);
			$data['telefono'] = str_replace(["<",">"], "", $_POST['telefono']);
			$data['nomadre'] = str_replace(["<",">"], "", $_POST['nomadre']);
			$data['apmadre'] = str_replace(["<",">"], "", $_POST['apmadre']);
			$data['cuimadre'] = str_replace(["<",">"], "", $_POST['cuimadre']);
			$data['nopadre'] = str_replace(["<",">"], "", $_POST['nopadre']);
			$data['appadre'] = str_replace(["<",">"], "", $_POST['appadre']);
			$data['cuipadre'] = str_replace(["<",">"], "", $_POST['cuipadre']);
			$data['alumno_id_municipio'] = $_POST['municipio'];
			
			$validacion = $this->alumnos_model->verifAlumno($data['codigo'], $data['cui']);//val que no hayan cod y cui duplicados
			
		if ($validacion == 0 and $data['alumno_id_municipio'] != 0) {
			$this->alumnos_model->crearAlumno($data['codigo'], $data['nombre_alum'], $data['apellido_alum'], $data['fecha_nacimiento'],$data['cui'],$data['direccion'],$data['telefono'], $data['alumno_id_municipio'], $data['alumno_id_usuario']);//ingresa dat en la tabla alum
			$id_alumno = $this->alumnos_model->selIidAlumno($data['codigo']);
			$this->alumnos_model->crearMadre($id_alumno, $data['nomadre'], $data['apmadre'], $data['cuimadre']);//data en data Tmadre
			$this->alumnos_model->crearPadre($id_alumno, $data['nopadre'], $data['appadre'], $data['cuipadre']);//data en data TPadre
					
			
			$data['mensaje'] = "<script>alertify.set('notifier','position', 'top-right');alertify.success('Datos guardados exitosamente');</script>";
			$data['boton'] = "<a class=\"btn btn-outline-success\" href=\"Alumnos\"role=\"button\">Registrar otro alumno</a>";//validacion de cod duplicado
			}elseif ($validacion == 1 ) {
				$data['mensaje'] = "<script>alertify.set('notifier','position', 'top-right');alertify.error('Código o CUI Existente');</script>";
			}elseif ($data['alumno_id_municipio'] == 0) {
					$data['mensaje'] = "<script>alertify.set('notifier','position', 'top-right');alertify.error('Debe de seleccionar Departamento y un municipio');</script>";
					}
		}
		$this->load->view('regis_alumno', $data);
	}


	public function alumno_establecimiento()
	{
		$data['base_url'] = $this->config->item('base_url');
		$this->load->view('alum_est', $data);
	}

	public function alumno_grado()
	{
		$data['base_url'] = $this->config->item('base_url');
		$this->load->view('alum_grados', $data);
	}
	public function alumno_nivel()
	{
		$data['base_url'] = $this->config->item('base_url');
		$this->load->view('alum_nivel', $data);
	}	

	public function departamento()
	{
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		$data['departamento'] =  $this->alumnos_model->seleccionarDepartamento(); //Selelcciona el pais para el select option
		echo '<option value="0">Seleccionar</option>';
		foreach ($data['departamento'] as $key) {
		echo '<option value="'.$key['id_departamento'].'">'.$key['nombre_depto'].'</option>'."\n";
		}
	}

	public function municipio()
	{
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		$id_depto = $_POST['departamento'];//recibe el id del pais
		$data['municipio'] =  $this->alumnos_model->seleccionarMunicipio($id_depto); //Selelcciona el municipio para el select option
		echo '<option value="0">Seleccionar</option>';

		foreach ($data['municipio'] as $key) {
		echo '<option value="'.$key['id_municipio'].'">'.$key['nombre'].'</option>'."\n";
		}
	}

}