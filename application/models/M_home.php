<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_home extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    public function get_all_kategori()
    {

        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->order_by('id_kategori', 'desc');
        return $this->db->get()->result();
    }

    public function get_all_lokasi()
    {

        $this->db->select('*');
        $this->db->from('lokasi');
        $this->db->order_by('id_lokasi', 'desc');
        return $this->db->get()->result();
    }
}

/* End of file ModelName.php */
