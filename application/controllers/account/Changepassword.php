<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Changepassword extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_changepassword', 'cp');
    		$this->load->library('form_validation');
    }

    public function index()
    {
        if (!$this->session->userdata('email')) {
          redirect('login');
        }
        //memanggil method rule daftar akun
    		$this->cp->rulesPassword();
          $customers = $this->db->get_where('customers', ['customers_email' => $this->session->userdata('email')])->row_array();
      		if ($this->form_validation->run()==false) {
      			$this->temp->load('partials', 'account/changepassword', $customers);
      		} else {
              // jika rule terpenuhi
              $current_password = $this->input->post('current_password');
              $new_password = $this->input->post('new_password1');

              if (password_verify($current_password, $customers['customers_password']))
              {
                  if ($current_password == $new_password)
                  {
                      $this->session->set_flashdata('passwordsama', '<div class="alert alert-danger" role="alert">
                      Password baru dan lama tidak boleh sama! </div>');
                      redirect('changepassword');
                  } else {

                      $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                      $this->db->set('customers_password', $password_hash);
                      $this->db->where('customers_email', $this->session->userdata('email'));
                      $this->db->update('customers');

                      $this->session->set_flashdata('passwordsuccess', '<div class="alert alert-success" role="alert">
                      Password akun anda berhasil di dirubah </div>');
                      redirect('changepassword');
                      }
                } else {
                $this->session->set_flashdata('passwordlama', '<div class="alert alert-danger" role="alert">
                  Password lama yang anda masukkan salah! </div>');
                  redirect('changepassword');
              }
          }
      }
}
