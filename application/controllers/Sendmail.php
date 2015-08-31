<?php
class SendMail extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('email');
        
    }
    public function index(){
        $email = 'binhhv@live.com';
        $password = '123456';
        $this->email  // Optional, an account where a human being reads.
                ->to($email)
                ->subject('password new')
                ->message($password);
        if ($this->email->send()) {
           var_dump('success');
        } else {
            var_dump('email not send');
        }
    }

}