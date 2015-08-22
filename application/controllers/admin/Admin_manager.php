<?php
class Admin_manager extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('form_validation', 'session'));
		$this->load->model('admin/Manager_model', 'manager');
		if (!$this->session->userdata['user']['isLogged']) {
			redirect(base_url() . 'admin/login'); // no session established, kick back to login page
		} else if ($this->session->userdata['user']['role'] != 5 && $this->session->userdata['user']['role'] != 1) {
			redirect(base_url('error/403'));
		}
	}
	function index() {
		$scripts = array(
			"assets/admin/angularjs/controller/manager.controller.js", "assets/admin/angularjs/service/manager.service.js");
		$head = $this->load->view('admin/head', array(), TRUE);
		$header = $this->load->view('admin/header', array(), TRUE);
		$content = $this->load->view('admin/manager/manager', array(), TRUE);
		$footer = $this->load->view('admin/footer', array(), TRUE);
		$sidemenu = $this->load->view('admin/sidemenu', array('email' => $this->session->userdata['user']['email'],
			'role' => $this->session->userdata['user']['role'],
			'selected' => 'userManager',
			'sub' => 'manager'), TRUE);

		$this->load->view('admin/layout', array('head' => $head,
			'header' => $header,
			'sidemenu' => $sidemenu,
			'content' => $content,
			'footer' => $footer,
			'scripts' => $scripts));
	}
	function getListManager() {
		$output = $this->manager->getListManager();
		echo json_encode($output);
	}
	function updateManager() {
		//$manager_id = $$this->input->post('manager');
		$manager = json_decode($this->input->post('manager'), true);
		$account_id = $manager['account_id'];
		$account_email = $manager['account_email'];
		$account_password = $manager['account_password'];
		$account_first_name = $manager['account_first_name'];
		$account_last_name = $manager['account_last_name'];
		$account_is_disabled = $manager['account_is_disabled'];

		$paramater = array(
			'account_first_name' => $account_first_name,
			'account_last_name' => $account_last_name,
			'account_is_disabled' => $account_is_disabled);
		if ($account_password) {
			//array_push($paramater, 'account_password'=>md5(trim($account_password)));
			$paramater['account_password'] = md5(trim($account_password));
		}
		$output = $this->manager->updateManager($paramater, $account_id);
		echo json_encode($output);
		//var_dump($manager('account_id'));
	}
	function deleteManager() {
		//$manager_id = $$this->input->post('manager');
		//$manager
		$account_id = json_decode($this->input->post('manager'), true);
		//$account_id = $manager['account_id'];
		$paramater = array(
			'account_is_delete' => true);
		$output = $this->manager->updateManager($paramater, $account_id);
		echo json_encode($output);
		//var_dump($manager('account_id'));
	}
}