<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Eventos extends CI_Controller
{

	public $ORG = NULL;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Eventos_model');
		$this->ORG =  strtoupper($this->uri->segments[1]);
	}

	public function index()
	{
		//print_r($this->session);
		$data = [];
		$EVE = new Eventos_model();
		$EVE->CODIGO = $this->ORG;
		$data["ORG"] = $this->ORG;
		$data["USU"] = $EVE->get($this->session->idx);
		$data["TOP"] = $this->load->view('panel/top', $data, true);
		$data["NAV"] = $this->load->view('panel/nav', $data, true);
		$data["SIDEBAR"] = $this->load->view('panel/sidebar', $data, true);
		$data["CONTENT"] = $this->load->view('eventos/content', $data, true);
		$data["FOOTER"] = $this->load->view('panel/footer', $data, true);
		$this->load->view('panel/index', $data);
	}

	public function get($idx = null, $return = false)
	{
		$data = [];
		$EVE = new Eventos_model();
		$EVE->CODIGO = $this->ORG;
		if ($idx == null)
			$resp = $EVE->getAll();
		else {
			$resp = $EVE->get($idx);
		}
		if ($return == true)
			return json_encode($resp);

		echo json_encode($resp);
	}

	public function form($idx)
	{

		$data = [];
		$EVE = new Eventos_model();
		$data["ORG"] = $EVE->CODIGO = $this->ORG;
		$data["EVE"] = $this->get($idx, true);
		$data["TOP"] = $this->load->view('panel/top', $data, true);
		$this->load->view('eventos/form', $data);
		//sleep(2);
	}

	public function save()
	{
		$RESP = [];
		$RESP["RESP"] = false;
		$RESP["TOKEN_NAME"] = $this->security->get_csrf_token_name();
		$RESP['TOKEN_HASH'] = $this->security->get_csrf_hash();

		$EVE = new Eventos_model();
		$EVE->CODIGO = $this->ORG;

		if ($_POST["idx"] == "" || $_POST["idx"] == 0) {
			$RESP["RESP"] = $EVE->crear($_POST);
		} else {			
			$RESP["RESP"] = $EVE->save($_POST);
		}

		echo json_encode($RESP);
	}


		
}

