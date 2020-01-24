<?php
defined('BASEPATH') or exit('No direct script access allowed');
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
        $data['selectexp'] = $this->M_pembayaran->expTglJual();
        $data['selectreject'] = $this->M_pembayaran->expTglReject();
        // fungsi untuk menghapus data penjualan & pembayaran jika tidak di lakukan pembayaran lebih dari tgl order
        foreach ($data['selectexp'] as $dt) {
            $paktur = [
            'jual_nofak' => $dt['jual_nofak']
          ];
            // $this->db->delete('tbl_penjualan', ['jual_nofak' => $paktur['jual_nofak']]);
            $this->db->set('jual_status', "Rejected");
            $this->db->set('jual_tgl_exp', date('Y-m-d h:i:sa'));
            $this->db->where('jual_nofak', $paktur['jual_nofak']);
            $this->db->update('tbl_penjualan');
        }
        // end check & delete tgl order
        foreach ($data['selectreject'] as $sr) {
            $paktur2 = [
            'jual_nofak' => $sr['jual_nofak'],
            'detailjual_nofak' => $sr['jual_nofak'],
            'pembayaran_jual_id' => $sr['jual_nofak']
          ];
            $this->db->delete('tbl_penjualan', ['jual_nofak' => $paktur2['jual_nofak']]);
            $this->db->delete('tbl_detailpenjualan', ['detailjual_nofak' => $paktur2['detailjual_nofak']]);
            $this->db->delete('tbl_pembayaran', ['pembayaran_jual_id' => $paktur2['pembayaran_jual_id']]);
        }

        $this->session->set_flashdata('account-access', '<div class="alert alert-danger" role="alert"> Silahkan login terlebih dahulu untuk mengakses halaman ini</div>');
        if ($this->session->userdata('email')==null) {
            redirect('login');
        }
        // begin query select data
        $data['customers'] = $this->db->get_where('customers', ['customers_email' => $this->session->userdata('email')])->row_array();
        $data['notpaid'] =  $this->db->get_where('tbl_penjualan', ['jual_customers_id' => $this->session->userdata('id'), 'jual_status' => "Waiting for Payment"])->result_array();
        $data['proses'] =  $this->db->get_where('tbl_penjualan', ['jual_customers_id' => $this->session->userdata('id'), 'jual_status' => "Process"])->result_array();
        $data['kirim'] =  $this->db->get_where('tbl_penjualan', ['jual_customers_id' => $this->session->userdata('id'), 'jual_status' => "On The Way"])->result_array();
        $data['terima'] =  $this->db->get_where('tbl_penjualan', ['jual_customers_id' => $this->session->userdata('id'), 'jual_status' => "Arrived"])->result_array();
        $data['batal'] =  $this->db->get_where('tbl_penjualan', ['jual_customers_id' => $this->session->userdata('id'), 'jual_status' => "Canceled"])->result_array();
        $data['rejected'] =  $this->db->get_where('tbl_penjualan', ['jual_customers_id' => $this->session->userdata('id'), 'jual_status' => "Rejected"])->result_array();
        // end query select data

        $this->temp->load('account/partials', 'account/order', $data);
    }
    public function bayar($id)
    {
        $data['ongkir'] = $this->M_pembayaran->showOngkir($id);
        $data['detil_barang'] = $this->M_pembayaran->tampilOrder($id);
        $data['gambarbukti'] = $this->M_pembayaran->selectGambar($id);
        $this->temp->load('account/partials', 'toko/uploadbukti', $data);
    }

    public function upload()
    {
        $data = [
        'pembayaran_bukti' => $this->_bukti()
      ];
        // echo "<pre>";
        // print_r($data);
        // FIXME: update status penjualan menjadi process
        $this->db->where('pembayaran_jual_id', $this->input->post('kdfaktur'));
        $this->db->update('tbl_pembayaran', $data);

        $this->db->set('jual_status', "Process");
        $this->db->where('jual_nofak', $this->input->post('kdfaktur'));
        $this->db->update('tbl_penjualan');
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
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data pemesanan <b>'.$faktur.'</b> telah di batalkan</div>');
        redirect('account/order');
    }
    public function perpanjangBayar($faktur)
    {
        $this->M_pembayaran->Qperpanjang($faktur);
        $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-dismissible fade in" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Jangka bayar <b>'.$faktur.'</b> telah di perpanjang</div>');
        redirect('account/order');
    }
}
