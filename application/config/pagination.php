<?php
//konfigurasi pagination
$config['base_url'] = base_url('toko/katalog/index');
$config['num_links'] = 2;

// costumize link pagination with BootStrap
$config['full_tag_open'] = '<div class="col-xs-12 col-sm-12 col-md-12 clearfix mt-40 text--center"><ul class="pagination">';
$config['full_tag_close'] = '</ul></div>';
// costumize next link html
$config['next_link'] = '&raquo';
$config['next_tag_open'] = '<li>';
$config['next_tagl_close'] = '</li>';
// costumize prev link html
$config['prev_link'] = '&laquo';
$config['prev_tag_open'] = '<li>';
$config['prev_tag_close'] = '</li>';
// costumize current active link
$config['cur_tag_open'] = '<li class="active"><a href="#">';
$config['cur_tag_close'] = '</a></li>';
// costumize digit link
$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';
