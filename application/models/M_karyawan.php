<?php class M_karyawan extends CI_Model
{
	private $_table = "karyawan";
	public $karyawan_image = "default.jpg";
	public $karyawan_id;

    public function getAll($id = null)
	{
		$this->db->from('karyawan');

		if ($id != null) {
			$this->db->where('karyawan_id', $id);
		}

		$query = $this->db->get();
		return $query;
	}

    public function getById($id)
	{
		return $this->db->get_where($this->_table, ["karyawan_id" => $id])->row();
	}

    public function rulesNew()
	{
		$data = [
			[
				'field' => 'karyawan_id',
				'label' => 'ID Karyawan',
				'rules' => 'required|is_unique[karyawan.karyawan_id]'
			],
			[
				'field' => 'karyawan_nama',
				'label' => 'Nama Karyawan',
				'rules' => 'required'
			]
		];
		$this->form_validation->set_rules($data);
	}

	public function addNew()
	{
		$data = [
			'karyawan_id' => htmlspecialchars($this->input->post('karyawan_id', true)),
			'karyawan_nama' => htmlspecialchars($this->input->post('karyawan_nama', true)),
			'karyawan_keterangan' => htmlspecialchars($this->input->post('karyawan_keterangan', true)),
			'karyawan_image' => $this->_uploadImage()
		];

		$this->db->insert('karyawan', $data); // query untuk insert data ke tabel barang
	}

	public function kode()
	{
		$this->db->select('RIGHT(karyawan.karyawan_id,2) as id', false);
		$this->db->order_by('id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('karyawan'); //cek dulu apakah ada sudah ada kode di tabel.

		if ($query->num_rows() <> 0) {
			//cek kode jika telah tersedia
			$data = $query->row();
			$kode = intval($data->id) + 1;
		} else {
			$kode = 1; //cek jika kode belum terdapat pada table
		}

		$tgl = date('dmY');
		$batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
		$kodetampil = "K" . $tgl . $batas; //format kode
		return $kodetampil;
	}

	private function _uploadImage()
    {
        $config = [
					'upload_path' => './assets/upload/karyawan/',
					'allowed_types' => 'gif|jpg|png|jpeg',
					'file_name' => $this->input->post('karyawan_id'),
					'overwrite' => true,
					'max_size' => 5024
				];

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('karyawan_image')) {
            return $this->upload->data('file_name');
        }

        return "default.jpg";
    }

    public function deleteData($id)
	{
		$this->_deleteImage($id);
		return $this->db->delete($this->_table, array("karyawan_id" => $id));
	}

	private function _deleteImage($id)
	{
		$karyawan = $this->getById($id);
		if ($karyawan->karyawan_image != "default.jpg") {
			$filename = explode(".", $karyawan->karyawan_image)[0];
			return array_map('unlink', glob(FCPATH . "assets/upload/karyawan/$filename.*"));
		}
	}

}