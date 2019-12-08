<?php class M_pembayaran extends CI_Model {

	private $_table="tbl_pembayaran";
	public $pembayaran_bukti = "default.jpg";
	public $pembayaran_id;
	
	public function getAll() {
		return $this->db->get('tbl_pembayaran')->result_array();
	}

	public function deleteData($id) {
		$this->_deleteImage($id);
		return $this->db->delete($this->_table, array("pembayaran_id" => $id));
	}

	public function getById($id) {
		return $this->db->get_where($this->_table, ["pembayaran_id"=> $id])->row();
	}

	private function _deleteImage($id) {
		$pembayaran = $this->getById($id);
		if ($pembayaran->pembayaran_bukti !="default.jpg") {
			$filename=explode(".", $pembayaran->pembayaran_bukti)[0];
			return array_map('unlink', glob(FCPATH."assets/upload/bukti_pembayaran/$filename.*"));
		}
	}

	}
?>