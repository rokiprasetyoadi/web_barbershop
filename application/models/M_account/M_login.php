<?php

class M_login extends CI_Model{
	function cek_login($customers,$where){
		return $this->db->get_where($customers,$where);
		if ($cek > 0) {
			$data_session = array(
				'email' => $customers_email,
				'status' => "login"
			);

			$this->session->set_userdata($data_session);
			redirect(base_url("account/login"));
		} else {
			echo "Email dan Password yg dimasukkan salah";
		}
	}
}
