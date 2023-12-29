<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class c_hubungi extends CI_Controller {

    public function index()
    {
        
        $this->load->view('hubungi/hubungi_kami');
    }
    public function email(){
        $email = $this->input->post('email');
        $subject = $this->input->post('subject');
        $massage = $this->input->post('massage');

        $subject = $subject;
        $massage = $massage;

        if (isset($email)){
            $this->send_email($email,$subject,$massage);
        }
    }


    public function send_email($email,$subject, $message)
    {
        $this->email->set_newline("\r\n");
        $this->email->from($email);
        $this->email->to('alimanbudi@gmail.com');
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



?>
