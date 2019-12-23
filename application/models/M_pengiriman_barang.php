<?php class M_pengiriman_barang extends CI_Model {

	public function rulesEdit() {
		$data=[ 
			[ 
				'field'=>'jual_nofak',
				'label'=>'ID Penjualan',
				'rules'=>'required'
			]
			];
		$this->form_validation->set_rules($data);
	}
	
	public function getAll() {
		$this->db->from('tbl_pembayaran');
		$this->db->join('customers', 'tbl_pembayaran.pembayaran_customers_id = customers.customers_id', 'left');
		$this->db->join('tbl_penjualan', 'tbl_penjualan.jual_nofak = tbl_pembayaran.pembayaran_jual_id', 'left');
		$this->db->where("(jual_status = 'Process' OR jual_status = 'On The Way')");

		$query=$this->db->get();
		return $query;
	}

	public function editData() {
		$data=[ 'jual_status'=>htmlspecialchars($this->input->post('jual_status', true)),
			'jual_kurir'=>htmlspecialchars($this->input->post('jual_kurir', true)),
			'jual_layanan'=>htmlspecialchars($this->input->post('jual_layanan', true)),
			'jual_biaya'=>htmlspecialchars($this->input->post('jual_biaya', true)),
			'jual_resi'=>htmlspecialchars($this->input->post('jual_resi', true))
		];
		$this->db->where('jual_nofak', $this->input->post('jual_nofak'));
		$this->db->update('tbl_penjualan', $data);
	}

	public function deleteData($id) {
		$this->db->where('pembayaran_id', $id);
		$this->db->delete('tbl_pembayaran');
	}
}

?>