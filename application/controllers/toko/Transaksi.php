<?php
defined('BASEPATH') or exit('No direct script access allowed');
  // NOTE: sebenarnya sudah tidak di gunakan, tapi jangan di hapus dulu
class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_cart', 'cart');
        $this->load->model('M_pembayaran', 'pembayaran');
        $this->load->model('M_barang', 'mabar');
        $this->load->model('M_penjualan', 'mojul');
    }

    public function index()
    {
    }
}
