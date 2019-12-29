<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Editaccount extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_editaccount', 'meacc');
    		$this->load->library('form_validation');
    }

    public function index()
    {
        if (!$this->session->userdata('email')) {
          redirect('login');
        }
        //memanggil method rule daftar akun
    		$this->meacc->rulesProfile();
    		if ($this->form_validation->run()==false) {
          $data['customers'] = $this->db->get_where('customers', ['customers_email' => $this->session->userdata('email')])->row_array();
    			$this->temp->load('partials', 'account/editaccount', $data);
    		} else {
    			// jika rule terpenuhi
          $data = [
                'customers_nama' => $this->input->post('nama'),
                'customers_alamat' => $this->input->post('alamat', true),
                'customers_kota' => $this->input->post('kota', true),
                'customers_provinsi' => $this->input->post('provinsi', true),
                'customers_negara' => $this->input->post('negara', true),
                'customers_kodepos' => $this->input->post('kodepos', true),
                'customers_nohp' => $this->input->post('nohp', true),
          ];

          $this->db->set($data);
          $this->db->where('customers_email', $this->session->userdata('email'));
          $this->db->update('customers',$data);

    			$this->session->set_flashdata('editprofile', '<div class="alert alert-success" role="alert">
    			Profile akun anda berhasil di dirubah </div>');
    			redirect('myaccount');
    			}
  	  }
}
