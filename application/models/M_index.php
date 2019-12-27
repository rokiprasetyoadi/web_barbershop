<?php class M_index extends CI_Model
{
    public function hitung_customers(){
        $query = $this->db->query('SELECT COUNT(customers_id) AS tot_cst FROM customers WHERE customers_status="1" ');
        return $query->row_array();
    }

    public function hitung_barang(){
        $query = $this->db->query('SELECT COUNT(barang_id) AS tot_brg FROM tbl_barang');
        return $query->row_array();
    }

    public function hitung_transaksi(){
        $query = $this->db->query('SELECT COUNT(jual_nofak) AS tot_jual FROM tbl_penjualan WHERE jual_status="Waiting for Payment" ');
        return $query->row_array();
    }

    public function hitung_pengiriman(){
        $query = $this->db->query('SELECT COUNT(jual_nofak) AS tot_kirim FROM tbl_penjualan WHERE jual_status="Process OR On The Way"');
        return $query->row_array();
    }

}