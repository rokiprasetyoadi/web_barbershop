<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman_barang extends CI_Controller {

	function __construct()
	 	{
	 		parent :: __construct();
	 		if($this->session->userdata('status') != "login"){
			redirect(base_url("admin/Login_admin"));
			}
			$this->load->model("M_pengiriman_barang");
            date_default_timezone_set('Asia/Jakarta');
	 	}

    public function index()
    {
        $data['pengiriman']=$this->M_pengiriman_barang->getAll()->result();
        $this->temp->load('admin/partials', 'admin/pengiriman_barang/pengiriman_barang', $data);
    }

    public function edit($id)
    {
        $this->M_pengiriman_barang->rulesEdit();
        $query = $this->M_pengiriman_barang->getAll($id);
        if ($this->form_validation->run() == false) {
            if ($query->num_rows() > 0) {
                $tbl_pembayaran = $query->row();
                $data = ['row' => $tbl_pembayaran];
            $this->temp->load('admin/partials', 'admin/pengiriman_barang/form_pengiriman_barang', $data);
            }
        } else {
            $post = $this->input->post(null, true);
            if (isset($_POST['edit'])) {
                $this->M_pengiriman_barang->editData($post);
                $this->session->set_flashdata('pesan', '<div class="alert alert-outline alert-success" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong>Data!</strong> berhasil disimpan.
                                            </div>');
                redirect('admin/pengiriman_barang');
            }
        }
    }

    public function delete($id=null)
    {
        $this->M_pengiriman_barang->deleteData($id);
        redirect('admin/pengiriman_barang');
   }

}

/* End of file Controllername.php */
