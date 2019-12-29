<?php class M_profile extends CI_Model
{
    public function rulesEdit()
    {
        $data = [
            [
                'field' => 'admin_id',
                'label' => 'ID admin',
                'rules' => 'required'
            ],
            [
                'field' => 'admin_nama',
                'label' => 'Kategori Barang',
                'rules' => 'required'
            ],
            [
                'field' => 'admin_email',
                'label' => 'Email',
                'rules' => 'required'
            ]
        ];
        $this->form_validation->set_rules($data);
    }

    public function getById($id = null)
    {
        $this->db->from('admin');

        if ($id != null) {
            $this->db->where('admin_id', $id);
        }

        $query = $this->db->get();
        return $query;
    }

    public function editData()
    {
        $data = [
            'admin_nama' => htmlspecialchars($this->input->post('admin_nama', true)),
            'admin_alamat' => htmlspecialchars($this->input->post('admin_alamat', true)),
            'admin_email' => htmlspecialchars($this->input->post('admin_email', true)),
            'admin_telpon' => htmlspecialchars($this->input->post('admin_telpon', true)),
            'admin_image' => $this->_uploadImage()
        ];

        $this->db->where('admin_id', $this->input->post('admin_id'));
        $this->db->update('admin', $data);
    }

    private function _uploadImage()
    {
        $config['upload_path'] = './assets/upload/foto_profile/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['file_name'] = $this->input->post('admin_id');
        $config['overwrite'] = true;
        $config['max_size'] = 5024; // 1MB
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = FALSE;
        $config['quality'] = '50%';
        $config['width'] = 460;
        $config['height'] = 528;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('admin_image')) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
    }

    public function cek_password($table,$where){        
        return $this->db->get_where($table,$where);
    }

    public function editPassword()
    {
        $data = [
            'admin_password' => htmlspecialchars(md5($this->input->post('admin_password1', true))),
        ];

        $this->db->where('admin_id', $this->input->post('admin_id'));
        $this->db->update('admin', $data);
    }

}
?>