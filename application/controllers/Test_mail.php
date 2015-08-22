<?php
class Test_mail extends CI_Controller {

	function index() {
// get config data
		$from = $this->config->item('email_address', 'email');
		$from_name = $this->config->item('email_name', 'email');
		$to = 'binhhv@localhost.com';
		$to_name = "To Name";
// we load the email library and send a mail
		$this->load->library('email');
		$this->email->from($from, $from_name);
		$this->email->to($to, $to_name);
		$this->email->subject('Email subject');
		$this->email->message('Testing the email class.');
		$this->email->send();
//to debug we can use print_debugger()
		echo $this->email->print_debugger();
	}
}