<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Filter extends CI_Controller
{

    public function index()
    {
    }
    public function filterByJenisAkomodasi()
    {
        // Mendapatkan data kategori dari form
        $id_jenis_akomodasi = $this->input->post('filter_jenis');

        if ($id_jenis_akomodasi == 'semua') {
            $filtered_data = $this->M_akomodasi->getData();
        } else {
            $filtered_data = $this->M_akomodasi->filterByJenisAkomodasi($id_jenis_akomodasi);
        }
        // Memanggil model untuk melakukan filter berdasarkan kategori

        // Mendapatkan daftar kategori untuk ditampilkan di form filter
        $data['jenis_akomodasi_list'] = $this->M_akomodasi->getJenisAkomodasi();

        // Data yang akan dikirimkan ke view
        $data['akomodasi'] = $filtered_data;

        // Load the view to display the filtered data and category list
        $this->load->view('user/akomodasi/search_akomodasi', $data);
    }
}

/* End of file Controllername.php */
