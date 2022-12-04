<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendario extends CI_Controller {

public function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('calendario_model');
	}


	private function restringirAcceso() {
		if (!isset($this->session->USUARIO)) {
			redirect("Inicio");
		}
	}

	public function index(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$this->load->view('calendario', $data);
	}

	public function ListarEventos(){
		$this->restringirAcceso();
		$r = $this->calendario_model->ListarEventos();
		echo json_encode($r);
	}

	function calendarioU(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$this->load->view('calendarioU', $data);
	}

	public function ActualizarEvento(){
		$this->restringirAcceso();
		$param['id'] = $this->input->post('id');
		$param['fecini'] = $this->input->post('fecini');
		$param['fecfin'] = $this->input->post('fecfin');
		$arr = $this->calendario_model->ActualizaEvento($param);
		echo $arr;
	}

	public function eliminarEvento(){
		$this->restringirAcceso();
		$id = $this->input->post('id');
		$r = $this->calendario_model->eliminarEvento($id);
		echo $r;
	}

	public function ActualizarEventoCom(){
		$this->restringirAcceso();
		$param['id'] = $this->input->post('id');
		$param['tit'] = $this->input->post('tit');
		$param['des'] = $this->input->post('des');
		$param['lugar'] = $this->input->post('lugar');
		$param['col'] = $this->input->post('col');
		$param['coltext'] = $this->input->post('coltext');
		$param['start'] = $this->input->post('start');
		$param['end'] = $this->input->post('end');

		$arr = $this->calendario_model->ActualizarEventoCom($param);
		echo $arr;
	}

	function Crear(){
		$this->restringirAcceso();
		$data['id'] = $this->input->post('id');
		$data['titulo'] = $this->input->post('titulo');
		$data['descripcion'] = $this->input->post('descripcion');
		$data['lugar'] = $this->input->post('lugar');
		$data['color'] = $this->input->post('color');
		$data['coltext'] = $this->input->post('coltext');
		$data['start'] = $this->input->post('start');
		$data['end'] = $this->input->post('end');
		
		$arr = $this->calendario_model->crearEvento($data);
		echo $arr;
	}

	public function motivo(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$data['motivo'] =  $this->calendario_model->seleccionarMotivo();
		echo '<option selected disabled value="">Seleccionar</option>';
		foreach ($data['motivo'] as $key) {
		echo '<option value="'.$key['id_motivo'].'">'.$key['motivo'].'</option>'."\n";
		}
	}

	public function tipoMotivo(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$motiv = $_POST['motivo'];//recibe el id del depto
		$data['tipomotivo'] =  $this->calendario_model->seleccionarTipoMotivo($motiv); //Selelc el mun para el select option
		echo '<option selected disabled value="">Seleccionar</option>';
		foreach ($data['tipomotivo'] as $key) {
		echo '<option value="'.$key['id_tipoMotivo'].'">'.$key['descripcionMotivo'].'</option>'."\n";
		}
	}
//días efectivos
	function DiasEfectivos(){
		$this->restringirAcceso();
		$r = $this->calendario_model->DiasE($this->session->IDUSUARIO);
		echo json_encode($r);
	}

	function CrearDia(){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');

		$data['dias'] ="";
		$data['dia_id_motivo'] ="";
		$data['descripcion'] ="";
		$data['id_usuario'] = $this->session->IDUSUARIO;
		$data['mensaje'] ="";	

		if (isset($_POST['guardar'])) {
			$data['dias'] = str_replace(["<",">"], "", $_POST['dias']);
			$data['descripcion'] = str_replace(["<",">"], "", $_POST['descripcion']);
			$data['dia_id_motivo'] = $_POST['tipomotivo'];
			
			$this->calendario_model->crearMotivoDia($data['id_usuario'], $data['dias'], $data['dia_id_motivo'], $data['descripcion']);//ingresa datos en el form de d_efectivo

				$data['mensaje'] = "<script>alertify.set('notifier','position', 'top-right');alertify.success('Datos guardados exitosamente');</script>";
		}
		$data['arr1'] = $this->calendario_model->listarDiasEfectivos($this->session->IDUSUARIO);
		$this->load->view('dia_efectivo', $data);
	}

	function elimMotivoDia($id_dia){
		$this->restringirAcceso();
		$data['base_url'] = $this->config->item('base_url');
		$this->calendario_model->eliminarMotivoDia($id_dia);
		redirect("Calendario/CrearDia");
	}
	
}