<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class userinfo extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_userinfo');
    }
    public function index()
    {
        $data['page_title'] = 'User Info';
        $data['user'] = $this->m_userinfo->getinfo();
        $this->load->view('templates/footer');
        $this->load->view('user/userinfo', $data);
        $this->load->view('templates/header');
    }
    
}

/* End of file Controllername.php */
 ?>