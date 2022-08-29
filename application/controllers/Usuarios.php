<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Controller
{

	public $ORG = NULL;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('usuarios_model');
		$this->ORG =  strtoupper($this->uri->segments[1]);
	}

	public function index()
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
		$data["CONTENT"] = $this->load->view('usuario/content',$data,true);
		$data["FOOTER"] = $this->load->view('panel/footer',$data,true);
		$this->load->view('panel/index',$data);
	}

	public function get($idx=null)
	{
		$data = [];
		$USU = new Usuarios_model();
		$USU->CODIGO = $this->ORG;
		if($idx==null)
			$resp = $USU->getAll();
		else	
			$resp = $USU->get($idx);

		echo json_encode($resp);
	}

	public function editar($idx){
		$resp = $this->get($idx);
		print_r($resp);
	}


	public function crear()
	{
		//try {
		$USU = new Usuarios_model();
		$USU->CODIGO = $this->ORG;
		$r =  $USU->crear('sergio2', '123456', 'sergio zegarra user', '', '', 'user');

		print_r($r);
		//echo $this->logeo->validar("hol", "juan");
		//} catch (Exception $e) {
		//	echo '</br> <b> Exception Message: ' . $e->getMessage() . $e->getTrace()[0]["class"] 		. '</b>';
		//}
	}

	public function validar()
	{
		//try {
		$USU = new Usuarios_model();
		$USU->CODIGO = $this->ORG;

		$usuario = $this->input->post("usu");
		$password = $this->input->post("pas");
		$row = $USU->validar($usuario, $password);
		if ($row === false) {
			$this->session->set_flashdata("error", "Datos Incorrectos");
			redirect(base_url($this->ORG) . "?error");
		} else {
			$this->session->set_userdata(['idx' => $row->idx, "user" => $row->usuario, "nom" => $row->nombre, "niv" => $row->nivel]);
			redirect(base_url("$this->ORG/panel"));
		}


		//echo $this->logeo->validar("hol", "juan");
		//} catch (Exception $e) {
		//	echo '</br> <b> Exception Message: ' . $e->getMessage() . $e->getTrace()[0]["class"] 		. '</b>';
		//}
	}
}

/* End of file Usuarios.php and path \application\controllers\Usuarios.php */
