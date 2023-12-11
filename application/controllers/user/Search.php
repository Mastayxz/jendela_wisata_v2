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
            $this->load->view('user/tempat_wisata/search_wisata', $data);
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
            $this->load->view('user/akomodasi/search_akomodasi', $data);
        } catch (Exception $e) {
            error_log('Error in search_ajax: ' . $e->getMessage());
        }
    }
    public function search_event()
    {
        try {
            $keyword = $this->input->post('table_search');
            if (empty($keyword)) {
                $data['event'] = $this->M_event->getData(); // Tampilkan semua data
            } else {
                $data['event'] = $this->M_event->searchEvents($keyword);
            }
            $this->load->view('user/event/search_event', $data);
        } catch (Exception $e) {
            error_log('Error in search_ajax: ' . $e->getMessage());
        }
    }
}
