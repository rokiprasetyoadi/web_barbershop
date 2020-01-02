<?php class M_galeri extends CI_Model
{
	private $_table = "galeri";
	public $galeri_image = "default.jpg";
	public $galeri_id;

    public function getAll()
    {
        return $this->db->get('galeri');
    }

    public function getById($id)
	{
		return $this->db->get_where($this->_table, ["galeri_id" => $id])->row();
	}

    public function rulesNew()
	{
		$data = [
			[
				'field' => 'galeri_id',
				'label' => 'ID',
				'rules' => 'required|is_unique[galeri.galeri_id]'
			],
			[
				'field' => 'galeri_nama',
				'label' => 'Nama',
				'rules' => 'required'
			],
			[
				'field' => 'galeri_image',
				'label' => 'Foto',
				'rules' => 'required'
			]
		];
		$this->form_validation->set_rules($data);
	}

	public function kode()
	{
		$this->db->select('RIGHT(galeri.galeri_id,2) as id', false);
		$this->db->order_by('id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('galeri'); //cek dulu apakah ada sudah ada kode di tabel.

		if ($query->num_rows() <> 0) {
			//cek kode jika telah tersedia
			$data = $query->row();
			$kode = intval($data->id) + 1;
		} else {
			$kode = 1; //cek jika kode belum terdapat pada table
		}

		$batas = str_pad($kode, 2, "0", STR_PAD_LEFT);
		$kodetampil = "G" . $batas; //format kode
		return $kodetampil;
	}

	public function addNew()
	{
		$data = [
			'galeri_id' => htmlspecialchars($this->input->post('galeri_id', true)),
			'galeri_nama' => htmlspecialchars($this->input->post('galeri_nama', true)),
			'galeri_image' => $this->_uploadImage(),
			'galeri_keterangan' => htmlspecialchars($this->input->post('galeri_keterangan', true))
		];

		$this->db->insert('galeri', $data); // query untuk insert data ke tabel galeri
	}

	private function _uploadImage()
	{
		$config['upload_path'] = './assets/upload/galeri/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['file_name'] = $this->input->post('galeri_id');
		$config['overwrite'] = true;
		$config['max_size'] = 5024; // 1MB
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = FALSE;
		$config['quality'] = '50%';
		$config['width'] = 460;
		$config['height'] = 528;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('galeri_image')) {
			return $this->upload->data("file_name");
		}

		return "default.jpg";
	}

    public function deleteData($id)
	{
		$this->_deleteImage($id);
		return $this->db->delete($this->_table, array("galeri_id" => $id));
	}

	private function _deleteImage($id)
	{
		$galeri = $this->getById($id);
		if ($galeri->galeri_image != "default.jpg") {
			$filename = explode(".", $galeri->galeri_image)[0];
			return array_map('unlink', glob(FCPATH . "assets/upload/galeri/$filename.*"));
		}
	}

}