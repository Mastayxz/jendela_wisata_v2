<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load model yang diperlukan
        $this->load->model('M_akomodasi');
    }

    public function index()
    {
        // Pastikan admin sudah login
        if (!$this->session->userdata('admin_data')) {
            redirect('c_authadminako/index');
        }

        // Ambil data admin dari session
        $data['admin_data'] = $this->session->userdata('admin_data');

        // Periksa apakah akomodasi yang sedang login
        if ($data['admin_data'] !== null) {
            // Panggil model untuk mengambil data akomodasi berdasarkan ID
            $data['akomodasi'] = $this->M_akomodasi->getDetail($data['admin_data']['akomodasi']);

            // Set judul halaman
            $data['page_title'] = 'Admin Dashboard';

            // Load view halaman dashboard dengan data akomodasi

            $this->load->view('admin_akomodasi/dashboard/index', $data);
        } else {
            // Akomodasi tidak ditemukan
            // Redirect atau berikan pesan kesalahan
        }
    }
}
