<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Varios extends CI_Controller
{

	public $ORG = NULL;
	public function __construct()
	{
		parent::__construct();
		$this->ORG =  strtoupper($this->uri->segments[1]);		
	}

    public function dni_buscar($dni){
            if(strlen($dni)!=8)
                echo "Error";

        echo  json_encode(json_decode(dni_clientes($dni)));
    }
}