<?php

defined('BASEPATH') or exit('No direct script access allowed');

class m_jenis_akomodasi extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    public function getjenis_akomodasi()
    {
        $result = $this->db->get('jenis_akomodasi');
        return $result;
    }
    public function insertjenis_akomodasi()
    {
        $insert = array(
            'nama_jenis_akomodasi' => $this->input->post('jenis_akomodasi')
        );
        $result = $this->db->insert('jenis_akomodasi', $insert);
        return $result;
    }
    public function editjenis_akomodasi()
    {
        $edit = array(
            'nama_jenis_akomodasi' => $this->input->post('jenis_akomodasi')
        );
        $this->db->where('id_jenis_akomodasi', $this->input->post('id_jenis_akomodasi'));
        $result = $this->db->update('jenis_akomodasi', $edit);
        return $result;
    }
    public function deletejenis_akomodasi($id)
    {
        $this->db->where('id_jenis_akomodasi', $id);
        $result = $this->db->delete('jenis_akomodasi');
        return $result;
    }
    public function detailjenis_akomodasi($id)
    {
        $this->db->where('id_jenis_akomodasi', $id);
        $result = $this->db->get('jenis_akomodasi')->result_array();
        return $result[0];
    }
}

/* End of file m_jenis_akomodasi.php */
