<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class c_hubungi extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        
    }
    

    public function index()
    {
        
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required');
        $this->form_validation->set_rules('pesan', 'Massage', 'trim|required');
        
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('hubungi/hubungi_kami');
        
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $subject = $this->input->post('subject');
            $pesan = $this->input->post('pesan');
            
            $subject = $subject;
            $message = 
            "<html>
                '$name'
                '$pesan'
            </html>";
       

            $this->send_email($email,$subject,$message);
            
            redirect('c_hubungi/index');
        
        }
    }
    public function send_email($to,$subject, $message)
    {
        
        $this->email->set_newline("\r\n");
        $this->email->from($to);
        $this->email->to('kadekdwipratama09@gmail.com');
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
