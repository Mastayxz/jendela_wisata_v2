<?php

defined('BASEPATH') or exit('No direct script access allowed');

class HomeControl extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_tempatWisata');
        $this->load->model('kategori_model');
        $this->load->model('Review_model');
    }


    public function index()
    {
        $data['page_title'] = 'jendela wisata';
        $data['tempat_wisata'] = $this->M_tempatWisata->getData();
        $data['reviews'] = $this->Review_model->get_reviews();
        $this->load->view('user/home', $data);
    }
}


 
 /* End of file HomeControl.php */
