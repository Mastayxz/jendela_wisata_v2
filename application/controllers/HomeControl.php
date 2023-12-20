<?php

defined('BASEPATH') or exit('No direct script access allowed');

class HomeControl extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_tempatWisata');
        $this->load->model('kategori_model');
    }


    public function index()
    {
        $data['page_title'] = 'jendela wisata';
        $data['tempat_wisata'] = $this->M_tempatWisata->getData();
        $this->load->view('user/home', $data);
    }
}


 
 /* End of file HomeControl.php */
