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
        $this->load->model('M_akomodasi');
        $this->load->model('M_event');
        $this->load->model('M_tempatwisata');
        $this->load->model('M_transaksi'); // Load model pemesanan
    }

    public function index()
    {
        $data['admin_data'] = $this->session->userdata('admin_data');
        $data['admin_name'] = $this->session->userdata('admin_name');

        if (!empty($data['admin_data']['akomodasi'])) {
            $data['akomodasi'] = $this->M_akomodasi->getDetail($data['admin_data']['akomodasi']);
            $data['page_title'] = 'Admin Dashboard - ' . $data['akomodasi']['nama_akomodasi'];
            $data['years'] = $this->M_transaksi->get_years_akomodasi();
            $this->load->view('admin_akomodasi/dashboard/index', $data);
        } elseif (!empty($data['admin_data']['event'])) {
            $data['event'] = $this->M_event->getDetail($data['admin_data']['event']);
            $data['page_title'] = 'Admin Dashboard - ' . $data['event']['nama_event'];
            $data['years'] = $this->M_transaksi->get_years_event();
            $this->load->view('admin_event/dashboard/index', $data);
        } elseif (!empty($data['admin_data']['tempat_wisata'])) {
            $data['tempat_wisata'] = $this->M_tempatwisata->getDetail($data['admin_data']['tempat_wisata']);
            $data['page_title'] = 'Admin Dashboard - ' . $data['tempat_wisata']['nama_tempat_wisata'];
            $data['years'] = $this->M_transaksi->get_years_destinasi();
            $this->load->view('admin_destinasi/dashboard/index', $data);
        } else {
            show_error('Tipe akun tidak dikenal atau data tidak ditemukan.');
        }
    }

    public function get_pemesanan_data_destinasi($id_destinasi, $year)
    {
        $data = $this->M_transaksi->get_monthly_pemesanan_destinasi($id_destinasi, $year);
        echo json_encode($data);
    }
    public function get_pemesanan_data_akomodasi($id_akomodasi, $year)
    {
        $data = $this->M_transaksi->get_monthly_pemesanan_akomodasi($id_akomodasi, $year);
        echo json_encode($data);
    }
    public function get_pemesanan_data_event($id_event, $year)
    {
        $data = $this->M_transaksi->get_monthly_pemesanan_event($id_event, $year);
        echo json_encode($data);
    }

    public function info()
    {
        $data['page_title'] = 'Info';
        // $this->load->view('admin_ako/templates/header', $data);
        $this->load->view('admin_akomodasi/detail/info', $data);
    }
}
