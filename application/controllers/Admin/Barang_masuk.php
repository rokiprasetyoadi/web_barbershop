<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_masuk extends CI_Controller {

	function __construct()
	 	{
	 		parent :: __construct();
	 		if($this->session->userdata('status') != "login"){
			redirect(base_url("admin/Login_admin"));
			}
			$this->load->model("M_barang_masuk");
            date_default_timezone_set('Asia/Jakarta');
	 	}

    public function index()
    {
        $data['tbl_brgmasuk']=$this->M_barang_masuk->getAll();
        $data['tbl_brgmsk']=$this->M_barang_masuk->getBrgMasuk();
        $this->temp->load('admin/partials', 'admin/barang/barang_masuk', $data);
    }

    public function add()
    {
        $this->M_barang_masuk->rulesNew();
        if ($this->form_validation->run() == false) {
            $data = [
                'page' => 'add',
                'kode' => $this->M_barang_masuk->kode(),
                'supplier' => $this->M_barang_masuk->getSupplierData()
            ];
            $this->temp->load('admin/partials', 'admin/barang/form_barang_masuk', $data);
        } else {
            $this->M_barang_masuk->addData();
            $this->session->set_flashdata('pesan', '<div class="alert alert-outline alert-success">Data berhasil ditambahkan!<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
            redirect('admin/barang_masuk');
        }
    }

    public function edit($id)
    {
        $this->M_barang_masuk->rulesEdit();
        $query = $this->M_barang_masuk->getBrgMasuk($id);
        if ($this->form_validation->run() == false) {
            if ($query->num_rows() > 0) {
                $tbl_brgmsk = $query->row();
                $data = [
                    'page' => 'edit',
                    'row' => $tbl_brgmsk,
                    'supplier' => $this->M_barang_masuk->getSupplierData()
                ];
                $this->temp->load('admin/partials', 'admin/barang/form_barang_masuk', $data);
            }
        } else {
            $post = $this->input->post(null, true);
            if (isset($_POST['edit'])) {
                $this->M_barang_masuk->editData($post);
                $this->session->set_flashdata('pesan', '<div class="alert alert-outline alert-success" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong>Data!</strong> berhasil disimpan.
                                            </div>');
                redirect('admin/barang_masuk');
            }
        }
    }

    public function delete($id=null)
    {
        $this->M_barang_masuk->deleteData($id);
        redirect('admin/barang_masuk');
   }

}

/* End of file Controllername.php */