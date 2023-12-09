<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tempat_wisata extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_tempatWisata');
        $this->load->model('kategori_model');
    }


    public function index()
    {
        $data['page_title'] = 'Destinasi Wisatai';
        $data['tempat_wisata'] = $this->M_tempatWisata->getData();
        $this->load->view('user/tempat_wisata/index', $data);
    }
    public function detail($id_tempat_wisata)
    {
        $data['page_title'] = 'Detail Destinasi Wisatai';
        $data['destinasi'] = $this->M_tempatWisata->getDetail($id_tempat_wisata);
        $data['kategori'] = $this->kategori_model->getKategoriByTempatWisata($id_tempat_wisata);
        $this->load->view('user/tempat_wisata/detail', $data);
    }
    public function search_ajax()
    {
        try {
            $keyword = $this->input->post('table_search');
            if (empty($keyword) || strlen($keyword) < 3) {
                $data['tempat_wisata'] = $this->M_tempatWisata->getData(); // Tampilkan semua data
            } else {
                $data['tempat_wisata'] = $this->M_tempatWisata->searchDestinasi($keyword);
            }
            $this->load->view('user/tempat_wisata/search_wisata', $data);
        } catch (Exception $e) {
            error_log('Error in search_ajax: ' . $e->getMessage());
        }
    }
}

/* End of file Home.php */
