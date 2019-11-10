<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Katalog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Codeigniter : Write Less Do More
        $this->load->model('M_barang', 'barang');
        
    }

    public function index()
    {
		$data['kategori'] = $this->barang->getKategori();
        $data['barang'] = $this->barang->getBarang();
        
        $this->temp->load('toko/partials', 'toko/index', $data);
    }
}
