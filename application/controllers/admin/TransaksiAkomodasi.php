<?php

defined('BASEPATH') or exit('No direct script access allowed');

class TransaksiAkomodasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_transaksi');
    }
    public function index()
    {
        $data['page_title'] = 'Transaksi Akomodasi';
        $data['transaksi'] = $this->M_transaksi->getTransaksiAkomodasi();
        $this->load->view('admin/dashboard/transaksi/pesanan_akomodasi', $data);
    }
}

/* End of file TransaksiAkomodasi.php */
