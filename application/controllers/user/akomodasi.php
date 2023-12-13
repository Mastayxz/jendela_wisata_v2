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
        $data['jenis_akomodasi_list'] = $this->M_akomodasi->getJenisAkomodasi();

        $this->load->view('user/akomodasi/index', $data);
    }
    public function detail($id)
    {
        $data['jenis_akomodasi_list'] = $this->M_akomodasi->getJenisAkomodasi($id);
        $data['tempat_wisata_list'] = $this->M_tempatWisata->getData($id);
        $data['akomodasi'] = $this->M_akomodasi->getDetail($id);
        $this->load->view('user/akomodasi/detail', $data);
    }
    // public function search_ajax()
    // {
    //     try {
    //         $keyword = $this->input->post('table_search');
    //         if (empty($keyword)) {
    //             $data['akomodasi'] = $this->M_akomodasi->getData(); // Tampilkan semua data
    //         } else {
    //             $data['akomodasi'] = $this->M_akomodasi->searchAkomodasi($keyword);
    //         }
    //         $this->load->view('user/akomodasi/search_akomodasi', $data);
    //     } catch (Exception $e) {
    //         error_log('Error in search_ajax: ' . $e->getMessage());
    //     }
    // }
   
}

/* End of file Home_ak.php */
