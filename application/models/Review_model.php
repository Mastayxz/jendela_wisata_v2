<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Review_model extends CI_Model
{

    public function insert_review($data)
    {

        // Insert the review data into the database
        $query = $this->db->insert('review', $data);
        return $query;
    }
    public function get_reviews()
    {
        $this->db->select('review.*, user.nama as user_name');
        $this->db->from('review');
        $this->db->join('user', 'user.id_user = review.id_user', 'left'); // Adjust the join condition accordingly
        $query = $this->db->get();

        return $query->result_array();
    }
}
