<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Participantes extends CI_Controller {
   
	public $ORG = NULL;
	public function __construct()
	{
		parent::__construct();
		$this->ORG =  strtoupper($this->uri->segments[1]);

		$this->load->model('Participantes_model','PAR',true);		
		$this->PAR->CODIGO=$this->ORG;

		$this->load->model('Usuarios_model','USU',true);		
		$this->USU->CODIGO=$this->ORG;
		//$this->participantes_model->CODIGO="....";		
	}

	public function index()
	{
		$data = [];
		$data["ORG"] = $this->ORG;
		$data["USU"] = $this->USU->get($this->session->idx);
		$data["TOP"] = $this->load->view('panel/top', $data, true);
		$data["NAV"] = $this->load->view('panel/nav', $data, true);
		$data["SIDEBAR"] = $this->load->view('panel/sidebar', $data, true);
		$data["CONTENT"] = $this->load->view('participantes/content', $data, true);
		$data["FOOTER"] = $this->load->view('panel/footer', $data, true);
		$this->load->view('panel/index', $data);
	}

	public function get($idx = null, $return = false)
	{
		$data = [];
		if ($idx == null)
			$resp = $this->PAR->getAll();
		else {
			$resp = $this->PAR->get($idx);
		}
		if ($return == true)
			return json_encode($resp);

		echo json_encode($resp);
	}

	public function form($idx)
	{		
		if($idx==0){
			//$this->output->cache(3);
		}
		$data = [];
		$data["ORG"] = $this->ORG;
		$data["PAR"] = $this->get($idx, true);
		$data["TOP"] = $this->load->view('panel/top', $data, true);
		$this->load->view('participantes/form', $data);
		//sleep(2);
	}

	public function save()
	{
		$RESP = [];
		$RESP["RESP"] = false;
		$RESP["TOKEN_NAME"] = $this->security->get_csrf_token_name();
		$RESP['TOKEN_HASH'] = $this->security->get_csrf_hash();

		if ($_POST["idx"] == "" || $_POST["idx"] == 0) {
			$RESP["RESP"] = $this->PAR->crear($_POST);
		} else {			
			$RESP["RESP"] = $this->PAR->save($_POST);
		}

		echo json_encode($RESP);
	}

}

/* End of file Participantes.php and path \application\controllers\Participantes.php */
