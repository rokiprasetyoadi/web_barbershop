<?php class M_laporan_penjualan extends CI_Model {
	
	public function getAll() {
		$this->db->from('tbl_penjualan');
		$this->db->join('admin', 'tbl_penjualan.jual_admin_id = admin.admin_id', 'left');
		$this->db->join('customers', 'tbl_penjualan.jual_customers_id = customers.customers_id', 'left');
		$this->db->join('tbl_pembayaran', 'tbl_pembayaran.pembayaran_id = tbl_penjualan.jual_pembayaran_id', 'left');
		$this->db->where('pembayaran_status','Sudah Bayar');

		$query=$this->db->get();
		return $query;
	}

	public function dtl($id){
		$this->db->join('tbl_detailpenjualan', 'tbl_detailpenjualan.detailjual_nofak = tbl_penjualan.jual_nofak', 'left');
		$this->db->join('tbl_pembayaran', 'tbl_pembayaran.pembayaran_id = tbl_penjualan.jual_pembayaran_id', 'left');
		$this->db->join('admin', 'tbl_penjualan.jual_admin_id = admin.admin_id', 'left');
		$this->db->join('customers', 'tbl_penjualan.jual_customers_id = customers.customers_id', 'left');
		$this->db->join('tbl_barang', 'tbl_detailpenjualan.detailjual_barang_id = tbl_barang.barang_id', 'left');
		return $this->db->get('tbl_penjualan',$id)->row_array();
	}

	public function detail($where,$table)
	{	
		$this->db->join('tbl_detailpenjualan', 'tbl_detailpenjualan.detailjual_nofak = tbl_penjualan.jual_nofak', 'left');
		$this->db->join('admin', 'tbl_penjualan.jual_admin_id = admin.admin_id', 'left');
		$this->db->join('customers', 'tbl_penjualan.jual_customers_id = customers.customers_id', 'left');
		$this->db->join('tbl_barang', 'tbl_detailpenjualan.detailjual_barang_id = tbl_barang.barang_id', 'left');

		return $this->db->get_where($table,$where);
	}

	public function deleteData($id) {
		$this->db->where('jual_nofak', $id);
		$this->db->delete('tbl_penjualan');
	}
}

?>