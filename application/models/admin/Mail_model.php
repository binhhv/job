<?php
/**
 *
 */
class Mail_model extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('form_validation', 'session'));
		//$this->load->library('email', $this->config->item('configEmail'));
		if (!$this->session->userdata['user']['isLogged']) {
			redirect(base_url() . 'admin/login'); // no session established, kick back to login page
		} else if ($this->session->userdata['user']['role'] != 5 && $this->session->userdata['user']['role'] != 1) {
			redirect(base_url('error/403'));
		}
	}
	function sendMail($data) {

		//$message = '';
		//$this->load->library('email', $config);
		// $config = $this->config->item('configEmail');
		// $this->email->set_newline("\r\n");
		// $this->email->from($config['smtp_user']); // change it to yours
		// $this->email->to($data['mailto']); // change it to yours
		// $this->email->subject("test mail binhhv");
		// //$this->email->message($message);
		// $body = array('name' => $data['name'],
		// 	'message' => $data['message'],
		// 	'mailfrom' => "binhhv@live.com");
		// if ($data['type'] == 'cv') {
		// 	$message = $this->load->view('util/mailtemplate/delete-cv', $data, TRUE);
		// } // this will return you html data as message
		// else {
		// 	$message = '';
		// }
		// $this->email->message($message);
		// if ($this->email->send()) {
		// 	return true;
		// } else {
		// 	//show_error($this->email->print_debugger());
		// 	return false;
		// }

		// $this->load->library('email');

		// $config['protocol'] = 'smtp';

		// $config['smtp_host'] = 'ssl://smtp.gmail.com';

		// $config['smtp_port'] = '465';

		// $config['smtp_timeout'] = '7';

		// $config['smtp_user'] = 'hvbinh1990@gmail.com';

		// $config['smtp_pass'] = 'binh2381990';

		// $config['charset'] = 'utf-8';

		// $config['newline'] = "\r\n";

		// $config['mailtype'] = 'text'; // or html

		// $config['validation'] = TRUE; // bool whether to validate email or not

		// $this->email->initialize($config);

		// $this->email->from('hvbinh1990@gmail.com', 'binhhv');
		// $this->email->to('hvbinh1990@gmail.com');

		// $this->email->subject('Email Test');

		// $this->email->message('Testing the email class.');

		// $this->email->send();

		// echo $this->email->print_debugger();

		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'hvbinh1990@gmail.com',
			'smtp_pass' => 'binh2381990',
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'starttls' => true,
		);

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('hvbinh1990@gmail.com', 'abcbbcc');
		$this->email->to('binhck2@gmail.com');
		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.');

		$this->email->send();

		echo $this->email->print_debugger();die;

	}
}