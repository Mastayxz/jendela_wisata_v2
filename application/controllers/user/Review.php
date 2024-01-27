<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Review extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Review_model');
    }

    public function index()
    {
        // Fetch reviews from the database
        $data['reviews'] = $this->Review_model->get_reviews();

        // Load your home view and pass the review data
        $this->load->view('user/home', $data);
    }
    public function insert_review()
    {
        // Check if the user is logged in
        if (!$this->session->userdata('id_user')) {
            // Set a flash message to inform the user to log in
            $this->session->set_flashdata('error', 'You must be logged in to submit a review.');

            // Redirect to the login page or any other page you prefer
            redirect('c_auth'); // Adjust 'login' to your login controller/method
        }

        // Handle form submission
        if ($this->input->post()) {
            $data = array(
                'id_user' => $this->session->userdata('id_user'),
                'review' => $this->input->post('review'),
                'rating' => $this->input->post('rating'),
            );

            // Validate your form data if necessary

            // Insert the review into the database
            $this->Review_model->insert_review($data);

            // You can redirect to a success page or load a view here
            // For example, redirect('success_page');
        }

        // Load your view here (you need to adjust the view file path according to your structure)
        // $this->load->view('path_to_your_view');
    }
}
