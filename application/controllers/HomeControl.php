<?php

defined('BASEPATH') or exit('No direct script access allowed');

class HomeControl extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_home');
        $this->load->model('M_wisata');
    }


    public function index()
    {
        // $data['kategori'] = $this->M_home->get_all_kategori();
        // $data['lokasi'] = $this->M_home->get_all_lokasi();
        $this->load->view('home/index');
    }

    public function filter()
    {
        $kategori = $this->input->post('kategori');
        $harga = $this->input->post('harga');
        $lokasi = $this->input->post('lokasi');
        $data['destinasi'] = $this->M_wisata->get_destinasi_by_filter($kategori, $harga, $lokasi);
        $this->load->view('home/hasil_filter_view', $data);
    }
}


 
 /* End of file HomeControl.php */
