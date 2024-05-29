<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Detail_destinasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_tempatwisata');
    }

    public function index($id)
    {
        // Panggil model untuk mengambil data event berdasarkan ID
        $data['tempat_wisata'] = $this->M_tempatwisata->getDetail($id);

        // Set judul halaman
        $data['page_title'] = 'Detail Tempat Wisata';
        $data['admin_data'] = $this->session->userdata('admin_data');
        // Load view halaman detail dengan data event
        $this->load->view('admin_destinasi/detail/index', $data);
    }
}


/* End of file Detail.php */
