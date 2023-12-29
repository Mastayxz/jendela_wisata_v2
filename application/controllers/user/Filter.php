<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Filter extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_akomodasi');
        $this->load->model('M_tempatWisata');
        $this->load->model('kategori_model');
        $this->load->model('M_event');
    }


    public function filter_akomodasi()
    {
        try {
            // Mendapatkan data jenis akomodasi dari form
            $id_jenis_akomodasi = $this->input->post('filter_jenis');

            // Mendapatkan data harga dari form
            $harga_min = $this->input->post('filter_harga_min');
            $harga_max = $this->input->post('filter_harga_max');
            $alamat = $this->input->post('alamat');

            if (empty($id_jenis_akomodasi) && empty($harga_min) && empty($harga_max) && empty($alamat)) {
                $filtered_data = $this->M_akomodasi->getData(); // Tampilkan semua data
            } else {
                $filtered_data = $this->M_akomodasi->filterByJenisDanHarga($id_jenis_akomodasi, $harga_min, $harga_max, $alamat);
            }

            // Mendapatkan daftar jenis akomodasi untuk ditampilkan di form filter
            $data['jenis_akomodasi_list'] = $this->M_akomodasi->getJenisAkomodasi();

            // Data yang akan dikirimkan ke view
            $data['akomodasi'] = $filtered_data;

            // Load the view to display the filtered data and jenis akomodasi list
            $this->load->view('user/akomodasi/search_akomodasi', $data);
        } catch (Exception $e) {
            error_log('Error in filter_akomodasi: ' . $e->getMessage());
        }
    }



    public function filter_destinasi()
    {
        // Mendapatkan data kategori dari form
        $kategori_id = $this->input->post('filter_kategori');
        $harga_min = $this->input->post('filter_harga_min');
        $harga_max = $this->input->post('filter_harga_max');
        $alamat = $this->input->post('alamat');


        if (empty($kategori_id) && empty($harga_max) && empty($harga_min) && empty($alamat)) {
            $filtered_data = $this->M_tempatWisata->getData();
        } else {
            $filtered_data = $this->M_tempatWisata->filterByCategory($kategori_id, $harga_max, $harga_min, $alamat);
        }
        // Memanggil model untuk melakukan filter berdasarkan kategori

        // Mendapatkan daftar kategori untuk ditampilkan di form filter
        $data['kategori_list'] = $this->kategori_model->getKategori();

        // Tampilkan view dengan data hasil filter dan daftar kategori
        $data['tempat_wisata'] = $filtered_data;
        $this->load->view('user/tempat_wisata/search_wisata', $data);
    }

    public function filter_event()
    {
        try {
            $alamat_event = $this->input->post('alamat_event');
            $jam_buka = $this->input->post('jam_buka');
            $jam_tutup = $this->input->post('jam_tutup');
            $harga_max = $this->input->post('price');

            if (empty($alamat_event) && empty($jam_buka) && empty($jam_tutup) && empty($harga_max)) {
                $data['event'] = $this->M_event->getData(); // Tampilkan semua data
            } else {
                $data['event'] = $this->M_event->get_event_by_filter($alamat_event, $jam_buka, $jam_tutup, $harga_max);
            }

            $this->load->view('user/event/search_event', $data);
        } catch (Exception $e) {
            error_log('Error in filter_event: ' . $e->getMessage());
        }
    }
}

/* End of file Controllername.php */
