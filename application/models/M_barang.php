<?php
	class M_barang extends CI_Model
	{
			function tampil_data(){
				// kalo di native : mysql_query("select *from barang")
				return $this->db->get('tbl_barang')->result();
			}

	}
?>