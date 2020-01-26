<?php
defined('BASEPATH') or exit('No direct script access allowed');
  // NOTE: sebenarnya sudah tidak di gunakan, tapi jangan di hapus dulu
class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_cart', 'cart');
        $this->load->model('M_pembayaran', 'pembayaran');
        $this->load->model('M_barang', 'mabar');
        $this->load->model('M_penjualan', 'mojul');
    }

    public function index()
    {
        $data['customers'] = $this->db->get_where('customers', ['customers_email' => $this->session->userdata('email')])->row_array();
        $data['carts'] = $this->db->get_where('tbl_cart', ['cart_id' => $this->session->userdata('cart_id')])->row_array();
        $data['kategori'] = $this->mabar->getKategori();
        $data['barang'] = $this->mabar->getBarang();
        $cid = $this->session->userdata('cart_id');
        $idu = $this->cart->idc($cid);
        $idc = $this->cart->getcart1($idu);
        $idne = $this->input->post('idbarang');
        $yay = $this->cart->getstok1($idne);
        $c_id = $this->cart->getid_order2($idu);
        $total = $this->input->post('tprice') + $this->input->post('cost1');

        // new
        $email_tmp = $this->session->userdata('email');
        $idu2 = $this->cart->idu($email_tmp);
        $idc2 = $this->session->userdata('cart_id');
        $data['kodefaktur'] = $this->mojul->kodefaktur();
        $data['tprice'] = $this->cart->tprice($idc2);
        $data['keranjang'] = $this->cart->getcart($idc2);

        $this->pembayaran->rulesCheckout();
        if ($this->form_validation->run() == false) {
            // jika rules di langgar akan mengembalikan ke halaman checkout untuk memenuhi aturan yang sudah di buat
            $this->temp->load('toko/partials', 'toko/checkout', $data);
        } else {
            // jika rules terpenuhi akan menjalankan fungsi di bawah ini

            $data1 = [
          'jual_nofak' => $this->input->post('kodefaktur'),
          'jual_customers_id' => $this->session->userdata('id'),
          'jual_kurir' => strtoupper($this->input->post('kurir')),
          'jual_layanan' => $this->input->post('service1'),
          'jual_biaya' => $this->input->post('cost1'),
          'jual_penerima' => $this->input->post('nmkonsumen'),
          'jual_alamat' => $this->input->post('alamat').' - '.$this->input->post('nmkota').' - '.$this->input->post('nmprovinsi'),
          'jual_tlp' => $this->input->post('nohp'),
          'jual_cart_total' => $this->input->post('tprice'),
          'jual_total' => $total
      ];
            // input data ke tbl_penjualan dengan data yang sudah di tangkap di atas
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
                // memasukkan data ke tbl_detailpenjualan dengan data yang sudah di tangkap di atas
                $this->db->insert('tbl_detailpenjualan', $barang);
            }

            $insertBayar = [
        'pembayaran_customers_id' => $this->session->userdata('id'),
        'pembayaran_jual_id' => $nofak,
        'pembayaran_norek' => "9489137414"
      ];
            // echo "<pre>";
            // print_r($insertBayar);
            // die;
            // memasukkan data sementara pembayaran setelah melakukan checkout
            $this->db->insert('tbl_pembayaran', $insertBayar);

            // hapus data cart setelah klik tombol placorder
            $this->db->where('c_cart_id', $this->session->userdata('cart_id'));
            $this->db->delete('tbl_cart_detail');
            $id = $this->pembayaran->thanksP();
            redirect('thanks/bro/'.$id['jual_nofak']);
        }
    }
}
