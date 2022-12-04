<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Establecimientos extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('establecimientos_model');
		$this->load->model('documentos_model');
	}
	
	private function restringirAcceso() {
		if (!isset($this->session->USUARIO)) {
			redirect("/Inicio");
		}
	}
	
//muestra el listado de establecimientos del sector
	public function listar(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data['arr'] = $this->establecimientos_model->seleccionarEscuelas();
		$this->load->view('listado_escuelas', $data);
	}
//para el registro de establecimiento//
	public function index(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		if (isset($_GET['codigo'])) {
			$data['codigo'] = "";
			$data['codigo'] = $_GET['codigo'];
		}

		$data['boton'] = "";
		$data['codigo'] ="";
		$data['nombre'] = "";
		$data['jornada'] ='';
		$data['id_director'] ='';
		$data['sector'] ='';
		$data['nivel'] ='';
		$data['plan'] ="";
		$data['area'] ="";
		$data['estado'] ="";
		$data['modalidad'] ="";
		$data['mail'] ="";
		$data['telefono'] ="";
		$data['cta'] ="";
		$data['direccion'] ="";
		$data['id_usuario_registro'] = $this->session->IDUSUARIO;
		$data['escuela_id_municipio'] = "";
		$data['boton'] = "<input class=\"btn btn-outline-primary btn-md\" type=\"submit\" role=\"button\" name=\"guardar\" value=\"Guardar\">";

		if (isset($_POST['guardar'])) {
			$data['codigo'] = $_POST['codigo'];
			$data['nombre'] = str_replace(["<",">"], "", $_POST['nombre']);
			$data['jornada'] = str_replace(["<",">"], "", $_POST['jornada']);
			$data['id_director'] = str_replace(["<",">"], "", $_POST['id_director']);
			$data['sector'] = str_replace(["<",">"], "", $_POST['sector']);
			$data['nivel'] = str_replace(["<",">"], "", $_POST['nivel']);
			$data['plan'] = str_replace(["<",">"], "", $_POST['plan']);
			$data['area'] = str_replace(["<",">"], "", $_POST['area']);
			$data['estado'] = str_replace(["<",">"], "", $_POST['estado']);
			$data['modalidad'] = str_replace(["<",">"], "", $_POST['modalidad']);
			$data['mail'] = str_replace(["<",">"], "", $_POST['mail']);
			$data['telefono'] = str_replace(["<",">"], "", $_POST['telefono']);
			$data['cta'] = str_replace(["<",">"], "", $_POST['cta']);
			$data['direccion'] = str_replace(["<",">"], "", $_POST['direccion']);
			$data['escuela_id_municipio'] = $_POST['municipio'];
			
			$validacion = $this->establecimientos_model->seleccionarEscuela($data['codigo']); //val cod esc = rep/dup
			
			if ($validacion == 0 and $data['escuela_id_municipio'] != 0) {
				$this->establecimientos_model->crearEscuela($data['codigo'], $data['nombre'], $data['id_director'], $data['sector'], $data['plan'], $data['area'], $data['estado'], $data['modalidad'], $data['mail'], $data['telefono'], $data['direccion'], $data['id_usuario_registro'], $data['escuela_id_municipio']);//ingresa datos en el form de establecimiento
				$id_escuela = $this->establecimientos_model->seleccionarIdEscuela($data['codigo']);
				$this->establecimientos_model->crearJornada($id_escuela, $data['jornada']);//ingdatos en la Tjornada
				$this->establecimientos_model->crearNivel($id_escuela, $data['nivel']);//ingdatos en la Tnivel
				$this->establecimientos_model->crearCta($id_escuela, $data['cta']);//ingdatos en la Tcoordiandor

				$data['mensaje'] = "<script>alertify.set('notifier','position', 'top-right');alertify.success('Datos guardados exitosamente');</script>";
				$data['boton'] = "<a class=\"btn btn-outline-success\" href=\"Establecimientos\"role=\"button\">Crear otro Establecimiento</a>";//validacion de cod duplicado
			}elseif ($validacion == 1 ) {
				$data['mensaje'] = "<script>alertify.set('notifier','position', 'top-right');alertify.error('Código Existente');</script>";
			}elseif ($data['escuela_id_municipio'] == 0) {
					$data['mensaje'] = "<div class=\"alert alert-danger\" role=\"alert\">Seleccionar departamento y un municipio</div>";
			}
		}
		$data['arr'] = $this->establecimientos_model->seleccionarDirector();
		$this->load->view('regis_escuela', $data);
	}

	public function editar($id = 0){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data['arr'] = $this->establecimientos_model->seleccionarEscuelaEditar($id);
		$data['codigo'] ="";
		$data['nombre'] = "";
		$data['jornada'] ='';
		$data['id_director'] ='';
		$data['nombred'] ='';
		$data['sector'] ='';
		$data['nivel'] ='';
		$data['plan'] ="";
		$data['area'] ="";
		$data['estado'] ="";
		$data['modalidad'] ="";
		$data['mail'] ="";
		$data['telefono'] ="";
		$data['cta'] ="";
		$data['direccion'] ="";
		$data['escuela_id_municipio'] = "";
		$id_escuela = "";
		
		if (isset($_POST['actualizar'])) {
			$data['codigo'] = $_POST['codigo'];
			$data['nombre'] = str_replace(["<",">"], "", $_POST['nombre']);
			$data['jornada'] = str_replace(["<",">"], "", $_POST['jornada']);
			$data['id_director'] = $_POST['id_director'];
			$data['sector'] = str_replace(["<",">"], "", $_POST['sector']);
			$data['nivel'] = str_replace(["<",">"], "", $_POST['nivel']);
			$data['plan'] = str_replace(["<",">"], "", $_POST['plan']);
			$data['area'] = str_replace(["<",">"], "", $_POST['area']);
			$data['estado'] = str_replace(["<",">"], "", $_POST['estado']);
			$data['modalidad'] = str_replace(["<",">"], "", $_POST['modalidad']);
			$data['mail'] = str_replace(["<",">"], "", $_POST['mail']);
			$data['telefono'] = str_replace(["<",">"], "", $_POST['telefono']);
			$data['cta'] = str_replace(["<",">"], "", $_POST['cta']);
			$data['direccion'] = str_replace(["<",">"], "", $_POST['direccion']);
			$data['escuela_id_municipio'] = $_POST['escuela_id_municipio'];
			$data['id_escuela'] = $_POST['id_estable'];
			{			
			$this->establecimientos_model->actualizarEscuela($data['id_escuela'], $data['codigo'], $data['nombre'], $data['id_director'], $data['sector'], $data['plan'], $data['area'], $data['estado'], $data['modalidad'], $data['mail'], $data['telefono'], $data['direccion'], $data['escuela_id_municipio']);//ingresa dato tescuela
			$this->establecimientos_model->actualizarJornada($data['id_escuela'], $data['jornada']);//in data Tjornada
			$this->establecimientos_model->actualizarNivel($data['id_escuela'], $data['nivel']);//ingdatos en la Tnivel
			$this->establecimientos_model->actualizarCta($data['id_escuela'], $data['cta']);//ingdatos en la Tcoordiandor
			redirect("/Establecimientos/listar");
			}
		}
		$this->load->view('editar_escuela', $data);
	}

	public function departamento(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data['departamento'] =  $this->establecimientos_model->seleccionarDepartamento();
		echo '<option selected disabled value="">Seleccionar</option>';
		foreach ($data['departamento'] as $key) {
		echo '<option value="'.$key['id_departamento'].'">'.$key['nombre_depto'].'</option>'."\n";
		}
	}

	public function municipio(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$depto = $_POST['departamento'];//recibe el id del depto
		$data['municipio'] =  $this->establecimientos_model->seleccionarMunicipio($depto); //Selelc el mun para el select option
		foreach ($data['municipio'] as $key) {
		echo '<option value="'.$key['id_municipio'].'">'.$key['nombre_mun'].'</option>'."\n";
		}
	}
	
	public function coordinacion(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		$data['coordinacion'] =  $this->establecimientos_model->seleccionarUsuario(); //Selelcciona el depto
		echo '<option selected disabled value="">Seleccionar</option>';
		foreach ($data['coordinacion'] as $key) {
		echo '<option value="'.$key['id_usuario'].'">'.$key['usuario'].'</option>'."\n";
		}
	}

	public function director(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data['director'] =  $this->establecimientos_model->seleccionarDocente(); //Selelcciona al director
		echo '<option selected disabled value="">Seleccionar</option>';
		foreach ($data['director'] as $key) {
		echo '<option value="'.$key['id_docente'].'">'.$key['nombre_d'].'</option>'."\n";
		}
	}
	//para vizualizar a detalle los datos del establecimiento
	function detalle($id = 0){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data['arr'] = $this->establecimientos_model->seleccionarEscuelasG($id);
		$this->load->view('detalle_escuela', $data);
	}
