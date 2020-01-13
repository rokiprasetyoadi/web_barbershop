<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_myaccount');
        $this->load->model('M_pembayaran');
    }

    public function index()
    {
        $this->session->set_flashdata('account-access', '<div class="alert alert-danger" role="alert"> Silahkan login terlebih dahulu untuk mengakses halaman ini</div>');
        if ($this->session->userdata('email')==null) {
            redirect('login');
        }
        $data['customers'] = $this->db->get_where('customers', ['customers_email' => $this->session->userdata('email')])->row_array();
        $data['pesanan'] =  $this->db->get('tbl_penjualan')->result_array();
        $this->temp->load('partials', 'account/order', $data);
    }
    public function bayar($id)
    {
        $data['ongkir'] = $this->M_pembayaran->showOngkir($id);
        $data['detil_barang'] = $this->M_pembayaran->tampilOrder($id);
        $this->temp->load('partials', 'toko/uploadbukti', $data);
    }

    public function upload()
    {
        $this->M_pembayaran->uploadBukti();

        echo "<h1> Berhasil upload</h1>";
    }
}
