<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ShopList extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Codeigniter : Write Less Do More
    }

    public function index()
    {
        $this->temp->load('shop/partials', 'shop/index');
    }
}
