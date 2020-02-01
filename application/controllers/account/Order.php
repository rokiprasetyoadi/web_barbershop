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
        if ($this->session->userdata('email') == null) {
            redirect('login');
        }

        $data1['selectexp'] = $this->M_pembayaran->expTglJual();
        $data1['selectcancel'] = $this->M_pembayaran->expTglCancel();
        $data1['selectreject'] = $this->M_pembayaran->expTglReject();

        // fungsi untuk update status dn tgl exp ketika sudah melebihi tgl jual
        // FIXME: batasan waktu pembayaran di ganti menggunakan jam, dlm waktu 24 jam
        foreach ($data1['selectexp'] as $dt) {
            $paktur = [
            'jual_nofak' => $dt['jual_nofak']
          ];
            $this->db->set('jual_status', "Canceled");
            $this->db->set('jual_tgl_exp', date('Y-m-d h:i:sa'));
            $this->db->where('jual_nofak', $paktur['jual_nofak']);
            $this->db->update('tbl_penjualan');
        }

        // fungsi ketika tidak segera upload ulang bukti pembayaran dalam waktu 24 jam maka akan otomatis merubah status ke cancel
        foreach ($data1['selectreject'] as $sr) {
            $paktur2 = [
          'jual_nofak' => $sr['jual_nofak']
        ];
            $this->db->set('jual_status', "Canceled");
            $this->db->set('jual_tgl_exp', date('Y-m-d h:i:sa'));
            $this->db->where('jual_nofak', $paktur2['jual_nofak']);
            $this->db->update('tbl_penjualan');
        }

        // fungsi untuk delete barang yang di cancel dan tidak di perpanjang dalam kurun waktu 1 minggu
        foreach ($data1['selectcancel'] as $sc) {
            $paktur2 = [
            'jual_nofak' => $sc['jual_nofak'],
            'detailjual_nofak' => $sc['jual_nofak'],
            'pembayaran_jual_id' => $sc['jual_nofak']
          ];
            $this->db->delete('tbl_penjualan', ['jual_nofak' => $paktur2['jual_nofak']]);
            $this->db->delete('tbl_detailpenjualan', ['detailjual_nofak' => $paktur2['detailjual_nofak']]);
            $this->db->delete('tbl_pembayaran', ['pembayaran_jual_id' => $paktur2['pembayaran_jual_id']]);
            if ($sc['pembayaran_bukti'] != "default.jpg" && $sc['pembayaran_bukti'] != null) {
                $filename = explode(".", $sc['pembayaran_bukti'])[0];
                return array_map('unlink', glob(FCPATH . "assets/upload/bukti_pembayaran/$filename.*"));
            }
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
        $data['customers'] = $this->db->get_where('customers', ['customers_email' => $this->session->userdata('email')])->row_array();
        $data['ongkir'] = $this->M_pembayaran->showOngkir($id);
        $data['detil_barang'] = $this->M_pembayaran->tampilOrder($id);
        $data['gambarbukti'] = $this->M_pembayaran->selectGambar($id);
        if ($data['ongkir']['jual_nofak'] != $id) {
            $data['heading'] = "404, Maaf";
            $data['message'] = "Halaman tidak di temukan";
            $this->load->view('errors/html/error_404', $data);
        } else {
            $this->load->view('toko/uploadbukti', $data);
            // $this->temp->load('account/partials', 'toko/uploadbukti', $data);
        }
    }

    public function upload()
    {
        $data = [
        'pembayaran_bukti' => $this->_bukti()
      ];
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
