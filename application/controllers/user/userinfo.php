<?php

defined('BASEPATH') or exit('No direct script access allowed');

class userinfo extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_userinfo');
    }
    public function index()
    {
        $id_user = $this->session->userdata('id_user');
        $data['page_title'] = 'User Info';
        $data['user'] = $this->m_userinfo->getDetail($id_user);
        $this->load->view('templates/footer');
        $this->load->view('user/userinfo/userinfo', $data);
        $this->load->view('templates/header');
    }
}

/* End of file Controllername.php */
