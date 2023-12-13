<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class m_auth extends CI_Model {
    
        public function get_username($username)
        {
            $user = $this->db->get_where('user',array('username' => $username));
            return $user->row_array();
        }
        public function get_email($email)
        {
            $user = $this->db->get_where('user',array('email'=>$email));
            return $user->row_array();
        }
        
    
    }
    
    /* End ofmfile .php */
    

?>