<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_account/M_login', 'autentikasi');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
          $data['judul'] = "Login";
            $this->load->view('_partials/header', $data);
            $this->load->view('account/login');
            $this->load->view('_partials/footerscript');
            $this->load->view('_partials/footer');
        }else{
          $this->_login();
        }
    }

    public function _login()
    {
        $email = $this->input->post('email');
        $sandi = $this->input->post('password');

        $customers = $this->db->get_where('customers', ['customers_email' => $email])->row_array();
        if ($customers != null) {
          if ($customers['customers_created'] == 1) {
          if (password_verify($sandi, $customers['password'])) {
            $data = [
              'email'  => $customers['customers_email'],
              'nama'   => $customers['customers_nama']
            ];
              $this->session->set_userdata($data);
          } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Password salah</div>');
            redirect('account/login');
          }
        } else {
          $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
          Email ini belum di aktifkan</div>');
          redirect('account/login');
        }
      } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
        Email ini belum terdaftar</div>');
        redirect('account/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Anda telah logout!</div>');
        redirect('account/login');
    }
}
