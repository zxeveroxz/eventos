<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios_model extends CI_Model
{
	public $TABLA = "tbl_usuarios";
	public $CODIGO = null; // es la clave foranea para amarrar la empresa a los usuarios
	public $idx;
	protected $usuario;
	protected $password;
	protected $nombre;
	protected $correo = null;
	protected $detalles = null;
	protected $nivel = 'user'; //'admin'	
	protected $estado = 1;
	protected $fecha;

	public function __construct()
	{
		parent::__construct();
		$this->fecha = date('Y-m-d H:i:s');
	}

	public function check_codigo()
	{
		if ($this->CODIGO === null)
			throw new Exception("No se instancio el CODIGO del organizador");
	}

	public function get($idx)
	{
		return $this->db->get_where($this->TABLA, ["idx" => $idx, 'codigo' => $this->CODIGO])->row();
	}

	public function crear($usuario, $password, $nombre, $correo, $detalles, $nivel)
	{
		try {
			$this->check_codigo();

			$this->db->insert($this->TABLA, [
				"codigo" => $this->CODIGO,
				"usuario" => $usuario,
				"password" => pw_hash($password),
				"nombre" => $nombre,
				"correo" => $correo,
				"detalles" => $detalles,
				"nivel" => $nivel,
				"estado" => $this->estado,
				"fecha" => $this->fecha
			]);

			$resp = $this->db->insert_id() ?: $this->db->error()["message"];
			return $resp;
		} catch (Exception $e) {
			echo '</br> <b> Exception Message: ' . $e->getMessage() . $e->getTrace()[0]["class"] 		. '</b>';
		}
	}
}
/* End of file Usuarios_model.php and path \application\models\Usuarios_model.php */
