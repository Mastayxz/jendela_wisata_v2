<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Event extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('admin_data')) {
            // Redirect ke halaman login jika tidak login
            redirect('c_authadmin/index');
        }
        $this->load->model('M_event');
        $this->load->model('M_tempatWisata');
    }


    public function index()
    {
        $data['page_title'] = 'Event';
        $data['event'] = $this->M_event->getData();
        $data['evet'] = $this->load->view('admin/dashboard/event/event', $data);
    }

    public function tambah()
    {
        $data['page_title'] = 'Tambah Data Event';
        $data['tempat_wisata_list'] = $this->M_tempatWisata->getData();
        $this->load->view('admin/aktivitas/event/tambah', $data);
    }

    public function add()
    {
        $config['upload_path'] = realpath('./upload/event/');
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size']      = 2048;

        $this->load->library('upload', $config);

        echo $config['upload_path'];

        if ($this->upload->do_upload('gambar')) {
            $upload_data = $this->upload->data();
            $data['gambar'] = $upload_data['file_name'];
        } else {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
            // Handle upload error (optional)
        }
        $insert = array(
            'nama_event' => $this->input->post('nama_event'),
            'biaya_event' => $this->input->post('biaya_event'),
            'alamat_event' => $this->input->post('alamat_event'),
            'jam_buka' => $this->input->post('jam_buka'),
            'jam_tutup' => $this->input->post('jam_tutup'),
            'gambar_event' => $data['gambar'],
            'id_tempat_wisata' => $this->input->post('id_tempat_wisata')
        );
        $this->M_event->insertData($insert);
        redirect('admin/event');
    }

    public function edit($id_event)
    {
        $data['page_title'] = 'Tambah Data Event';
        $data['tempat_wisata_list'] = $this->M_tempatWisata->getData();
        $data['event'] = $this->M_event->getDetail($id_event);
        $this->load->view('admin/aktivitas/event/edit', $data);
    }

    public function update()
    {
        if (!empty($_FILES['gambar']['name'])) {
            // Handle unggah file
            $config['upload_path']   = './upload/event/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']      = 10000;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                // Hapus gambar sebelumnya
                $old_data = $this->M_event->getDetail($this->input->post('id_event'));
                $old_image = $old_data['gambar_event'];
                if ($old_image && file_exists('./upload/event/' . $old_image)) {
                    unlink('./upload/event/' . $old_image);
                }

                // Dapatkan nama file yang diunggah
                $upload_data = $this->upload->data();
                $gambar = $upload_data['file_name'];
            } else {
                // Tangani jika pengunggahan gagal
                $error = array('error' => $this->upload->display_errors());
                // Anda dapat menangani kesalahan sesuai kebutuhan
                echo $error['error'];
                // redirect ke halaman kesalahan, dll.
                return;
            }
        } else {
            // Tidak ada gambar baru yang diunggah, tetapkan gambar sebelumnya
            $gambar = $this->input->post('old_gambar');
        }
        $id_event = $this->input->post('id_event');
        $edit = array(
            'nama_event' => $this->input->post('nama_event'),
            'biaya_event' => $this->input->post('biaya_event'),
            'alamat_event' => $this->input->post('alamat_event'),
            'jam_buka' => $this->input->post('jam_buka'),
            'jam_tutup' => $this->input->post('jam_tutup'),
            'gambar_event' => $gambar,
            'id_tempat_wisata' => $this->input->post('id_tempat_wisata')
        );
        $this->M_event->updateData($edit, $id_event);
        redirect('admin/event');
    }

    public function delete($id_event)
    {
        $event = $this->M_event->getDetail($id_event);
        $gambar = $event['gambar_event'];
        if ($gambar && file_exists('./upload/event/' . $gambar)) {
            unlink('./upload/event/' . $gambar);
        }
        $this->M_event->deleteData($id_event);
        redirect('admin/event');
    }

    public function search_ajax()
    {
        try {
            $keyword = $this->input->post('table_search');
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
}


/* End of file Akomodasi.php */
