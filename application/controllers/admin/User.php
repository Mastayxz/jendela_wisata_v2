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
        $data['page_title'] = 'user';
        $data['user'] = $this->m_user->getuser();
        $this->load->view('admin/dashboard/member/dashuser', $data);
    }

    public function searchUser()
    {
        $keyword = $this->input->post('table_search');
        $data['user'] = $this->m_user->searchUser($keyword);
        $data['page_title'] = 'User';
        $this->load->view('admin/dashboard/member/dashuser', $data);


        //     try {
        //         $keyword = $this->input->post('table_search');
        //         if (empty($keyword) || strlen($keyword) < 3) {
        //             $data['user'] = $this->m_user->searchUser();
        //         } else {
        //         }
        //         $this->load->view('admin/dashboard/user/user_ajax', $data);
        //     } catch (Exception $e) {
        //         error_log('Error in search_ajax: ' . $e->getMessage());
        //     }
    }
}


/* End of file user.php */
