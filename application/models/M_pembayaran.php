<?php class M_pembayaran extends CI_Model {

	private $_table="tbl_pembayaran";
	public $pembayaran_bukti = "default.jpg";
	public $pembayaran_id;

	public function rulesEdit() {
		$data=[ 
			[ 
				'field'=>'pembayaran_id',
				'label'=>'ID Pembayaran',
				'rules'=>'required'
			],
			[ 
				'field'=>'pembayaran_status',
				'label'=>'Status Pembayaran',
				'rules'=>'required'
			]
			];
		$this->form_validation->set_rules($data);
	}

	public function getAllData($id=null) {
		$this->db->from('tbl_pembayaran');
		$this->db->join('customers', 'customers.customers_id = tbl_pembayaran.pembayaran_customers_id', 'left');
		$this->db->join('tbl_penjualan', 'tbl_penjualan.jual_pembayaran_id = tbl_pembayaran.pembayaran_id', 'left');

		if($id !=null) {
			$this->db->where('pembayaran_id', $id);
		}

		$query=$this->db->get();
		return $query;
	}

	public function editData() {
		$data=[ 'pembayaran_status'=>htmlspecialchars($this->input->post('pembayaran_status', true))
		];
		$this->db->where('pembayaran_id', $this->input->post('pembayaran_id'));
		$this->db->update('tbl_pembayaran', $data);
	}

	public function deleteData($id) {
		$this->_deleteImage($id);
		return $this->db->delete($this->_table, array("pembayaran_id" => $id));
	}

	public function getById($id) {
		return $this->db->get_where($this->_table, ["pembayaran_id"=> $id])->row();
	}

	private function _deleteImage($id) {
		$pembayaran = $this->getById($id);
		if ($pembayaran->pembayaran_bukti !="default.jpg") {
			$filename=explode(".", $pembayaran->pembayaran_bukti)[0];
			return array_map('unlink', glob(FCPATH."assets/upload/bukti_pembayaran/$filename.*"));
		}
	}

	}
?>