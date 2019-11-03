<?php
	class M_barang extends CI_Model
	{
			public function tampil_data(){
				// kalo di native : mysql_query("select *from barang")
				return $this->db->get('tbl_barang')->result();
			}

			public function rulesNew(){
		        $data = [
		            [
		                'field' => 'barang_id',
		                'label' => 'ID Barang',
		                'rules' => 'required|is_unique[tbl_barang.barang_id]'
		            ],
		            [
		                'field' => 'barang_kategori_id',
		                'label' => 'Kategori Barang',
		                'rules' => 'required'
		            ],
		            [
		                'field' => 'barang_nama',
		                'label' => 'Nama Barang',
		                'rules' => 'required'
		            ],
		            [
		                'field' => 'barang_harjul_grosir',
		                'label' => 'Harga Jual Grosir Barang',
		                'rules' => 'required'
		            ],
		            [
		                'field' => 'barang_harjul',
		                'label' => 'Harga Jual Barang',
		                'rules' => 'required'
		            ],
		            [
		                'field' => 'barang_stok',
		                'label' => 'Stok Barang',
		                'rules' => 'required'
		            ],
		            [
		                'field' => 'barang_min_stok',
		                'label' => 'Stok Minimal Barang',
		                'rules' => 'required'
		            ],
		            [
		                'field' => 'barang_tgl_input',
		                'label' => 'Tanggal Barang Input'
		            ],
		            [
		                'field' => 'barang_tgl_last_update',
		                'label' => 'Tanggal Barang Update',
		            ]
		        ];
		        $this->form_validation->set_rules($data);
		    }

			public function kode(){
		        $this->db->select('RIGHT(tbl_barang.barang_id,2) as id', false);
		        $this->db->order_by('id', 'DESC');
		        $this->db->limit(1);
		        $query = $this->db->get('tbl_barang');  //cek dulu apakah ada sudah ada kode di tabel.
		        if ($query->num_rows() <> 0) {
		            //cek kode jika telah tersedia
		            $data = $query->row();
		            $kode = intval($data->id) + 1;
		        } else {
		            $kode = 1;  //cek jika kode belum terdapat pada table
		        }
		        $tgl=date('dmY');
		        $batas = str_pad($kode, 4, "0", STR_PAD_LEFT);
		        $kodetampil = "BR".$tgl.$batas;  //format kode
		        return $kodetampil;
		    }

		    public function addNew()
		    {
		        $data = [
		            'barang_id' => htmlspecialchars($this->input->post('barang_id', true)),
		            'barang_kategori_id' => $this->input->post('barang_kategori_id', true),
		            'barang_nama' => $this->input->post('barang_nama', true),
		            'barang_harjul_grosir' => $this->input->post('barang_harjul_grosir', true),
		            'barang_harjul' => $this->input->post('barang_harjul', true),
		            'barang_image' => $this->input->post('barang_image', true),
		            'barang_stok' => $this->input->post('barang_stok', true),
		            'barang_min_stok' => $this->input->post('barang_min_stok', true),
		        ];

		        $this->db->insert('tbl_barang', $data); // query untuk insert data ke tabel barang
		    }

	}
?>