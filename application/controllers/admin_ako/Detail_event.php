<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Detail_event extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('M_event');
    }

    public function index($id)
    {
        // Panggil model untuk mengambil data event berdasarkan ID
        $data['event'] = $this->M_event->getDetail($id);

        // Set judul halaman
        $data['page_title'] = 'Detail Event';
        $data['admin_data'] = $this->session->userdata('admin_data');
        // Load view halaman detail dengan data event
        $this->load->view('admin_event/detail/index', $data);
    }
}


/* End of file Detail.php */
