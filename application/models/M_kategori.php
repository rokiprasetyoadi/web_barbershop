<?php class M_kategori extends CI_Model {
	
	public function getAll($id=null) {
		$this->db->from('kategori');

		if($id !=null) {
			$this->db->where('kategori_id', $id);
		}

		$query=$this->db->get();
		return $query;
	}

	public function rulesNew() {
		$data=[ 
			[ 	
				'field'=>'kategori_id',
				'label'=>'ID kategori',
				'rules'=>'required|is_unique[kategori.kategori_id]'
			],
			[ 	
				'field'=>'kategori_nama',
				'label'=>'Nama Kategori',
				'rules'=>'required'
			]
			];
		$this->form_validation->set_rules($data);
	}

	public function rulesEdit() {
		$data=[ 
			[ 
				'field'=>'kategori_id',
				'label'=>'ID kategori',
				'rules'=>'required'
			],
			[ 
				'field'=>'kategori_nama',
				'label'=>'Nama Kategori',
				'rules'=>'required'
			]
			];
		$this->form_validation->set_rules($data);
	}

	public function kode() {
		$this->db->select('RIGHT(kategori.kategori_id,2) as id', false);
		$this->db->order_by('id', 'DESC');
		$this->db->limit(1);
		$query=$this->db->get('kategori'); //cek dulu apakah ada sudah ada kode di tabel.

		if ($query->num_rows() <> 0) {
			//cek kode jika telah tersedia
			$data=$query->row();
			$kode=intval($data->id)+1;
		}

		else {
			$kode=1; //cek jika kode belum terdapat pada table
		}

		$batas=str_pad($kode, 4, "0", STR_PAD_LEFT);
		$kodetampil="K".$batas; //format kode
		return $kodetampil;
	}

	public function addNew() {
		$data=[ 
		'kategori_id'=>htmlspecialchars($this->input->post('kategori_id', true)),
		'kategori_nama'=>htmlspecialchars($this->input->post('kategori_nama', true))
		];

		$this->db->insert('kategori', $data); // query untuk insert data ke tabel barang
	}

	public function editData() {
		$data=[ 
		'kategori_id'=>htmlspecialchars($this->input->post('kategori_id', true)),
		'kategori_nama'=>htmlspecialchars($this->input->post('kategori_nama', true))
		];
		
		$this->db->where('kategori_id', $this->input->post('kategori_id'));
		$this->db->update('kategori', $data);
	}

	public function deleteData($id) {
		return $this->db->delete('kategori', ['kategori_id => $id']);
	}

	}
?>