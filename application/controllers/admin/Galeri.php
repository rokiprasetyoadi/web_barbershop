<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {

    function __construct()
        {
            parent :: __construct();
            if($this->session->userdata('status') != "login"){
            redirect(base_url("admin/Login_admin"));
            }
            $this->load->model("M_galeri");
            date_default_timezone_set('Asia/Jakarta');
        }

    public function index()
    {
        $data['galeri']=$this->M_galeri->getAll()->result();
        $this->temp->load('admin/partials', 'admin/galeri/galeri', $data);
    }

    public function add()
    {
        $this->M_galeri->rulesNew();
        if ($this->form_validation->run() == false) {
            $data = [
                'kode' => $this->M_galeri->kode()
            ];
            $this->temp->load('admin/partials', 'admin/galeri/form_galeri', $data);
        } else {
            $this->M_galeri->addNew();
            $this->session->set_flashdata('pesan', '<div class="alert alert-outline alert-success">Data berhasil ditambahkan!<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
            redirect('admin/galeri');
        }
    }

    public function delete($id=null)
    {
        $this->M_galeri->deleteData($id);
        redirect('admin/galeri');
   }

}

/* End of file Controllername.php */
