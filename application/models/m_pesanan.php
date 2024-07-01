<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pesanan extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function simpan_pesanan_destinasi($data)
    {
        $this->db->insert('pemesanan_destinasi', $data);
        return $this->db->insert_id();
    }
    public function cancel_pesanan_destinasi($id_pemesanan)
    {
        $this->db->where('id_pemesanan', $id_pemesanan);
        $this->db->update('pemesanan_destinasi', ['status' => 2]);
    }
    public function get_detail_pesanan_destinasi($id_tempat_wisata)
    {
        $this->db->where('id_tempat_wisata', $id_tempat_wisata);
        $query = $this->db->get('pemesanan_destinasi');
        return $query->result_array();
    }

    public function get_pesanan_destinasi($id_pemesanan)
    {
        return $this->db->get_where('pemesanan_destinasi', ['id_pemesanan' => $id_pemesanan])->row_array();
    }

    public function simpan_pesanan_akomodasi($data)
    {
        $this->db->insert('pemesanan_akomodasi', $data);
        return $this->db->insert_id();
    }

    public function get_pesanan_akomodasi($id_pemesanan)
    {
        return $this->db->get_where('pemesanan_akomodasi', ['id_pemesanan_akomodasi' => $id_pemesanan])->row_array();
    }

    public function cancel_pesanan_akomodasi($id_pemesanan)
    {
        $this->db->where('id_pemesanan_akomodasi', $id_pemesanan);
        $this->db->update('pemesanan_akomodasi', ['status' => 'cancel']);
    }

    public function simpan_pesanan_event($data)
    {
        $this->db->insert('pemesanan_event', $data);
        return $this->db->insert_id();
    }

    public function get_pesanan_event($id_pemesanan)
    {
        $this->db->where('id_pemesanan', $id_pemesanan);
        return $this->db->get('pemesanan_event')->row_array();
    }


    public function cancel_pesanan_event($id_pemesanan)
    {
        $this->db->where('id_pemesanan', $id_pemesanan);
        $this->db->update('pemesanan_event', ['status' => 2]);
    }

    // Fungsi untuk mendapatkan detail pemesanan destinasi berdasarkan ID
    public function getDetailPesananDestinasi($id_tempat_wisata)
    {

        $this->db->where('id_tempat_wisata', $id_tempat_wisata);
        $query = $this->db->get('pemesanan_destinasi');
        return $query->result_array();
    }
    public function getDetailPesananEvent($id_event)
    {

        $this->db->where('id_event', $id_event);
        $query = $this->db->get('pemesanan_event');
        return $query->result_array();
    }



    public function get_metode_pembayaran()
    {
        return $this->db->get('metode_pembayaran')->result_array();
    }
}
