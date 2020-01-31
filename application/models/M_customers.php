<?php class M_customers extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('customers')->result_array();
    }

    public function deleteData($id)
    {
        $this->db->where('customers_id', $id);
        $this->db->delete('customers');
    }

    //--register--
    public function rulesR()
    {
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

    public function ruleChange()
    {
        $rule =
        [
            [
              'field' => 'password1',
              'label' => 'Password',
              'rules' => 'required|trim|min_length[6]|matches[password2]|alpha_numeric|password_check[1,1,1]',
              'errors' => ['min_length' => 'Password needs to have minimal 6 length!']
            ],
            [
              'field' => 'password2',
              'label' => 'Repeat Password',
              'rules' => 'required|trim|matches[password1]'
            ]
        ];
        $this->form_validation->set_rules($rule);
    }

    public function prosesDaftarAkun()
    {
        $email = $this->input->post('email', true);
        $data = [
            'customers_nama' => $this->input->post('nama', true),
            'customers_email' => $email,
            'customers_password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'customers_status' => 0
        ];
        $this->db->insert('customers', $data);
        $cid = $this->db->insert_id();
        $data2 = [
            'customers_id' => $cid
        ];

        $token = base64_encode(random_bytes(32));     
        $customers_token = [
            'email' =>	$email,
            'token' => $token,
            'date_created' => time()
        ];

        $this->_sendEmail($token, 'verify');
        $this->db->insert('tbl_cart', $data2);
        $this->db->insert('customers_token', $customers_token);
    }


    public function _sendEmail($token, $type)
    {   
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://mail.zainurrofan.com',
            'smtp_user' => 'service@zainurrofan.com',
            'smtp_pass' => 'Zainur12345',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);
        
        $link = base_url() .'home/verify?email='.$this->input->post('email').'&token='.urlencode($token);
        
        $data['url1'] = '<a href="' . $link . '" style="display:inline-block;background:#ffffff;color:#ba946b;font-family:Ubuntu,Helvetica,Arial,sans-serif;font-size:14px;font-weight:normal;line-height:120%;margin:0;text-decoration:none;text-transform:none;padding:10px 25px;border-radius:3px"> CONFIRM YOUR EMAIL </a>';
        
        $data['url2'] = '<a href="' . $link . '" style="display:inline-block;background:#ffffff;color:#ba946b;font-family:Ubuntu,Helvetica,Arial,sans-serif;font-size:14px;font-weight:normal;line-height:120%;margin:0;text-decoration:none;text-transform:none;padding:10px 25px;border-radius:3px" target="_blank"> CONFIRM YOUR EMAIL </a>';
        
        $this->email->from('sevenhead@gmail.com', 'Sevenhead');
        $this->email->to($this->input->post('email', true));
        $subjregist = $this->load->view('registration',$data,TRUE);

        if ($type == 'verify') {
            $this->email->subject('Registration Confirmation | Sevenhead');
            $this->email->message($subjregist);
        } elseif ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your account password :
				<a href="'. base_url() .'account/forgotpassword/resetpassword?email='.$this->input->post('email').'&token='.urlencode($token).'")>Reset</a>. Reset password is for 24 hours.');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
}
