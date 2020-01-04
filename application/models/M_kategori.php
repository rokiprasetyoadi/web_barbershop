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

	public function addNew() {
		$data=[
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
		$this->db->where('kategori_id', $id);
		$this->db->delete('kategori');
	}

	}
?>