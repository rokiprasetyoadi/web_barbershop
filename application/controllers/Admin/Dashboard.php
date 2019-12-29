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
        $this->load->model("M_index");
            date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['total_customers']=$this->M_index->hitung_customers();
        $data['total_barang']=$this->M_index->hitung_barang();
        $data['total_transaksi']=$this->M_index->hitung_transaksi();
        $data['total_pengiriman']=$this->M_index->hitung_pengiriman();
        $this->temp->load('admin/partials', 'admin/index', $data);
    }
}
