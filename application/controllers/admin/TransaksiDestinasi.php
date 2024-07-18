<?php


defined('BASEPATH') or exit('No direct script access allowed');

class TransaksiDestinasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_transaksi');
    }
    public function index()
    {
        $data['page_title'] = 'Transaksi Destinasi';
        $data['transaksi'] = $this->M_transaksi->getTransaksiDestinasi();
        $this->load->view('admin/dashboard/transaksi/pesanan_destinasi', $data);
    }
}

/* End of file Transaksi_destinasi.php */
