<?php

defined('BASEPATH') or exit('No direct script access allowed');

class c_authadmin extends CI_Controller
{

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_authAdmin');
        $this->load->library('session');
        
        
    }
    
    public function index()
    {
        $this->form_validation->set_rules('email_or_username', 'Email or Username', 'trim|required',array(
            'required' => 'please fill this column'
        ));
        
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]',array(
            'required' => 'please fill this column',
            'min_length' => 'password length must 6',
            
        ));


        if ($this->form_validation->run() == FALSE) {
            # code...
            $title['title'] = 'Admin Login';
            $this->load->view('templates/header', $title);
            $this->load->view('admin/authAdmin/loginAdmin');
            $this->load->view('templates/footer');
            
        } else {
            
            //function login
            $this->_login();
        } 
        
    }

    private function _login(){
        $email_or_username = htmlspecialchars($this->input->post('email_or_username')); 
        $password = htmlspecialchars( $this->input->post('password'));
    
        if (filter_var($email_or_username,FILTER_VALIDATE_EMAIL)){
            $adminAko = $this->m_authAdmin->get_email($email_or_username); 
        }else{
            $adminAko = $this->m_authAdmin->get_username($email_or_username);
        }
        //mengecek terdapat username pada database 
        if($adminAko){
            //mengecek password
            if(password_verify($password,$adminAko['password'])){
                $data = array(
                    'email' => $adminAko['email'],
                    'username' => $adminAko['username'],
                    'nama_ako' => $adminAko['nama_ako'],
                    'jenis_admin' => $adminAko['jenis_admin'],
                    'akomodasi' => $adminAko['akomodasi'],
                    'event' => $adminAko['event'],
                    'tempat_wisata' => $adminAko['tempat_wisata'],
                );
                $this->session->set_userdata('admin_data',$data);

                //redirect ke halaman dashboard admin
                redirect('admin_ako/dashboard');// nanti ganti banng
                
            }else{
                //memberikan pesan kesalahan password 
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Check your password</div>');
                redirect('c_authAdmin/index');
            }
        }else{
            //memberikan pesan bahwa email atau username tidak ada 
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            email dan username tidak ada</div>');
            redirect('c_authAdmin/index');

        }
    }


    //-------------------------tambah admin step----------------

    // /-----------------step 1 memilih jenis ----------------------------------
    public function step1 (){
       $this->form_validation->set_rules('jenisAdmin', 'Jenis Admin', 'trim|required',array(
        'required' => 'please select option'
       ));
       
        if ($this->form_validation->run() ==  FALSE) {
            # code...
            $title['title'] = 'Admin Register';
            $this->load->view('templates/header',$title);
            $this->load->view('admin/authAdmin/stepRegis/step1Jenis');
            $this->load->view('templates/footer');
            
        } else {
            # code...
            //mendapatkan post dari view step 2 dan meyimpan ke dalam array
            $jenisAdmin = $this->input->post('jenisAdmin');
            $this->session->set_userdata('jenisAdmin',$jenisAdmin);
            // mengecek apakah dia akomo,event,destination.
            if ($jenisAdmin == 'akomodasi'){
                redirect('c_authadmin/step2Ako');
            }else if($jenisAdmin == 'event'){
                redirect('c_authadmin/step2Event');
            }else if($jenisAdmin == 'destinasi'){
                redirect('c_authadmin/step2Des');
            }
            // array disimpan sementara ke session
        }
        
    }  
        // -----------------------step 2 Akomodasi------------------------------------
    public function step2Ako(){
        //mengecek session apakah ada atau tidak 
        $jenisAdmin = $this->session->userdata('jenisAdmin');
        if ($jenisAdmin === NULL) {
            echo "Session jenisAdmin tidak tersedia setelah redirect.";
            exit;  // Berhenti untuk debugging
        } else {
            echo "Session jenisAdmin tersedia: " . $jenisAdmin;
        }

        $this->form_validation->set_rules('nama_admin', 'Name Admin', 'trim|required',array(
            'required' => 'please fill this column'
        ));
        $this->form_validation->set_rules('nama_akomodasi', 'Name Akomodasi', 'trim|required',array(
            'required' => 'please fill this column',
            
        ));
        
        
        if ($this->form_validation->run() == FALSE) {
            $title['title'] = 'Admin Register';
            $this->load->view('templates/header',$title);
            $this->load->view('admin/authAdmin/stepRegis/akomodasi/step2');
            $this->load->view('templates/footer');
        } else {
            $akomodasiData = array(
                'nama_akomodasi' => htmlspecialchars($this->input->post('nama_akomodasi')),
                'harga_akomodasi' => htmlspecialchars($this->input->post('harga_akomodasi')),
                'alamat_akomodasi' => htmlspecialchars($this->input->post('alamat_akomodasi')),
                'deskripsi_akomodasi' => htmlspecialchars($this->input->post('deskripsi_akomodasi')),
                // dll.
            );
            $this->m_authAdmin->insertAko($akomodasiData);
            // //mengambil id dari table akomodasi
            $akomodasi_id = $this->db->insert_id();
            $this->session->set_userdata('akomodasi_id',$akomodasi_id);
            $namaAdmin = $this->input->post('nama_admin');
            if ($namaAdmin === NULL) {
                echo "Error: nama_admin tidak boleh NULL";
                exit;
            }
             //simpan id ke session
           
            $this->session->set_userdata('nama_admin',$namaAdmin);
            
            redirect('c_authadmin/step3');
        }
        
    }   
        // -----------------------step 2 Event------------------------------------
    public function step2Event(){
         //mengecek session apakah ada atau tidak 
        $jenisAdmin = $this->session->userdata('jenisAdmin');
        if ($jenisAdmin === NULL) {
            echo "Session jenisAdmin tidak tersedia setelah redirect.";
            exit;  // Berhenti untuk debugging
        } else {
            echo "Session jenisAdmin tersedia: " . $jenisAdmin;
        }

        $this->form_validation->set_rules('nama_admin', 'Name Admin', 'trim|required',array(
            'required' => 'please fill this column'
        ));
        $this->form_validation->set_rules('nama_event', 'Name Event', 'trim|required',array(
            'required' => 'please fill this column'
        ));
        
        
        if ($this->form_validation->run() == FALSE) {
            $title['title'] = 'Admin Register';
            $this->load->view('templates/header',$title);
            $this->load->view('admin/authAdmin/stepRegis/event/step2');
            $this->load->view('templates/footer');
        } else {
            $eventData = array(
                'nama_event' => $this->input->post('nama_event'),
                'biaya_event' => $this->input->post('biaya_event'),
                'tanggal_event' => $this->input->post('tanggal_event'),
                // dll.
            );
            $this->m_authAdmin->insertEvent($eventData);
            // //mengambil id dari table event
            $event_id = $this->db->insert_id();
            $this->session->set_userdata('event_id',$event_id);
            $namaAdmin = $this->input->post('nama_admin');
            if ($namaAdmin === NULL) {
                echo "Error: nama_admin tidak boleh NULL";
                exit;
            }
            // //simpan id ke session
           
            $this->session->set_userdata('nama_admin',$namaAdmin);
            //rederect step 3
            redirect('c_authadmin/step3');
        }  
        
    }  
        // -----------------------step 2 Destination------------------------------------    
    public function step2Des(){
        
        $jenisAdmin = $this->session->userdata('jenisAdmin');
        if ($jenisAdmin === NULL) {
            echo "Session jenisAdmin tidak tersedia setelah redirect.";
            exit;  // Berhenti untuk debugging
        } else {
            echo "Session jenisAdmin tersedia: " . $jenisAdmin;
        }


        $this->form_validation->set_rules('nama_admin', 'Name Admin', 'trim|required',array(
            'required' => 'please fill this column'
        ));
        $this->form_validation->set_rules('nama_des', 'Name Destination', 'trim|required',array(
            'required' => 'please fill this column'
        ));
        
        
        if ($this->form_validation->run() == FALSE) {
            $title['title'] = 'Admin Register';
            $this->load->view('templates/header',$title);
            $this->load->view('admin/authAdmin/stepRegis/destination/step2');
            $this->load->view('templates/footer');
        } else {
            $destinationData = array(
                'nama_tempat_wisata' => $this->input->post('nama_des'),
                'biaya_tempat_wisata' => $this->input->post('biaya'),
                'alamat_tempat_wisata' => $this->input->post('alamat'),
                // dll.
            );
            $this->m_authAdmin->insertDes($destinationData);
            // //mengambil id dari table destinatiom
            $destination_id = $this->db->insert_id();
            $this->session->set_userdata('destination_id',$destination_id);
            $namaAdmin = $this->input->post('nama_admin');
            if ($namaAdmin === NULL) {
                echo "Error: nama_admin tidak boleh NULL";
                exit;
            }
            // //simpan id ke session
            
            $this->session->set_userdata('nama_admin',$namaAdmin);
            //rederect step 3
            redirect('c_authadmin/step3');
        }  
        
    }
           // -----------------------step 3 ------------------------------------
    public function step3(){

        $this->form_validation->set_rules('email', 'Email', 'trim|required',array(
            'required' => 'please fill this column'
        ));
        $this->form_validation->set_rules('username', 'Username', 'trim|required',array(
            'required' => 'please fill this column'
        ));
        
        
        if ($this->form_validation->run() == FALSE) {
            $title['title'] = 'Admin Register';
            $this->load->view('templates/header',$title);
            $this->load->view('admin/authAdmin/stepRegis/step3');
            $this->load->view('templates/footer');
            
        } else {
            $data = array(
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username')
            );
            $this->session->set_userdata($data);
            redirect('c_authadmin/step4');
        }
    }
    
    




    //---------------------------- step 4 Akomodasi-----------------------------------------------
    public function step4(){
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|matches[password1]',array(
            'matches' => 'Password are not the same ',
            'min_length' => 'Password is not long enough',
            'required' => 'please fill this column'
        ));
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]|matches[password]',array(
            'matches' => 'Password are not the same ',
            'min_length' => 'Password is not long enough',
            'required' => 'please fill this column'
        ));

        
        if ($this->form_validation->run() == FALSE) {
            $title['title'] = 'Admin Register';
            $this->load->view('templates/header',$title);
            $this->load->view('admin/authAdmin/stepRegis/step4');
            $this->load->view('templates/footer');
        } else {
            
            $this->_tambahAdmin();
        }   
        
    }
    
    
    //---------------------------------------tambah admin end step -------------------------------
    //--------------------------------------- fungsi untuk memasukan ke database -----------------
    private function _tambahAdmin(){
        //mengambil data dari session 
        $password = password_hash($this->input->post('password'),PASSWORD_DEFAULT);
        $email = $this->session->userdata('email');
        $username = $this->session->userdata('username');
        $nama_admin = $this->session->userdata('nama_admin');
        $jenis_admin = $this->session->userdata('jenisAdmin');
        $akomodasi_id = $jenis_admin == 'akomodasi' ? $this->session->userdata('akomodasi_id'):null;
        $event_id = $jenis_admin == 'event' ? $this->session->userdata('event_id'):null;
        $destination_id = $jenis_admin == 'destinasi' ? $this->session->userdata('destination_id'):null;

        //menyimpan ke database
        $data = array(
            'password' => $password,
            'email' => $email,
            'username' => $username,
            'nama_ako' => $nama_admin!== NULL ? $nama_admin : 'nama_admin',
            'jenis_admin' => $jenis_admin,
            'akomodasi' => $akomodasi_id,
            'event' => $event_id,
            'tempat_wisata' => $destination_id,
           
        );
        //masukan fungsi insert modul 
        $this->m_authAdmin->insertAdmin($data);
        $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
        Data berhasil ditambahkan </div>');
        redirect('c_authadmin/index');
        
    }

    public function back_step2(){
        $jenis_admin = $this->session->userdata('jenisAdmin');
        if ($jenis_admin === NULL){
            echo "id Jenis tidak tersedia  "; 
            exit;
        }   
        if($jenis_admin == 'akomodasi'){
            redirect('c_authadmin/step2Ako');
        }else if($jenis_admin == 'event'){
            redirect('c_authadmin/step2Event');
        }else{
            redirect('c_authadmin/step2Des');
        };
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

    public function forgot_password(){
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        
        
        if ($this->form_validation->run() == FALSE) {
           $title['title'] = 'Admin Login';
            $this->load->view('templates/header', $title);
            $this->load->view('admin/authAdmin/forgotpass');
            $this->load->view('templates/footer');
        } else {
            $email = $this->input->post('email');
            $adminAko = $this->m_authAdmin->get_email ($email);

            $link = base_url('c_authadmin/editpass');
            $subject = 'lupa Password';
            $message =
                "<html>
                <p>Silahkan klik link di bawah ini </p>
                <a href='$link'>Ganti password</a>
                <html>";

            if ($adminAko) {
                $this->session->set_userdata('riset', $email);
                $this->send_email($email,$subject,$message);
                $this->editpass();
                if (isset($email)) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">    
                    Please check your email </div>');
                    redirect('c_authadmin/forgot_password');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                    Please check your email </div>');
                    redirect('c_authadmin/index');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Your email is not found </div>');
                redirect('c_authadmin/forgot_password');
            }   
        }
    }
    public function editpass(){
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
            $this->load->view('admin/authAdmin/passEdit');
            $this->load->view('templates/footer');
        } else {

            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('riset');

            //sql
            $this->m_authAdmin->editPassword($email,$password);

            $this->session->unset_userdata('riset');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success " role="alert">
            Your password has been changed!</div>');
            redirect('c_authadmin/index');
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
    
}

/* End of file Controllername.php */
