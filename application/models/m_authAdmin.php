<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class m_authAdmin extends CI_Model {
    public function get_username($username){
        $adminAko = $this->db->get_where('admin_ako',array('username' => $username));
        return $adminAko->row_array();
    }
    public function get_email ($email){
        $adminAko = $this->db->get_where('admin_ako',array('email'=>$email));
        return $adminAko->row_array();
    }
    public function insertAdmin($data){
        $insert = $this->db->insert('admin_ako',$data);
        return $insert;
    }
    public function insertAko($data){
        $insert = $this->db->insert('akomodasi',$data);
        return $insert;
    }
    public function insertEvent($data){
        $insert = $this->db->insert('event',$data);
        return $insert;
    }
    public function insertDes($data){
        $insert = $this->db->insert('tempat_wisata',$data);
        return $insert;
    }


}

/* End of file m_authAdmin.php */

?>