 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_cart extends CI_Model {
    
    public function getcart($idu){

        $this->db->select('*');
        
        $this->db->where('customers_id' ,$idu);
        $this->db->where('status_tmp' ,0);
    
        $this->db->from('tbl_cart');

        $this->db->join('tbl_barang', 'tbl_cart.barang_id = tbl_barang.barang_id', 'left');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get($id = null) 
    {
        $this->db->from('tbl_cart');
        if($id != null) {
            $this->db->where('cart_id', $id);
        }
        $query = $this->db->get();
        return $query->result_array();;
    }

    public function idu($email_tmp){
        $this->db->where('customers_email',$email_tmp);
		$this->db->select('customers_id');
        $c= $this->db->get('customers')->row_array();
        $string = implode($c);
            return $string;
    }
    
    public function tprice($idu){
        $this->db->select_sum('c_price');
    $this->db->where('customers_id' ,$idu);
    $this->db->where('status_tmp' ,0);
    $this->db->from('tbl_cart');
    $anu = $this->db->get()->row_array();
    $string = implode($anu);
            return $string;
    }

    public function tsprice($idu){
    
    $this->db->where('customers_id' ,$idu);
    $this->db->where('status_tmp' ,0);
    $this->db->from('tbl_cart');
    $anu = $this->db->get()->num_rows();
    return $anu;
    }
    
    public function pPrice(){
        $this->db->where('barang_id',$this->input->post('barang_id'));
		$this->db->select('barang_harjul');
        $c= $this->db->get('tbl_barang')->row_array();
        $string = implode($c);
            return $string;
    }
    
    public function pStock($temp_s){
        $this->db->where('barang_id',$temp_s);
		$this->db->select('barang_stok');
        $c= $this->db->get('tbl_barang')->row_array();
        $string = implode($c);
            return $string;
    }     

    public function anu(){
        
            $usersCount = count($_POST["idc"]);
            for($i=0;$i<$usersCount;$i++) {
            // $this->db->query( "DELETE cart  WHERE id_cart='" . $_POST["idc"][$i] . "'");
            
                $this->db->where_in('cart_id', $_POST["idc"]);
            
            $delete = $this->db->delete('tbl_cart');
            return $delete;
            }
            
            
    }

    public function getcart1($idu){        
        $this->db->where('customers_id' ,$idu);
        $this->db->where('status_tmp' ,0);
    
        $this->db->from('tbl_cart');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getid_order($idu){
        $this->db->limit(1);
        $this->db->select('jual_nofak');
        $this->db->where('jual_customers_id',$idu);
        $this->db->where('jual_status','Menunggu Pembayaran');
        $this->db->order_by('jual_nofak','DESC');
        $idorder=$this->db->get('tbl_penjualan');
    return $idorder->row_array();
    }

    public function carta($idu){
        $this->db->where('customers_id', $idu); // Select where id matches the posted id
        $query = $this->db->get('tbl_cart', 1);
        return $query->num_rows();
    }
    

}

/* End of file ModelName.php */