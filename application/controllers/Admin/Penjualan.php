<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

	function __construct()
	 	{
	 		parent :: __construct();
	 		if($this->session->userdata('status') != "login"){
			redirect(base_url("admin/Login_admin"));
			}
			$this->load->model("M_penjualan");
            date_default_timezone_set('Asia/Jakarta');
	 	}

    public function index()
    {
        $data['penjualan']=$this->M_penjualan->getAll()->result();
        $this->temp->load('admin/partials', 'admin/penjualan/penjualan', $data);
    }

    public function detail($id)
    {
        $where = array('jual_nofak' => $id);
        $data['dtl'] = $this->M_penjualan->dtl($id);
        $data['detail']=$this->M_penjualan->detail($where,'tbl_penjualan')->result();
        $this->temp->load('admin/partials', 'admin/penjualan/penjualan_detail', $data);
    }

    public function delete($id=null)
    {
        $this->M_penjualan->deleteData($id);
        redirect('admin/penjualan');
   }

   public function print()
    {
        $data['penjualan']=$this->M_penjualan->getAll()->result();
        $this->temp->load('admin/print/partials.html', 'admin/print/penjualan.html', $data);
   }

}

/* End of file Controllername.php */