//para descargar la inofrmación detallada del establecimiento
	function DescargarEscuela($id = 0){
		$this->restringirAcceso();
		$data['arr'] = $this->establecimientos_model->seleccionarEscuelasG($id);
		$hoy = date("dmy");
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Letter']);
		$html=$this->load->view('detalle_escuelaDescargar', $data, true);
		$pdfFilePath = "080103".'detalleEscuela_'.$hoy.".pdf";

		$mpdf->WriteHTML($html);
		$mpdf->Output($pdfFilePath, 'D');
	}

//Mostrar Nómina y descarga de docnetes del establecimiento
	function NominaDetalle($id = 0){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data['arr'] = $this->establecimientos_model->seleccionarEscuelasNomina($id);
		$data['arr1'] = $this->establecimientos_model->seleccionarEscuelasNominaD($id);
		$this->load->view('detalle_escuelaNomina', $data);
	}

	function DescargarEscuelaNomina($id = 0){
		$this->restringirAcceso();
		$data['arr'] = $this->establecimientos_model->seleccionarEscuelasNomina($id);
		$data['arr1'] = $this->establecimientos_model->seleccionarEscuelasNominaD($id);
		$hoy = date("dmy");
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Letter']);
		$html=$this->load->view('detalle_escuelaNominaDes', $data, true);
		$pdfFilePath = "080103".'Nómina_Docentes_Escuela_'.$hoy.".pdf";

		$mpdf->WriteHTML($html);
		$mpdf->Output($pdfFilePath, 'D');
	}

