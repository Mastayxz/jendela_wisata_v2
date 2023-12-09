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
        $data['page_title'] = 'Kategori Wisata';
        $data['kategori'] = $this->m_kategori->getkategori();
        $this->load->view('admin/dashboard/kategori/dashkategori', $data);
    }

    public function tambahkategori()
    {
        $data['page_title'] = 'Kategori Wisata';
        $this->load->view('admin/aktivitas/kategori/tambahkategori', $data);
    }

    public function addkategori()
    {
        $this->m_kategori->insertkategori();
        redirect('admin/kategori');
    }
    public function ubahkategori($id)
    {
        $data['page_title'] = 'Kategori Wisata';
        $data['kategori'] = $this->m_kategori->detailkategori($id);
        $this->load->view('admin/aktivitas/kategori/editkategori', $data);
    }
    public function editkategori()
    {
        $this->m_kategori->editkategori();
        redirect('admin/kategori');
    }
    public function deletekategori($id)
    {
        $this->m_kategori->deletekategori($id);
        redirect('admin/kategori');
    }
}

/* End of file kategori.php */
