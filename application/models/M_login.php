<?php
	class M_login extends CI_Model{

      //Login Admin
      function cek_login($table,$where){        
                  return $this->db->get_where($table,$where);
            }

      //Login Member

	function cek_login_member($email,$password)
		{
			// Get data user yang mempunyai username == $username dan active == 1
      $this->db->where('customers_email', $email);
      $this->db->where('customers_status', '1');

      // Jalankan query
      $query = $this->db->get($this->table)->row();

      // Jika query gagal atau tidak menemukan username yang sesuai
      // maka return false
      if (!$query) return false;

      // Ambil data password dari database
      $hash = $query->password;

      // Jika $hash tidak sama dengan $password maka return false
      if (!password_verify($password, $hash)) return false;

      // Jika username dan password benar maka return data user
      return $query;
		}

		
	}
?>
