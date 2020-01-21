<?php
defined('BASEPATH') or exit('No direct script access allowed');


class ForgotPassword extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_customers', 'mocust');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('home');
        }

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        if ($this->form_validation->run() == false) {
            $this->temp->load('partials', 'account/forgotpassword');
        } else {
            $email = $this->input->post('email', true);
            $customers = $this->db->get_where('customers', ['customers_email' => $email, 'customers_status' => 1])->row_array();

            if ($customers) {
                $token = base64_encode(random_bytes(32));
                $customers_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

                $this->db->insert('customers_token', $customers_token);
                $this->mocust->_sendEmail($token, 'forgot');
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Tolong cek email untuk mereset password anda</div>');
                redirect('forgotpassword');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Email ini belum terdaftar atau diaktifkan</div>');
                redirect('forgotpassword');
            }
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $customers = $this->db->get_where('customers', ['customers_email' => $email])->row_array();

        if ($customers) {
            $customers_token = $this->db->get_where('customers_token', ['token' => $token])->row_array();

            if ($customers_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->newPassword();
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
          Reset password failed! Wrong token.</div>');
                redirect('forgotpassword');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
      Reset password failed! Wrong email.</div>');
            redirect('forgotpassword');
        }
    }

    public function newPassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('login');
        }

        $email = $this->session->userdata('reset_email');
        $this->mocust->rulesR();
        if ($this->form_validation->run() == false) {
            $this->temp->load('partials', 'account/newpassword');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $this->db->set('customers_password', $password);
            $this->db->where('customers_email', $email);
            $this->db->update('customers');

            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Password anda berhasil dirubah, silahkan login.</div>');
            redirect('login');
        }
    }
}
