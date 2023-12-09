<?php

defined('BASEPATH') or exit('No direct script access allowed');

class pemesanan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pemesanan');
    }

    public function pesan_tiket()
    {
        // Logika untuk mendapatkan data pemesanan dari form dan user yang sedang login
        $id_user = $this->session->userdata('id_user'); // Ganti dengan nama sesuai dengan sesi login Anda
        $id_event = $this->input->post('id_event');
        $id_tempat_wisata = $this->input->post('id_tempat_wisata');
        $jumlah_tiket = $this->input->post('jumlah_tiket');

        // Mendapatkan harga tiket dari tabel event atau tempat wisata
        if (!empty($id_event)) {
            $harga_tiket = $this->M_pemesanan->get_harga_event($id_event);
        } elseif (!empty($id_tempat_wisata)) {
            $harga_tiket = $this->M_pemesanan->get_harga_wisata($id_tempat_wisata);
        } else {
            // Tidak ada id_event atau id_tempat_wisata, berikan nilai default atau tampilkan pesan error
            $harga_tiket = 0;
            // Anda juga bisa menambahkan pesan error untuk ditampilkan kepada pengguna
        }

        // Logika untuk menghitung total harga
        $total_harga = $this->hitung_total_harga($harga_tiket, $jumlah_tiket);

        // Menyimpan data pemesanan ke database
        $data = array(
            'id_user' => $id_user,
            'id_event' => $id_event,
            'id_tempat_wisata' => $id_tempat_wisata,
            'jumlah_tiket' => $jumlah_tiket,
            'total_harga' => $total_harga,
            'status_pemesanan' => 'Belum Dibayar'
        );

        $this->M_pemesanan->insert_pemesanan($data);

        // Redirect atau tampilkan pesan sukses
        redirect('halaman_pemesanan_sukses');
    }

    private function hitung_total_harga($harga_tiket, $jumlah_tiket)
    {
        // Logika untuk menghitung total harga berdasarkan harga tiket dan jumlah tiket
        return $harga_tiket * $jumlah_tiket;
    }
}

/* End of file pemesanan.php */
