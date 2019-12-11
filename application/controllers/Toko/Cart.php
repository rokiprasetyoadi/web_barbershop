<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_barang', 'mabar');
        $this->load->model('M_kategori', 'makat');
        
    }
    

    public function index()
	{	
		$data['customers'] = $this->db->get_where('customers', ['customers_email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->makat->getAll();
        $this->temp->load('partials', 'toko/cart', $data);
	}

	function add()
	{
		$data= array(
            'id' => $this->input->post('barang_id'),
            'name' => $this->input->post('barang_nama'),
            'price' => $this->input->post('barang_harjul'),
            'gambar' => $this->input->post('barang_image'),
            'qty' =>$this->input->post('qty')
		);
		$this->cart->insert($data);
		redirect('toko');
    }
    
    function delete($rowid) 
	{
		if ($rowid=="all")
			{
				$this->cart->destroy();
			}
		else
			{
				$data = array('rowid' => $rowid,
			  				  'qty' =>0);
				$this->cart->update($data);
			}
		redirect('toko/cart');
	}


}

/* End of file Controllername.php */
