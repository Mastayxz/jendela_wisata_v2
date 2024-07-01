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
        $this->db->select('event.*, tempat_wisata.nama_tempat_wisata, tempat_wisata.lokasi_tempat_wisata');
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
        $this->db->select('event.*, tempat_wisata.nama_tempat_wisata');
        $this->db->from('event');
        $this->db->join('tempat_wisata', 'event.id_tempat_wisata = tempat_wisata.id_tempat_wisata', 'left');
        $this->db->like('LOWER(nama_event)', strtolower($keyword), false);
        $this->db->or_like('event.alamat_event', $keyword);
        $this->db->or_like('tempat_wisata.nama_tempat_wisata', $keyword);
        // Tambahkan kondisi pencarian lainnya sesuai kebutuhan

        $query = $this->db->get();
        // echo 'SQL Query: ' . $this->db->last_query() . '<br>';
        return $query->result();
    }

    public function get_event_by_filter($alamat_event, $jam_buka, $jam_tutup, $harga_max)
    {
        $this->db->select('event.*, tempat_wisata.nama_tempat_wisata');
        $this->db->from('event');
        $this->db->join('tempat_wisata', 'event.id_tempat_wisata = tempat_wisata.id_tempat_wisata', 'left');

        $this->db->group_start(); // Group start for OR condition
        $this->db->like('event.alamat_event', $alamat_event);
        $this->db->or_like('tempat_wisata.nama_tempat_wisata', $alamat_event);
        $this->db->group_end(); // Group end for OR condition

        if (!empty($jam_buka)) {
            $this->db->where('event.jam_buka >=', $jam_buka);
        }

        if (!empty($jam_tutup)) {
            $this->db->where('event.jam_tutup <=', $jam_tutup);
        }

        if (!empty($harga_max)) {
            $this->db->where('event.biaya_event <=', $harga_max);
        }

        $query = $this->db->get();
        // echo 'SQL Query: ' . $this->db->last_query() . '<br>';
        return $query->result();
    }

    public function getEventsByDestination($destination_id)
    {
        // Assuming you have a table named 'event' in your database
        $this->db->where('id_tempat_wisata', $destination_id);
        $query = $this->db->get('event');

        return $query->result_array();
    }
    public function kurangiStokTiket($id_event, $jumlah_orang)
    {
        $this->db->set('stok_tiket', 'stok_tiket - ' . (int) $jumlah_orang, FALSE);
        $this->db->where('id_event', $id_event);
        return $this->db->update('event');
    }

    public function getStokTiket($id_event)
    {
        $this->db->select('stok_tiket');
        $this->db->from('event');
        $this->db->where('id_event', $id_event);
        $query = $this->db->get();
        return $query->row_array();
    }
}

/* End of file M_event.php */
