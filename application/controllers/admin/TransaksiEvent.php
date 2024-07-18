<?php

defined('BASEPATH') or exit('No direct script access allowed');

class TransaksiEvent extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_transaksi');
    }

    public function index()
    {
        $data['page_title'] = 'Transaksi Event';
        $data['transaksi'] = $this->M_transaksi->getTransaksiEvent();
        $this->load->view('admin/dashboard/transaksi/pesanan_event', $data);
    }
}

/* End of file transaksi.php */
