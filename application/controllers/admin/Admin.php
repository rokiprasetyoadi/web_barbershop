<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index()
    {
        $this->temp->load('admin/partials', 'admin/admin');
    }

}

/* End of file Controllername.php */
