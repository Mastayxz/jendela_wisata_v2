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
    

}

/* End of file m_userinfo.php */
 ?>

 