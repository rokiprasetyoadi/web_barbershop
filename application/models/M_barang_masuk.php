<?php class M_barang_masuk extends CI_Model {

	public function getAllBrg($id=null) {
		$this->db->from('tbl_brgmasuk');
		$this->db->join('supplier', 'supplier.supplier_id = tbl_brgmasuk.brgmasuk_supplier_id', 'left');

		if($id !=null) {
			$this->db->where('brgmasuk_nota', $id);
		}

		$query=$this->db->get();
		return $query;
	}

	public function getAll($id=null) {
		$this->db->from('tbl_brgmasuk');
		$this->db->join('tbl_detailbrgmasuk', 'tbl_detailbrgmasuk.detailmasuk_brgmasuk_nota = tbl_brgmasuk.brgmasuk_nota', 'left');
		$this->db->join('supplier', 'supplier.supplier_id = tbl_brgmasuk.brgmasuk_supplier_id', 'left');
		$this->db->join('tbl_barang', 'tbl_barang.barang_id = tbl_detailbrgmasuk.detailmasuk_barang_id', 'left');

		if($id !=null) {
			$this->db->where('brgmasuk_nota', $id);
		}

		$query=$this->db->get();
		return $query;
	}

	public function ambildata($table,$where){        
        return $this->db->get_where($table,$where);
    }

	public function dtl($id){
		$this->db->select('*');
		$this->db->join('supplier', 'supplier.supplier_id = tbl_brgmasuk.brgmasuk_supplier_id', 'left');
		$this->db->join('tbl_detailbrgmasuk', 'tbl_detailbrgmasuk.detailmasuk_brgmasuk_nota = tbl_brgmasuk.brgmasuk_nota', 'left');

		return $this->db->get_where('tbl_brgmasuk',["brgmasuk_nota"=>$id])->row_array();
	}

	public function detail($where,$table)
	{	
		$this->db->join('tbl_detailbrgmasuk', 'tbl_detailbrgmasuk.detailmasuk_brgmasuk_nota = tbl_brgmasuk.brgmasuk_nota', 'left');
		$this->db->join('supplier', 'supplier.supplier_id = tbl_brgmasuk.brgmasuk_supplier_id', 'left');
		$this->db->join('tbl_barang', 'tbl_barang.barang_id = tbl_detailbrgmasuk.detailmasuk_barang_id', 'left');

		return $this->db->get_where($table,$where);
	}

	public function getSupplierData(){
		$this->db->select('*');
		$this->db->from('supplier');
		$query = $this->db->get();

		return $query->result_array();
	}

	public function rulesNew() {
		$data=[ 
			[ 	
				'field'=>'brgmasuk_nota',
				'label'=>'ID Barang Masuk',
				'rules'=>'required|is_unique[tbl_brgmasuk.brgmasuk_nota]'
			],
			[ 	
				'field'=>'brgmasuk_supplier_id',
				'label'=>'Supplier Id',
				'rules'=>'required'
			]
			];
		$this->form_validation->set_rules($data);
	}

	public function rulesEdit() {
		$data=[ 
			[ 	
				'field'=>'brgmasuk_nota',
				'label'=>'ID Barang Masuk',
				'rules'=>'required'
			],
			[ 	
				'field'=>'brgmasuk_supplier_id',
				'label'=>'Supplier Id',
				'rules'=>'required'
			]
			];
		$this->form_validation->set_rules($data);
	}

	public function rulesTambah() {
		$data=[ 
			[ 	
				'field'=>'brgmasuk_nota',
				'label'=>'ID Barang Masuk',
				'rules'=>'required'
			]
			];
		$this->form_validation->set_rules($data);
	}

	public function kode() {
		$this->db->select('RIGHT(tbl_brgmasuk.brgmasuk_nota,2) as id', false);
		$this->db->order_by('id', 'DESC');
		$this->db->limit(1);
		$query=$this->db->get('tbl_brgmasuk'); //cek dulu apakah ada sudah ada kode di tabel.

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
		$kodetampil="BRM".$tgl.$batas; //format kode
		return $kodetampil;
	}

	public function addData() {
		$data=[ 'brgmasuk_nota'=>htmlspecialchars($this->input->post('brgmasuk_nota', true)),
		'brgmasuk_supplier_id'=>htmlspecialchars($this->input->post('brgmasuk_supplier_id', true)),
		'brgmasuk_keterangan'=>htmlspecialchars($this->input->post('brgmasuk_keterangan', true)),
		'brgmasuk_tgl'=>date('Y-m-d H:i:s')];

		$this->db->insert('tbl_brgmasuk', $data); // query untuk insert data ke tabel barang Masuk
	}

	public function addDetail() {
		$data=[ 'detailmasuk_brgmasuk_nota'=>htmlspecialchars($this->input->post('detailmasuk_brgmasuk_nota', true)),
		'detailmasuk_barang_id'=>htmlspecialchars($this->input->post('detailmasuk_barang_id', true)),
		'detailmasuk_harpok'=>htmlspecialchars($this->input->post('detailmasuk_harpok', true)),
		'detailmasuk_jumlah'=>htmlspecialchars($this->input->post('detailmasuk_jumlah', true)),
		'detailmasuk_subtotal'=> $this->input->post('detailmasuk_harpok') * ($this->input->post('detailmasuk_jumlah') )
	];

		$this->db->insert('tbl_detailbrgmasuk', $data); // query untuk insert data ke tabel barang Masuk
	}

	public function deleteData($id) {
		return $this->db->delete('tbl_brgmasuk',array("brgmasuk_nota" => $id));
	}

	public function deleteBrg($id) {
		return $this->db->delete('tbl_detailbrgmasuk',array("detailmasuk_barang_id" => $id));
	}

}
?>