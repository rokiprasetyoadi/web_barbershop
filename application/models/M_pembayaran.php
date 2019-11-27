<?php class M_pembayaran extends CI_Model {
	
	public function getAll() {
		return $this->db->get('tbl_pembayaran')->result_array();
	}

	public function deleteData($id) {
		$this->db->where('pembayaran_id', $id);
		$this->db->delete('tbl_pembayaran');
	}

	}
?>