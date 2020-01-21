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
        // cek order yang lebih dari tgl order
        $lama = 1;
        $this->db->where('DATEDIFF(CURDATE(), jual_tgl) >=', $lama);
        $this->db->where('jual_status', "Waiting for Payment");
        $data['selectexp'] = $this->db->get('tbl_penjualan')->result_array();
        // echo "<pre>";
        // print_r($data['selectexp']);
        // die;
        // fungsi untuk menghapus data penjualan & pembayaran jika tidak di lakukan pembayaran lebih dari tgl order
        foreach ($data['selectexp'] as $dt) {
            $paktur = [
            'jual_nofak' => $dt['jual_nofak'],
            'detailjual_nofak' => $dt['jual_nofak'],
            'pembayaran_jual_id' => $dt['jual_nofak']
          ];
            $this->db->delete('tbl_penjualan', ['jual_nofak' => $paktur['jual_nofak']]);
            $this->db->delete('tbl_detailpenjualan', ['detailjual_nofak' => $paktur['detailjual_nofak']]);
            $this->db->delete('tbl_pembayaran', ['pembayaran_jual_id' => $paktur['pembayaran_jual_id']]);
        }
        // end check & delete tgl order
        $this->session->set_flashdata('account-access', '<div class="alert alert-danger" role="alert"> Silahkan login terlebih dahulu untuk mengakses halaman ini</div>');
        if ($this->session->userdata('email')==null) {
            redirect('login');
        }
        $data['customers'] = $this->db->get_where('customers', ['customers_email' => $this->session->userdata('email')])->row_array();
        $data['notpaid'] =  $this->db->get_where('tbl_penjualan', ['jual_customers_id' => $this->session->userdata('id'), 'jual_status' => "Waiting for Payment"])->result_array();
        $data['proses'] =  $this->db->get_where('tbl_penjualan', ['jual_customers_id' => $this->session->userdata('id'), 'jual_status' => "Process"])->result_array();
        $data['kirim'] =  $this->db->get_where('tbl_penjualan', ['jual_customers_id' => $this->session->userdata('id'), 'jual_status' => "On The Way"])->result_array();
        $data['terima'] =  $this->db->get_where('tbl_penjualan', ['jual_customers_id' => $this->session->userdata('id'), 'jual_status' => "Arrived"])->result_array();
        $data['batal'] =  $this->db->get_where('tbl_penjualan', ['jual_customers_id' => $this->session->userdata('id'), 'jual_status' => "Rejected"])->result_array();

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
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data pemesanan <b>'.$faktur.'</b> telah di hapus</div>');
        redirect('account/order');
    }
}
