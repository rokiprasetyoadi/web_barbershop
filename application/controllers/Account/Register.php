defined('BASEPATH') or exit('No direct script access allowed');
<?php


class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_account/M_register', 'autentikasi');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->autentikasi->ruleDaftarAkun(); //memanggil method rule daftar akun
          if ($this->form_validation->run() == false) {
              $data['judul'] = 'Register';
              $this->load->view('_partials/header', $data);
              $this->load->view('account/register');
              $this->load->view('_partials/footerscript');
              $this->load->view('_partials/footer');
          } else {
              // jika rule terpenuhi
              $this->autentikasi->prosesDaftarAkun();
              $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
              Selamat! Akun anda berhasil di buat. Silakan Login</div>');
              redirect('account/login');
        }
    }
}
