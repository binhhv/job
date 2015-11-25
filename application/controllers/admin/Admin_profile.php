<?php
/**
 *
 */
class Admin_profile extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('form_validation', 'session'));
		$this->load->model('admin/Jobseeker_model', 'jobseeker');
		$this->load->model('admin/Mail_model', 'mail');
		$this->load->model('admin/Account_model', 'account');
		$this->load->model('admin/Admin_api_model', 'api');
		$this->load->model('UtilModel', 'util');
		if (!$this->session->userdata['user']['isLogged']) {
			redirect(base_url('404'));
			//redirect(base_url() . 'admin/login'); // no session established, kick back to login page
		} else if ($this->session->userdata['user']['role'] != 5 && $this->session->userdata['user']['role'] != 1) {
			//redirect(base_url('error/403'));
			redirect(base_url('404'));
		}
	}

	function index() {
		$user = $this->session->userdata['user'];
		$scripts = array(
			"assets/admin/angularjs/controller/admin.controller.js", "assets/admin/angularjs/service/admin.service.js");
		$head = $this->load->view('admin/head', array(), TRUE);
		$header = $this->load->view('admin/header', array(), TRUE);
		$content = $this->load->view('admin/profile/profile', array('user' => $user), TRUE);
		$footer = $this->load->view('admin/footer', array(), TRUE);
		$sidemenu = $this->load->view('admin/sidemenu', array('email' => $this->session->userdata['user']['email'],
			'role' => $this->session->userdata['user']['role'],
			'selected' => 'profile'), TRUE);

		$this->load->view('admin/layout', array('head' => $head,
			'header' => $header,
			'sidemenu' => $sidemenu,
			'content' => $content,
			'footer' => $footer,
			'scripts' => $scripts));
	}
	function changePassword() {
		$admin = json_decode($this->input->post('admin'), true);
		log_message('error', 'sida' . $admin['adminId']);
		$result = $this->account->changePassword($admin);
		echo json_encode($result);
	}
}