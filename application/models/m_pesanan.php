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


    public function get_pesanan_akomodasi($id_akomodasi)
    {
        $this->db->where('id_akomodasi', $id_akomodasi);
        $query = $this->db->get('pemesanan_akomodasi');
        return $query->result_array();
    }

    public function get_pesanan_event($id_event)
    {
        $this->db->where('id_event', $id_event);
        $query = $this->db->get('pemesanan_event');
        return $query->result_array();
    }

    public function get_pesanan_destinasi($id_tempat_wisata)
    {
        $this->db->where('id_tempat_wisata', $id_tempat_wisata);
        $query = $this->db->get('pemesanan_destinasi');
        return $query->result_array();
    }
}
