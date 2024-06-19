<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('admin_data')) {

            redirect('c_authadminako/index');
        }
        // Load model yang diperlukan
        $this->load->model('M_akomodasi');
        $this->load->model('M_event');
        $this->load->model('M_tempatwisata');
    }

    public function index()
    {
        // Pastikan admin sudah login


        // Ambil data admin dari session
        $data['admin_data'] = $this->session->userdata('admin_data');
        $data['admin_name'] = $this->session->userdata('admin_name');
        // Periksa tipe akun yang sedang login dan ambil data sesuai dengan tipe tersebut
        if (!empty($data['admin_data']['akomodasi'])) {
            // Panggil model untuk mengambil data akomodasi berdasarkan ID
            $data['akomodasi'] = $this->M_akomodasi->getDetail($data['admin_data']['akomodasi']);
            $data['page_title'] = 'Admin Dashboard - Akomodasi';
            $this->load->view('admin_akomodasi/dashboard/index', $data);
        } elseif (!empty($data['admin_data']['event'])) {
            // Panggil model untuk mengambil data event berdasarkan ID
            $data['event'] = $this->M_event->getDetail($data['admin_data']['event']);
            $data['page_title'] = 'Admin Dashboard - Event';
            $this->load->view('admin_event/dashboard/index', $data);
        } elseif (!empty($data['admin_data']['tempat_wisata'])) {
            // Panggil model untuk mengambil data tempat wisata berdasarkan ID
            $data['tempat_wisata'] = $this->M_tempatwisata->getDetail($data['admin_data']['tempat_wisata']);
            $data['page_title'] = 'Admin Dashboard - Tempat Wisata';
            $this->load->view('admin_destinasi/dashboard/index', $data);
        } else {
            // Redirect atau berikan pesan kesalahan jika tipe akun tidak dikenal
            show_error('Tipe akun tidak dikenal atau data tidak ditemukan.');
        }
    }
}
