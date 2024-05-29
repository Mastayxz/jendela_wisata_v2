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
        $this->load->view('admin/dashboard/event/tambah_event', $data);
    }

    public function add()
    {
        $config['upload_path'] = realpath('./upload/event/');
        $config['allowed_types'] = 'gif|jpg|jpeg|png|webp';
        $config['max_size']      = 10000;

        $this->load->library('upload', $config);

        $uploaded_files = array();

        for ($i = 1; $i <= 3; $i++) {
            $_FILES['userfile']['name'] = $_FILES['gambar_event']['name'][$i - 1];
            $_FILES['userfile']['type'] = $_FILES['gambar_event']['type'][$i - 1];
            $_FILES['userfile']['tmp_name'] = $_FILES['gambar_event']['tmp_name'][$i - 1];
            $_FILES['userfile']['error'] = $_FILES['gambar_event']['error'][$i - 1];
            $_FILES['userfile']['size'] = $_FILES['gambar_event']['size'][$i - 1];

            if ($this->upload->do_upload('userfile')) {
                $upload_data = $this->upload->data();
                $uploaded_files["gambar_event{$i}"] = $upload_data['file_name'];
            } else {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
                // Handle upload error (optional)
            }
        }

        $insert = array(
            'nama_event' => $this->input->post('nama_event'),
            'biaya_event' => $this->input->post('biaya_event'),
            'tanggal_event' => $this->input->post('tanggal_event'),
            'alamat_event' => $this->input->post('alamat_event'),
            'deskripsi_event' => $this->input->post('deskripsi_event'),
            'fasilitas_event' => $this->input->post('fasilitas_event'),
            'jam_buka' => $this->input->post('jam_buka'),
            'jam_tutup' => $this->input->post('jam_tutup'),
            'stok_tiket' => $this->input->post('stok_tiket'),
            'id_tempat_wisata' => $this->input->post('id_tempat_wisata')
        );

        if (!empty($uploaded_files)) {
            $data = array_merge($insert, $uploaded_files);
        }

        if ($this->M_event->insertData($data)) {
            $this->session->set_flashdata('pesan', 'Data Event berhasil ditambahkan.');
        } else {
            // Simpan pesan flashdata jika terjadi kesalahan
            $this->session->set_flashdata('error', 'Terjadi kesalahan saat menambahkan data event.');
        }

        redirect('admin/event');
    }



    public function edit($id_event)
    {
        $data['page_title'] = 'Tambah Data Event';
        $data['tempat_wisata_list'] = $this->M_tempatWisata->getData();
        $data['event'] = $this->M_event->getDetail($id_event);
        $this->load->view('admin/dashboard/event/edit_event', $data);
    }

    public function update()
    {
        $id_event = $this->input->post('id_event');

        $uploaded_files = array();

        // Loop through the three images
        for ($i = 1; $i <= 3; $i++) {
            if (!empty($_FILES['gambar_event' . $i]['name'])) {
                $config['upload_path']   = './upload/event/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']      = 10000;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar_event' . $i)) {
                    $old_data = $this->M_event->getDetail($id_event);
                    $old_image = $old_data['gambar_event' . $i];
                    if ($old_image && file_exists('./upload/event/' . $old_image)) {
                        unlink('./upload/event/' . $old_image);
                    }
                    $upload_data = $this->upload->data();
                    $uploaded_files["gambar_event{$i}"] = $upload_data['file_name'];
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    echo $error['error'];
                    return;
                }
            }
        }

        $edit = array(
            'nama_event' => $this->input->post('nama_event'),
            'biaya_event' => $this->input->post('biaya_event'),
            'tanggal_event' => $this->input->post('tanggal_event'),
            'alamat_event' => $this->input->post('alamat_event'),
            'deskripsi_event' => $this->input->post('deskripsi_event'),
            'fasilitas_event' => $this->input->post('fasilitas_event'),
            'stok_tiket' => $this->input->post('stok_tiket'),
            'jam_buka' => $this->input->post('jam_buka'),
            'jam_tutup' => $this->input->post('jam_tutup'),
            'id_tempat_wisata' => $this->input->post('id_tempat_wisata')
        );

        // Merge existing data with uploaded files
        $data = array_merge($edit, $uploaded_files);


        $this->M_event->updateData($data, $id_event);
        $this->session->set_flashdata('pesan', 'Data event berhasil ditambahkan.');


        redirect('admin_ako/detail_event/index/' . $id_event);
    }



    public function delete($id_event)
    {
        $event = $this->M_event->getDetail($id_event);

        // Hapus ketiga gambar jika ada
        for ($i = 1; $i <= 3; $i++) {
            $gambar = $event['gambar_event' . $i];
            if ($gambar && file_exists('./upload/event/' . $gambar)) {
                unlink('./upload/event/' . $gambar);
            }
        }
        $this->M_event->deleteData($id_event);
        $this->session->set_flashdata('pesan', 'Data event berhasil dihapus.');
        redirect('admin/event');

        redirect('admin/akomodasi');
    }
}


/* End of file event.php */
