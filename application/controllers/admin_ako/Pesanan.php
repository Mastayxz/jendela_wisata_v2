<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pesanan');
        if (!$this->session->userdata('admin_data')) {

            redirect('c_authadminako/index');
        }
    }

    public function index()
    {
        $admin_data = $this->session->userdata('admin_data');
        $data['page_title'] = 'Pesanan';

        if ($admin_data['akomodasi'] !== null) {
            $data['pesanan'] = $this->M_pesanan->get_pesanan_akomodasi($admin_data['akomodasi']);
        } elseif ($admin_data['event'] !== null) {
            $data['pesanan'] = $this->M_pesanan->get_pesanan_event($admin_data['event']);
        } elseif ($admin_data['tempat_wisata'] !== null) {
            $data['pesanan'] = $this->M_pesanan->getDetailPesananDestinasi($admin_data['tempat_wisata']);
        } else {
            $data['pesanan'] = [];
        }

        $data['admin_data'] = $this->session->userdata('admin_data');

        $this->load->view('admin_destinasi/pesanan/index', $data);
    }
}
