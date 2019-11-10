<?php
class Login_admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_loginadmin');
    }

    public function index()
    {
        $this->load->view('admin/v_login_admin');
    }

    public function aksi_login()
    {
        $admin_email = $this->input->post('admin_email');
        $admin_password = $this->input->post('admin_password');
        $where = array(
            'admin_email' => $admin_email,
            'admin_password' => md5($admin_password)
            );
        $cek = $this->M_loginadmin->cek_login("admin", $where)->row_array();
        if ($cek > 0) {
            $data_session = array(
                'admin_email' => $cek['admin_email'],
                'admin_nama' => $cek['admin_nama'],
                'admin_image' => $cek['admin_image'],
                'status' => "login"
                );

            $this->session->set_userdata($data_session);

            redirect(base_url("admin"));
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Username / Password salah!</div>');
            redirect('admin/Login_admin');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('admin/Login_admin'));
    }
}
