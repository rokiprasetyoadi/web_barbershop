<?php class M_customers extends CI_Model {

	public function getAll() {
		return $this->db->get('customers')->result_array();
	}

	public function deleteData($id) {
		$this->db->where('customers_id', $id);
		$this->db->delete('customers');
	}



	//frontend

	//--register--
	public function rulesR() {
		$rule=[ 
			[ // aturan untuk nama
			'field'=>'nama',
			'label'=>'Nama',
			'rules'=>'required|trim'
			],

			[ // aturan untuk email
			'field'=>'email',
			'label'=>'Email',
			'rules'=>'required|trim|valid_email|is_unique[customers.customers_email]',
			'errors'=>['is_unique'=>'This email has already been used']],

			[ // aturan untuk password
			'field'=>'password1',
			'label'=>'Password',
			'rules'=>'required|trim|min_length[6]|matches[password2]|alpha_numeric|password_check[1,1,1]',
			'errors'=>
			[	
			'min_length'=>'Password needs to have minimal 6 lenght!'
			]],

			[ // aturan konfirmasi password
			'field'=>'password2',
			'label'=>'Password',
			'rules'=>'required|trim|matches[password1]'
			]
		];
		$this->form_validation->set_rules($rule);
	}

	public function prosesDaftarAkun() {
		$email = $this->input->post('email', true);
		$data = [ 
			'customers_nama' => $this->input->post('nama', true),
			'customers_email' => $email,
			'customers_password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
			'customers_status' => 0
		];

		$token = base64_encode(random_bytes(32));
		$customers_token = [
			'email' =>	$email,
			'token' => $token,
			'date_created' => time()
		];
	
		$this->_sendEmail($token, 'verify');
		$this->db->insert('customers', $data);
		$this->db->insert('customers_token', $customers_token);
	}

	
	private function _sendEmail($token, $type)
	{
		$config = [
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'nurphnx@gmail.com',
			'smtp_pass' => 'Mz4inurrofanf00',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n",
		];

		$this->load->library('email', $config);
		$this->email->initialize($config);

		$this->email->from('sevenhead@gmail.com', 'Sevenhead');
		$this->email->to($this->input->post('email', TRUE));

		if ($type == 'verify') {
			$this->email->subject('Your registration');
			$this->email->message('Click this link to verify your account : 
				<a href="'. base_url() .'home/verify?email='.$this->input->post('email').'&token='.urlencode($token).'")>Active</a>. Activation time for 5 minutes.');
		} elseif ($type == 'forgot') {
			$this->email->subject('Reset Password');
			$this->email->message('Click this link to reset your account password : 
				<a href="'. base_url() .'forgot/resetpassword?email='.$this->input->post('email').'&token='.urlencode($token).'")>Active</a>. Reset password time for 24 hours.');
		}

		if ($this->email->send()) {
			return true;
		} else {
			echo $this->email->print_debugger();
			die;
		}
	}

}

?>