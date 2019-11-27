 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_register extends CI_Model{

  public function ruleDaftarAkun()
  {
    $rule = [
                [ // aturan untuk nama
                  'field'  => 'nama',
                  'label'  => 'Nama',
                  'rules'  => 'required|trim|alpha_numeric'

                ],

                [ // aturan untuk email
                  'field' => 'email',
                  'label' => 'Email',
                  'rules' => 'required|trim|valid_email|is_unique[customers.customers_email]',
                  'errors' => ['is_unique' => 'Email ini telah di gunakan']
                ],

                [ // aturan untuk password
                  'field' => 'password1',
                  'label' => 'Password',
                  'rules' => 'required|trim|min_length[6]|matches[password2]',
                  'errors' => [
                                'matches' => 'Password yang anda masukkann tidak sama',
                                'min_length' => 'Password terlalu pendek (min 6 karakter)'
                              ]
                ],

                [ // aturan konfirmasi password
                  'field' => 'password2',
                  'label' => 'Password',
                  'rules' => 'required|trim|matches[password1]'
                ],
            ];
    $this->form_validation->set_rules($rule);
  }

  public function prosesDaftarAkun()
  {
    $email = $this->input->post('email', true);
    $data = [
      'customers_nama' => htmlspecialchars($this->input->post('nama', true)),
      'customers_email' => htmlspecialchars($email),
      'customers_password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
      'customers_status' => 0,
      'customers_created' => date('Y-m-d H:i:s')
    ];

    //token
    $token = base64_encode(random_bytes(4));
    $customers_token = [
        'email' => $email,
        'token' => $token,
        'date_created' => time()
    ];

    $this->db->insert('customers', $data);
    $this->db->insert('customers_token', $customers_token);

    $this->_sendEmail($token, 'verify' );
  }

  private function _sendEmail($token, $type)
  {
      $config = [
          'protocol'  => 'smtp',
          'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_user' => 'rachelallric@gmail.com',
          'smtp_pass' => 'aditya123456',
          'smtp_port' => 465,
          'mailtype'  => 'html',
          'charset'   => 'utf-8',
          'newline'   => "\r\n"
      ];

      $this->load->library('email', $config);
      $this->email->from('rachelallric@gmail.com', 'Official Tujuh Kepala');
      $this->email->to($this->input->post('email'));

      if ($type == 'verify') {
        $this->email->subject('Account Verification');
        $this->email->message('Click this link to activate your fucking account =>
        <a href="'. base_url() . 'account/verify?email='. $this->input->post('email') .
        '&token=' . urlencode($token) .'">Activate</a>');
      }

      if ($this->email->send()) {
        return true;
      } else {
        echo $this->email->print_debugger();
        die;
      };
  }

  public function verify()
  {
    $email = $this->input->get('email');
    $token = $this->input->get('token');
    $customers = $this->db->get_where('customers', ['customers_email' => $email])->row_array();

    if ($customers) {
      $customers_token = $this->db->get_where('customers_token', ['token' => $token])->row_array();

      if ($customers_token) {
        //batas kadaluarsa token
        if (time() - $customers_token['date_created'] < (60 * 60  24)) {
            $this->db->set('customers_status', 1);
            $this->db->where('customers_email', $email);
            $this->db->update('customers');
            $this->db->delete('customers_token', ['customers_email' => $email]);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">'.$email.'
            berhasil di aktifkan, silahkan login.</div>');
            redirect('account/login');
        } else {
          $this->db->delete('customers', ['customers_email' => $email]);
          $this->db->delete('customers_token', ['customers_token' => $token]);
          $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
          Account activation failed! Token expired!</div>');
          redirect('account/login');
        }

      } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
        Account activation failed! Wrong token!</div>');
        redirect('account/login');
      }

    } else {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
      Account activation failed! Wrong email!</div>');
      redirect('account/login');
    }
  }

}
