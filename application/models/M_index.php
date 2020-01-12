<?php class M_index extends CI_Model
{
    //Back End
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
        $query = $this->db->query('SELECT COUNT(jual_nofak) AS tot_kirim FROM tbl_penjualan WHERE jual_status="Process" OR jual_status="On The Way" ');
        return $query->row_array();
    }

    //Front End
    public function getKaryawan($id = null)
    {
        $this->db->from('karyawan');

        if ($id != null) {
            $this->db->where('karyawan_id', $id);
        }

        $query = $this->db->get();
        return $query;
    }

    public function getGaleri($id = null)
    {
        $this->db->from('galeri');

        if ($id != null) {
            $this->db->where('galeri_id', $id);
        }

        $query = $this->db->get();
        return $query;
    }

}