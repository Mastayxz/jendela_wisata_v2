<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Akomodasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('admin_data')) {
            // Redirect ke halaman login jika tidak login
            redirect('c_authadmin/index');
        }

        $this->load->model('M_akomodasi');
        $this->load->model('M_tempatWisata');
    }


    public function index()
    {
        $data['page_title'] = 'Akomodasi';
        $data['akomodasi'] = $this->M_akomodasi->getData();
        $this->load->view('admin/dashboard/akomodasi/akomodasi', $data);
    }

    public function tambah()
    {
        $data['page_title'] = 'Tambah Akomodasi';
        $data['jenis_akomodasi_list'] = $this->M_akomodasi->getJenisAkomodasi();
        $data['tempat_wisata_list'] = $this->M_tempatWisata->getData();
        $this->load->view('admin/aktivitas/akomodasi/tambah', $data);
    }

    public function add()
    {
        $config['upload_path'] = realpath('./upload/akomodasi/');
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size']      = 10000;

        $this->load->library('upload', $config);

        $uploaded_files = array();

        for ($i = 1; $i <= 3; $i++) {
            $_FILES['userfile']['name'] = $_FILES['gambar_akomodasi']['name'][$i - 1];
            $_FILES['userfile']['type'] = $_FILES['gambar_akomodasi']['type'][$i - 1];
            $_FILES['userfile']['tmp_name'] = $_FILES['gambar_akomodasi']['tmp_name'][$i - 1];
            $_FILES['userfile']['error'] = $_FILES['gambar_akomodasi']['error'][$i - 1];
            $_FILES['userfile']['size'] = $_FILES['gambar_akomodasi']['size'][$i - 1];

            if ($this->upload->do_upload('userfile')) {
                $upload_data = $this->upload->data();
                $uploaded_files["gambar_akomodasi{$i}"] = $upload_data['file_name'];
            } else {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
                // Handle upload error (optional)
            }
        }

        $insert = array(
            'nama_akomodasi' => $this->input->post('nama_akomodasi'),
            'harga_akomodasi' => $this->input->post('harga_akomodasi'),
            'alamat_akomodasi' => $this->input->post('alamat_akomodasi'),
            'deskripsi_akomodasi' => $this->input->post('deskripsi_akomodasi'),
            'lokasi_akomodasi' => $this->input->post('lokasi_akomodasi'),
            'id_jenis_akomodasi' =>  $this->input->post('id_jenis_akomodasi'),
            'id_tempat_wisata' => $this->input->post('id_tempat_wisata')
        );
        if (!empty($uploaded_files)) {
            $data = array_merge($insert, $uploaded_files);
        }

        $this->M_akomodasi->insertData($data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        Data Berhasil tambah.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>');

        redirect('admin/akomodasi');
    }



    public function edit($id)
    {
        $data['page_title'] = 'Edit Data';
        $data['jenis_akomodasi_list'] = $this->M_akomodasi->getJenisAkomodasi();
        $data['tempat_wisata_list'] = $this->M_tempatWisata->getData();
        $data['akomodasi'] = $this->M_akomodasi->getDetail($id);
        $this->load->view('admin/aktivitas/akomodasi/edit', $data);
    }

    public function update()
    {
        $id_akomodasi = $this->input->post('id_akomodasi');

        $uploaded_files = array();

        // Loop through the three images
        for ($i = 1; $i <= 3; $i++) {
            if (!empty($_FILES['gambar_akomodasi' . $i]['name'])) {
                $config['upload_path']   = './upload/akomodasi/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']      = 10000;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar_akomodasi' . $i)) {
                    $old_data = $this->M_akomodasi->getDetail($id_akomodasi);
                    $old_image = $old_data['gambar_akomodasi' . $i];
                    if ($old_image && file_exists('./upload/akomodasi/' . $old_image)) {
                        unlink('./upload/akomodasi/' . $old_image);
                    }
                    $upload_data = $this->upload->data();
                    $uploaded_files["gambar_akomodasi{$i}"] = $upload_data['file_name'];
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    echo $error['error'];
                    return;
                }
            }
        }

        $edit = array(
            'nama_akomodasi' => $this->input->post('nama_akomodasi'),
            'harga_akomodasi' => $this->input->post('harga_akomodasi'),
            'alamat_akomodasi' => $this->input->post('alamat_akomodasi'),
            'deskripsi_akomodasi' => $this->input->post('deskripsi_akomodasi'),
            'lokasi_akomodasi' => $this->input->post('lokasi_akomodasi'),
            'id_jenis_akomodasi' =>  $this->input->post('id_jenis_akomodasi'),
            'id_tempat_wisata' => $this->input->post('id_tempat_wisata')
        );

        // Merge existing data with uploaded files
        $data = array_merge($edit, $uploaded_files);

        $this->M_akomodasi->updateData($data, $id_akomodasi);
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        Data Berhasil diubah.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>');
        redirect('admin/akomodasi');
    }

    public function delete($id_akomodasi)
    {
        $akomodasi = $this->M_akomodasi->getDetail($id_akomodasi);

        // Hapus ketiga gambar jika ada
        for ($i = 1; $i <= 3; $i++) {
            $gambar = $akomodasi['gambar_akomodasi' . $i];
            if ($gambar && file_exists('./upload/akomodasi/' . $gambar)) {
                unlink('./upload/akomodasi/' . $gambar);
            }
        }

        $this->M_akomodasi->deleteData($id_akomodasi);
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        Data Berhasil dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>');

        redirect('admin/akomodasi');
    }
    // Akomodasi.php
    public function search_ajax()
    {
        try {
            $keyword = $this->input->post('table_search');
            if (empty($keyword)) {
                $data['akomodasi'] = $this->M_akomodasi->getData(); // Tampilkan semua data
            } else {
                $data['akomodasi'] = $this->M_akomodasi->searchAkomodasi($keyword);
            }
            $this->load->view('admin/dashboard/akomodasi/akomodasi_ajax', $data);
        } catch (Exception $e) {
            error_log('Error in search_ajax: ' . $e->getMessage());
        }
    }

    /* End of file Akomodasi.php */
}
