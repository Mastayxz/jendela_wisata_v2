<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_akomodasi extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function getData()
    {
        $this->db->select('akomodasi.*, jenis_akomodasi.nama_jenis_akomodasi, tempat_wisata.nama');
        $this->db->from('akomodasi');
        $this->db->join('jenis_akomodasi', 'akomodasi.id_jenis_akomodasi = jenis_akomodasi.id_jenis_akomodasi');
        $this->db->join('tempat_wisata', 'akomodasi.id_tempat_wisata = tempat_wisata.id_tempat_wisata');
        $query = $this->db->get();
        return $query->result();
    }

    public function getJenisAkomodasi()
    {
        $this->db->select('*');
        $this->db->from('jenis_akomodasi');
        $this->db->order_by('id_jenis_akomodasi', 'asc');
        return $this->db->get()->result();
    }

    public function insertData($insert)
    {

        return $this->db->insert('akomodasi', $insert);
    }
    public function getDetail($id)
    {
        $this->db->where('id_akomodasi', $id);
        $result = $this->db->get('akomodasi')->result_array();
        return $result[0];
    }

    public function updateData($edit, $id_akomodasi)
    {
        $this->db->where('id_akomodasi', $id_akomodasi);
        $this->db->update('akomodasi', $edit);
    }
    public function deleteData($id_akomodasi)
    {
        $this->db->where('id_akomodasi', $id_akomodasi);
        $this->db->delete('akomodasi');
    }

    public function searchAkomodasi($keyword)
    {
        $this->db->select('akomodasi.*, jenis_akomodasi.nama_jenis_akomodasi, tempat_wisata.nama');
        $this->db->from('akomodasi');
        $this->db->join('jenis_akomodasi', 'akomodasi.id_jenis_akomodasi = jenis_akomodasi.id_jenis_akomodasi');
        $this->db->join('tempat_wisata', 'akomodasi.id_tempat_wisata = tempat_wisata.id_tempat_wisata');

        $keyword = strtolower($keyword);

        $this->db->group_start();
        $this->db->like('LOWER(akomodasi.nama_akomodasi)', $keyword, false);
        $this->db->or_like('LOWER(tempat_wisata.nama)', $keyword);
        // Tambahkan kondisi pencarian lainnya sesuai kebutuhan
        $this->db->group_end();

        $query = $this->db->get();
        return $query->result();
    }

    /* End of file M_akomodasi.php */
}
