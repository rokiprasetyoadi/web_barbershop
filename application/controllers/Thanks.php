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

        if ($data['ongkir']['jual_nofak'] != $id) {
            $data['heading'] = "404, Maaf";
            $data['message'] = "Halaman tidak di temukan";
            $this->load->view('errors/html/error_404', $data);
        } else {
            $this->load->view('toko/thankspage', $data);
        }
    }
}
