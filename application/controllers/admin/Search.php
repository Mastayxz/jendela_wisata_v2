<?php
// application/controllers/Search.php
defined('BASEPATH') or exit('No direct script access allowed');
class Search extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_akomodasi');
        $this->load->model('M_tempatWisata');
        $this->load->model('M_event');
        $this->load->model('m_jenis_akomodasi');
        $this->load->model('m_kategori');
    }
    public function search_tempat_wisata()
    {
        try {
            $keyword = $this->input->post('table_search');
            if (empty($keyword)) {
                $data['tempat_wisata'] = $this->M_tempatWisata->getData(); // Tampilkan semua data
            } else {
                $data['tempat_wisata'] = $this->M_tempatWisata->searchDestinasi($keyword);
            }
            $this->load->view('admin/dashboard/destinasi/tempat_wisata_ajax', $data);
        } catch (Exception $e) {
            error_log('Error in search_ajax: ' . $e->getMessage());
        }
    }
    public function search_akomodasi()
    {
        try {
            $keyword = $this->input->post('table_search');
            $price = $this->input->post('price');
            if (empty($keyword)) {
                $data['akomodasi'] = $this->M_akomodasi->getData(); // Tampilkan semua data
            } else {
                $data['akomodasi'] = $this->M_akomodasi->searchAkomodasi($keyword, $price);
            }
            $this->load->view('admin/dashboard/akomodasi/akomodasi_ajax', $data);
        } catch (Exception $e) {
            error_log('Error in search_ajax: ' . $e->getMessage());
        }
    }
    public function search_event()
    {
        try {
            $keyword = $this->input->post('table_search');;
            if (empty($keyword)) {
                $data['event'] = $this->M_event->getData(); // Tampilkan semua data
            } else {
                $data['event'] = $this->M_event->searchEvents($keyword);
            }
            $this->load->view('admin/dashboard/event/event_ajax', $data);
        } catch (Exception $e) {
            error_log('Error in search_ajax: ' . $e->getMessage());
        }
    }
    public function searchAdmin()
    {
        // $data['page_title'] = 'Admin';
        try {
            $keyword = $this->input->post('table_search');

            if (empty($keyword)) {
                $data['admin'] = $this->m_admin->getadmin(); // Tampilkan semua data
            } else {
                $data['admin'] = $this->m_admin->searchAdmin($keyword);
            }
            $this->load->view('admin/dashboard/admin/admin_ajax', $data);
        } catch (Exception $e) {
            error_log('Error in search_ajax: ' . $e->getMessage());
        }
    }
    public function searchJenis()
    {
        // $data['page_title'] = 'Admin';
        try {
            $keyword = $this->input->post('table_search');

            if (empty($keyword)) {
                $data['jenis_akomodasi'] = $this->m_jenis_akomodasi->getjenis_akomodasi();
            } else {
                $data['jenis_akomodasi'] = $this->m_jenis_akomodasi->searchJenis($keyword);
            }
            $this->load->view('admin/dashboard/jenis_akomodasi/jenis_ajax', $data);
        } catch (Exception $e) {
            error_log('Error in search_ajax: ' . $e->getMessage());
        }
    }

    public function searchkategori()
    {
        // $data['page_title'] = 'Admin';
        try {
            $keyword = $this->input->post('table_search');

            if (empty($keyword)) {
                $data['kategori'] = $this->m_kategori->getkategori();
            } else {
                $data['kategori'] = $this->m_kategori->searchKategori($keyword);
            }
            $this->load->view('admin/dashboard/kategori/kategori_ajax', $data);
        } catch (Exception $e) {
            error_log('Error in search_ajax: ' . $e->getMessage());
        }
    }
}
