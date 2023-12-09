<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pemesanan extends CI_Model
{
    public function insert_pemesanan($data)
    {
        $this->db->insert('pemesanan', $data);
    }

    public function get_harga_event($id_event)
    {
        $query = $this->db->get_where('event', array('id_event' => $id_event));
        $result = $query->row();
        return $result->harga_tiket; // Ganti dengan nama kolom yang sesuai di tabel event
    }

    public function get_harga_wisata($id_tempat_wisata)
    {
        $query = $this->db->get_where('tempat_wisata', array('id_tempat_wisata' => $id_tempat_wisata));
        $result = $query->row();
        return $result->harga_tiket; // Ganti dengan nama kolom yang sesuai di tabel tempat_wisata
    }
}

/* End of file M_pemesanan.php */
