<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

    function __construct()
        {
            parent :: __construct();
            if($this->session->userdata('status') != "login"){
            redirect(base_url("admin/Login_admin"));
            }
            $this->load->model("M_supplier");
            date_default_timezone_set('Asia/Jakarta');
        }

    public function index()
    {
        $data['supplier']=$this->M_supplier->getAll()->result();
        $this->temp->load('admin/partials', 'admin/supplier/supplier', $data);
    }

    public function add()
    {
        $this->M_supplier->rulesNew();
        if ($this->form_validation->run() == false) {
            $data = [
                'page' => 'add',
                'kode' => $this->M_supplier->kode()
            ];
            $this->temp->load('admin/partials', 'admin/supplier/form_supplier', $data);
        } else {
            $this->M_supplier->addNew();
            $this->session->set_flashdata('pesan', '<div class="alert alert-outline alert-success">Data berhasil ditambahkan!<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
            redirect('admin/supplier');
        }
    }

    public function edit($id)
    {
        $this->M_supplier->rulesEdit();
        $query = $this->M_supplier->getAll($id);
        if ($this->form_validation->run() == false) {
            if ($query->num_rows() > 0) {
                $supplier = $query->row();
                $data = [
                    'page' => 'edit',
                    'row' => $supplier
                ];
                $this->temp->load('admin/partials', 'admin/supplier/form_supplier', $data);
            }
        } else {
            $post = $this->input->post(null, true);
            if (isset($_POST['edit'])) {
                $this->M_supplier->editData($post);
                $this->session->set_flashdata('pesan', '<div class="alert alert-outline alert-success" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong>Data!</strong> berhasil disimpan.
                                            </div>');
                redirect('admin/supplier');
            }
        }
    }

    public function delete($id)
    {
        $this->M_supplier->deleteData($id);
        redirect('admin/supplier');
   }

    


}

/* End of file Controllername.php */
