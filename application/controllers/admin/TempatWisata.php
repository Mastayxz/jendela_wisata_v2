<?php

defined('BASEPATH') or exit('No direct script access allowed');

class TempatWisata extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('admin_data')) {
            // Redirect ke halaman login jika tidak login
            redirect('c_authadmin/index');
        }
        $this->load->model('M_tempatWisata');
        $this->load->model('kategori_model');
        $this->load->library('session');
    }


    public function index()
    {
        $data['page_title'] = 'Tempat Wisata';
        $data['tempat_wisata'] = $this->M_tempatWisata->getData();
        $data['kategori_list'] = $this->kategori_model->getKategori();
        $this->load->view('admin/dashboard/destinasi/tempat_wisata', $data);
    }
    public function tambah()
    {
        $data['page_title'] = 'Tambah Data';
        $data['kategori_list'] = $this->kategori_model->getKategori();
        $this->load->view('admin/aktivitas/tempat_wisata/tambah', $data);
    }


    public function add()
    {
        $config['upload_path'] = realpath('./upload/destinasi/');
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 10000;

        $this->load->library('upload', $config);

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
                // Handle upload error (optional)
            }
        }

        $data = array(
            'nama' => $this->input->post('nama'),
            'biaya' => $this->input->post('biaya'),
            'alamat' => $this->input->post('alamat'),
            'deskripsi' => $this->input->post('deskripsi'),
            'lokasi' => $this->input->post('lokasi')
        );


        if (!empty($uploaded_files)) {
            $data = array_merge($data, $uploaded_files);
        }

        // Insert data into the database
        $tempat_wisata_id = $this->M_tempatWisata->insertData($data);

        // Insert related categories
        $kategori_ids = $this->input->post('id_kategori');
        foreach ($kategori_ids as $kategori_id) {
            $this->M_tempatWisata->insertTempatWisataKategori($tempat_wisata_id, $kategori_id);
        }

        // Set flash message
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Data Berhasil tambah.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>');

        // Redirect to the desired page
        redirect('admin/tempatwisata');
    }
    public function edit($id_tempat_wisata)
    {
        $data['page_title'] = 'Edit Data';
        $data['destinasi'] = $this->M_tempatWisata->getDetail($id_tempat_wisata);
        $data['kategori_list'] = $this->kategori_model->getKategori();
        $data['selected_kategori'] = $this->M_tempatWisata->getKategoriByTempatWisataId($id_tempat_wisata);

        $this->load->view('admin/aktivitas/tempat_wisata/edit', $data);
    }



    public function update()
    {
        $id_tempat_wisata = $this->input->post('id_tempat_wisata');

        $uploaded_files = array();

        // Loop through the three images
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
            'nama' => $this->input->post('nama'),
            'biaya' => $this->input->post('biaya'),
            'alamat' => $this->input->post('alamat'),
            'deskripsi' => $this->input->post('deskripsi'),
            'lokasi' => $this->input->post('lokasi')
        );

        // Merge existing data with uploaded files
        $data = array_merge($data, $uploaded_files);

        // Update data in the database


        // Update related categories
        $kategori_ids = $this->input->post('id_kategori');
        $this->M_tempatWisata->updateTempatWisata($id_tempat_wisata, $data, $kategori_ids);

        // Set flash message
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Data Berhasil diubah.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>');

        // Redirect to the desired page
        redirect('admin/tempatWisata');
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
        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        Data Berhasil dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>');

        redirect('admin/tempatwisata');
    }
    public function search_ajax()
    {
        try {
            $keyword = $this->input->post('table_search');
            if (empty($keyword)) {
                $data['tempat_wisata'] = $this->M_tempatWisata->getData(); // Tampilkan semua data
            } else {
                $data['tempat_wisata'] = $this->M_tempatWisata->searchDestinasi($keyword);
            }
            $this->load->view('admin/dashboard/destinasi/tempat_wisata_ajax', $data);
        } catch (Exception $e) {
            error_log('Error in search_ajax: ' . $e->getMessage());
        }
    }
    public function filterByCategory()
    {
        // Mendapatkan data kategori dari form
        $kategori_id = $this->input->post('filter_kategori');

        // Memanggil model untuk melakukan filter berdasarkan kategori
        $filtered_data = $this->M_tempatWisata->filterByCategory($kategori_id);

        // Mendapatkan daftar kategori untuk ditampilkan di form filter
        $data['kategori_list'] = $this->kategori_model->getKategori();

        // Tampilkan view dengan data hasil filter dan daftar kategori
        $data['tempat_wisata'] = $filtered_data;
        $this->load->view('admin/dashboard/destinasi/tempat_wisata_ajax', $data);
    }
}


/* End of file temppa.php */
