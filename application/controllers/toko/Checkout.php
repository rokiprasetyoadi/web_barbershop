<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout extends CI_Controller
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
        $this->temp->load('partials', 'toko/checkout', $data);
    }

    public function provinsi()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
          "key: 33543268d9ae1fd4bc43361801d896a3"
        ),
      ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $option = array();

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            // echo json_encode($response
            $data = json_decode($response, true);
            for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
                array_push(
                    $option,
                    array(
                  'id_province' => $data['rajaongkir']['results'][$i]['province_id'],
                  'province' => $data['rajaongkir']['results'][$i]['province'])
                );
            }
            echo json_encode($option);
        }
    }

    public function lokasi()
    {
        $this->temp->load('partials', 'toko/checkout');
    }

    public function kota($provinsi="")
    {
        if (!empty($provinsi)) {
            if (is_numeric($provinsi)) {
                $curl = curl_init();

                curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=$provinsi",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                  "key: your-api-key"
                ),
              ));

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                if ($err) {
                    echo "cURL Error #:" . $err;
                } else {
                    echo $response;
                }
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
