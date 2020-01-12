<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_barang', 'mabar');
        $this->load->model('M_cart', 'cart');
        $this->load->model('Anu_model', 'anu');
        $this->load->model('M_katalog', 'malog');
    }


    public function lokasi()
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
        $this->temp->load('partials', 'toko/checkout', $data);
    }

    public function _api_ongkir_post($origin, $des, $qty, $cour)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "origin=".$origin."&destination=".$des."&weight=".$qty."&courier=".$cour,
      CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded",
        /* masukan api key disini*/
        "key: 33543268d9ae1fd4bc43361801d896a3"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return $err;
        } else {
            return $response;
        }
    }





    public function _api_ongkir($data)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
          //CURLOPT_URL => "https://api.rajaongkir.com/starter/province?id=12",
          //CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
          CURLOPT_URL => "http://api.rajaongkir.com/starter/".$data,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            /* masukan api key disini*/
            "key: 33543268d9ae1fd4bc43361801d896a3"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return  $err;
        } else {
            return $response;
        }
    }


    public function provinsi()
    {
        $provinsi = $this->_api_ongkir('province');
        $data = json_decode($provinsi, true);
        echo json_encode($data['rajaongkir']['results']);
    }

    public function kota($provinsi="")
    {
        if (!empty($provinsi)) {
            if (is_numeric($provinsi)) {
                $kota = $this->_api_ongkir('city?province='.$provinsi);
                $data = json_decode($kota, true);
                echo json_encode($data['rajaongkir']['results']);
            } else {
                show_404();
            }
        } else {
            show_404();
        }
    }

    public function tarif($origin, $des, $qty, $cour)
    {
        $berat = $qty*1000;
        $tarif = $this->_api_ongkir_post($origin, $des, $berat, $cour);
        $data = json_decode($tarif, true);
        echo json_encode($data['rajaongkir']['results']);
    }
}

/* End of file Chekout.php */
