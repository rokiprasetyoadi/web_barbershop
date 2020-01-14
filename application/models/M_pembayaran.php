<?php class M_pembayaran extends CI_Model
{
    private $_table="tbl_pembayaran";
    public $pembayaran_bukti = "default.jpg";
    public $pembayaran_id;

    public function rulesEdit()
    {
        $data=[
            [
                'field'=>'pembayaran_id',
                'label'=>'ID Pembayaran',
                'rules'=>'required'
            ],
            [
                'field'=>'jual_status',
                'label'=>'Status Pembayaran',
                'rules'=>'required'
            ]
            ];
        $this->form_validation->set_rules($data);
    }

    public function getAllData($id=null)
    {
        $this->db->from('tbl_pembayaran');
        $this->db->join('customers', 'customers.customers_id = tbl_pembayaran.pembayaran_customers_id', 'left');
        $this->db->join('tbl_penjualan', 'tbl_penjualan.jual_nofak = tbl_pembayaran.pembayaran_jual_id', 'left');
        $this->db->where('pembayaran_bukti !=', '');
        $this->db->where('pembayaran_bukti !=', 'default.jpg');

        $query=$this->db->get();
        return $query;
    }

    public function editData()
    {
        $data=[ 'jual_status'=>htmlspecialchars($this->input->post('jual_status', true))
        ];
        $this->db->where('jual_nofak', $this->input->post('jual_nofak'));
        $this->db->update('tbl_penjualan', $data);
    }

    public function deleteData($id)
    {
        $this->_deleteImage($id);
        //return $this->db->delete($this->_table, array("pembayaran_id" => $id));

        $this->db->set('pembayaran_bukti', "");
        $this->db->where('pembayaran_id', $id);
        $this->db->update('tbl_pembayaran', $data);
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["pembayaran_id"=> $id])->row();
    }

    private function _deleteImage($id)
    {
        $pembayaran = $this->getById($id);
        if ($pembayaran->pembayaran_bukti !="default.jpg") {
            $filename=explode(".", $pembayaran->pembayaran_bukti)[0];
            return array_map('unlink', glob(FCPATH."assets/upload/bukti_pembayaran/$filename.*"));
        }
    }

    public function tampilOrder($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_penjualan');
        $this->db->join('tbl_detailpenjualan', 'tbl_penjualan.jual_nofak = tbl_detailpenjualan.detailjual_nofak');
        $this->db->join('tbl_barang', 'tbl_detailpenjualan.detailjual_barang_id = tbl_barang.barang_id');
        $this->db->where('tbl_detailpenjualan.detailjual_nofak', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function selectGambar($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_pembayaran');
        $this->db->where('pembayaran_jual_id', $id);
        $qry = $this->db->get();
        return $qry->row_array();
    }

    public function showOngkir($id)
    {
        $this->db->from('tbl_penjualan');
        $this->db->where('jual_nofak', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
}
