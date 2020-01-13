<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

    function __construct()
        {
            parent :: __construct();
            if($this->session->userdata('status') != "login"){
            redirect(base_url("admin/Login_admin"));
            }
            $this->load->model("M_karyawan");
            date_default_timezone_set('Asia/Jakarta');
        }

    public function index()
    {
        $data['karyawan']=$this->M_karyawan->getAll()->result();
        $this->temp->load('admin/partials', 'admin/karyawan/karyawan', $data);
    }

    public function add()
    {
        $this->M_karyawan->rulesNew();
        if ($this->form_validation->run() == false) {
            $data = [
                'page' => 'add',
                'kode' => $this->M_karyawan->kode()
            ];
            $this->temp->load('admin/partials', 'admin/karyawan/form_karyawan', $data);
        } else {
            $this->M_karyawan->addNew();
            $this->session->set_flashdata('pesan', '<div class="alert alert-outline alert-success">Data berhasil ditambahkan!<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
            redirect('admin/karyawan');
        }
    }

    public function delete($id=null)
    {
        $this->M_karyawan->deleteData($id);
        redirect('admin/karyawan');
   }

}

/* End of file Controllername.php */
