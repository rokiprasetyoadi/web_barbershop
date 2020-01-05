<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Katalog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Codeigniter : Write Less Do More
        $this->load->model('M_barang', 'barang');
        $this->load->model('M_cart', 'cart');
        $this->load->model('M_katalog', 'malog');


        $this->load->library('pagination');
    }

    public function index()
    {
        $data['customers'] = $this->db->get_where('customers', ['customers_email' =>
        $this->session->userdata('email')])->row_array();
        $data['carts'] = $this->db->get_where('tbl_cart', ['cart_id' => $this->session->userdata('cart_id')])->row_array();
        $data['kategori'] = $this->barang->getKategori();
        $data['barangs'] = $this->barang->getBarang();
        $data['keranjang'] = $this->cart->getcart($this->session->userdata('cart_id'));
        $data['tprice'] = $this->cart->tprice($this->session->userdata('cart_id'));
        $data['cat'] = $this->db->get('kategori')->result_array();

         if ($this->input->post('submit') == "formCari") {
            $data['keyword'] = $this->input->post('cari');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        // $config['total_rows'] = $this->db->get('tbl_barang')->num_rows(); //total row
        //site url
        $this->db->like('barang_nama', $data['keyword']);
        $this->db->from('tbl_barang');
        $config['total_rows'] = $this->db->count_all_results();
        $config['per_page'] = 6;

        $this->pagination->initialize($config);
        $data['page'] = $this->uri->segment(4);

        $data['barang'] = $this->malog->getpage($config['per_page'], $data['page'], $data['keyword']);

        $this->temp->load('partials', 'toko/index', $data);
    }

    public function Category($id)
    {
        $data['customers'] = $this->db->get_where('customers', ['customers_email' =>
        $this->session->userdata('email')])->row_array();
        $data['carts'] = $this->db->get_where('tbl_cart', ['cart_id' => $this->session->userdata('cart_id')])->row_array();
        $data['kategori'] = $this->barang->getKategori();


        // Tes pagination
        //konfigurasi pagination
        $config['base_url'] = site_url('/s'); //site url
        $config['total_rows'] = $this->db->count_all('tbl_barang'); //total row
        $config['per_page'] = 12;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center ">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link shadow-sm">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link shadow-sm">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link shadow-sm">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link shadow-sm">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link shadow-sm">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        // $data['product'] = $this->homp->getpage($config["per_page"], $data['page']);        
        $data['barang'] = $this->malog->getPbyIdcat($id);

        $data['pagination'] = "";
        // $data['product'] = $this->homp->getpage($limit, $start);
        // 
        $this->temp->load('partials', 'toko/index', $data);
    }

    public function Product($id)
    {
        $data['customers'] = $this->db->get_where('customers', ['customers_email' => $this->session->userdata('email')])->row_array();
        $data['carts'] = $this->db->get_where('tbl_cart', ['cart_id' => $this->session->userdata('cart_id')])->row_array();
        $data['kategori'] = $this->barang->getKategori();
        $data['p'] = $this->db->get_where('tbl_barang', ['barang_id' => $id])->row_array();
        $data['b'] = $this->barang->getBarangByDate();
        $data['keranjang'] = $this->cart->getcart($this->session->userdata('cart_id'));
        $data['tprice'] = $this->cart->tprice($this->session->userdata('cart_id'));
        $data['cat'] = $this->db->get('kategori')->result_array();


        $this->temp->load('partials', 'toko/product', $data);
    }
}
