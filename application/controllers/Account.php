<?php
/*
  1.fungsi register
  2.fungsi login
  3.fungsi logout

  MODEL = M_auth -> autentikasi
*/
defined('BASEPATH') or exit('No direct script access allowed');

class Account extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_account', 'autentikasi');
    }

    public function index()
    {
        // membuat rules untuk form login
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) { // kondisi ketika rules form login tidak terpenuhi
            $data['judul'] = 'Login';
            $this->load->view('_partials/', $data);
            $this->load->view('account/login');
        } else {
            //jika validasi sukses
            $this->_login();
        }
    }

    private function _login()
    {
        // menangkap inputan dari text field dari form login
        $email = $this->input->post('email');
        $sandi = $this->input->post('password');

        // query untuk mencari data email yang sesuai di db dari text field email
        $user = $this->db->get_where('customers', ['email' => $email])->row_array();
        if ($user != null) { // jike usernya ada
      if ($user['aktiv'] == 1) { // jika usernya aktiv
        if (password_verify($sandi, $user['password'])) { // jika passwordnya benar
          // menyimpan session email & id level user
          $data = [
            'email'      => $user['email'],
            'nama'       => $user['nama']
          ];
            $this->session->set_userdata($data);
            if ($user['id_level'] == 1) {
                redirect('administrator/dashboard');
            } else {
                echo "<h2>Halaman User</h2>";
            }
        } else { // jika password salah
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
          Password salah</div>');
            redirect('account');
        }
      } else { // jika user/email belum aktiv
          $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
          Email ini belum di aktifkan</div>');
          redirect('account');
      }
        } else { // jika email belum terdaftar
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
      Email ini belum terdaftar</div>');
            redirect('account');
        }
    }

    public function register()
    {
        $this->autentikasi->ruleDaftarAkun(); //memanggil method rule daftar akun

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Register';
            $this->load->view('_partials', $data);
            $this->load->view('account/register');
        } else {
            // jika rule terpenuhi
            $this->autentikasi->prosesDaftarAkun();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      Selamat! Akun anda berhasil di buat. Silakan Login</div>');
            redirect('account');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id_level');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    Anda telah logout!</div>');
        redirect('account');
    }
}
