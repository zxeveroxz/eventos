<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Matriculas extends CI_Controller {


	public $ORG = NULL;
	public function __construct()
	{
		parent::__construct();
        $this->ORG =  strtoupper($this->uri->segments[1]);

        $this->load->model('Eventos_aperturas_model','EVA',true);
        $this->EVA->CODIGO=$this->ORG;

		$this->load->model('Usuarios_model','USU',true);
        $this->USU->CODIGO=$this->ORG;

        $this->load->model('Eventos_model','EVE',true);
		$this->EVE->CODIGO=$this->ORG;

        $this->load->model('Expositores_model','EXP',true);
		$this->EXP->CODIGO=$this->ORG;

        $this->load->model('Matriculas_model','MAT',true);
		$this->MAT->CODIGO=$this->ORG;

	}

	public function index()
	{
		$data = [];
		$data["ORG"] = $this->ORG;
		$data["USU"] = $this->USU->get($this->session->idx,true);
		$data["TOP"] = $this->load->view('panel/top', $data, true);
		$data["NAV"] = $this->load->view('panel/nav', $data, true);
		$data["SIDEBAR"] = $this->load->view('panel/sidebar', $data, true);
		$data["CONTENT"] = $this->load->view('matriculas/content', $data, true);
		$data["FOOTER"] = $this->load->view('panel/footer', $data, true);
		$this->load->view('panel/index', $data);
	}

	public function get($idx = null, $return = false)
	{
		$data = [];
		if ($idx == null)
			$resp = $this->MAT->getAll();
		else {
			$resp = $this->MAT->get($idx);
		}
		if ($return == true)
			return json_encode($resp);

		echo json_encode($resp);
	}

	public function form($idx)
	{
		$data = [];
		$data["ORG"] = $this->ORG;
        $data["EVE"] = $this->EVE->getAll(); //EVENTO MODEL
        //$data["EXP"] = $this->EXP->getAll(); //EXPOSITOR MODEL
		$data["MAT"] = $this->get($idx, true);//EVENTOS APERTURA
		$data["TOP"] = $this->load->view('panel/top', $data, true);
		$this->load->view('eventos_aperturas/form', $data);
		//sleep(2);
	}

	public function save()
	{
		$RESP = [];
		$RESP["RESP"] = false;
		$RESP["TOKEN_NAME"] = $this->security->get_csrf_token_name();
		$RESP['TOKEN_HASH'] = $this->security->get_csrf_hash();

		if ($_POST["idx"] == "" || $_POST["idx"] == 0) {
			$RESP["RESP"] = $this->EVA->crear($_POST);
		} else {			
			$RESP["RESP"] = $this->EVA->save($_POST);
		}

		echo json_encode($RESP);
	}
}

/* End of file Matriculas.php and path \application\controllers\Matriculas.php */