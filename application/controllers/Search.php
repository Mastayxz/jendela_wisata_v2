<?php
// application/controllers/Search.php

class Search extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SearchModel');
    }

    public function index()
    {
        $this->load->view('search_view');
    }

    public function search()
    {
        $keyword = $this->input->get('keyword');

        if (!empty($keyword)) {
            $data['results'] = $this->SearchModel->searchData($keyword);
        } else {
            $data['results'] = array();
        }

        $this->load->view('search_view', $data);
    }
}
