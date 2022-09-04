<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Participantes extends CI_Controller {

   
	public $ORG = NULL;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Participantes_model');
		$this->ORG =  strtoupper($this->uri->segments[1]);
	}

	public function index()
	{
		//print_r($this->session);
		$data = [];
		$PAR = new Participantes_model();
		$PAR->CODIGO = $this->ORG;
		$data["ORG"] = $this->ORG;
		$data["USU"] = $PAR->get($this->session->idx);
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
		$PAR = new Participantes_model();
		$PAR->CODIGO = $this->ORG;
		if ($idx == null)
			$resp = $PAR->getAll();
		else {
			$resp = $PAR->get($idx);
		}
		if ($return == true)
			return json_encode($resp);

		echo json_encode($resp);
	}

	public function form($idx)
	{

		$data = [];
		$PAR = new Participantes_model();
		$data["ORG"] = $PAR->CODIGO = $this->ORG;
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

		$PAR = new Participantes_model();
		$PAR->CODIGO = $this->ORG;

		if ($_POST["idx"] == "" || $_POST["idx"] == 0) {
			$RESP["RESP"] = $PAR->crear($_POST);
		} else {			
			$RESP["RESP"] = $PAR->save($_POST);
		}

		echo json_encode($RESP);
	}

}

/* End of file Participantes.php and path \application\controllers\Participantes.php */
