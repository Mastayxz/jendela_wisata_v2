<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_akomodasi');
        $this->load->model('M_tempatWisata');
        $this->load->model('M_tempatWisata');
        $this->load->model('kategori_model');
        $this->load->model('M_event');
        $this->load->model('m_pesanan');
    }
    public function index($id)
    {
        if ($this->is_akomodasi($id)) {
            $data['akomodasi'] = $this->M_akomodasi->getDetail($id);
            $this->load->view('user/pemesanan/index', $data);
        } else {
            $data['event'] = $this->M_event->getDetail($id);
            $this->load->view('user/pemesanan/index', $data);
        }
    }
    private function is_akomodasi($id)
    {
        // Query ke database untuk mendapatkan jenis layanan berdasarkan ID event
        $result = $this->db->get_where('akomodasi', ['id_akomodasi' => $id])->row();
        return $result;
    }
}

/* End of file Pemesanan.php */
