<?php
/**
 *
 */
class Obutil extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('form_validation', 'session'));
		$this->load->library('email', $this->config->item('configEmail'));
		if (!$this->session->userdata['user']['isLogged']) {
			redirect(base_url() . 'admin/login'); // no session established, kick back to login page
		} else if ($this->session->userdata['user']['role'] != 5 && $this->session->userdata['user']['role'] != 1) {
			redirect(base_url('error/403'));
		}
	}
	function sendMail($data) {

		//$message = '';
		//$this->load->library('email', $config);
		$config = $this->config->item('configEmail');
		$this->email->set_newline("\r\n");
		$this->email->from($config['smtp_user']); // change it to yours
		$this->email->to($data['mailto']); // change it to yours
		$this->email->subject($subject);
		//$this->email->message($message);
		$body = array('name' => $data['name'],
			'message' => $data['message'],
			'mailfrom' => $config['smtp_user']);
		if ($data['type'] == 'cv') {
			$message = $this->load->view('util/mailtemplate/delete-cv', $data, TRUE);
		} // this will return you html data as message
		else {
			$message = '';
		}
		$this->email->message($message);
		if ($this->email->send()) {
			return true;
		} else {
			//show_error($this->email->print_debugger());
			return false;
		}
	}
}