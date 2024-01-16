<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class m_userinfo extends CI_Model {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function getinfo()
    {
        $result = $this->db->get_where('user');
        return $result->row_array();
    }
    public function getDetail($id)
    {
        $this->db->where('id_user', $id);
        $result = $this->db->get('user')->result_array();
        return $result[0];
    }
    public function edituser()
    {
        $id_user = $this->session->userdata('id_user');
        $data = $this->m_userinfo->getinfo();

        $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'nama' => $this->input->post('nama'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'tlp_user' => $this->input->post('tlp_user')               
        );
        var_dump($data);
        $this->db->where('id_user', $id_user);
        $result = $this->db->update('user', $data);
        return $result;

        redirect('user/userinfo'); 
    }

}


/* End of file m_userinfo.php */

 