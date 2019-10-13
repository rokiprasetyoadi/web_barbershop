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
		$crew_email = $this->input->post('crew_email');
		$crew_password = $this->input->post('crew_password');
		$where = array(
			'crew_email' => $crew_email,
			'crew_password' => md5($crew_password)
			);
		$cek = $this->M_loginadmin->cek_login("crew",$where)->row_array();
		if($cek > 0){
 
			$data_session = array(
				'crew_email' => $cek['crew_email'],
				'crew_nama' => $cek['crew_nama'],
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