<?php class M_changepassword extends CI_Model
{
    //frontend
    public function rulesPassword()
    {
        $rule=[
            [ // aturan untuk
            'field'=>'current_password',
            'rules'=>'required|trim',
            'errors'=>['required'=>'Harap masukkan password yg lama!']
            ],

            [ // aturan
            'field'=>'new_password1',
            'rules'=>'required|trim|min_length[6]|matches[new_password2]|alpha_numeric|password_check[1,1,1]',
            'errors'=>[
              'required'=>'Harap masukkan password yg baru!',
              'min_length'=>'Password minimal 6 karakter!',
              'matches'=>'Password yg anda masukkan tidak sama!'],
            ],

            [ // aturan
            'field'=>'new_password2',
            'rules'=>'required|trim|matches[new_password1]',
            'errors'=>[
              'required'=>'Harap masukkan password yg baru!',
              'matches'=>'Password yg anda masukkan tidak sama!'],
            ]

        ];
        $this->form_validation->set_rules($rule);
    }
}
