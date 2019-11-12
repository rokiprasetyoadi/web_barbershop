<?php class M_barang extends CI_Model {
	
	private $_table="tbl_barang";

	public function tampil_data($id=null) {
		$this->db->from('tbl_barang');

		if($id !=null) {
			$this->db->where('barang_id', $id);
		}

		$query=$this->db->get();
		return $query;
	}

	public function getById($id) {
		return $this->db->get_where($this->_table, ["barang_id"=> $id])->row();
	}

	public function rulesNew() {
		$data=[ 
			[ 	
				'field'=>'barang_id',
				'label'=>'ID Barang',
				'rules'=>'required|is_unique[tbl_barang.barang_id]'
			],
			[ 	
				'field'=>'barang_kategori_id',
				'label'=>'Kategori Barang',
				'rules'=>'required'
			],
			[ 	
				'field'=>'barang_nama',
				'label'=>'Nama Barang',
				'rules'=>'required'
			],
			[ 	
				'field'=>'barang_harjul_grosir',
				'label'=>'Harga Jual Grosir Barang',
				'rules'=>'required'
			],
			[ 	
				'field'=>'barang_harjul',
				'label'=>'Harga Jual Barang',
				'rules'=>'required'
			],
			[ 	
				'field'=>'barang_stok',
				'label'=>'Stok Barang',
				'rules'=>'required'
			],
			[ 	
				'field'=>'barang_min_stok',
				'label'=>'Stok Minimal Barang',
				'rules'=>'required'
			]
			];
		$this->form_validation->set_rules($data);
	}

	public function rulesEdit() {
		$data=[ 
			[ 
				'field'=>'barang_id',
				'label'=>'ID Barang',
				'rules'=>'required'
			],
			[ 
				'field'=>'barang_kategori_id',
				'label'=>'Kategori Barang',
				'rules'=>'required'
			],
			[ 
				'field'=>'barang_nama',
				'label'=>'Nama Barang',
				'rules'=>'required'
			],
			[ 
				'field'=>'barang_harjul_grosir',
				'label'=>'Harga Jual Grosir Barang',
				'rules'=>'required'
			],
			[ 
				'field'=>'barang_harjul',
				'label'=>'Harga Jual Barang',
				'rules'=>'required'
			],
			[ 
				'field'=>'barang_stok',
				'label'=>'Stok Barang',
				'rules'=>'required'
			],
			[ 
				'field'=>'barang_min_stok',
				'label'=>'Stok Minimal Barang',
				'rules'=>'required'
			]
			];
		$this->form_validation->set_rules($data);
	}

	public function kode() {
		$this->db->select('RIGHT(tbl_barang.barang_id,2) as id', false);
		$this->db->order_by('id', 'DESC');
		$this->db->limit(1);
		$query=$this->db->get('tbl_barang'); //cek dulu apakah ada sudah ada kode di tabel.

		if ($query->num_rows() <> 0) {
			//cek kode jika telah tersedia
			$data=$query->row();
			$kode=intval($data->id)+1;
		}

		else {
			$kode=1; //cek jika kode belum terdapat pada table
		}

		$tgl=date('dmY');
		$batas=str_pad($kode, 4, "0", STR_PAD_LEFT);
		$kodetampil="BR".$tgl.$batas; //format kode
		return $kodetampil;
	}

	public function addNew() {
		$data=[ 'barang_id'=>htmlspecialchars($this->input->post('barang_id', true)),
		'barang_kategori_id'=>htmlspecialchars($this->input->post('barang_kategori_id', true)),
		'barang_nama'=>htmlspecialchars($this->input->post('barang_nama', true)),
		'barang_harjul_grosir'=>htmlspecialchars($this->input->post('barang_harjul_grosir', true)),
		'barang_harjul'=>htmlspecialchars($this->input->post('barang_harjul', true)),
		'barang_image'=>$this->_uploadImage(),
		'barang_stok'=>htmlspecialchars($this->input->post('barang_stok', true)),
		'barang_min_stok'=>htmlspecialchars($this->input->post('barang_min_stok', true)),
		'barang_tgl_input'=>date('Y-m-d H:i:s')];

		$this->db->insert('tbl_barang', $data); // query untuk insert data ke tabel barang
	}

	public function editData() {
		$data=[ 'barang_kategori_id'=>htmlspecialchars($this->input->post('barang_kategori_id', true)),
		'barang_nama'=>htmlspecialchars($this->input->post('barang_nama', true)),
		'barang_harjul_grosir'=>htmlspecialchars($this->input->post('barang_harjul_grosir', true)),
		'barang_harjul'=>htmlspecialchars($this->input->post('barang_harjul', true)),
		'barang_image'=>$this->_uploadImage(),
		'barang_stok'=>htmlspecialchars($this->input->post('barang_stok', true)),
		'barang_min_stok'=>htmlspecialchars($this->input->post('barang_min_stok', true)),
		'barang_tgl_update'=>date('Y-m-d H:i:s')];
		$this->db->where('barang_id', $this->input->post('barang_id'));
		$this->db->update('tbl_barang', $data);
	}

	public function deleteData($id) {
		$this->_deleteImage($id);
		return $this->db->delete('tbl_barang', ['barang_id => $id']);
	}

	public function getkategoriData(){
		$this->db->select('*');
		$this->db->from('kategori');
		$query = $this->db->get();
		return $query->result_array();
	}

	private function _deleteImage() {
		$barang=$this->getById($id);

		if ($barang['barang_image'] !="default.jpg") {
			$filename=explode(".", $barang['barang_image'])[0];
			return array_map('unlink', glob(FCPATH."assets/adm/upload/barang/$filename.*"));
		}
	}

	private function _uploadImage() {
		$config['upload_path']='./assets/adm/upload/barang/';
		$config['allowed_types']='gif|jpg|png|jpeg';
		$config['file_name']=$this->input->post('barang_id');
		$config['overwrite']=true;
		$config['max_size']=5024; // 1MB

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('barang_image')) {
			return $this->upload->data("file_name");
		}

		return "default.jpg";
	}



	//frontend
	
	public function getBarang()
	{
		$this->db->select('*');
		$this->db->from('tbl_barang');
		$this->db->join('kategori', 'tbl_barang.barang_kategori_id = kategori.kategori_id', 'left');	
		$this->db->order_by('barang_nama', 'asc');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getBarangById($b_id)
	{
		return $this->db->get_where('tbl_barang',['barang_id'=>$b_id])->result_array();

	}
	
	public function getKategori(){
		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->order_by('kategori_nama','ASC');
		$query = $this->db->get();
		return $query->result_array();
	}
}

?>