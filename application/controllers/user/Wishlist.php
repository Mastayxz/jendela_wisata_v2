<?php

class Wishlist extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Wishlist_model');
        $this->load->model('M_akomodasi');
        $this->load->model('M_tempatWisata');
        $this->load->model('kategori_model');
        $this->load->model('M_event');
    }

    public function add_to_wish($id_akomodasi = null, $id_event = null, $id_tempat_wisata = null)
    {
        // Pastikan user sudah login
        if (!$this->session->userdata('id_user')) {
            // Handle jika user belum login (misalnya, redirect ke halaman login)
            redirect('c_auth');
        }

        // Ambil ID user dari sesi
        $id_user = $this->session->userdata('id_user');

        // Atur id_akomodasi menjadi null jika tombol ditekan pada halaman event atau destinasi
        $id_akomodasi = ($id_akomodasi === 'null') ? null : $id_akomodasi;
        $id_event = ($id_event === 'null') ? null : $id_event;
        $id_tempat_wisata = ($id_tempat_wisata === 'null') ? null : $id_tempat_wisata;

        // Panggil model untuk menambahkan ke wishlist
        $result = $this->Wishlist_model->add_to_wishlist($id_user, $id_akomodasi, $id_event, $id_tempat_wisata);

        if ($result === true) {
            $this->session->set_flashdata('pesan', 'item di tambahkan ke dalam wishlist.');
        } else {
            $this->session->set_flashdata('pesan', 'item  sudah ada di dalam  wishlist.');
        }

        // Redirect atau tampilkan pesan sukses
        redirect('user/wishlist');
    }




    public function index()
    {

        $data['page_title'] = 'Wishlist';
        $data['tempat_wisata'] = $this->M_tempatWisata->getData();
        $data['akomodasi'] = $this->M_akomodasi->getData();
        $data['jenis_akomodasi_list'] = $this->M_akomodasi->getJenisAkomodasi();

        // Pastikan user sudah login
        if (!$this->session->userdata('id_user')) {
            // Handle jika user belum login (misalnya, redirect ke halaman login)
            redirect('c_auth');
        }

        // Ambil ID user dari sesi
        $id_user = $this->session->userdata('id_user');

        // Panggil model untuk mendapatkan daftar wishlist
        $data['wishlist'] = $this->Wishlist_model->get_user_wishlist($id_user);

        // Tampilkan halaman wishlist
        $this->load->view('user/wishlist/wishlist', $data);
    }




    public function delete($id_wishlist)
    {
        // Pastikan user sudah login
        if (!$this->session->userdata('id_user')) {
            redirect('c_auth');
        }

        // Panggil model untuk menghapus item dari wishlist
        $result = $this->Wishlist_model->delete_wishlist_item($id_wishlist);

        if ($result) {
            $this->session->set_flashdata('success_message', 'Item berhasil dihapus dari Wishlist.');
        } else {
            $this->session->set_flashdata('error_message', 'Gagal menghapus item dari Wishlist atau item tidak ditemukan.');
        }

        // Redirect atau tampilkan pesan sukses
        redirect('user/wishlist');
    }
}
