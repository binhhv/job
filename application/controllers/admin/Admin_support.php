<?php
class Admin_support extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('form_validation', 'session'));
		$this->load->model('admin/Employer_model', 'employer');
		$this->load->model('admin/Jobseeker_model', 'jobseeker');
		$this->load->model('admin/Mail_model', 'mail');
		$this->load->model('UtilModel', 'util');
		$this->load->model('admin/Support_model', 'support');
		$this->load->model('admin/Recruitment_model', 'recruitment');

		//set value to call page
		//active:1
		//aprrove:2
		//disabled:3

		//0 send
		//1 rep
	}
	function getMessage($cookie_id) {
		$output = $this->support->getMessage($cookie_id);
		echo json_encode($output);
	}
	function getMessageClient($cookie_id) {
		$output = $this->support->getMessageClient($cookie_id);
		echo json_encode($output);
	}
	function startChatWithSend() {
		$msg = $this->input->post('msg');
		$cookie_id = $this->input->post('cookie_id');
		$cookie_user = $this->input->post('cookie_user');
		log_message('error', $cookie_user);
		$output = array('cookie_id' => $cookie_id);
		log_message('error', $cookie_id);
		if ($cookie_id == '0') {
			$cookie_id = md5(date('Y-m-d H:m:s:u'));
			$output['cookie_id'] = $cookie_id;
			$cookie_user = $this->randomUserSP();
			$output['cookie_user'] = $cookie_user;
		}

		$data = array(
			'schat_type' => 0,
			'schat_cookie_id' => $cookie_id,
			'schat_cookie_user' => $cookie_user,
			'schat_message' => $msg,
			'schat_is_view_ad' => false,
			'schat_is_reply_ad' => false,
			'schat_is_delete' => false,
			'schat_created_at' => date('Y-m-d H:m'));
		$result = $this->support->insertChat($data);
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		$output['csrf'] = $csrf;

		if ($result) {
			$output['status'] = 'success';
			$output['schat_id'] = $result;
			$output['objectSP'] = array(
				'schat_type' => 0,
				'schat_message' => $msg);
		} else {
			$output['status'] = 'error';
		}
		echo json_encode($output);
	}
	function startChatWithReply() {
		$msg = $this->input->post('msg');
		$cookie_id = $this->input->post('cookie_id');
		$cookie_user = $this->input->post('cookie_user');
		log_message('error', $cookie_user);
		$output = array('cookie_id' => $cookie_id);
		if ($cookie_id == 0) {
			$cookie_id = md5(date('Y-m-d H:m:s:u'));
			$output['cookie_id'] = $cookie_id;
			$cookie_user = $this->randomUserSP();
			$output['cookie_user'] = $cookie_user;
		}

		$data = array(
			'schat_type' => 1,
			'schat_cookie_id' => $cookie_id,
			'schat_cookie_user' => $cookie_user,
			'schat_message' => $msg,
			'schat_is_view_ad' => false,
			'schat_is_reply_ad' => false,
			'schat_is_delete' => false,
			'schat_created_at' => date('Y-m-d H:m'));
		$result = $this->support->insertChat($data);
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		$output['csrf'] = $csrf;

		if ($result) {
			$output['status'] = 'success';
			$output['schat_id'] = $result;
			$output['objectSP'] = array(
				'schat_type' => 1,
				'schat_message' => $msg);
		} else {
			$output['status'] = 'error';
		}
		echo json_encode($output);
	}
	function getMessageReply($cookie_id, $schat_id) {
		$output = $this->support->getMessageReply($cookie_id, $schat_id);
		$result['dataOb'] = $output;
		$result['csrf'] = $this->getToken();
		echo json_encode($result);
	}
	function getMessageReplyUser($cookie_id, $schat_id) {
		$output = $this->support->getMessageReplyUser($cookie_id, $schat_id);
		$result['dataOb'] = $output;
		$result['csrf'] = $this->getToken();
		echo json_encode($result);
	}
	function index() {
		$scripts = array('assets/admin/dist/js/support.js');
		$head = $this->load->view('admin/head', array(), TRUE);
		$header = $this->load->view('admin/header', array(), TRUE);
		$content = $this->load->view('admin/support', array(), TRUE);
		$footer = $this->load->view('admin/footer', array(), TRUE);
		$sidemenu = $this->load->view('admin/sidemenu', array('email' => $this->session->userdata['user']['email'],
			'role' => $this->session->userdata['user']['role'],
			'selected' => 'mailbox',
			'sub' => 'support'), TRUE);

		$this->load->view('admin/layout', array('head' => $head,
			'header' => $header,
			'sidemenu' => $sidemenu,
			'content' => $content,
			'footer' => $footer,
			'scripts' => $scripts,
		));
	}
	function randomUserSP() {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$code_genaral = "";
		$randomString = '';
		for ($i = 0; $i < 6; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return 'U' . $randomString;
	}
	function getToken() {
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		return $csrf;
	}
}