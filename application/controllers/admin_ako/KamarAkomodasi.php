<?php

defined('BASEPATH') or exit('No direct script access allowed');

class KamarAkomodasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kamar_akomodasi');
    }

    public function index($id_akomodasi)
    {
        // Set judul halaman
        $data['page_title'] = 'Detail Kamar';
        $data['admin_data'] = $this->session->userdata('admin_data');
        $data['kamar'] = $this->M_kamar_akomodasi->getKamarByAkomodasi($id_akomodasi);
        $data['id_akomodasi'] = $id_akomodasi;
        $this->load->view('admin_akomodasi/kamar_akomodasi/index', $data);
    }

    public function detail($id_kamar)
    {
        $data['detail'] = $this->M_kamar_akomodasi->getDetail($id_kamar);
        $this->load->view('admin_akomodasi/kamar_akomodasi/detail', $data);
    }

    public function create($id_akomodasi)
    {
        if ($this->input->post()) {
            $data = [
                'id_akomodasi' => $id_akomodasi,
                'tipe_kamar' => $this->input->post('tipe_kamar'),
                'gambar' => $this->input->post('gambar'),
                'jumlah' => $this->input->post('jumlah'),
                'harga' => $this->input->post('harga')
            ];
            $this->M_kamar_akomodasi->create($data);
            redirect('admin_ako/kamarakomodasi/index/' . $id_akomodasi);
        } else {
            $data['id_akomodasi'] = $id_akomodasi;
            $this->load->view('admin_akomodasi/kamar_akomodasi/create', $data);
        }
    }

    public function edit($id_kamar)
    {
        if ($this->input->post()) {
            $data = [
                'tipe_kamar' => $this->input->post('tipe_kamar'),
                'gambar' => $this->input->post('gambar'),
                'jumlah' => $this->input->post('jumlah'),
                'harga' => $this->input->post('harga')
            ];
            $this->M_kamar_akomodasi->update($id_kamar, $data);
            $detail = $this->M_kamar_akomodasi->getDetail($id_kamar);
            redirect('kamarakomodasi/index/' . $detail->id_akomodasi);
        } else {
            $data['detail'] = $this->M_kamar_akomodasi->getDetail($id_kamar);
            $this->load->view('admin_akomodasi/kamar_akomodasi/edit', $data);
        }
    }

    public function delete($id_kamar)
    {
        $detail = $this->M_kamar_akomodasi->getDetail($id_kamar);
        $this->M_kamar_akomodasi->delete($id_kamar);
        redirect('kamarakomodasi/index/' . $detail->id_akomodasi);
    }
}

/* End of file KamarAkomodasi.php */
