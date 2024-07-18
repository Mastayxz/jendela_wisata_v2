<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Info extends CI_Controller
{

    public function index()
    {
        $data['page_title'] = 'Info Admin';
        $data['admin_data'] = $this->session->userdata('admin_data'); // Ambil data admin dari session
        // $this->load->view('admin_ako/templates/header', $data);
        $this->load->view('admin/info/index', $data);
        // $this->load->view('admin_ako/templates/footer');
    }
}

/* End of file Info.php */
