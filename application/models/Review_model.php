<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Review_model extends CI_Model
{

    public function insert_review($data)
    {
        // Insert the review data into the database
        $this->db->insert('review', $data);
    }
    public function get_reviews()
    {
        // Fetch reviews from the database
        $query = $this->db->get('review');
        return $query->result_array();
    }
}
