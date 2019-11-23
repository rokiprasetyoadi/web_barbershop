<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

    function __construct()
        {
            parent :: __construct();
            if($this->session->userdata('status') != "login"){
            redirect(base_url("admin/Login_admin"));
            }
            $this->load->model("M_pembayaran");
            date_default_timezone_set('Asia/Jakarta');
        }

    public function index()
    {
        $data['pembayaran']=$this->M_pembayaran->getAll();
        $this->temp->load('admin/partials', 'admin/pembayaran/pembayaran', $data);
    }

    public function delete($id)
    {
        $this->M_pembayaran->deleteData($id);
        redirect('admin/pembayaran');
   }

    


}

/* End of file Controllername.php */
