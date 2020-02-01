<?php
class Changestatus extends CI_Controller {

        public function yeah()
        {
            $data = array(
                'jual_status' => 'Canceled',
            );

            // $this->db->where('jual_status', 'Waiting For Payment');
						date_default_timezone_set('Asia/Jakarta');
            $this->db->where('jual_tgl_exp <', date('Y-m-d H:i:s'));
            $this->db->update('tbl_penjualan', $data);
        }

}