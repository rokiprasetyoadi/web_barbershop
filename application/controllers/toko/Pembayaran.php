<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Codeigniter : Write Less Do More
    }

    public function index()
    {
        $this->db->select('jual_nofak, jual_total, tbl_detailpenjualan.detailjual_barang_id, tbl_barang.barang_nama');
        $this->db->from('tbl_penjualan');
        $this->db->join('tbl_detailpenjualan', 'tbl_penjualan.jual_nofak = tbl_detailpenjualan.detailjual_nofak');
        $this->db->join('tbl_barang', 'tbl_detailpenjualan.detailjual_barang_id = tbl_barang.barang_id');
        // echo "<pre>";
        // print_r($query);
        // die;
        $data['detil_barang'] = $this->db->get()->row_array();

        $this->temp->load('toko/partials', 'toko/pembayaran', $data);
    }
}
