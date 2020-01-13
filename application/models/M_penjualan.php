<?php class M_penjualan extends CI_Model
{
    public function getAll()
    {
        $this->db->from('tbl_penjualan');
        $this->db->join('customers', 'tbl_penjualan.jual_customers_id = customers.customers_id', 'left');
        $this->db->join('tbl_pembayaran', 'tbl_penjualan.jual_nofak = tbl_pembayaran.pembayaran_jual_id', 'left');
        $this->db->where('jual_status', 'Waiting for Payment');

        $query=$this->db->get();
        return $query;
    }

    public function dtl($id)
    {
        $this->db->join('tbl_detailpenjualan', 'tbl_detailpenjualan.detailjual_nofak = tbl_penjualan.jual_nofak', 'left');
        $this->db->join('tbl_pembayaran', 'tbl_penjualan.jual_nofak = tbl_pembayaran.pembayaran_jual_id', 'left');
        $this->db->join('customers', 'tbl_penjualan.jual_customers_id = customers.customers_id', 'left');
        $this->db->join('tbl_barang', 'tbl_detailpenjualan.detailjual_barang_id = tbl_barang.barang_id', 'left');
        return $this->db->get('tbl_penjualan', $id)->row_array();
    }

    public function detail($where, $table)
    {
        $this->db->join('tbl_detailpenjualan', 'tbl_detailpenjualan.detailjual_nofak = tbl_penjualan.jual_nofak', 'left');
        $this->db->join('customers', 'tbl_penjualan.jual_customers_id = customers.customers_id', 'left');
        $this->db->join('tbl_barang', 'tbl_detailpenjualan.detailjual_barang_id = tbl_barang.barang_id', 'left');

        return $this->db->get_where($table, $where);
    }

    public function deleteData($id)
    {
        //$this->db->where('jual_nofak', $id);
        //$this->db->delete('tbl_penjualan');

        $this->db->delete('tbl_penjualan', array('jual_nofak' => $id));
        $this->db->delete('tbl_detailpenjualan', array('detailjual_nofak' => $id));
        $this->db->delete('tbl_pembayaran', array('pembayaran_jual_id' => $id));
    }

    //$kodefaktur


    public function kodefaktur()
    {
        $this->db->select('RIGHT(tbl_penjualan.jual_nofak,2) as id', false);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('tbl_penjualan'); //cek dulu apakah ada sudah ada kode di tabel.

        if ($query->num_rows() <> 0) {
            //cek kode jika telah tersedia
            $data = $query->row();
            $kode = intval($data->id) + 1;
        } else {
            $kode = 1; //cek jika kode belum terdapat pada table
        }

        date_default_timezone_set("Asia/Jakarta");
        $tgl = date('dmyhis');
        $batas = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodetampil = "FR" . $tgl . $batas; //format kode
        return $kodetampil;
    }
}
