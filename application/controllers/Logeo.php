<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Logeo extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('logeo_model', 'logeo', true);
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
		$row = $this->logeo->get($empresa_codigo);
		if ($row == null)
			show_404();

		$data["nombre"] = $row->nombre;
		$data['css'] = $this->load->view('logeo/index.css', null, true);
		$this->load->view('logeo/index', $data);
	}

	public function validar()
	{
		echo $this->logeo->validar("hol", "juan");
	}
}
