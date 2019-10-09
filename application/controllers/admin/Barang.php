<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    public function index()
    {
        $this->load->view('admin/barang');
    }

}

/* End of file Controllername.php */
