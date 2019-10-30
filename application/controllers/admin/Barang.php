<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	function __construct()
	 	{
	 		parent :: __construct();
	 		if($this->session->userdata('status') != "login"){
			redirect(base_url("admin/Login_admin"));
			}
			$this->load->model("M_barang");
	 	}

    public function index()
    {
        $data['tbl_barang']=$this->M_barang->tampil_data();
        $this->temp->load('admin/partials', 'admin/barang', $data);
    }

}

/* End of file Controllername.php */
