<?php

defined('BASEPATH') or exit('No direct script access allowed');

class kategori extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('admin_data')) {
            // Redirect ke halaman login jika tidak login
            redirect('c_authadmin/index');
        }
        $this->load->model('m_kategori');
    }

    public function index()
    {
        $data['kategori'] = $this->m_kategori->getkategori();
        $this->load->view('dashboard/kategori/dashkategori', $data);
    }

    public function tambahkategori()
    {
        $this->load->view('dashboard/kategori/tambahkategori');
    }

    public function addkategori()
    {
        $this->m_kategori->insertkategori();
        redirect('kategori');
    }
    public function ubahkategori($id)
    {
        $data['kategori'] = $this->m_kategori->detailkategori($id);
        $this->load->view('dashboard/kategori/editkategori', $data);
    }
    public function editkategori()
    {
        $this->m_kategori->editkategori();
        redirect('kategori');
    }
    public function deletekategori($id)
    {
        $this->m_kategori->deletekategori($id);
        redirect('kategori');
    }
}

/* End of file kategori.php */
