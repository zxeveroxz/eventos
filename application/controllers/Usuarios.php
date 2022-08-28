<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('usuarios_model');
	}

	public function index()
	{
		echo "hi";
	}

	public function crear()
	{
		//try {
		$USU = new Usuarios_model();
		$USU->CODIGO = strtoupper($this->uri->segments[1]);
		//$r =  $USU->crear('gretel8', '123', 'gretel mendivil', '', '', 'user');

		print_r($USU);
		//echo $this->logeo->validar("hol", "juan");
		//} catch (Exception $e) {
		//	echo '</br> <b> Exception Message: ' . $e->getMessage() . $e->getTrace()[0]["class"] 		. '</b>';
		//}
	}
}

/* End of file Usuarios.php and path \application\controllers\Usuarios.php */
