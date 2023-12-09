<?php

defined('BASEPATH') or exit('No direct script access allowed');

class m_admin extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    public function getadmin()
    {
        $result = $this->db->get('admin');
        return $result->result();
    }
    public function insertadmin()
    {
        $insert = array(
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT), // Use MD5 for password
            'nama_admin' => $this->input->post('nama_admin')
        );
        $result = $this->db->insert('admin', $insert);
        return $result;
    }
    public function editadmin()
    {
        $edit = array(
            'email' => $this->input->post('email'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')), // Use MD5 for password
            'nama_admin' => $this->input->post('nama_admin')
        );
        $this->db->where('id_admin', $this->input->post('id_admin'));
        $result = $this->db->update('admin', $edit);
        return $result;
    }
    public function deleteadmin($id)
    {
        $this->db->where('id_admin', $id);
        $result = $this->db->delete('admin');
        return $result;
    }
    public function detailadmin($id)
    {
        $this->db->where('id_admin', $id);
        $result = $this->db->get('admin')->result_array();
        return $result[0];
    }
    // File: application/models/M_admin.php

    public function searchAdmin($keyword)
    {
        $this->db->like('LOWER(username)', $keyword, false);
        $this->db->or_like('LOWER(nama_admin)', strtolower($keyword), false);
        $this->db->or_like('LOWER(email)', strtolower($keyword), false);

        $query = $this->db->get('admin');
        return $query->result();
    }
}

/* End of file m_admin.php */
