<?php class M_laporan_penjualan extends CI_Model {
	
	public function getAll() {
		$this->db->from('tbl_penjualan');
		$this->db->join('customers', 'tbl_penjualan.jual_customers_id = customers.customers_id', 'left');
		$this->db->join('tbl_pembayaran', 'tbl_penjualan.jual_nofak = tbl_pembayaran.pembayaran_jual_id', 'left');
		$this->db->where('jual_status', 'Arrived');

		$query=$this->db->get();
		return $query;
	}

	
    public function dtl($id)
    {
        $this->db->join('tbl_detailpenjualan', 'tbl_detailpenjualan.detailjual_nofak = tbl_penjualan.jual_nofak', 'left');
        $this->db->join('tbl_pembayaran', 'tbl_penjualan.jual_nofak = tbl_pembayaran.pembayaran_jual_id', 'left');
        $this->db->join('customers', 'tbl_penjualan.jual_customers_id = customers.customers_id', 'left');
        $this->db->join('tbl_barang', 'tbl_detailpenjualan.detailjual_barang_id = tbl_barang.barang_id', 'left');
        // $this->db->where('detailjual_no', $id)
        return $this->db->get('tbl_penjualan')->row_array();
    }
    
	public function detail($where,$table)
	{	
		$this->db->join('tbl_detailpenjualan', 'tbl_detailpenjualan.detailjual_nofak = tbl_penjualan.jual_nofak', 'left');
		$this->db->join('customers', 'tbl_penjualan.jual_customers_id = customers.customers_id', 'left');
		$this->db->join('tbl_barang', 'tbl_detailpenjualan.detailjual_barang_id = tbl_barang.barang_id', 'left');

		return $this->db->get_where($table,$where);
	}

	public function deleteData($id) {
		//$this->db->where('jual_nofak', $id);
		//$this->db->delete('tbl_penjualan');

		$this->db->delete('tbl_penjualan', array('jual_nofak' => $id));
		$this->db->delete('tbl_detailpenjualan', array('detailjual_nofak' => $id));
		$this->db->delete('tbl_pembayaran', array('pembayaran_jual_id' => $id));
	}
}

?>