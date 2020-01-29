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

    public function rulesCheckout()
    {
        $data =
        [
          [
            'field' => 'nmkonsumen',
            'label' => 'Konsumen',
            'rules' => 'required|trim'
          ],
          [
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email'
          ],
          [
            'field' => 'idprovinsi',
            'label' => 'Provinsi',
            'rules' => 'required'
          ],
          [
            'field' => 'idkota',
            'label' => 'Kabupaten',
            'rules' => 'required'
          ],
          [
            'field' => 'nohp',
            'label' => 'Nohp',
            'rules' => 'required|numeric|max_length[12]'
          ],
          [
            'field' => 'kurir',
            'label' => 'Kurir',
            'rules' => 'required'
          ],
          [
            'field' => 'alamat',
            'label' => 'Alamat',
            'rules' => 'required|trim'
          ],
          [
            'field' => 'service',
            'label' => 'Service',
            'rules' => 'required'
          ]

        ];
        $this->form_validation->set_rules($data);
    }

    public function getAllData($id=null)
    {
        $this->db->from('tbl_pembayaran');
        $this->db->join('customers', 'customers.customers_id = tbl_pembayaran.pembayaran_customers_id', 'left');
        $this->db->join('tbl_penjualan', 'tbl_penjualan.jual_nofak = tbl_pembayaran.pembayaran_jual_id', 'left');
        if ($id != null) {
            $this->db->where('pembayaran_id', $id);
        }

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
        if ($pembayaran->pembayaran_bukti != "default.jpg") {
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

    public function Qbatal($faktur)
    {
        $this->db->set('jual_status', "Canceled");
        $this->db->set('jual_tgl_exp', date('Y-m-d h:i:sa'));
        $this->db->where('jual_nofak', $faktur);
        $this->db->update('tbl_penjualan');
    }

    public function expTglJual()
    {
        // cek order yang lebih dari tgl order
        $lama = 1;
        $this->db->where('DATEDIFF(CURDATE(), jual_tgl) >=', $lama);
        $this->db->where('jual_status', "Waiting for Payment");
        return $this->db->get('tbl_penjualan')->result_array();
    }
    public function expTglCancel()
    {
        // cek order yang lebih dari tgl reject
        $lama = 1;
        $this->db->select('*');
        $this->db->from('tbl_penjualan');
        $this->db->join('tbl_pembayaran', 'tbl_penjualan.jual_nofak = tbl_pembayaran.pembayaran_jual_id');
        $this->db->where('DATEDIFF(CURDATE(), tbl_penjualan.jual_tgl_exp) >=', $lama);
        $this->db->where('tbl_penjualan.jual_status', "Canceled");
        return $this->db->get()->result_array();
    }
    public function expTglReject()
    {
        // cek order yang lebih dari tgl reject
        $lama = 1;
        $this->db->where('DATEDIFF(CURDATE(), jual_tgl_exp) >=', $lama);
        $this->db->where('jual_status', "Rejected");
        return $this->db->get('tbl_penjualan')->result_array();
    }
    public function Qperpanjang($faktur)
    {
        $this->db->set('jual_status', "Waiting for Payment");
        $this->db->set('jual_tgl', date('Y-m-d h:i:sa'));
        $this->db->set('jual_tgl_exp', null);
        $this->db->where('jual_nofak', $faktur);
        $this->db->update('tbl_penjualan');
    }
}
