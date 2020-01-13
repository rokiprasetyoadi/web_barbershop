<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_cart', 'cart');
    }

    public function index()
    {
        $data['customers'] = $this->db->get_where('customers', ['customers_email' => $this->session->userdata('email')])->row_array();
        $data['carts'] = $this->db->get_where('tbl_cart_detail', ['c_cart_id' => $this->session->userdata('cart_id')])->row_array();
        $cid = $this->session->userdata('cart_id');
        $idu = $this->cart->idc($cid);
        $idc = $this->cart->getcart1($idu);
        $idne = $this->input->post('idbarang');
        $yay = $this->cart->getstok1($idne);
        $c_id = $this->cart->getid_order2($idu);
        $total = $this->input->post('tprice') + $this->input->post('cost1');

        $data1 = [
            'jual_nofak' => $this->input->post('kodefaktur'),
            'jual_customers_id' => $this->session->userdata('id'),
            'jual_kurir' => $this->input->post('kurir'),
            'jual_layanan' => $this->input->post('service1'),
            'jual_biaya' => $this->input->post('cost1'),
            'jual_penerima' => $this->input->post('penerima'),
            'jual_alamat' => $this->input->post('jalan').'-'.$this->input->post('kecamatan').'-'.$this->input->post('kabupaten').'-'.$this->input->post('provinsi'),
            'jual_kodepos' => $this->input->post('kodepos'),
            'jual_tlp' => $this->input->post('nohp'),
            'jual_cart_total' => $this->input->post('tprice'),
            'jual_total' => $total
        ];

        $this->db->insert('tbl_penjualan', $data1);

        $barang_id = $this->input->post('idbarang');
        $kuantiti = $this->input->post('kuantitas');
        $subtotal = $this->input->post('cprice');
        $c_cart_id = $this->input->post('c_cart_id');
        $barang_harjul = $this->input->post('harjul');
        $nofak = $this->input->post('kodefaktur');

        $no=0;
        foreach ($idc as $item) {
            $barang = [
              'detailjual_nofak' => $nofak,
              'detailjual_barang_id' => $item['barang_id'],
              'detailjual_subtotal' => $item['c_price'],
              'detailjual_qty' => $item['qty'],
              'detailjual_diskon' => 0,
            ];
            $no++;
            // var_dump($barang);
            $this->db->insert('tbl_detailpenjualan', $barang);
        }

        $insertBayar = [
          'pembayaran_customers_id' => $this->session->userdata('id'),
          'pembayaran_jual_id' => $nofak,
          'pembayaran_norek' => $this->input->post('bank')
        ];
        // echo "<pre>";
        // print_r($insertBayar);
        // die;
        $this->db->insert('tbl_pembayaran', $insertBayar);

        // delete cart
        $this->db->where('c_cart_id', $this->session->userdata('cart_id'));
        $this->db->delete('tbl_cart_detail');
        redirect('account/order');
    }
}
