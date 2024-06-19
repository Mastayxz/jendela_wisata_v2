<?php

defined('BASEPATH') or exit('No direct script access allowed');

class TempatWisata extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('admin_data')) {
            redirect('c_authadmin/index');
        }
        $this->load->model('M_tempatWisata');
        $this->load->model('kategori_model');
        $this->load->library('session');
    }


    public function index()
    {
        $data['page_title'] = 'Tempat Wisata';
        // $this->session->set_userdata('active_menu', 'tempatwisata');
        $data['tempat_wisata'] = $this->M_tempatWisata->getData();
        $data['kategori_list'] = $this->kategori_model->getKategori();
        $this->load->view('admin/dashboard/destinasi/tempat_wisata', $data);
    }
    public function tambah()
    {
        $data['page_title'] = 'Tambah Data';
        $data['kategori_list'] = $this->kategori_model->getKategori();
        $this->load->view('admin/dashboard/destinasi/tambah_destinasi', $data);
    }


    public function add()
    {
        $config['upload_path'] = realpath('./upload/destinasi/');
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 10000;

        $this->load->library('upload', $config);
        $nama_tempat_wisata = $this->input->post('nama');
        $tempat_wisata_exist = $this->M_tempatWisata->getTempatWisataByName($nama_tempat_wisata);
        if ($tempat_wisata_exist) {

            $this->session->set_flashdata('error', 'Tempat wisata dengan nama yang sama sudah ada.');
            redirect('admin/tempatwisata');
        }

        $uploaded_files = array();

        for ($i = 1; $i <= 3; $i++) {
            $_FILES['userfile']['name'] = $_FILES['gambar']['name'][$i - 1];
            $_FILES['userfile']['type'] = $_FILES['gambar']['type'][$i - 1];
            $_FILES['userfile']['tmp_name'] = $_FILES['gambar']['tmp_name'][$i - 1];
            $_FILES['userfile']['error'] = $_FILES['gambar']['error'][$i - 1];
            $_FILES['userfile']['size'] = $_FILES['gambar']['size'][$i - 1];


            if ($this->upload->do_upload('userfile')) {
                $upload_data = $this->upload->data();
                $uploaded_files["gambar{$i}"] = $upload_data['file_name'];
            } else {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
            }
        }

        $data = array(
            'nama_tempat_wisata' => $this->input->post('nama'),
            'biaya_tempat_wisata' => $this->input->post('biaya'),
            'alamat_tempat_wisata' => $this->input->post('alamat'),
            'deskripsi_tempat_wisata' => $this->input->post('deskripsi'),
            'lokasi_tempat_wisata' => $this->input->post('lokasi'),
            'fasilitas_tempat_wisata' => $this->input->post('fasilitas'),
            'stok_tiket' => $this->input->post('stok_tiket')
        );


        if (!empty($uploaded_files)) {
            $data = array_merge($data, $uploaded_files);
        }


        $tempat_wisata_id = $this->M_tempatWisata->insertData($data);


        $kategori_ids = $this->input->post('id_kategori');
        foreach ($kategori_ids as $kategori_id) {
            $this->M_tempatWisata->insertTempatWisataKategori($tempat_wisata_id, $kategori_id);
        }


        $this->session->set_flashdata('pesan', 'Data destinasi berhasil ditamabah.');


        redirect('admin/tempatwisata');
    }
    public function edit($id_tempat_wisata)
    {
        $data['page_title'] = 'Edit Data';
        $data['destinasi'] = $this->M_tempatWisata->getDetail($id_tempat_wisata);
        $data['kategori_list'] = $this->kategori_model->getKategori();
        $data['selected_kategori'] = $this->M_tempatWisata->getKategoriByTempatWisataId($id_tempat_wisata);

        $this->load->view('admin/dashboard/destinasi/edit_destinasi', $data);
    }

    public function get_detail($id_tempat_wisata)
    {
        $data['destinasi'] = $this->M_tempatWisata->getDetail($id_tempat_wisata);
        $data['kategori_list'] = $this->kategori_model->getKategori();
        $data['selected_kategori'] = $this->M_tempatWisata->getKategoriByTempatWisataId($id_tempat_wisata);


        $this->load->view('admin/dashboard/destinasi/edit_destinasi', $data);
    }


    public function update()
    {
        $id_tempat_wisata = $this->input->post('id_tempat_wisata');

        $uploaded_files = array();

        for ($i = 1; $i <= 3; $i++) {
            if (!empty($_FILES['gambar' . $i]['name'])) {
                $config['upload_path']   = './upload/destinasi/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']      = 10000;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar' . $i)) {
                    $old_data = $this->M_tempatWisata->getDetail($id_tempat_wisata);
                    $old_image = $old_data['gambar' . $i];
                    if ($old_image && file_exists('./upload/destinasi/' . $old_image)) {
                        unlink('./upload/destinasi/' . $old_image);
                    }
                    $upload_data = $this->upload->data();
                    $uploaded_files["gambar{$i}"] = $upload_data['file_name'];
                } else {
                    $error = array('error' => $this->upload->display_errors());
                    echo $error['error'];
                    return;
                }
            }
        }

        $data = array(
            'nama_tempat_wisata' => $this->input->post('nama'),
            'biaya_tempat_wisata' => $this->input->post('biaya'),
            'alamat_tempat_wisata' => $this->input->post('alamat'),
            'deskripsi_tempat_wisata' => $this->input->post('deskripsi'),
            'lokasi_tempat_wisata' => $this->input->post('lokasi'),
            'fasilitas_tempat_wisata' => $this->input->post('fasilitas'),
            'stok_tiket' => $this->input->post('stok_tiket'),

        );

        $data = array_merge($data, $uploaded_files);
        $kategori_ids = $this->input->post('id_kategori');
        $this->M_tempatWisata->updateTempatWisata($id_tempat_wisata, $data, $kategori_ids);

        $this->session->set_flashdata('pesan', 'Data destinasi berhasil diperbarui.');


        redirect('admin_ako/detail_destinasi');
    }

    public function delete($id_tempat_wisata)
    {
        $tempat_wisata = $this->M_tempatWisata->getDetail($id_tempat_wisata);

        // Hapus ketiga gambar jika ada
        for ($i = 1; $i <= 3; $i++) {
            $gambar = $tempat_wisata['gambar' . $i];
            if ($gambar && file_exists('./upload/destinasi/' . $gambar)) {
                unlink('./upload/destinasi/' . $gambar);
            }
        }

        $this->M_tempatWisata->deleteData($id_tempat_wisata);
        $this->session->set_flashdata('pesan', 'Data destinasi berhasil dihapus.');

        redirect('admin/tempatwisata');
    }
}


/* End of file temppa.php */
