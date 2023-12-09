<?php

defined('BASEPATH') or exit('No direct script access allowed');

class m_user extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    public function getuser()
    {
        $result = $this->db->get('user');
        return $result->result();
    }
    public function insertuser()
    {
        $insert = array(
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'nama' => $this->input->post('nama')
        );
        $result = $this->db->insert('user', $insert);
        return $result;
    }
    public function edituser()
    {
        $edit = array(
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'nama' => $this->input->post('nama')
        );
        $this->db->where('id_user', $this->input->post('id_user'));
        $result = $this->db->update('user', $edit);
        return $result;
    }
    public function deleteuser($id)
    {
        $this->db->where('id_user', $id);
        $result = $this->db->delete('user');
        return $result;
    }
    public function detailuser($id)
    {
        $this->db->where('id_user', $id);
        $result = $this->db->get('user')->result_array();
        return $result[0];
    }

    public function searchUser($keyword)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->like('username', $keyword);
        $query = $this->db->get();
        return $query->result();
    }
}

/* End of file m_admin.php */
