<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_barang', 'mabar');
        $this->load->model('M_cart', 'cart');
        $this->load->model('Anu_model', 'anu');
        $this->load->model('M_katalog', 'malog');
    }

    public function index()
    {
        $data['customers'] = $this->db->get_where('customers', ['customers_email' => $this->session->userdata('email')])->row_array();
        $data['carts'] = $this->db->get_where('tbl_cart', ['cart_id' => $this->session->userdata('cart_id')])->row_array();
        $data['kategori'] = $this->mabar->getKategori();
        $data['barang'] = $this->mabar->getBarang();
        $email_tmp = $this->session->userdata('email');
        $idu = $this->cart->idu($email_tmp);
        $idc = $this->session->userdata('cart_id');
        $data['tprice'] = $this->cart->tprice($idc);
        $data['keranjang'] = $this->cart->getcart($idc);

        if ($data['customers']) {
            $this->temp->load('partials', 'toko/cart', $data);
        } else {
            $this->session->set_flashdata('message', 'Anda Belum Login');
            redirect('/');
        }
    }

    public function add()
    {
        $data['customers'] = $this->db->get_where('customers', ['customers_email' =>
        $this->session->userdata('email')])->row_array();
        $data['carts'] = $this->db->get_where('tbl_cart', ['cart_id' => $this->session->userdata('cart_id')])->row_array();
        $data['barang_id'] = $this->db->get_where('tbl_cart_detail', ['barang_id' => $this->input->post('barang_id')])->row_array();
        $email_tmp = $this->session->userdata('id');
        $idu = $this->session->userdata('cart_id');
        $tsprice = $this->cart->tsprice($idu);
        $tssprice = $this->malog->tssprice($idu);


        if ($data['customers']) {
            // print_r( $this->session->userdata('id') .' '. $this->input->post('c_cart_id').' ' .$this->input->post('qty')+$this->malog->cartQty2().' '.$this->malog->pStock().' ' . $tssprice );

            if ($idu == $this->input->post('c_cart_id') && $this->input->post('qty') + $this->malog->cartQty2() <= $this->malog->pStock() && $tssprice >= 1) {
                $qty = $this->malog->CartQty();
                $price = $this->malog->cartPrice();
                $array = [
                    'barang_id' => $this->input->post('barang_id'),
                    'qty'     => $this->input->post('qty') + $qty,
                    'c_price'   => $this->input->post('barang_harjul') * $this->input->post('qty') + $price,
                ];
                $this->db->where('c_cart_id', $this->session->userdata('cart_id'));
                $this->db->where('barang_id', $array['barang_id']);
                $this->db->update('tbl_cart_detail', $array);
                redirect('toko/cart');
            } elseif ($idu == $this->input->post('c_cart_id') && $this->input->post('qty') + $this->malog->cartQty2() > $this->malog->pStock()) {
                $this->session->set_flashdata('message', 'Out Of Stock');

                // redirect('keranjang');
                echo "<script type='text/javascript'>history.go(-1);</script>";
            } elseif ($tssprice <= 0) {
                $array = [
                    'c_cart_id' => $this->session->userdata('cart_id'),
                    'barang_id' => $this->input->post('barang_id'),
                    'qty'     => $this->input->post('qty'),
                    'c_price'   => $this->input->post('barang_harjul') * $this->input->post('qty')
                ];
                // print_r($array);
                $this->db->insert('tbl_cart_detail', $array);
                redirect('toko/cart');
            }
        } else {
            $this->session->set_flashdata('messcart', 'You must login first');
            redirect('login');
        }
    }

    public function delcart($id)
    {
        if ($id == "all") {
            $this->db->where('c_cart_id', $this->session->userdata('cart_id'));
            $this->db->delete('tbl_cart_detail');
            redirect('toko/cart');
        } else {
            $this->db->where('c_detail_id', $id);
            $this->db->delete('tbl_cart_detail');
            redirect('toko/cart');
        }
    }

    public function updatecart()
    {
        $c_cart_id = $this->input->post('c_cart_id');
        $barang_id = $this->input->post('barang_id');
        $qty = $this->input->post('qty');
        $barang_harjul = $this->input->post('barang_harjul');

        foreach ($barang_id as $item) {
            $stoknya[] = $this->cart->pStock($item);
        }

        $no_lagi = 0;
        foreach ($barang_id as $item) {
            $barang[] = [
                'c_cart_id' => $c_cart_id,
                'barang_id' => $item,
                'qty' => $qty[$no_lagi],
                'barang_harjul' => $barang_harjul[$no_lagi]
            ];
            $no_lagi++;
        }



        $no = 0;
        $mana_outstok = [];
        foreach ($barang as $item) {
            if ($item['qty'] > $stoknya[$no]) {
                array_push($mana_outstok, $item['barang_id']);
            }
        }

        $berhasil = true;
        if (count($mana_outstok) > 0) {
            $kirim = ['code' => 2, 'id_outstok' => $mana_outstok, 'pesan' => 'gagal'];
            print_r(json_encode($kirim));
            return;
        //
        } else {
            foreach ($barang as $item) {
                $data = [
                    'c_price' => $item['qty'] * $item['barang_harjul'],
                    'qty' => $item['qty']
                ];
                $message = 'Yes';

                // $cid = implode($c_cart_id);
                $where = [
                    'c_cart_id' => $c_cart_id,
                    'barang_id' => $item['barang_id']
                ];

                $this->db->where($where);
                $this->db->update('tbl_cart_detail', $data);
            }

            $kirim = ['code' => 1, 'pesan' => 'berhasil'];
            print_r(json_encode($kirim));
        }
    }
}

/* End of file Cart.php */
