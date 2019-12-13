<?php class M_pengiriman_barang extends CI_Model {

	public function rulesEdit() {
		$data=[ 
			[ 
				'field'=>'pembayaran_id',
				'label'=>'ID Pembayaran',
				'rules'=>'required'
			],
			[ 
				'field'=>'no_resi',
				'label'=>'RESI',
				'rules'=>'required'
			]
			];
		$this->form_validation->set_rules($data);
	}
	
	public function getAll() {
		$this->db->from('tbl_pembayaran');
		$this->db->join('customers', 'tbl_pembayaran.pembayaran_customers_id = customers.customers_id', 'left');
		$this->db->join('tbl_penjualan', 'tbl_penjualan.jual_pembayaran_id = tbl_pembayaran.pembayaran_id', 'left');
		$this->db->where('pembayaran_status', 'Sudah Bayar');

		$query=$this->db->get();
		return $query;
	}

	public function editData() {
		$data=[ 'no_resi'=>htmlspecialchars($this->input->post('no_resi', true))
		];
		$this->db->where('pembayaran_id', $this->input->post('pembayaran_id'));
		$this->db->update('tbl_pembayaran', $data);
	}

	public function deleteData($id) {
		$this->db->where('pembayaran_id', $id);
		$this->db->delete('tbl_pembayaran');
	}
}

?>