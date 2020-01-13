<?php

class M_myaccount extends CI_Model{
		function tampil_data(){
				return $this->db->get('customers');
		}

		
}
