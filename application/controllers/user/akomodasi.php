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
    public function filterByJenisAkomodasi()
    {
        // Mendapatkan data kategori dari form
        $id_jenis_akomodasi = $this->input->post('filter_jenis');

        if ($id_jenis_akomodasi == 'semua') {
            $filtered_data = $this->M_akomodasi->getData();
        } else {
            $filtered_data = $this->M_akomodasi->filterByJenisAkomodasi($id_jenis_akomodasi);
        }
        // Memanggil model untuk melakukan filter berdasarkan kategori

        // Mendapatkan daftar kategori untuk ditampilkan di form filter
        $data['jenis_akomodasi_list'] = $this->M_akomodasi->getJenisAkomodasi();

        // Data yang akan dikirimkan ke view
        $data['akomodasi'] = $filtered_data;

        // Load the view to display the filtered data and category list
        $this->load->view('user/akomodasi/search_akomodasi', $data);
    }
}

/* End of file Home_ak.php */
