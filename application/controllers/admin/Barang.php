<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    public function __construct()
    {
        parent :: __construct();
        if ($this->session->userdata('status') != "login") {
            redirect(base_url("admin/Login_admin"));
        }
        $this->load->model("M_barang");
    }

    public function index()
    {
        $data['tbl_barang']=$this->M_barang->tampil_data();
        $this->temp->load('admin/partials', 'admin/barang', $data);
    }
<<<<<<< HEAD
=======

    public function add()
    {
        $this->M_barang->rulesNew();
        $data['kode'] = $this->M_barang->kode();
        
        if ($this->form_validation->run() == false) {
            $this->temp->load('admin/partials', 'admin/form_barang', $data);
        } else {
            $this->M_barang->addNew();
            $this->session->set_flashdata('pesan', '<div class="alert alert-outline alert-success">Data berhasil ditambahkan!<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
            redirect('admin/barang');
        }
    }

>>>>>>> 560009e33ecd235747f33cefe8104cf76925b444
}

/* End of file Controllername.php */
