<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_barang', 'mabar');
        $this->load->model('M_cart', 'cart');
		$this->load->model('Anu_model', 'anu');
        $this->load->model('M_katalog', 'malog');

        
    }
    

    public function index()
	{	
		$data['customers'] = $this->db->get_where('customers', ['customers_email' => $this->session->userdata('email')])->row_array();
		$data['kategori'] = $this->mabar->getKategori();
        $data['barang'] = $this->mabar->getBarang();
		$data['customers'] = $this->db->get_where('customers',['customers_email'=> 
						$this->session->userdata('email')])->row_array();
		$email_tmp = $this->session->userdata('email');
		$idu = $this->cart->idu($email_tmp);
		$data['tprice'] = $this->cart->tprice($idu);
		
		$data['keranjang'] = $this->cart->getcart($idu);
		$data['keranjang1'] = $this->cart->get();
        ;

        if ($data['customers']) {
			
            $this->temp->load('partials', 'toko/cart', $data);
            }
            else{
                $this->session->set_flashdata('message','Anda Belum Login');
                redirect('/');
            }
    }
    
    public function add (){
		$data['customers'] = $this->db->get_where('customers',['customers_email'=> 
						$this->session->userdata('email')])->row_array();
		$data['barang_id'] = $this->db->get_where('tbl_cart',['barang_id' => $this->input->post('barang_id')])->row_array();
		$email_tmp = $this->session->userdata('email');
		$idu = $this->cart->idu($email_tmp);
		  $tsprice = $this->cart->tsprice($idu);
		  $tssprice =$this->malog->tssprice($idu);
		
		
 		if ($data['customers']) {
            if ( $idu == $this->input->post('customers_id') && $this->input->post('qty')+$this->malog->cartQty2()<=$this->malog->pStock() && $tssprice>=1 ){
                $qty = $this->malog->CartQty();
                $price = $this->malog->cartPrice();
                $customers_id = $this->malog->cartIduser();
                $array = [
                    'barang_id'=> $this->input->post('barang_id'),
                    'qty'     => $this->input->post('qty')+$qty,
                    'c_price'   => $this->input->post('barang_harjul') * $this->input->post('qty')+$price,
                    ];
                    $this->db->where('barang_id',$array['barang_id']);
                    $this->db->where('customers_id', $this->input->post('customers_id'));
                    $this->db->where('status_tmp',0);
                    $this->db->update('tbl_cart',$array);
                    redirect('toko/cart');
            }
            elseif ( $idu == $this->input->post('barang_id') && $this->input->post('qty')+$this->malog->cartQty2()>$this->malog->pStock() ){
                $this->session->set_flashdata('message', 'Jumlah melebihi stock');

                // redirect('keranjang');
                echo "<script type='text/javascript'>history.go(-1);</script>";
            }
            elseif($tssprice<=0){
                
                $array = [
                    'barang_id'=> $this->input->post('barang_id'),
                    'customers_id' => $this->input->post('customers_id'),
                    'qty'     => $this->input->post('qty'),
                    'c_price'   => $this->input->post('barang_harjul') * $this->input->post('qty')
                    
                    ];
                    $this->db->where('status_tmp',0);
                    $this->db->insert('tbl_cart',$array);
                    redirect('toko/cart');
            }
 		}
 		else{
			$this->session->set_flashdata('message','Anda Belum Login');
			redirect('/');
		}
		
		
    }
    
    public function delcart($id){
        $this->db->where('cart_id', $id);
        $del = $this->db->delete('tbl_cart');
        if ($del) {
            redirect('toko/cart');
        } 
    }

	public function updatecart(){

        $price = $this->cart->pPrice();
        $temp_s = $this->input->post('barang_id');
        $stock = $this->cart->pStock($temp_s);
        
        foreach ($stock as $s) {
            $stock[] = $s;
        }
        
		if ($this->input->post('qty')>$s) {
			$this->session->set_flashdata('message', 'Jumlah melebihi stock');
            redirect('toko/cart');
		}else{
			$data = [
                'cart_id' => $this->input->post('cart_id'),
                'barang_id' => $temp_s,
                'c_price' => $this->input->post('qty') * $this->input->post('barang_harjul'),
                'qty' => $this->input->post('qty')
			];
            $this->db->where('cart_id', $this->input->post('cart_id'));
            $this->db->update('tbl_cart', $data);
	
			redirect('toko/cart');
		}
    }

    public function transaksi(){
        $this->cart->anu();
        
    }

}

/* End of file Controllername.php */
