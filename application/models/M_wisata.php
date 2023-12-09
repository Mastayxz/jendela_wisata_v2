<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_wisata extends CI_Model
{

    public function get_destinasi_by_filter($kategori, $harga, $lokasi)
    {
        $this->db->select('*');
        $this->db->from('tempat_wisata');
        if (!empty($kategori)) {
            $this->db->where_in('kategori_tempat', $kategori);
        }
        if ($harga) {
            $this->db->where_in('harga_trmpat <=', $harga);
        }
        if (!empty($lokasi)) {
            $this->db->where_in('lokasi_tempat', $lokasi);
        }
        return $this->db->get()->result();
    }
}

/* End of file ModelName.php */
