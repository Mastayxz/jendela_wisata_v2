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
        $insert = array(
            'nama_kategori' => $this->input->post('nama_kategori')
        );
        $result = $this->db->insert('kategori', $insert);
        return $result;
    }
    public function editkategori()
    {
        $edit = array(
            'nama_kategori' => $this->input->post('nama_kategori')
        );
        $this->db->where('id_kategori', $this->input->post('id_kategori'));
        $result = $this->db->update('kategori', $edit);
        return $result;
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
}

/* End of file m_kategori.php */
