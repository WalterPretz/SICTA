<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informes extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('establecimientos_model');
		$this->load->model('estadistica_model');
		$this->load->model('usuario_model');
		$this->load->model('docentes_model');
	}

	private function restringirAcceso() {
		if (!isset($this->session->USUARIO)) {
			redirect("usuario/login");
		}
	}

	function index(){
		$this->restringirAcceso();
		$data['arr'] = $this->establecimientos_model->seleccionarEscuelas();
		$hoy = date("dmy");
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Letter']);
		$html=$this->load->view('informeEscuela', $data, true);
		$pdfFilePath = "080103".'_G'.$hoy.".pdf";

		$mpdf->setFooter('{PAGENO}');
		$mpdf->WriteHTML($html);
		$mpdf->Output($pdfFilePath, 'D');
	}

	function descargar(){
		$this->restringirAcceso();

		$data['arr'] = $this->estadistica_model->seleccionarEscuelaJornada();
		$data['nivel'] = $this->estadistica_model->seleccionarEsNivel();
		$data['presupuesto'] = $this->estadistica_model->seleccionarPresupuesto();

		$hoy = date("dmy");
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Letter']);
		$html=$this->load->view('reporteEstadistico', $data, true);
		$pdfFilePath = "080103".'_Reporte'.$hoy.".pdf";

		$mpdf->setFooter('{PAGENO}');
		$mpdf->WriteHTML($html);
		$mpdf->Output($pdfFilePath, 'D');
	}

	function descargarNivel(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		
		$hoy = date("dmy");

		$data = [];
		$categoria13 = $_GET['Niveles'];
			if ($categoria13 == "Todos") {
				$data['arr'] = $this->establecimientos_model->seleccionarEscuelas();
			}else {
				$data['arr'] = $this->establecimientos_model->seleccionarEscuelasNivel($categoria13);
			}

		$html=$this->load->view('reporteEsNivel', $data, true);
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Letter']);
		$pdfFilePath = "080103".'ESCUELAS_NIVEL'.$categoria13.$hoy.".pdf";

		$mpdf->setFooter('{PAGENO}');
		$mpdf->WriteHTML($html);
		$mpdf->Output($pdfFilePath, 'D');
	}

	function descargarJornada(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		
		$hoy = date("dmy");

		$data = [];
		$categoria = $_GET['Jornadas1'];
			if ($categoria == "Todos") {
				$data['arr'] = $this->establecimientos_model->seleccionarEscuelas();
			}else {
				$data['arr'] = $this->establecimientos_model->seleccionarEscuelasJornada($categoria);
			}

		$html=$this->load->view('reporteEsJornada', $data, true);
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Letter']);
		$pdfFilePath = "080103".'ESCUELAS_JORNADA'.$categoria.$hoy.".pdf";

		$mpdf->setFooter('{PAGENO}');
		$mpdf->WriteHTML($html);
		$mpdf->Output($pdfFilePath, 'D');
	}

	function usuarioPDF(){
		$this->restringirAcceso();
		$data['arr'] = $this->usuario_model->seleccionarUs();
		$hoy = date("dmy");
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Letter']);
		$html=$this->load->view('lista_us1', $data, true);
		$pdfFilePath = "080103".'USUARIOS'.$hoy.".pdf";

		$mpdf->setFooter('{PAGENO}');
		$mpdf->WriteHTML($html);
		$mpdf->Output($pdfFilePath, 'D');
	}

	function descargarDocente(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		
		$hoy = date("dmy");

		$data = [];
		$escuela = $_GET['Establecimientos'];
			if ($escuela == "Todos") {
				$data['arr'] = $this->docentes_model->seleccionarDocentesEscuelas();
			}else {
				$data['arr'] = $this->docentes_model->seleccionarEscuelasDocentes($escuela);
			}

		$html=$this->load->view('reporteDocente', $data, true);
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Letter']);
		$pdfFilePath = "080103".'DOCENTES'.$escuela.$hoy.".pdf";

		$mpdf->setFooter('{PAGENO}');
		$mpdf->WriteHTML($html);
		$mpdf->Output($pdfFilePath, 'D');
	}
	

	//Descargar docentes del establecimiento logeado
	function DesNominaEscuela(){
		$this->restringirAcceso();
		$data['arr'] = $this->docentes_model->listarDocentesEscuela($this->session->IDUSUARIO);
		$hoy = date("dmy");
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Letter']);
		$html=$this->load->view('listadodocentesDirectorDes', $data, true);
		$pdfFilePath = "080103".'_Nómina_'.$hoy.".pdf";

		$mpdf->setFooter('{PAGENO}');
		$mpdf->WriteHTML($html);
		$mpdf->Output($pdfFilePath, 'D');
	}
//descargar datos generales del docente
	function DescargarDocentesId($id = 0){
		$this->restringirAcceso();
		$data['arr'] = $this->docentes_model->seleccionarDocenteId($id);
		$hoy = date("dmy");
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'Letter']);
		$html=$this->load->view('lisDoceDescargar', $data, true);
		$pdfFilePath = "080103".'detalleDocente_'.$hoy.".pdf";

		$mpdf->WriteHTML($html);
		$mpdf->Output($pdfFilePath, 'D');
	}
}