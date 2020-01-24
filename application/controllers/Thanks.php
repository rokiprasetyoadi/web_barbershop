<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Thanks extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pembayaran');
        // $paktur = $this->M_pembayaran->thanksP();
        // $id = $paktur['jual_nofak'];
    }

    public function bro($id)
    {
        // $id = $this->M_pembayaran->thanksP();
        $data['customers'] = $this->db->get_where('customers', ['customers_email' => $this->session->userdata('email')])->row_array();
        $data['ongkir'] = $this->M_pembayaran->showOngkir($id);
        $data['detil_barang'] = $this->M_pembayaran->tampilOrder($id);
        $this->load->view('toko/thankspage', $data);
    }
}
