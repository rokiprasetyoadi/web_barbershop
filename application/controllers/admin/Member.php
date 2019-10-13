<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

    public function index()
    {
        $this->temp->load('admin/partials', 'admin/member');
    }

}

/* End of file Controllername.php */
