<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	function __construct()
	 	{
	 		parent :: __construct();
	 		if($this->session->userdata('status') != "login"){
			redirect(base_url("admin/Login_admin"));
			}
	 	}

    public function index()
    {
        $this->temp->load('admin/partials', 'admin/barang');
    }

}

/* End of file Controllername.php */
