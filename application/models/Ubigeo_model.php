<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Ubigeo_model extends CI_Model 
{
    
    public $TABLA = "tbl_ubigeo";
    public $idx;
    public $dep;
    public $pro;
    public $dis;

    public function __construct()
    {
        parent::__construct();
    }

    public function get($idx)
    {
        return $this->db->get_where($this->TABLA, ["idx" => $idx])->row();
    }

    public function getAll()
    {
        return $this->db->get_where($this->TABLA, [])->result();
    }

    public function query($query,$param=[]){
        return $this->db->query($query,$param)->result();
    }

    public function crear($post = [])
    {
        try {
            $this->db->insert($this->TABLA, $post);

            $resp = $this->db->insert_id() ?: $this->db->error()["message"];
            return $resp;
        } catch (Exception $e) {
            echo '</br> <b> Exception Message: ' . $e->getMessage() . $e->getTrace()[0]["class"] . '</b>';
        }
    }


    public function save($data)
    {
        $idx = $data['idx'];
        unset($data['idx']);
        $this->db->where('idx', $idx);
        $this->db->update($this->TABLA, $data);

        return $this->db->affected_rows() > 0 ? $this->db->affected_rows() : $this->db->error()["message"];
    }                     
                        
}


/* End of file Ubigeo_model.php and path \application\models\Ubigeo_model.php */
