<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
    }

    public function index()
    {

        $data['user'] = $this->m_user->getuser();
        $data['page_title'] = 'Admin';
        $this->load->view('admin/dashboard/member/dashuser', $data);
    }
}

/* End of file user.php */
