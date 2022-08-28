<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logeo_model extends CI_Model
{
	public $TABLA = "tbl_empresa";
	public $idx;
	protected $nombre;
	protected $codigo;
	protected $detalles;
	protected $estado = 1;

	public function get($codigo)
	{
		return $this->db->get_where($this->TABLA, ["codigo" => $codigo])->row();
	}

	public function validar($usu, $pass)
	{
		$pass = pw_hash($pass);
		return $pass;
		//$this->db->get_where()
	}
}


/* End of file Logeo_model.php and path \application\models\Logeo_model.php */
