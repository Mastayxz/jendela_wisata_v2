<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_akomodasi');
        $this->load->model('M_tempatWisata');
        $this->load->model('M_tempatWisata');
        $this->load->model('kategori_model');
        $this->load->model('M_event');
        $this->load->model('m_pesanan');
    }
    public function index($id)
    {
        if ($this->is_akomodasi($id)) {
            $data['akomodasi'] = $this->M_akomodasi->getDetail($id);
            $this->load->view('templates/header');            
            $this->load->view('user/pemesanan/index', $data);
            $this->load->view('templates/footer');
            
        } else {
            $data['event'] = $this->M_event->getDetail($id);
            $this->load->view('templates/header');  
            $this->load->view('user/pemesanan/index', $data);
            $this->load->view('templates/footer');
        }
    }
    private function is_akomodasi($id)
    {
        // Query ke database untuk mendapatkan jenis layanan berdasarkan ID Event
        $result = $this->db->get_where('akomodasi', ['id_akomodasi' => $id])->row();
        return $result;
    }
    public function get_all_kamar($id_akomodasi){

            $data['kamar'] = $this->M_akomodasi->get_all_kamar($id_akomodasi);
            //menampilkan view
            $this->load->view('templates/header');            
            $this->load->view('user/pemesanan/index', $data);
            $this->load->view('templates/footer');
        
    }
    
    public function pemesanan(){
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
}

/* End of file Pemesanan.php */
