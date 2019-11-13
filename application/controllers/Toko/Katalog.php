<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Katalog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Codeigniter : Write Less Do More
        $this->load->model('M_barang', 'barang');

        
        $this->load->library('pagination');
    }

    public function index()
    {
		$data['kategori'] = $this->barang->getKategori();
        $data['barangs'] = $this->barang->getBarang();
        
        // Tes pagination
		//konfigurasi pagination
        $config['base_url'] = site_url('/'); //site url
        $config['total_rows'] = $this->db->count_all('tbl_barang'); //total row
        $config['per_page'] = 12;  //show record per halaman
        $config["uri_segment"] = 2;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="col-xs-12 col-sm-12 col-md-12 clearfix mt-40 text--center"><ul class="pagination">';
        $config['full_tag_close']   = '</ul></div>';
        $config['num_tag_open']     = '<li><span class="page-link shadow-sm">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="active">';
        $config['cur_tag_close']    = '</li>';
        $config['next_tag_open']    = '<li class="">';
        $config['next_tagl_close']  = '&raquo;</li>';
        $config['prev_tag_open']    = '<li class="">';
        $config['prev_tagl_close']  = 'Next</li>';
        $config['first_tag_open']   = '<li class="">';
        $config['first_tagl_close'] = '</li>';
        $config['last_tag_open']    = '<li class="">';
        $config['last_tagl_close']  = '</li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        //panggil function yang ada pada mmodel.
        $data['barang'] = $this->barang->getpage($config["per_page"], $data['page']);         
		$data['pagination'] = $this->pagination->create_links();
        
        $this->temp->load('toko/partials', 'toko/index', $data);
    }

    
    public function search(){
        $data['kategori'] = $this->barang->getKategori();
        $data['barangs'] = $this->barang->getBarang();
		
		// Tes pagination
		//konfigurasi pagination
        $config['base_url'] = site_url('/search'); //site url
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
        $config['full_tag_open']    = '<div class="col-xs-12 col-sm-12 col-md-12 clearfix mt-40 text--center"><ul class="pagination">';
        $config['full_tag_close']   = '</ul></div>';
        $config['num_tag_open']     = '<li><span class="page-link shadow-sm">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="active">';
        $config['cur_tag_close']    = '</li>';
        $config['next_tag_open']    = '<li class="">';
        $config['next_tagl_close']  = '&raquo;</li>';
        $config['prev_tag_open']    = '<li class="">';
        $config['prev_tagl_close']  = 'Next</li>';
        $config['first_tag_open']   = '<li class="">';
        $config['first_tagl_close'] = '</li>';
        $config['last_tag_open']    = '<li class="">';
        $config['last_tagl_close']  = '</li>';
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
		// $data['product'] = $this->homp->getpage($config["per_page"], $data['page']);        
		$data['barang'] = $this->barang->searcp($config["per_page"], $data['page']);           
 
		$data['pagination'] = "";
		// $data['product'] = $this->homp->getpage($limit, $start);
		// 

        $this->temp->load('toko/partials', 'toko/index', $data);
    }

}
