<?php

defined('BASEPATH') or exit('No direct script access allowed');

class editinfo extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_userinfo');
        $this->load->library('session');
    }
    public function index()
    {
        $id_user = $this->session->userdata('id_user');
        $data['page_title'] = 'Edit Info';
        $data['user'] = $this->m_userinfo->getDetail($id_user);
        $this->load->view('templates/footer');
        $this->load->view('user/userinfo/editinfo', $data);
        $this->load->view('templates/header');
    }
    public function edituser()
    {
        $this->m_userinfo->edituser();
        redirect('user/userinfo');
    }
}

