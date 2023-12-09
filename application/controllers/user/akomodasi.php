<?php

defined('BASEPATH') or exit('No direct script access allowed');

class akomodasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_akomodasi');
        $this->load->model('M_tempatWisata');
    }
    public function index()
    {
        $data['page_title'] = 'Akomodasi';
        $data['tempat_wisata'] = $this->M_tempatWisata->getData();
        $data['akomodasi'] = $this->M_akomodasi->getData();
        $this->load->view('user/akomodasi/index', $data);
    }
    public function detail($id)
    {
        $data['jenis_akomodasi_list'] = $this->M_akomodasi->getJenisAkomodasi($id);
        $data['tempat_wisata_list'] = $this->M_tempatWisata->getData($id);
        $data['akomodasi'] = $this->M_akomodasi->getDetail($id);
        $this->load->view('user/akomodasi/detail', $data);
    }
}

/* End of file Home_ak.php */
