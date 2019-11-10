<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_account extends CI_Model{

  public function ruleDaftarAkun()
  {
    $rule = [
                [ // aturan untuk nama
                  'field'  => 'nama',
                  'label'  => 'Nama',
                  'rules'  => 'required|trim'
                ],

                [ // aturan untuk email
                  'field' => 'email',
                  'label' => 'Email',
                  'rules' => 'required|trim|valid_email|is_unique[user.email]',
                  'errors' => ['is_unique' => 'Email ini telah di gunakan']
                ],

                [ // aturan untuk password
                  'field' => 'password1',
                  'label' => 'Password',
                  'rules' => 'required|trim|min_length[3]|matches[password2]',
                  'errors' => [
                                'matches' => 'Password tidak sama',
                                'min_length' => 'Password terlalu pendek (min 3 karakter)'
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
    $data = [
      'customers_nama' => $this->input->post('nama', true),
      'customers_email' => $this->input->post('email', true),
      'customers_password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
      'id_level' => 2,
      'aktiv' => 1,
    ];

    $this->db->insert('customers', $data);
  }

}