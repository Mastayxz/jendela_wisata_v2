<?php

defined('BASEPATH') or exit('No direct script access allowed');

class admininfo extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admininfo');
    }
    public function index()
    {
        $data['page_title'] = 'Admin Info';
        $data['admin'] = $this->m_admininfo->getinfo();
        $this->load->view('admin/admininfo/admininfo', $data);
    }
}
