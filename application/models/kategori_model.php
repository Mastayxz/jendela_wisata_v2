<?php
defined('BASEPATH') or exit('No direct script access allowed');


class kategori_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }


    public function getKategori()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->order_by('id_kategori', 'asc');
        return $this->db->get()->result();
    }

    public function getKategoriByTempatWisata($id_tempat_wisata)
    {
        // Fungsi untuk mendapatkan kategori berdasarkan id_tempat_wisata
        $this->db->select('kategori.nama_kategori');
        $this->db->from('kategori_wisata');
        $this->db->join('kategori', 'kategori_wisata.id_kategori = kategori.id_kategori');
        $this->db->where('kategori_wisata.id_tempat_wisata', $id_tempat_wisata);

        $query = $this->db->get();
        return $query->result_array();
    }
}
