<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent :: __construct();
        if ($this->session->userdata('status') != "login") {
            redirect(base_url("admin/Login_admin"));
        }
    }

    public function index()
    {
        $this->temp->load('admin/partials', 'admin/index');
    }
}