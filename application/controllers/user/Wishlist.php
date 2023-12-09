<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Wishlist extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('wishlist_model');
        $this->load->library('session');
    }

    public function addToWishlist($type, $id)
    {
        // Mendapatkan ID pengguna dari sesi
        $user_id = $this->session->userdata('user_id');

        // Memasukkan data ke dalam tabel Wishlist
        $data = array(
            'id_user' => $user_id,
            'id_akomodasi' => ($type == 'akomodasi') ? $id : null,
            'id_event' => ($type == 'event') ? $id : null,
            'id_tempat_wisata' => ($type == 'tempat_wisata') ? $id : null,
        );

        $this->wishlist_model->addToWishlist($data);

        // Redirect atau tampilkan pesan sukses
        redirect('wishlist');
    }

    public function index()
    {
        // Mendapatkan ID pengguna dari sesi
        $user_id = $this->session->userdata('user_id');

        // Mendapatkan daftar wishlist pengguna
        $data['wishlist'] = $this->wishlist_model->getWishlist($user_id);

        // Tampilkan halaman wishlist
        $this->load->view('wishlist', $data);
    }
}

/* End of file Wishlist.php */
