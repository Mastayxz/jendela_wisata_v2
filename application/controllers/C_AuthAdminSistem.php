<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_AuthAdminSistem extends CI_Controller
{
    public function index()
    {

        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Admin Login';
            $this->load->view('templates/header', $data);
            $this->load->view('auth/v_loginadmin');
            $this->load->view('templates/footer');
        } else {
            $this->_login();
        }
    }
    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        //sql 
        $result = $this->db->get_where('admin', ['email' => $email]);
        $admin = $result->row_array();

        // Check if the admin exists
        if ($admin) {
            // Verify the entered password with the hashed password from the database
            if (password_verify($password, $admin['password'])) {
                // Set session for admin
                $data = [
                    'email' => $admin['email'],
                    'username' => $admin['username'],
                    'nama_admin' => $admin['nama_admin'],
                ];
                $this->session->set_userdata('admin_data', $data);
                $this->session->set_userdata('admin_name', $admin['nama_admin']);
                redirect('admin/dashboard');
            } else {
                // Wrong password
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Wrong password</div>');
                redirect('c_authadminsistem/index');
            }
        } else {
            // Admin not found
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
        Email atau password tidak valid </div>');
            redirect('c_authadminsistem/index');
        }
    }


    public function logout()
    {
        if ($this->input->is_ajax_request()) {
            // This block will be executed when the request is AJAX (triggered by SweetAlert)
            session_destroy();
            echo json_encode(['status' => 'success']);
            exit;
        }

        // If it's a regular request, show the SweetAlert confirmation
        $this->load->view('logout_confirmation');
    }
}

/* End of file C_AuthAdminAko.php */
