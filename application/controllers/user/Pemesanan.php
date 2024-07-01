<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('id_user')) {
            redirect('c_auth');
        }
        $this->load->model('M_akomodasi');
        $this->load->model('M_tempatWisata');
        $this->load->model('kategori_model');
        $this->load->model('M_event');
        $this->load->model('m_pesanan');
        $this->load->model('m_userinfo');
    }

    public function index($id)
    {
        $id_user = $this->session->userdata('id_user');
        

        if ($this->is_akomodasi($id)) {
            $data['page_title'] = 'Detail Akomodasi';
            $data['jenis_akomodasi_list'] = $this->M_akomodasi->getJenisAkomodasi($id);
            $data['tempat_wisata_list'] = $this->M_tempatWisata->getData($id);
            $data['akomodasi'] = $this->M_akomodasi->getDetail($id);
            $data['kamar'] = $this->M_akomodasi->get_all_kamar($id);
            $data['user'] = $this->m_userinfo->getDetail($id_user);

            $this->load->view('templates/header');            
            $data['step'] = 1;
            $this->load->view('user/pemesanan/navbar_pesanan', $data);
            $this->load->view('user/pemesanan/index', $data);
        } else if ($this->is_event($id)) {
            $data['page_title'] = 'Detail Event';
            $data['event'] = $this->M_event->getDetail($id);
            $data['step'] = 1;
            $this->load->view('user/pemesanan/navbar_pesanan', $data);

            $this->load->view('user/pemesanan/index', $data);
            $this->load->view('templates/footer');
            
        } else {

            $data['event'] = $this->M_event->getDetail($id);
            $this->load->view('templates/header');  
            $this->load->view('user/pemesanan/index', $data);
            $this->load->view('templates/footer');

            $data['page_title'] = 'Detail Destinasi';
            $data['destinasi'] = $this->M_tempatWisata->getDetail($id);
            $data['step'] = 1;
            $data['user'] = $this->m_userinfo->getDetail($id_user);
            $this->load->view('user/pemesanan/navbar_pesanan', $data);
            $this->load->view('user/pemesanan/detail_destinasi', $data);

        }
    }

    public function step1()
    {
        $data['step'] = 1;
        $this->load->view('user/pemesanan/navbar_pesanan', $data);
        $this->load->view('user/pemesanan/detail_destinasi', $data);
    }

    public function step2()
    {
        $data['step'] = 2;
        $this->load->view('user/pemesanan/navbar_pesanan', $data);
        $this->load->view('user/pemesanan/step2', $data);
    }

    private function is_akomodasi($id)
    {

        $result = $this->db->get_where('akomodasi', ['id_akomodasi' => $id])->row();
        return !empty($result);
    }

    private function is_event($id)
    {
        $result = $this->db->get_where('event', ['id_event' => $id])->row();
        return !empty($result);
    }

    private function is_destinasi($id)
    {
        $result = $this->db->get_where('tempat_wisata', ['id_tempat_wisata' => $id])->row();
        return $result;
    }

    public function pemesanan_kamar(){
        //mengambil inputan pada view 
        $nama_tamu = $this->input->post('nama_tamu');
        $email = $this->input->post('email');
        $no_tlp = $this->input->post('no_tlp');
        $check_in = $this->input->post('check_in');
        $check_out = $this->input->post('check_out');
        $kamar_id = $this->input->post('kamar_id');
        //mengambil data kamar berdasarkan id kamar dari database 
        $kamar = $this->M_akomodasi->get_kamar_id($kamar_id);
        
        //perhitungan tanggal 
        $check_in_date =  new  DateTime($check_in);
        $check_out_date =  new  DateTime($check_out);
        $tempo = $check_in_date->diff($check_out_date);
        $hari = $tempo->days; // mengambil jumlah hari dan nantik akan di tampilkan
        //menghitung total harga 
        $total_harga = $kamar['harga']*$hari;

        //inser database ke pemesanan
        $data = array(
            'tanggal_pemesanan' => '',
            'total_harga' => $total_harga,
            'check_in' => $check_in,
            'check_out' => $check_out,
            //masih bingung
            'akomodasi_id_akomodas' => '',
            'event_id_event ' => '',
            'tempat_wisata_id_tempat_wisata' => '',
            'user_id_user' => '',
            'admin_ako_id_admin' => ''
        );
        $this->M_akomodasi->insert_pemesanan($data);
        //mengarah ke pembayaran
    }

    public function proses_pesan()
    {
        $tanggal_kunjungan = $this->input->post('tanggal_kunjungan');
        $jumlah_orang = $this->input->post('jumlah_orang');
        $id_destinasi = $this->input->post('id_tempat_wisata');
        $id_user = $this->session->userdata('id_user');

        if (!$this->is_destinasi($id_destinasi)) {
            show_error('Destinasi tidak valid');
        }

        $destinasi = $this->M_tempatWisata->getDetail($id_destinasi);
        $stok_tiket = $this->M_tempatWisata->getStokTiket($id_destinasi);

        if ($jumlah_orang > $stok_tiket['stok_tiket']) {
            $this->session->set_flashdata('error', 'Jumlah tiket yang diminta melebihi stok yang tersedia');
            redirect('user/pemesanan/index/' . $id_destinasi);
            return;
        }

        $harga_destinasi = $destinasi['biaya_tempat_wisata'];
        $total_harga = $jumlah_orang * $harga_destinasi;

        $data_pemesanan = array(
            'tanggal_pemesanan' => $tanggal_kunjungan,
            'jumlah_orang' => $jumlah_orang,
            'id_tempat_wisata' => $id_destinasi,
            'total_harga' => $total_harga,
            'id_user' => $id_user,
            'status' => 0
        );

        $id_pemesanan = $this->m_pesanan->simpan_pesanan_destinasi($data_pemesanan);
        $this->session->set_userdata('id_pemesanan_destinasi', $id_pemesanan);
        $this->M_tempatWisata->kurangiStokTiket($id_destinasi, $jumlah_orang);
        redirect('user/pemesanan/sukses');
    }

    public function sukses()
    {
        // Asumsikan id_pemesanan_akomodasi, id_pemesanan_destinasi, id_pemesanan_event disimpan di session atau didapatkan dari proses sebelumnya
        $id_pemesanan_akomodasi = $this->session->userdata('id_pemesanan_akomodasi');
        $id_pemesanan_destinasi = $this->session->userdata('id_pemesanan_destinasi');
        $id_pemesanan_event = $this->session->userdata('id_pemesanan_event');

        $data = [];

        if ($id_pemesanan_akomodasi) {
            $data['pesanan_akomodasi'] = $this->m_pesanan->get_pesanan_akomodasi($id_pemesanan_akomodasi);
        }
        if ($id_pemesanan_destinasi) {
            $data['pesanan_destinasi'] = $this->m_pesanan->get_pesanan_destinasi($id_pemesanan_destinasi);
        }
        if ($id_pemesanan_event) {
            $data['pesanan_event'] = $this->m_pesanan->get_pesanan_event($id_pemesanan_event);
        }

        $this->load->view('user/pemesanan/step2', $data);
    }
}


    