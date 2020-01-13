<?php defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller {
	public function __construct() {
		parent :: __construct();
		$this->load->model('M_customers', 'auth');
		$this->load->library('form_validation');
	}

	public function index() {
		if ($this->session->userdata('email')) {
			redirect('home');
		}

		$this->auth->rulesR(); //memanggil method rule daftar akun

		if ($this->form_validation->run()==false) {
			$this->temp->load('partials', 'account/register');
		}

		else {
			// jika rule terpenuhi
			$this->auth->prosesDaftarAkun();
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			Selamat ! Akun anda berhasil di buat. Silakan aktivasi terlebih dahulu</div>');
			redirect('login');
			}
		}

	public function verify() {
		$email=$this->input->get('email', true);
		$token=$this->input->get('token', true);

		if ($this->db->get_where('customers', ['customers_email'=> $email])->row_array()) {
			$customers_token=$this->db->get_where('customers_token', ['token'=> $token])->row_array();

			if ($customers_token) {
				if (time() - $customers_token['date_created'] < (60 * 5 * 1)) {
					$this->db->set('customers_status', 1);
					$this->db->where('customers_email', $email);
					$this->db->update('customers');

					$this->db->delete('customers_token', ['email'=> $email]);
					$this->session->set_flashdata('messagesuccess', '<div class="alert alert-success" role="alert">
					' . $email . 'has been activated. Please login.</div>');
					redirect('login');
					}

					else {
						$this->db->delete('customers', ['customers_email'=> $email]);
						$this->db->delete('customers_token', ['email'=> $email]);
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
						Account activation failed ! Wrong ! Token expired</div>');
						redirect('login');
						}
					}

					else {
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
						Account activation failed ! Wrong ! Token invalid </div>');
						redirect('login');
						}
					}

					else {
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
						Account activation failed ! Wrong email</div>');
						redirect('login');
						}
					}
}
