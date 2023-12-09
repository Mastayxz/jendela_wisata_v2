<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_wishlist extends CI_Model
{

    public function addToWishlist($data)
    {
        $this->db->insert('wishlist', $data);
    }

    public function getWishlist($user_id)
    {
        $this->db->select('*');
        $this->db->from('wishlist');
        $this->db->where('id_user', $user_id);
        return $this->db->get()->result_array();
    }
}

/* End of file M_wishlist.php */
