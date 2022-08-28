<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios_model extends CI_Model
{
	public $TABLA = "tbl_usuarios";
	public $CODIGO; // es la clave foranea para amarrar la empresa a los usuarios
	public $idx;
	protected $nombre;
	protected $codigo;
	protected $detalles;
	protected $estado = 1;

	public function get($codigo)
	{
		return $this->db->get_where($this->TABLA, ["codigo" => $codigo])->row();
	}


	public function select()
	{
	}
}


/* End of file Usuarios_model.php and path \application\models\Usuarios_model.php */
