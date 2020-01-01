<?php class M_supplier extends CI_Model {
	
	public function getAll($id=null) {
		$this->db->from('supplier');

		if($id !=null) {
			$this->db->where('supplier_id', $id);
		}

		$query=$this->db->get();
		return $query;
	}

	public function rulesNew() {
		$data=[ 
			[ 	
				'field'=>'supplier_id',
				'label'=>'ID Supplier',
				'rules'=>'required|is_unique[supplier.supplier_id]'
			],
			[ 	
				'field'=>'supplier_nama',
				'label'=>'Nama Supplier',
				'rules'=>'required'
			],
			[ 	
				'field'=>'supplier_nohp',
				'label'=>'No Hp Supplier',
				'rules'=>'required'
			],
			[ 	
				'field'=>'supplier_alamat',
				'label'=>'Alamat Supplier',
				'rules'=>'required'
			]
		];
		$this->form_validation->set_rules($data);
	}

	public function rulesEdit() {
		$data=[ 
			[ 	
				'field'=>'supplier_id',
				'label'=>'ID Supplier',
				'rules'=>'required'
			],
			[ 	
				'field'=>'supplier_nama',
				'label'=>'Nama Supplier',
				'rules'=>'required'
			],
			[ 	
				'field'=>'supplier_nohp',
				'label'=>'No Hp Supplier',
				'rules'=>'required'
			],
			[ 	
				'field'=>'supplier_alamat',
				'label'=>'Alamat Supplier',
				'rules'=>'required'
			]
		];
		$this->form_validation->set_rules($data);
	}

	public function kode() {
		$this->db->select('RIGHT(supplier.supplier_id,2) as id', false);
		$this->db->order_by('id', 'DESC');
		$this->db->limit(1);
		$query=$this->db->get('supplier'); //cek dulu apakah ada sudah ada kode di tabel.

		if ($query->num_rows() <> 0) {
			//cek kode jika telah tersedia
			$data=$query->row();
			$kode=intval($data->id)+1;
		}

		else {
			$kode=1; //cek jika kode belum terdapat pada table
		}

		$batas=str_pad($kode, 3, "0", STR_PAD_LEFT);
		$kodetampil=$batas; //format kode
		return $kodetampil;
	}

	public function addNew() {
		$data=[ 
		'supplier_id'=>htmlspecialchars($this->input->post('supplier_id', true)),
		'supplier_nama'=>htmlspecialchars($this->input->post('supplier_nama', true)),
		'supplier_email'=>htmlspecialchars($this->input->post('supplier_email', true)),
		'supplier_nohp'=>htmlspecialchars($this->input->post('supplier_nohp', true)),
		'supplier_alamat'=>htmlspecialchars($this->input->post('supplier_alamat', true)),
		'supplier_keterangan'=>htmlspecialchars($this->input->post('supplier_keterangan', true))];

		$this->db->insert('supplier', $data); // query untuk insert data ke tabel barang
	}

	public function editData() {
		$data=[
		'supplier_nama'=>htmlspecialchars($this->input->post('supplier_nama', true)),
		'supplier_email'=>htmlspecialchars($this->input->post('supplier_email', true)),
		'supplier_nohp'=>htmlspecialchars($this->input->post('supplier_nohp', true)),
		'supplier_alamat'=>htmlspecialchars($this->input->post('supplier_alamat', true)),
		'supplier_keterangan'=>htmlspecialchars($this->input->post('supplier_keterangan', true))];
		
		$this->db->where('supplier_id', $this->input->post('supplier_id'));
		$this->db->update('supplier', $data);
	}

	public function deleteData($id) {
		$this->db->where('supplier_id', $id);
		$this->db->delete('supplier');
	}

	}
?>