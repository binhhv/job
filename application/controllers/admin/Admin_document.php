<?php
class Admin_document extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('form_validation', 'session'));
		$this->load->model('admin/Document_model', 'document');
		$this->load->model('admin/Account_model', 'account');
		$this->load->model('admin/Mail_model', 'mail');
		if (!$this->session->userdata['user']['isLogged']) {
			redirect(base_url() . 'admin/login'); // no session established, kick back to login page
		} else if ($this->session->userdata['user']['role'] != 5 && $this->session->userdata['user']['role'] != 1) {
			redirect(base_url('error/403'));
		}
	}
	function cvManager() {
		$scripts = array(
			"assets/admin/angularjs/controller/document.controller.js", "assets/admin/angularjs/service/document.service.js");
		$head = $this->load->view('admin/head', array(), TRUE);
		$header = $this->load->view('admin/header', array(), TRUE);
		$content = $this->load->view('admin/document/cv', array(), TRUE);
		$footer = $this->load->view('admin/footer', array(), TRUE);
		$sidemenu = $this->load->view('admin/sidemenu', array('email' => $this->session->userdata['user']['email'],
			'role' => $this->session->userdata['user']['role'],
			'selected' => 'documentManager',
			'sub' => 'doccv'), TRUE);

		$this->load->view('admin/layout', array('head' => $head,
			'header' => $header,
			'sidemenu' => $sidemenu,
			'content' => $content,
			'footer' => $footer,
			'scripts' => $scripts));
	}
	function formManager() {
		$scripts = array(
			"assets/admin/angularjs/controller/document.controller.js", "assets/admin/angularjs/service/document.service.js");
		$head = $this->load->view('admin/head', array(), TRUE);
		$header = $this->load->view('admin/header', array(), TRUE);
		$content = $this->load->view('admin/document/form', array(), TRUE);
		$footer = $this->load->view('admin/footer', array(), TRUE);
		$sidemenu = $this->load->view('admin/sidemenu', array('email' => $this->session->userdata['user']['email'],
			'role' => $this->session->userdata['user']['role'],
			'selected' => 'documentManager',
			'sub' => 'docon'), TRUE);

		$this->load->view('admin/layout', array('head' => $head,
			'header' => $header,
			'sidemenu' => $sidemenu,
			'content' => $content,
			'footer' => $footer,
			'scripts' => $scripts));
	}
	function getCV() {
		$output = $this->document->getCV();
		echo json_encode($output);
	}
	function getForm() {
		$output = $this->document->getForm();
		echo json_encode($output);
	}
	function getDetailForm($idForm) {

	}
	function updateForm() {

	}
	function deleteCV() {
		$cv = json_decode($this->input->post('cv'), true);
		$doccv_id = $cv['doccv_id'];
		$account_id = $cv['doccv_map_user'];
		$paramater = array(
			'doccv_is_delete' => true);
		$output = $this->document->updateCV($paramater, $doccv_id);

		$user = $this->account->getAccount($account_id);
		//log_message('error', $user);
		// if ($output) {
		// 	$data = array(
		// 		'mailto' => $user->account_email,
		// 		'name' => $user->account_first_name . $user->account_last_name,
		// 		'type' => 'cv',
		// 		'message' => 'xoa CV :))',
		// 	);

		// 	$result = $this->mail->sendMail($data);
		// 	log_message('error', $result);
		// 	//if($result){
		// 	echo json_encode($result);
		// 	//}
		// }
		$this->sendmail();
		echo json_encode($output);
	}
	function sendmail() {
		// $config = Array(
		// 	'protocol' => 'smtp',
		// 	'smtp_host' => 'smtp.gmail.com',
		// 	'smtp_port' => 465,
		// 	'smtp_user' => 'hvbinh1990@gmail.com',
		// 	'smtp_pass' => 'binh2381990',
		// 	'mailtype' => 'html',
		// 	'charset' => 'iso-8859-1',
		// 	'starttls' => true,
		// );

		// $this->load->library('email', $config);
		// $this->email->set_newline("\r\n");
		// $this->email->from('hvbinh1990@gmail.com', 'abcbbcc');
		// $this->email->to('binhck2@gmail.com');
		// $this->email->subject('Email Test');
		// $this->email->message('Testing the email class.');

		// $this->email->send();

		// echo $this->email->print_debugger();die;

		$this->load->library('email');

		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'smtp.live.com';
		$config['smtp_user'] = 'binhhv.live.com';
		$config['smtp_pass'] = 'Binhminh2381990';
		$config['smtp_port'] = 587;

		$this->email->initialize($config);

		$this->email->from('binhhv@live.com');
		$this->email->to('hvbinh19903@gmail.com');
		$this->email->subject('Test');
		$this->email->message('Message');

		if ($this->email->send()) {
			echo 'Sent';
		} else {
			$this->email->print_debugger();
		}

	}
}