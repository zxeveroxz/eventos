<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Ubigeo extends CI_Controller {

    public $ORG = NULL;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Ubigeo_model','UBI',true);		
	}

	public function get($idx = null, $return = false)
	{
		if ($idx == null)
			$resp = $this->UBI->getAll();
		else {
			$resp = $this->UBI->get($idx);
		}
		if ($return == true)
			return json_encode($resp);

		echo json_encode($resp);
	}

    public function ver(){
        $datos = json_decode($this->get(null,true));

        $data = [];
        $dd=$pp=$dd=-1;
        foreach($datos as $d){
            if($d->dep !="" && $d->pro=="" && $d->dis==""){                
                $dd++;
                $data[$d->dep] = [];
            }
            elseif($d->dep !="" && $d->pro!="" && $d->dis==""){
                $pp++;
                $data[$d->dep][$d->pro]= [];
            }else{
                $data[$d->dep][$d->pro][]=$d->dis;
            }
                
        }       

        echo json_encode($data);
    }

    public function dep(){
        $this->output->cache(3600);
        $data = [];
        $data["DATA"] = $this->UBI->query("select  dep from tbl_ubigeo  where SUBSTRING(idx,3,4)='0000'");
        $this->load->view("ubigeo/index",$data);
    }

    public function pro($dep){
        $this->output->cache(3600);
        $data = [];
        $data["DATA"] = $this->UBI->query("select  pro from tbl_ubigeo  where pro!='' and dis ='' and dep = ?", rawurldecode($dep));
        $this->load->view("ubigeo/index",$data);
    }

    public function dis($dep,$pro){
       $this->output->cache(3600);
        $data = [];
        $data["DATA"] =  $this->UBI->query("select  dis from tbl_ubigeo  where dis !='' and dep = ? and pro = ?",[rawurldecode($dep),rawurldecode($pro)]);
        $this->load->view("ubigeo/index",$data);
    }

}

/* End of file Ubigeo.php and path \application\controllers\Ubigeo.php */
