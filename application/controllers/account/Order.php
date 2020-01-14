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
        $data = [
        'pembayaran_bukti' => $this->_bukti()
      ];
        // echo "<pre>";
        // print_r($data);
        $this->db->where('pembayaran_jual_id', $this->input->post('kdfaktur'));
        $this->db->update('tbl_pembayaran', $data);
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
}
