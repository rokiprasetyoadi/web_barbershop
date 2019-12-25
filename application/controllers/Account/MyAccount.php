<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Myaccount extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_myaccount');
    }

    public function index()
    {
        $data['customers'] = $this->db->get_where('customers', ['customers_email' => $this->session->userdata('email')])->row_array();
        $this->temp->load('partials', 'account/myaccount', $data);
    }
}
