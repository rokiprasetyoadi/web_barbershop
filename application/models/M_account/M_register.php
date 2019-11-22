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
                  'errors' => ['alpha_numeric => Maaf, Kolom ini hanya boleh berisi huruf']
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
        'date_created' => date()
    ]

    $this->db->insert('customers', $data);
    $this->db->insert('customers_token', $customers_token);

    $this->_sendEmail($token, 'verify' );
  }

}
