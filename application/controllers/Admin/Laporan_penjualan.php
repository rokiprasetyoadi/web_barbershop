<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_penjualan extends CI_Controller {

	function __construct()
	 	{
	 		parent :: __construct();
	 		if($this->session->userdata('status') != "login"){
			redirect(base_url("admin/Login_admin"));
			}
			$this->load->model("M_laporan_penjualan");
            date_default_timezone_set('Asia/Jakarta');
	 	}

    public function index()
    {
        $data['laporan']=$this->M_laporan_penjualan->getAll()->result();
        $this->temp->load('admin/partials', 'admin/laporan_penjualan/laporan_penjualan', $data);
    }

    public function detail($id)
    {
        $where = array('jual_nofak' => $id);
        $data['detail']=$this->M_laporan_penjualan->detail($where,'tbl_penjualan')->result();
        $this->temp->load('admin/partials', 'admin/laporan_penjualan/laporan_penjualan_detail', $data);
    }

    public function delete($id=null)
    {
        $this->M_laporan_penjualan->deleteData($id);
        redirect('admin/laporan_penjualan');
   }

}

/* End of file Controllername.php */
