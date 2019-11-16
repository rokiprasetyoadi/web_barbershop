<?php class M_customers extends CI_Model {
	
	public function getAll() {
		return $this->db->get('customers')->result_array();
	}

	public function deleteData($id) {
		$this->db->where('customers_id', $id);
		$this->db->delete('customers');
	}

	}
?>