<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    public function index()
    {
        $this->temp->load('admin/partials', 'admin/barang');
    }

}

/* End of file Controllername.php */
