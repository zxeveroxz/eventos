<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Logeo extends CI_Controller
{
	public $ORG = NULL;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('logeo_model');
		$this->load->model('usuarios_model');
		$this->ORG =  @strtoupper($this->uri->segments[1]);
	}
	/*
	public function _remap($method, $params = [])
	{
		if ($method === 'some_method') {
			//$this->$method();
		} else {
			// $this->default_method();
			echo $method;
		}
	}
*/

	public function index()
	{
		echo "hi";
	}


	public function ver($empresa_codigo = null)
	{
		$data = [];
		$LOG = new Logeo_model();
		$row = $LOG->get($empresa_codigo);
		if ($row == null)
			show_404();

		$data["ORG"] = $this->ORG;
		$data["nombre"] = $row->nombre;
		$data['css'] = $this->load->view('logeo/index.css', null, true);
		$this->load->view('logeo/index', $data);
	}



	public function validar()
	{
		//try {
		$USU = new Usuarios_model();
		$USU->CODIGO = $this->ORG;
		$r =  $USU->crear('gretel8', '123', 'gretel mendivil', '', '', 'user');

		print_r($r);
		//echo $this->logeo->validar("hol", "juan");
		//} catch (Exception $e) {
		//	echo '</br> <b> Exception Message: ' . $e->getMessage() . $e->getTrace()[0]["class"] 		. '</b>';
		//}
	}

	public function panel()
	{
		//print_r($this->session);
		$data = [];
		$USU = new Usuarios_model();
		$USU->CODIGO = $this->ORG;
		$data["ORG"] = $this->ORG;
		$data["USU"] = $USU->get($this->session->idx);
		$data["TOP"] = $this->load->view('panel/top',$data,true);
		$data["NAV"] = $this->load->view('panel/nav',$data,true);
		$data["SIDEBAR"] = $this->load->view('panel/sidebar',$data,true);
		$data["CONTENT"] = $this->load->view('panel/content',$data,true);
		$data["FOOTER"] = $this->load->view('panel/footer',$data,true);
		$this->load->view('panel/index',$data);
	}

	public function salir()
	{
		$this->session->sess_destroy();
		redirect(base_url($this->ORG));
	}
}
