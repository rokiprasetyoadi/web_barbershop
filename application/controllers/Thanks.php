<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Thanks extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Codeigniter : Write Less Do More
    }

    public function index($thanks)
    {
        $this->load->view('toko/thankspage');
    }
}
