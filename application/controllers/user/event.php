<?php

defined('BASEPATH') or exit('No direct script access allowed');

class event extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_akomodasi');
        $this->load->model('M_tempatWisata');
        $this->load->model('M_event');
    }
    public function index()
    {
        $data['page_title'] = 'Event';
        $data['tempat_wisata'] = $this->M_tempatWisata->getData();
        $data['event'] = $this->M_event->getData();
        $this->load->view('user/event/index', $data);
    }

    public function detail($id)
    {
        $data['page_title'] = 'Detail Event';
        $data['event'] = $this->M_event->getDetail($id);
        $data['tempat_wisata_list'] = $this->M_tempatWisata->getData($id);
        $data['lokasi_wisata_list'] = $this->M_tempatWisata->getData($id);
        $this->load->view('user/event/detail', $data);
    }
    // public function search_ajax()
    // {
    //     try {
    //         $keyword = $this->input->post('table_search');
    //         if (empty($keyword)) {
    //             $data['event'] = $this->M_event->getData(); // Tampilkan semua data
    //         } else {
    //             $data['event'] = $this->M_event->searchEvents($keyword);
    //         }
    //         $this->load->view('user/event/search_event', $data);
    //     } catch (Exception $e) {
    //         error_log('Error in search_ajax: ' . $e->getMessage());
    //     }
    // }
}

/* End of file Home_ak.php */
