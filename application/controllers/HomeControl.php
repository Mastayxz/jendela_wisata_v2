<?php

defined('BASEPATH') or exit('No direct script access allowed');

class HomeControl extends CI_Controller
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

    public function filter()
    {
        $kategori = $this->input->post('kategori');
        $harga = $this->input->post('harga');
        $lokasi = $this->input->post('lokasi');
        $data['destinasi'] = $this->M_wisata->get_destinasi_by_filter($kategori, $harga, $lokasi);
        $this->load->view('home/hasil_filter_view', $data);
    }
}


 
 /* End of file HomeControl.php */
