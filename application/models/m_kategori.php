<?php

defined('BASEPATH') or exit('No direct script access allowed');

class m_kategori extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    public function getkategori()
    {
        $result = $this->db->get('kategori');
        return $result->result();
    }
    public function insertkategori()
    {
        $kategori = $this->input->post('nama_kategori');
        $existing_data = $this->db->get_where('kategori', array('nama_kategori' => $kategori))->row();

        if ($existing_data) {
            // Data sudah ada, beri respons atau tindakan sesuai kebutuhan
            return false;
        } else {
            // Data belum ada, lakukan penyisipan
            $insert = array(
                'nama_kategori' => $kategori
            );
            $result = $this->db->insert('kategori', $insert);
            return $result;
        }
    }
    public function editkategori()
    {
        $kategori = $this->input->post('nama_kategori');
        $existing_data = $this->db->get_where('kategori', array('nama_kategori' => $kategori))->row();

        if ($existing_data) {
            // Data sudah ada, beri respons atau tindakan sesuai kebutuhan
            return false;
        } else {
            // Data belum ada, lakukan penyisipan
            $edit = array(
                'nama_kategori' => $kategori
            );
            $this->db->where('id_kategori', $this->input->post('id_kategori'));
            $result = $this->db->update('kategori', $edit);
            return $result;
        }
    }
    public function deletekategori($id)
    {
        $this->db->where('id_kategori', $id);
        $result = $this->db->delete('kategori');
        return $result;
    }
    public function detailkategori($id)
    {
        $this->db->where('id_kategori', $id);
        $result = $this->db->get('kategori')->result_array();
        return $result[0];
    }
    public function searchkategori($keyword)
    {
        $this->db->like('LOWER(nama_kategori)', $keyword, false);


        $query = $this->db->get('kategori');
        return $query->result();
    }
}

/* End of file m_kategori.php */
