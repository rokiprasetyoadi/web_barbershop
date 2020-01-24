<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_myaccount extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        //Codeigniter : Write Less Do More
    }

    public function rulesProfile()
    {
        $rule=[
            [ // aturan untuk nama
            'field'=>'nama',
            'label'=>'Nama',
            'rules'=>'trim'
            ],

            [ // aturan
            'field'=>'kodepos',
            'label'=>'Kode Pos',
            'rules'=>'trim|numeric|min_length[5]|max_length[5]',
            'errors'=>['numeric'=>'Kodepos hanya terdiri dari angka saja!']],

            [ // aturan
            'field'=>'nohp',
            'label'=>'No. Hp',
            'rules'=>'trim|numeric',
            'errors'=>['numeric'=>'No. Hp hanya dapat diisi dengan angka!']],

        ];
        $this->form_validation->set_rules($rule);
    }

    public function editData()
    {
        $data = [
          'customers_nama' => htmlspecialchars($this->input->post('nama', true)),
          'customers_alamat' =>htmlspecialchars($this->input->post('alamat', true)),
          'provinsi_id' => htmlspecialchars($this->input->post('province_id', true)),
          'customers_provinsi' => htmlspecialchars($this->input->post('nama_provinsi', true)),
          'kota_id' => htmlspecialchars($this->input->post('kabupaten_id', true)),
          'customers_kota' => htmlspecialchars($this->input->post('kotakab', true)),
          'customers_kodepos' => htmlspecialchars($this->input->post('kodepos', true)),
          'customers_nohp' => htmlspecialchars($this->input->post('nohp', true))
        ];

        $this->db->where('customers_email', $this->session->userdata('email'));
        $this->db->update('customers', $data);
    }
}
