<?php
defined('BASEPATH') or exit('No direct script access allowed');

// TODO: membuat fitur batal Transaksi
// TODO: setelah upload bukti transfer sekalian merubah status pembayaran menjadi checking

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
        $data['pesanan'] =  $this->db->get_where('tbl_penjualan', ['jual_customers_id' => $this->session->userdata('id')])->result_array();
        $this->temp->load('partials', 'account/order', $data);
    }
    public function bayar($id)
    {
        $data['ongkir'] = $this->M_pembayaran->showOngkir($id);
        $data['detil_barang'] = $this->M_pembayaran->tampilOrder($id);
        $data['gambarbukti'] = $this->M_pembayaran->selectGambar($id);
        $this->temp->load('partials', 'toko/uploadbukti', $data);
    }

    public function upload()
    {
        $data = [
        'pembayaran_bukti' => $this->_bukti()
      ];
        // echo "<pre>";
        // print_r($data);
        $this->db->where('pembayaran_jual_id', $this->input->post('kdfaktur'));
        $this->db->update('tbl_pembayaran', $data);
        redirect('account/order');
    }

    private function _bukti()
    {
        $config = [
          'upload_path' => './assets/upload/bukti_pembayaran/',
          'allowed_types' => 'jpeg|jpg|png',
          'overwrite' => true,
          'max_size' => 5024,
          'file_name' => $this->input->post('kdfaktur')
        ];
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('pembayaran_bukti')) {
            return $this->upload->data("file_name");
        }
    }
    public function batalPesan($faktur)
    {
        $this->M_pembayaran->Qbatal($faktur);
        $this->M_pembayaran->Qbatal2($faktur);
        $this->M_pembayaran->Qbatal3($faktur);
        redirect('account/order');
    }
}
