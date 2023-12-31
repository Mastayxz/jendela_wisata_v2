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
        $this->db->select('akomodasi.*, jenis_akomodasi.nama_jenis_akomodasi, tempat_wisata.nama_tempat_wisata');
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

    public function searchAkomodasi($keyword, $price)
    {
        $this->db->select('akomodasi.*, jenis_akomodasi.nama_jenis_akomodasi, tempat_wisata.nama_tempat_wisata');
        $this->db->from('akomodasi');
        $this->db->join('jenis_akomodasi', 'akomodasi.id_jenis_akomodasi = jenis_akomodasi.id_jenis_akomodasi');
        $this->db->join('tempat_wisata', 'akomodasi.id_tempat_wisata = tempat_wisata.id_tempat_wisata');

        $keyword = strtolower($keyword);

        $this->db->group_start();
        $this->db->like('LOWER(akomodasi.nama_akomodasi)', $keyword, false);
        $this->db->or_like('LOWER(tempat_wisata.nama_tempat_wisata)', $keyword);
        // Tambahkan kondisi pencarian lainnya sesuai kebutuhan
        $this->db->group_end();
        if ($price) {
            $this->db->where_in('harga_akomodasi <=', $price);
        }

        $query = $this->db->get();
        return $query->result();
    }

    public function filterByJenisAkomodasi($id_jenis_akomodasi)
    {
        $this->db->select('akomodasi.*, jenis_akomodasi.nama_jenis_akomodasi, tempat_wisata.nama_tempat_wisata');
        $this->db->from('akomodasi');
        $this->db->join('jenis_akomodasi', 'akomodasi.id_jenis_akomodasi = jenis_akomodasi.id_jenis_akomodasi');
        $this->db->join('tempat_wisata', 'akomodasi.id_tempat_wisata = tempat_wisata.id_tempat_wisata');

        if (!empty($id_jenis_akomodasi)) {
            $this->db->where('jenis_akomodasi.id_jenis_akomodasi', $id_jenis_akomodasi);  // Fix the typo
        }

        $query = $this->db->get();
        return $query->result();
    }

    // M_akomodasi.php

    // M_akomodasi.php

    public function filterByJenisDanHarga($id_jenis_akomodasi, $harga_min, $harga_max, $alamat)
    {
        $this->db->select('akomodasi.*, jenis_akomodasi.nama_jenis_akomodasi, tempat_wisata.nama_tempat_wisata');
        $this->db->from('akomodasi');
        $this->db->join('jenis_akomodasi', 'akomodasi.id_jenis_akomodasi = jenis_akomodasi.id_jenis_akomodasi');
        $this->db->join('tempat_wisata', 'akomodasi.id_tempat_wisata = tempat_wisata.id_tempat_wisata');
        $this->db->like('akomodasi.alamat_akomodasi', $alamat);
        $this->db->or_like('tempat_wisata.nama_tempat_wisata', $alamat);
        // Filter berdasarkan jenis akomodasi
        if (!empty($id_jenis_akomodasi) && $id_jenis_akomodasi != "semua") {
            $this->db->where('jenis_akomodasi.id_jenis_akomodasi', $id_jenis_akomodasi);
        }

        // Filter berdasarkan harga
        if (!empty($harga_min)) {
            $this->db->where('akomodasi.harga_akomodasi >=', $harga_min);
        }

        if (!empty($harga_max)) {
            $this->db->where('akomodasi.harga_akomodasi <=', $harga_max);
        }

        $query = $this->db->get();
        return $query->result();
    }



    /* End of file M_akomodasi.php */
}
