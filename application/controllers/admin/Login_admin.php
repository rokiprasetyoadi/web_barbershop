<?php 
 
class Login_admin extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('M_loginadmin');
		
		// load Session Library
        $this->load->library('session');
         
        // load url helper
        $this->load->helper('url');
 
	}
 
	function index(){
		$this->load->view('admin/v_login_admin');
	}
 
	function aksi_login(){
		$admin_email = $this->input->post('admin_email');
		$admin_password = $this->input->post('admin_password');
		$where = array(
			'admin_email' => $admin_email,
			'admin_password' => md5($admin_password)
			);
		$cek = $this->M_loginadmin->cek_login("admin",$where)->row_array();
		if($cek > 0){
 
			$data_session = array(
				'admin_email' => $cek['admin_email'],
				'admin_nama' => $cek['admin_nama'],
				'admin_image' => $cek['admin_image'],
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			redirect(base_url("admin"));
 
		}else{
			$this->load->view('admin/v_login_admin');
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('admin/Login_admin'));
	}
}