<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Matriculas_model extends CI_Model 
{
                    
     
    public $TABLA = "tbl_matriculas";
	public $CODIGO = null; // es la clave foranea para amarrar la empresa a los usuarios
    public $idx;
	public $evento; //id de la tabal enventos
	protected $turno; //'I', 'II', 'III', 'IV', 'V', 'VI'
	public $expositor; //id de la tabla de expositores
	protected $fec_ini;	
    protected $lecciones;	
    protected $matricula;	
    protected $cuota;	
    protected $cuota_numeros;	
    protected $cuota_modo;	//'d', 's', 'm', 'u'
    protected $finalizado;	//'n', 's'
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

	public function getAll()
	{
		return $this->db->get_where($this->TABLA, ['codigo' => $this->CODIGO])->result();
	}


	public function crear($post=[])
	{
		try {
			$this->check_codigo();
			
			$post["codigo"]=$this->CODIGO;
			$post["fecha"]=$this->fecha;
			$this->db->insert($this->TABLA, $post);

			$resp = $this->db->insert_id() ?: $this->db->error()["message"];
			return $resp;
		} catch (Exception $e) {
			echo '</br> <b> Exception Message: ' . $e->getMessage() . $e->getTrace()[0]["class"] 		. '</b>';
		}
	}


	public function save($data)
	{
		$idx = $data['idx'];
		unset($data['idx']);
		$this->db->where('idx', $idx);
		$this->db->update($this->TABLA, $data);

		return $this->db->affected_rows()>0?$this->db->affected_rows():$this->db->error()["message"];
	}
                                
}


/* End of file Matriculas_model.php and path \application\models\Matriculas_model.php */
