<?php

defined('BASEPATH') or exit('No direct script access allowed');

class akomodasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_akomodasi');
        $this->load->model('M_tempatWisata');
        $this->load->model('M_kamar_akomodasi');
        $this->load->model('M_event');
    }


    public function index()
    {
        $data['page_title'] = 'Akomodasi';
        $data['tempat_wisata'] = $this->M_tempatWisata->getData();
        $data['akomodasi'] = $this->M_akomodasi->getData();
        $data['jenis_akomodasi_list'] = $this->M_akomodasi->getJenisAkomodasi();

        $this->load->view('user/akomodasi/index', $data);
    }

    public function detail($id)
    {
        $data['id_akomodasi'] = $id;
        $data['page_title'] = 'Detail Akomodasi';
        $data['jenis_akomodasi_list'] = $this->M_akomodasi->getJenisAkomodasi($id);
        $data['tempat_wisata_list'] = $this->M_tempatWisata->getData($id);
        $data['akomodasi'] = $this->M_akomodasi->getDetail($id);
        $data['kamar'] = $this->M_kamar_akomodasi->getKamarByAkomodasi($id);
        $data['dkamar'] = $this->M_kamar_akomodasi->get_all_kamar($id);

        $this->load->view('user/akomodasi/detail', $data);
    }
}
