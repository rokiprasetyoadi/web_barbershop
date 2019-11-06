<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	function __construct()
	 	{
	 		parent :: __construct();
	 		if($this->session->userdata('status') != "login"){
			redirect(base_url("admin/Login_admin"));
			}
			$this->load->model("M_barang");
	 	}

    public function index()
    {
        $data['tbl_barang']=$this->M_barang->tampil_data()->result();
        $this->temp->load('admin/partials', 'admin/barang', $data);
    }

    public function add()
    {
        $this->M_barang->rulesNew();
        //$data['kode'] = $this->M_barang->kode();
        
        if ($this->form_validation->run() == false) {
            $data = [
                'page' => 'add',
                'kode' => $this->M_barang->kode(),
            ];
            $this->temp->load('admin/partials', 'admin/form_barang', $data);
        } else {
            $this->M_barang->addNew();
            $this->session->set_flashdata('pesan', '<div class="alert alert-outline alert-success">Data berhasil ditambahkan!<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
            redirect('admin/barang');
        }
    }

    public function edit($id)
    {
        $this->M_barang->rulesNew();
        $query = $this->M_barang->tampil_data($id);
        if ($this->form_validation->run() == false) {
            if ($query->num_rows() > 0) {
                $tbl_barang = $query->row();
                $data = [
                    'page' => 'edit',
                    'row' => $tbl_barang
                ];
                $this->temp->load('admin/partials', 'admin/form_barang', $data);
            }
        } else {
            $post = $this->input->post(null, true);
            if (isset($_POST['edit'])) {
                $this->M_barang->editData($post);
                $this->session->set_flashdata('pesan', '<div class="alert alert-outline alert-success" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong>Data!</strong> berhasil disimpan.
                                            </div>');
                redirect('admin/barang');
            }
        }

    }

    public function delete($id)
    {
        $this->M_barang->deleteData($id);
        redirect('admin/barang');
    }

}

/* End of file Controllername.php */
