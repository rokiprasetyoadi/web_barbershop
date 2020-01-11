<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {

    function __construct()
        {
            parent :: __construct();
            if($this->session->userdata('status') != "login"){
            redirect(base_url("admin/Login_admin"));
            }
            $this->load->model("M_customers");
            date_default_timezone_set('Asia/Jakarta');
        }

    public function index()
    {
        $data['customers']=$this->M_customers->getAll();
        $this->temp->load('admin/partials', 'admin/customer/customers', $data);
    }

    public function delete($id)
    {
        $this->M_customers->deleteData($id);
        redirect('admin/customers');
   }

   public function print()
    {
        $data['customers']=$this->M_customers->getAll();
        $this->temp->load('admin/print/partials.html', 'admin/print/customers.html', $data);
   }

}

/* End of file Controllername.php */
