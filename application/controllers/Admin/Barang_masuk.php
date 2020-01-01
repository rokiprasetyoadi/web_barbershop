<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_masuk extends CI_Controller {

	function __construct()
	 	{
	 		parent :: __construct();
	 		if($this->session->userdata('status') != "login"){
			redirect(base_url("admin/Login_admin"));
			}
			$this->load->model("M_barang_masuk");
            $this->load->model("M_barang");
            date_default_timezone_set('Asia/Jakarta');
	 	}

    public function index()
    {
        $data['brgmasuk']=$this->M_barang_masuk->getAllBrg()->result();
        $this->temp->load('admin/partials', 'admin/barang_masuk/barang_masuk', $data);
    }

    public function add()
    {
        $this->M_barang_masuk->rulesNew();
        if ($this->form_validation->run() == false) {
            $data = [
                'page' => 'add',
                'kode' => $this->M_barang_masuk->kode(),
                'supplier' => $this->M_barang_masuk->getSupplierData()
            ];
            $this->temp->load('admin/partials', 'admin/barang_masuk/form_barang_masuk', $data);
        } else {
            $this->M_barang_masuk->addData();
            $this->session->set_flashdata('pesan', '<div class="alert alert-outline alert-success">Data berhasil ditambahkan!<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
            redirect('admin/barang_masuk');
        }
    }

    public function editSupplier($id)
    {
        $this->M_barang_masuk->rulesEdit();
        $query = $this->M_barang_masuk->getAll($id);
        if ($this->form_validation->run() == false) {
            if ($query->num_rows() > 0) {
                $tbl_brgmasuk = $query->row();
                $data = [
                    'page' => 'edit',
                    'kode' => $this->M_barang_masuk->kode(),
                    'row' => $tbl_brgmasuk,
                    'supplier' => $this->M_barang_masuk->getSupplierData()
                ];
                $this->temp->load('admin/partials', 'admin/barang_masuk/form_barang_masuk', $data);
            }
        } else {
            $post = $this->input->post(null, true);
            if (isset($_POST['edit'])) {
                $this->M_barang_masuk->editData($post);
                $this->session->set_flashdata('pesan', '<div class="alert alert-outline alert-success">Data berhasil ditambahkan!<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
            redirect('admin/barang_masuk');
            }
        }
    }

    public function edit($id)
    {
        $this->M_barang_masuk->rulesTambah();
        if ($this->form_validation->run() == false) {
                $data = [
                    'row' => $this->M_barang_masuk->getAll($id)->row_array(),
                    'barang' => $this->M_barang->getAll()->result_array(),
                    'detail_brg' => $this->M_barang_masuk->getAll($id)->result()
                ];
                $this->temp->load('admin/partials', 'admin/barang_masuk/form_tambah_barang', $data);
            }
        }

    public function aksi_edit()
    {
        $this->M_barang_masuk->addDetail();
        $this->session->set_flashdata('pesan', '<div class="alert alert-outline alert-success">Data berhasil ditambahkan!<button type="button" class="close" data-dismiss="alert">&times;</button></div>');
        echo "<script>alert('Data Berhasil Ditambahkan');</script>";
        echo "<script>window.location.href = document.referrer;</script>";
    }

    public function delete($id=null)
    {
        $this->M_barang_masuk->deleteData($id);
        redirect('admin/barang_masuk');
   }

   public function delete_brg($id=null)
    {
        $this->M_barang_masuk->deleteBrg($id);
        echo "<script>alert('Data Berhasil Dihapus');</script>";
        echo "<script>window.location.href = document.referrer;</script>";
   }

   public function print()
    {
        $data['brgmasuk']=$this->M_barang_masuk->getAll()->result();
        $this->temp->load('admin/print/partials.html', 'admin/print/barang_masuk.html', $data);
   }

   public function printDtl($id)
    {
        $where = array('brgmasuk_nota' => $id);
        $data['dtl'] = $this->M_barang_masuk->dtl($id);
        $data['detail']=$this->M_barang_masuk->detail($where,'tbl_brgmasuk')->result();
        $this->temp->load('admin/print/partials.html', 'admin/print/barang_masuk_dtl.html', $data);
   }

}

/* End of file Controllername.php */
