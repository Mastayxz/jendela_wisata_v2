<?php

class SearchModel extends CI_Model
{
    public function searchData($keyword)
    {
        $this->db->select('nama_tempat_wisata as nama, deskripsi_tempat_wisata as deskripsi, "tempat wisata" as jenis');
        $this->db->from('tempat_wisata');
        $this->db->like('nama_tempat_wisata', $keyword);
        $this->db->or_like('deskripsi_tempat_wisata', $keyword);

        $this->db->union();

        $this->db->select('nama_event as nama, deskripsi_event as deskripsi, "event" as jenis');
        $this->db->from('event');
        $this->db->like('nama_event', $keyword);
        $this->db->or_like('deskripsi_event', $keyword);

        $this->db->union();

        $this->db->select('nama_akomodasi as nama, deskripsi_akomodasi as deskripsi, "akomodasi" as jenis');
        $this->db->from('akomodasi');
        $this->db->like('nama_akomodasi', $keyword);
        $this->db->or_like('deskripsi_akomodasi', $keyword);

        $query = $this->db->get();
        return $query->result();
    }
}
