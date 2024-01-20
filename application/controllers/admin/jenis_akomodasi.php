<?php

defined('BASEPATH') or exit('No direct script access allowed');

class jenis_akomodasi extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('admin_data')) {
            // Redirect ke halaman login jika tidak login
            redirect('c_authadmin/index');
        }
        $this->load->model('m_jenis_akomodasi');
    }

    public function index()
    {
        $data['page_title'] = 'Jenis Akomodasi';
        $data['jenis_akomodasi'] = $this->m_jenis_akomodasi->getjenis_akomodasi();
        $this->load->view('admin/dashboard/jenis_akomodasi/dash_jenis_akomodasi', $data);
    }

    public function tambahjenis_akomodasi()

    {
        $data['page_title'] = 'Jenis Akomodasi';
        $this->load->view('admin/dashboard/jenis_akomodasi/tambah_jenis_akomodasi', $data);
    }

    public function addjenis_akomodasi()
    {
        if ($this->m_jenis_akomodasi->insertjenis_akomodasi()) {
            $this->session->set_flashdata('pesan', 'Data Jenis Akomodasi berhasil ditambahkan.');
        } else {
            // Simpan pesan flashdata jika terjadi kesalahan
            $this->session->set_flashdata('error', 'Terjadi kesalahan saat menambahkan data Jenis Akomodasi.');
        }

        redirect('admin/jenis_akomodasi');
    }
    public function ubahjenis_akomodasi($id)

    {
        $data['page_title'] = 'Jenis Akomodasi';
        $data['jenis_akomodasi'] = $this->m_jenis_akomodasi->detailjenis_akomodasi($id);
        $this->load->view('admin/dashboard/jenis_akomodasi/edit_jenis_akomodasi', $data);
    }
    public function editjenis_akomodasi()
    {


        if ($this->m_jenis_akomodasi->editjenis_akomodasi()) {
            $this->session->set_flashdata('pesan', 'Data Jenis Akomodasi berhasil diubah.');
        } else {
            // Simpan pesan flashdata jika terjadi kesalahan
            $this->session->set_flashdata('error', 'Terjadi kesalahan saat meengubah data Jenis Akomodasi.');
        }
        redirect('admin/jenis_akomodasi');
    }
    public function deletejenis_akomodasi($id)
    {
        $this->m_jenis_akomodasi->deletejenis_akomodasi($id);
        redirect('admin/jenis_akomodasi');
    }
}

/* End of file jenis_akomodasi.php */
