<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_event extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function getData()
    {
        $this->db->select('event.*, tempat_wisata.nama');
        $this->db->from('event');
        $this->db->join('tempat_wisata', 'event.id_tempat_wisata = tempat_wisata.id_tempat_wisata');
        $query = $this->db->get();
        return $query->result();
    }

    public function insertData($insert)
    {
        return $this->db->insert('event', $insert);
    }

    public function getDetail($id_event)
    {
        $this->db->where('id_event', $id_event);
        $result = $this->db->get('event')->result_array();
        return $result[0];
    }
    public function updateData($edit, $id_event)
    {
        $this->db->where('id_event', $id_event);
        $this->db->update('event', $edit);
    }
    public function deleteData($id_event)
    {
        $this->db->where('id_event', $id_event);
        $this->db->delete('event');
    }
    public function searchEvents($keyword)
    {
        $this->db->select('event.*, tempat_wisata.nama');
        $this->db->from('event');
        $this->db->join('tempat_wisata', 'event.id_tempat_wisata = tempat_wisata.id_tempat_wisata', 'left');
        $this->db->like('LOWER(nama_event)', strtolower($keyword), false);
        $this->db->or_like('event.alamat_event', $keyword);
        $this->db->or_like('tempat_wisata.nama', $keyword);
        // Tambahkan kondisi pencarian lainnya sesuai kebutuhan

        $query = $this->db->get();
        return $query->result();
    }
}

/* End of file M_event.php */
