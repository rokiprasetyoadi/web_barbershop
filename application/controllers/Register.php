<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function index()
    {
        $this->temp->load('partials', 'register');
    }

}

/* End of file Register.php */