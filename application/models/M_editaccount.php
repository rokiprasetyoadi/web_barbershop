<?php class M_editaccount extends CI_Model
{
    //frontend

    public function rulesProfile()
    {
        $rule=[
            [ // aturan untuk nama
            'field'=>'nama',
            'label'=>'Nama',
            'rules'=>'trim'
            ],

            [ // aturan untuk
            'field'=>'alamat',
            'label'=>'Alamat',
            'rules'=>'',
            ],

            [ // aturan untuk
            'field'=>'kota',
            'label'=>'Kota',
            'rules'=>'',
            ],

            [ // aturan untuk
            'field'=>'provinsi',
            'label'=>'Provinsi',
            'rules'=>'',
            ],

            [ // aturan untuk
            'field'=>'negara',
            'label'=>'Negara',
            'rules'=>'',
            ],

            [ // aturan
            'field'=>'kodepos',
            'label'=>'Kode Pos',
            'rules'=>'trim|numeric|min_length[5]|max_length[5]',
            'errors'=>['numeric'=>'Kodepos hanya terdiri dari angka saja!']],

            [ // aturan
            'field'=>'nohp',
            'label'=>'No. Hp',
            'rules'=>'trim|numeric',
            'errors'=>['numeric'=>'No. Hp hanya dapat diisi dengan angka!']],

        ];
        $this->form_validation->set_rules($rule);
    }
}
