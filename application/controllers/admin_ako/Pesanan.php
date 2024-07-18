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
            $data['pesanan'] = $this->M_pesanan->getDetailPesananAkomodasi($admin_data['akomodasi']);
            $data['admin_data'] = $this->session->userdata('admin_data');
            $this->load->view('admin_akomodasi/pesanan/index', $data);
        } elseif ($admin_data['event'] !== null) {
            $data['pesanan'] = $this->M_pesanan->getDetailPesananEvent($admin_data['event']);
            $data['admin_data'] = $this->session->userdata('admin_data');
            $this->load->view('admin_destinasi/pesanan/index', $data);
        } elseif ($admin_data['tempat_wisata'] !== null) {
            $data['pesanan'] = $this->M_pesanan->getDetailPesananDestinasi($admin_data['tempat_wisata']);
            $data['admin_data'] = $this->session->userdata('admin_data');
            $this->load->view('admin_destinasi/pesanan/index', $data);
        } else {
            $data['pesanan'] = [];
        }
    }

    public function search()
    {
        $admin_data = $this->session->userdata('admin_data');
        $data['page_title'] = 'Cari Pesanan';

        $keyword = $this->input->post('keyword');
        if ($admin_data['akomodasi'] !== null) {
            $data['pesanan'] = $this->M_pesanan->search_pesanan_akomodasi($admin_data['akomodasi'], $keyword);
        } elseif ($admin_data['event'] !== null) {
            $data['pesanan'] = $this->M_pesanan->search_pesanan_event($admin_data['event'], $keyword);
        } elseif ($admin_data['tempat_wisata'] !== null) {
            $data['pesanan'] = $this->M_pesanan->search_pesanan_destinasi($admin_data['tempat_wisata'], $keyword);
            $data['admin_data'] = $this->session->userdata('admin_data');
            $this->load->view('admin_destinasi/pesanan/index', $data);
        } else {
            $data['pesanan'] = [];
        }
    }

    public function delete_pesanan_destinasi($id_pemesanan)
    {
        $this->M_pesanan->delete_pesanan_destinasi($id_pemesanan);
        redirect('admin_ako/pesanan');
    }
    public function delete_pesanan_akomodasi($id_pemesanan)
    {
        $this->M_pesanan->delete_pesanan_akomodasi($id_pemesanan);
        redirect('admin_ako/pesanan');
    }
    public function delete_pesanan_event($id_pemesanan)
    {
        $this->M_pesanan->delete_pesanan_event($id_pemesanan);
        redirect('admin_ako/pesanan');
    }


    public function edit($id_pemesanan)
    {
        $admin_data = $this->session->userdata('admin_data');
        $data = null;

        if ($admin_data['akomodasi'] !== null) {
            $data = $this->M_pesanan->getDetailPesananAkomodasiById($id_pemesanan);
        } elseif ($admin_data['event'] !== null) {
            $data = $this->M_pesanan->getDetailPesananEventById($id_pemesanan);
        } elseif ($admin_data['tempat_wisata'] !== null) {
            $data = $this->M_pesanan->getDetailPesananDestinasiById($id_pemesanan);
        }

        echo json_encode($data);
    }

    public function update()
    {
        $admin_data = $this->session->userdata('admin_data');
        $id_pemesanan = $this->input->post('id_pemesanan');
        $status = $this->input->post('status');

        if ($admin_data['akomodasi'] !== null) {
            $this->M_pesanan->updateStatusPesananAkomodasi($id_pemesanan, $status);
        } elseif ($admin_data['event'] !== null) {
            $this->M_pesanan->updateStatusPesananEvent($id_pemesanan, $status);
        } elseif ($admin_data['tempat_wisata'] !== null) {
            $this->M_pesanan->updateStatusPesananDestinasi($id_pemesanan, $status);
        }

        redirect('admin_ako/pesanan');
    }
}
