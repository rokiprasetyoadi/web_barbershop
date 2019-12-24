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
        $data['pembayaran']=$this->M_pembayaran->getAllData()->result();
        $this->temp->load('admin/partials', 'admin/pembayaran/pembayaran', $data);
    }

    public function edit($id)
    {
        $this->M_pembayaran->rulesEdit();
        $query = $this->M_pembayaran->getAllData($id);
        if ($this->form_validation->run() == false) {
            if ($query->num_rows() > 0) {
                $tbl_pembayaran = $query->row();
                $data = ['row' => $tbl_pembayaran];
            $this->temp->load('admin/partials', 'admin/pembayaran/form_pembayaran', $data);
            }
        } else {
            $post = $this->input->post(null, true);
            if (isset($_POST['edit'])) {
                $this->M_pembayaran->editData($post);
                $this->session->set_flashdata('pesan', '<div class="alert alert-outline alert-success" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong>Data!</strong> berhasil disimpan.
                                            </div>');
                redirect('admin/pembayaran');
            }
        }
    }

    public function delete($id=null)
    {
        $this->M_pembayaran->deleteData($id);
        redirect('admin/pembayaran');
   }

   public function print()
    {
        $data['pembayaran']=$this->M_pembayaran->getAllData()->result();
        $this->temp->load('admin/print/partials.html', 'admin/print/pembayaran.html', $data);
   }
    
}

/* End of file Controllername.php */
