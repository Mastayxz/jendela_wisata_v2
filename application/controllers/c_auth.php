<?php

defined('BASEPATH') or exit('No direct script access allowed');

class c_auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_auth');
    }

    public function index()
    {

        $this->form_validation->set_rules('username_or_email', 'Username or Email', 'trim|required', array(
            'required' => 'please fill this column'
        ));
        $this->form_validation->set_rules('password', 'Password', 'trim|required', array(
            'required' => 'please fill this column'
        ));

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Jendela wisata login';
            $this->load->view('templates/header', $data);
            $this->load->view('auth/v_login');
            $this->load->view('templates/footer');
        } else {
            $this->_login();
        }
    }
    private function _login()
    {
        $username_or_email = htmlspecialchars($this->input->post('username_or_email'));
        $password = htmlspecialchars($this->input->post('password'));


        //cek inputan berupa email atau username 
        if (filter_var($username_or_email, FILTER_VALIDATE_EMAIL)) {
            $user = $this->m_auth->get_email($username_or_email);
        } else {
            $user = $this->m_auth->get_username($username_or_email);
        }

        //jika ada username
        if ($user) {
            //cek password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'id_user' => $user['id_user'],
                    'username' => $user['username'],
                    'nama' => $user['nama'],
                    'email' => $user['email'],
                    'tlp_user' => $user['tlp_user'],
                    'tgl_lahir' => $user['tgl_lahir']
                ];
                $this->session->set_userdata($data);
                redirect('user/tempat_wisata');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger " role="alert">
                Wrong password</div>');
                redirect('c_auth/index');
            }
        } else {
            //jika username tidak ada
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
           Username does not exist</div>');
            redirect('c_auth/index');
        }
    }


    public function register()
    {   
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[user.username]', array(
            'is_unique' => 'Username already exist'
        ));
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|matches[password1]', array(
            'matches' => 'Password are not the same ',
            'min_length' => 'Password is not long enough'
        ));
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]', array(
            'is_unique' => 'Email already exist'
        ));
        $this->form_validation->set_rules('telephone', 'Telephone', 'trim|required');
        $this->form_validation->set_rules('birthday', 'Birthday', 'trim|required');



        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Jendela Register';
            $this->load->view('templates/header', $data);
            $this->load->view('auth/v_register');
            $this->load->view('templates/footer');
        } else {
            $username = htmlspecialchars($this->input->post('username'));
            $password = htmlspecialchars(password_hash($this->input->post('password'), PASSWORD_DEFAULT));
            $nama =  htmlspecialchars($this->input->post('nama'));
            $email = htmlspecialchars($this->input->post('email'));
            $tlp_user = htmlspecialchars($this->input->post('telephone'));
            $tgl_lahir = htmlspecialchars($this->input->post('birthday'));
            $date_user = time();

            $data = array(
                'username' => $username,
                'password' => $password,
                'nama' => $nama,
                'email' => $email,
                'tlp_user' => $tlp_user,
                'tgl_lahir' => $tgl_lahir,
                'date_user' => $date_user

            );
            //  var_dump($data);die;

            $subject = 'Pesan';
            $message = '<html>
                <h2>Aktivasi Akun</h2>
                <p>Akun anda sudah dibuat</p>
                <html>';

            //models
            $insert = $this->m_auth->insertUser($data);
            //pengecekan 
            if (isset($insert)) {
                $this->send_email($email, $subject, $message);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                    Account has been created</div>');
                redirect('c_auth/index');
            } else {
                redirect('c_auth/register');
            }
        }
    }

    public function forgot_pass()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Jendela wisata';
            $this->load->view('templates/header', $data);
            $this->load->view('auth/v_forgot');
            $this->load->view('templates/footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->m_auth->get_email($email);

            $link = base_url('c_auth/edit');
            $subject = 'lupa Password';
            $message =
                "<html>
                <p>Silahkan klik link di bawah ini </p>
                <a href='$link'>Ganti password</a>
                <html>";


            if ($user) {
                $this->session->set_userdata('riset', $email);
                $this->send_email($email, $subject, $message);
                $this->edit();
                if (isset($email)) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">    
                    Please check your email </div>');
                    redirect('c_auth/forgot_pass');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Please check your email </div>');
                    redirect('c_auth/index');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Your email is not found </div>');
                redirect('c_auth/forgot_pass');
            }
        }
    }
    public function edit()
    {


        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|matches[password1]', array(
            'min_length' => 'Password is to short',
            'matches' => 'Password is not same'

        ));
        $this->form_validation->set_rules('password1', 'Password1', 'trim|required|min_length[3]|matches[password]', array(
            'min_length' => 'Password is to short',
            'matches' => 'Password is not same'
        ));

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Change Password ';
            $this->load->view('templates/header', $data);
            $this->load->view('auth/v_edit');
            $this->load->view('templates/footer');
        } else {

            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('riset');

            //sql
            $this->m_auth->editPassword($email, $password);

            $this->session->unset_userdata('riset');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success " role="alert">
            Your password has been changed!</div>');
            redirect('c_auth/index');
        }
    }
    public function send_email($to, $subject, $message)
    {
        $this->email->set_newline("\r\n");
        $this->email->from('alimanbudi@gmail.com', 'Jendela Wisata');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
            // return show_error($this->email->print_debugger());
        }
    }



    public function logout()
    {
        session_destroy();
        redirect('homecontrol');
    }
}
