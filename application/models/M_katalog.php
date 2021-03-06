<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_katalog extends CI_Model
{
    public function getProdbyId($id)
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('kategori', 'tbl_barang.barang_kategori_id = kategori.kategori_id', 'left');
        $this->db->order_by('barang_id', 'asc');
        $this->db->where('barang_id', $id);

        $query = $this->db->get();
        return $query->result_array();
    }


    public function find($barang_id)
    {
        $query = $this->db->get_where('barang', array('barang_id' => $barang_id));
        return $query->result();
    }

    public function validate_add_cart_item()
    {
        $id = $this->input->post('barang_id'); // Assign posted product_id to $id
        $qty = $this->input->post('qty'); // Assign posted quantity to $cty

        $this->db->where('barang_id', $id); // Select where id matches the posted id
        $query = $this->db->get('tbl_barang', 1); // Select the products where a match is found and limit the query by 1

        // Check if a row has matched our product id
        if ($query->num_rows > 0) {

            // We have a match!
            foreach ($query->result() as $row) {
                // Create an array with product information
                $data = array(
                    'id'      => $id,
                    'qty'     => $qty,
                    'price'   => $row->price_total,
                    'name'    => $row->name_products
                );

                // Add the data to the cart using the insert function that is available because we loaded the cart library
                $this->cart->insert($data);

                return true; // Finally return TRUE
            }
        } else {
            // Nothing found! Return FALSE!
            return false;
        }
    }
    public function cartPrice()
    {
        $this->db->where('barang_id', $this->input->post('barang_id'));
        $this->db->where('c_cart_id', $this->input->post('c_cart_id'));
        $this->db->select('c_price');
        $c = $this->db->get('tbl_cart_detail')->row_array();
        $string = implode($c);
        return $string;
    }
    public function pStock()
    {
        $this->db->where('barang_id', $this->input->post('barang_id'));
        $this->db->select('barang_stok');
        $c = $this->db->get('tbl_barang')->row_array();
        $string = implode($c);
        return $string;
    }
    public function cartIduser()
    {
        $this->db->where('barang_id', $this->input->post('barang_id'));
        $this->db->where('c_cart_id', $this->input->post('c_cart_id'));
        $c = $this->db->get('tbl_cart_detail')->row_array();
        $string = implode($c);
        return $string;
    }
    public function cartQty()
    {
        $this->db->where('barang_id', $this->input->post('barang_id'));
        $this->db->where('c_cart_id', $this->input->post('c_cart_id'));
        $this->db->select('qty');
        $c = $this->db->get('tbl_cart_detail')->row_array();
        $string = implode($c);
        return $string;
    }
    public function cartQty2()
    {
        $this->db->where('barang_id', $this->input->post('barang_id'));
        $this->db->where('c_cart_id', $this->input->post('c_cart_id'));
        $this->db->select('qty');
        $c = $this->db->get('tbl_cart_detail')->row_array();
        return $c;
    }
    public function cartIdproduct()
    {
        $this->db->where('barang_id', $this->input->post('barang_id'));
        $this->db->where('c_cart_id', $this->input->post('c_cart_id'));
        $this->db->select('barang_id');
        $c = $this->db->get('tbl_cart_detail')->row_array();
        $string = implode($c);
        return $string;
    }
    public function tssprice($idu)
    {
        $this->db->where('c_cart_id', $idu);
        $this->db->where('barang_id', $this->input->post('barang_id'));
        $this->db->from('tbl_cart_detail');

        $anu = $this->db->get()->num_rows();
        return $anu;
    }
    // tes pagination
    public function getpage($limit, $start, $keyword = null)
    {
        if ($keyword) { // jika ada keyword maka di lakukan query like
            $this->db->select('*');
            $this->db->from('tbl_barang');
            $this->db->join('kategori', 'tbl_barang.barang_kategori_id = kategori.kategori_id', 'left');
            $this->db->order_by('barang_id', 'asc');
            $this->db->like('barang_nama', $keyword);
            $this->db->limit($limit, $start);
        } else { // jika keyword tidak ada
            $this->db->select('*');
            $this->db->from('tbl_barang');
            $this->db->join('kategori', 'tbl_barang.barang_kategori_id = kategori.kategori_id', 'left');
            $this->db->order_by('barang_id', 'asc');
            $this->db->limit($limit, $start);
        }

        $query = $this->db->get();
        return $query->result_array();
    }
    public function getPbyIdcat($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_barang');
        $this->db->join('kategori', 'tbl_barang.barang_kategori_id = kategori.kategori_id', 'left');
        $this->db->order_by('barang_id', 'asc');
        $this->db->where('tbl_barang.barang_kategori_id', $id);

        $query = $this->db->get();
        return $query->result_array();
    }
}

/* End of file Home_model.php */
/* Location: ./application/models/Home_model.php */
