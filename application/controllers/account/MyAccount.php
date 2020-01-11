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
        $this->session->set_flashdata('account-access', '<div class="alert alert-danger" role="alert"> Silahkan login terlebih dahulu untuk mengakses halaman ini</div>');
        if ($this->session->userdata('email')==null) {
          redirect('login');
        }
        $data['customers'] = $this->db->get_where('customers', ['customers_email' => $this->session->userdata('email')])->row_array();
        $this->temp->load('partials', 'account/myaccount', $data);
    }
}
