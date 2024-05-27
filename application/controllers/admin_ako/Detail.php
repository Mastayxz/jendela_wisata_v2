<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Detail extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_akomodasi');
    }

    public function index($id)
    {
        // Panggil model untuk mengambil data akomodasi berdasarkan ID
        $data['akomodasi'] = $this->M_akomodasi->getDetail($id);

        // Set judul halaman
        $data['page_title'] = 'Detail Akomodasi';
        $data['admin_data'] = $this->session->userdata('admin_data');
        // Load view halaman detail dengan data akomodasi
        $this->load->view('admin_akomodasi/detail/index', $data);
    }
}


/* End of file Detail.php */
