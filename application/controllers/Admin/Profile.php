<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    function __construct()
        {
            parent :: __construct();
            if($this->session->userdata('status') != "login"){
            redirect(base_url("admin/Login_admin"));
            }
            $this->load->model("M_profile");
            date_default_timezone_set('Asia/Jakarta');
        }

    public function index()
    {
        $this->temp->load('admin/partials', 'admin/profile/profile');
    }

    public function edit($id)
    {
        $this->M_profile->rulesEdit();
        $query = $this->M_profile->getByid($id);
        if ($this->form_validation->run() == false) {
            if ($query->num_rows() > 0) {
                $admin = $query->row();
                $data = [
                    'row' => $admin
                ];
                $this->temp->load('admin/partials', 'admin/profile/form_profile', $data);
            }
        } else {
            $post = $this->input->post(null, true);
            if (isset($_POST['edit'])) {
                $this->M_profile->editData($post);
                $this->session->set_flashdata('pesan', '<div class="alert alert-outline alert-success" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                            <strong>Data!</strong> berhasil disimpan.
                                            </div>');
                redirect('admin/profile');
            }
        }
    }
    
}

/* End of file Controllername.php */
