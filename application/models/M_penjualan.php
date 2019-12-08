<?php class M_penjualan extends CI_Model {
	
	public function getAll($id=null) {
		$this->db->from('tbl_penjualan');
		$this->db->join('tbl_detailpenjualan', 'tbl_detailpenjualan.detailjual_nofak = tbl_penjualan.jual_nofak', 'left');
		$this->db->join('admin', 'tbl_penjualan.jual_admin_id = admin.admin_id', 'left');
		$this->db->join('customers', 'tbl_penjualan.jual_customers_id = customers.customers_id', 'left');

		if($id !=null) {
			$this->db->where('jual_nofak', $id);
		}

		$query=$this->db->get();
		return $query;
	}

	public function detail($where,$table)
	{	
		$this->db->join('tbl_detailpenjualan', 'tbl_detailpenjualan.detailjual_nofak = tbl_penjualan.jual_nofak', 'left');
		$this->db->join('admin', 'tbl_penjualan.jual_admin_id = admin.admin_id', 'left');
		$this->db->join('customers', 'tbl_penjualan.jual_customers_id = customers.customers_id', 'left');

		return $this->db->get_where($table,$where);
	}

	public function deleteData($id) {
		$this->db->where('jual_nofak', $id);
		$this->db->delete('tbl_penjualan');
	}
}

?>