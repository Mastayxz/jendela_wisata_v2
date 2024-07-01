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
            // Konfigurasi upload
            $config['upload_path'] = './upload/kamar_akomodasi/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 2048; // Maksimum 2MB

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                // Jika upload gagal
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', $error);
                redirect('admin_ako/kamarakomodasi/create/' . $id_akomodasi);
            } else {
                // Jika upload berhasil
                $upload_data = $this->upload->data();

                $data = [
                    'id_akomodasi' => $id_akomodasi,
                    'tipe_kamar' => $this->input->post('tipe_kamar'),
                    'gambar' => $upload_data['file_name'],
                    'jumlah' => $this->input->post('jumlah'),
                    'harga' => $this->input->post('harga')
                ];
                $this->M_kamar_akomodasi->create($data);
                $this->session->set_flashdata('pesan', 'Kamar berhasil ditambahkan.');
                redirect('admin_ako/kamarakomodasi/index/' . $id_akomodasi);
            }
        } else {
            $data['id_akomodasi'] = $id_akomodasi;
            $this->load->view('admin_akomodasi/kamar_akomodasi/create', $data);
        }
    }

    public function edit($id_kamar)
    {
        if ($this->input->post()) {
            // Konfigurasi upload
            $config['upload_path'] = './upload/kamar_akomodasi/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 2048; // Maksimum 2MB

            $this->load->library('upload', $config);

            if (!empty($_FILES['gambar']['name']) && !$this->upload->do_upload('gambar')) {
                // Jika upload gagal
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', $error);
                redirect('admin_ako/kamarakomodasi/edit/' . $id_kamar);
            } else {
                // Jika upload berhasil atau tidak ada file yang diupload
                $upload_data = $this->upload->data();
                $gambar = !empty($_FILES['gambar']['name']) ? $upload_data['file_name'] : $this->input->post('existing_gambar');

                $data = [
                    'tipe_kamar' => $this->input->post('tipe_kamar'),
                    'gambar' => $gambar,
                    'jumlah' => $this->input->post('jumlah'),
                    'harga' => $this->input->post('harga')
                ];

                $this->M_kamar_akomodasi->update($id_kamar, $data);
                $detail = $this->M_kamar_akomodasi->getDetail($id_kamar);
                $this->session->set_flashdata('pesan', 'Kamar berhasil diupdate.');
                redirect('admin_ako/kamarakomodasi/index/' . $detail->id_akomodasi);
            }
        } else {
            $data['detail'] = $this->M_kamar_akomodasi->getDetail($id_kamar);
            $this->load->view('admin_akomodasi/kamar_akomodasi/edit', $data);
        }
    }

    public function delete($id_kamar)
    {
        $detail = $this->M_kamar_akomodasi->getDetail($id_kamar);
        $this->M_kamar_akomodasi->delete($id_kamar);
        redirect('admin_ako/kamarakomodasi/index/' . $detail->id_akomodasi);
    }
}

/* End of file KamarAkomodasi.php */