//eliminar escuela
	public function baja($id_escuela) {
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$this->establecimientos_model->darBaja($id_escuela);
		redirect("Establecimientos/listar");
	}

	public function jornada() {
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data['arr'] = $this->establecimientos_model->seleccionarEscuelas();
		$data['categoria'] = "";

			if (isset($_POST['BtnCategoria'])) {
				$data['categoria'] = $_POST['selectCategoria'];
				if ($data['categoria'] == "Todos") {
						$data['arr'] = $this->establecimientos_model->seleccionarEscuelas();
				}else {
					$data['arr'] = $this->establecimientos_model->seleccionarEscuelasJornada($data['categoria']);
				}
			}
		$this->load->view('est_jornada', $data);
	}


	public function nivel() {
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data['arr'] = $this->establecimientos_model->seleccionarEsNivel();

		$data['categoria13'] = "";

			if (isset($_POST['BtnCategoria13'])) {
				$data['categoria13'] = $_POST['selectCategoria13'];
				if ($data['categoria13'] == "Todos") {
						$data['arr'] = $this->establecimientos_model->seleccionarEsNivel();
				}else {
					$data['arr'] = $this->establecimientos_model->seleccionarEscuelasNivel($data['categoria13']);
				}
			}
		$this->load->view('est_nivel', $data);
	}
// para mostrar datos generales y tabla de circulares subidas por el cta
	public function info(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data['arr'] = $this->documentos_model->seleccionarCircular();
		$this->load->view('info', $data);

	}

	//días efectivos por establecimiento
	function diasEfectivo(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data['arr'] = $this->establecimientos_model->selectEscuelasUser();
		$this->load->view('listado_escuelasDias', $data);
	}


	function diasEfectivo2($id = 0){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data['arr'] = $this->establecimientos_model->seleccionarEscuelasDias($id);
		$data['arr1'] = $this->establecimientos_model->MostrarDatos($id);
		$this->load->view('dia_efectivoGeneral', $data);
	}
}