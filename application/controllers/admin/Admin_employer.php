<?php
class Admin_employer extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('form_validation', 'session'));
		$this->load->model('admin/Employer_model', 'employer');
		$this->load->model('admin/Jobseeker_model', 'jobseeker');
		$this->load->model('admin/Mail_model', 'mail');
		if (!$this->session->userdata['user']['isLogged']) {
			redirect(base_url() . 'admin/login'); // no session established, kick back to login page
		} else if ($this->session->userdata['user']['role'] != 5 && $this->session->userdata['user']['role'] != 1) {
			redirect(base_url('error/403'));
		}
	}
	function index() {
		$scripts = array(
			"assets/admin/angularjs/controller/employer.controller.js", "assets/admin/angularjs/service/employer.service.js");
		$head = $this->load->view('admin/head', array(), TRUE);
		$header = $this->load->view('admin/header', array(), TRUE);
		$content = $this->load->view('admin/employer/employer', array(), TRUE);
		$footer = $this->load->view('admin/footer', array(), TRUE);
		$sidemenu = $this->load->view('admin/sidemenu', array('email' => $this->session->userdata['user']['email'],
			'role' => $this->session->userdata['user']['role'],
			'selected' => 'userManager',
			'sub' => 'employer'), TRUE);

		$this->load->view('admin/layout', array('head' => $head,
			'header' => $header,
			'sidemenu' => $sidemenu,
			'content' => $content,
			'footer' => $footer,
			'scripts' => $scripts));
	}
	function getListEmployer() {
		$output = $this->employer->getListEmployer();
		echo json_encode($output);
	}
	function detailEmployer($id) {
		$scripts = array(
			"assets/admin/angularjs/controller/employer.controller.js", "assets/admin/angularjs/service/jobseeker.service.js", "assets/admin/angularjs/service/employer.service.js");
		$employer = $this->employer->detailEmployer($id);
		$head = $this->load->view('admin/head', array(), TRUE);
		$header = $this->load->view('admin/header', array(), TRUE);
		$content = $this->load->view('admin/employer/employer-detail', array('employer' => $employer), TRUE);
		$footer = $this->load->view('admin/footer', array(), TRUE);
		$sidemenu = $this->load->view('admin/sidemenu', array('email' => $this->session->userdata['user']['email'],
			'role' => $this->session->userdata['user']['role'],
			'selected' => 'userManager',
			'sub' => 'employer'), TRUE);

		$this->load->view('admin/layout', array('head' => $head,
			'header' => $header,
			'sidemenu' => $sidemenu,
			'content' => $content,
			'footer' => $footer,
			'scripts' => $scripts));
	}
	function getListEmployerUser($id) {
		$output = $this->employer->getListEmployerUser($id);
		echo json_encode($output);
	}
	function getListEmployerRecruitment($id) {
		$output = $this->employer->getListEmployerRecruitment($id);
		echo json_encode($output);
	}
	function checkAdminEmployerExits($idemployer) {
		$output = $this->employer->checkAdminEmployerExits($idemployer);
		echo json_encode($output);
	}
	function setRoleAdminEmployer() {
		$employeruser = json_decode($this->input->post('employeruser'), true);
		$employerid = json_decode($this->input->post('employerid'), true);
		log_message('error', $employeruser . $employerid);
		$output = $this->employer->setRoleAdminEmployer($employerid, $employeruser);
		echo json_encode($output);
	}
	function deleteEmployerUser() {
		$employeruser = json_decode($this->input->post('employeruser'), true);
		$account_id = $employeruser['account_id'];
		$account_name = $employeruser['account_first_name'] . ' ' . $employeruser['account_last_name'];
		$account_email = $employeruser['account_email'];
		$account_map_id = $employeruser['emac_id'];
		$paramater = array(
			'account_is_delete' => true);
		$paramterAccountMapEmployer = array('emac_is_delete' => true);
		$outputDeleteAccount = $this->jobseeker->updateJobseeker($paramater, $account_id);
		$outputDeleteAccountMap = $this->employer->updateEmployerUser($paramterAccountMapEmployer, $account_map_id);
		//$user = $this->account->getAccount($account_id);
		//log_message('error', $user);
		if ($outputDeleteAccount && $outputDeleteAccountMap) {
			$data = array(
				'mailsend' => $account_email,
				'name' => $account_name,
				'type' => 'delete',
				'typedelete' => 'tài khoản  (' . $account_email . ')',
			);

			$result = $this->mail->sendMail($data);
			log_message('error', $result);
			echo json_encode($result);

		}
		//$this->sendmail();
		else {

			echo json_encode(false);
		}
	}
	function createEmployerUser() {
		$employeruser = json_decode($this->input->post('employeruser'), true);
		$employerid = json_decode($this->input->post('employerid'), true);
		$role = json_decode($this->input->post('role'), true);
		$paramater = array(
			'account_email' => $employeruser['account_email'],
			'account_password' => md5(trim($employeruser['account_password'])),
			'account_first_name' => $employeruser['account_first_name'],
			'account_last_name' => $employeruser['account_last_name'],
			'account_is_get_news' => 0,
			'account_map_role' => $role,
			'account_is_delete' => 0,
			'account_is_disabled' => 0,
			'account_update_at' => date('Y-m-d H:m'),
			'account_created_at' => date('Y-m-d H:m'));
		$paramaterMapAccount = array(
			'emac_map_employer' => $employerid,
			'emac_is_delete' => false,
			'emac_created_at' => date('Y-m-d H:m'));
		//log_message('error', $employerid);

		$output = $this->employer->createEmployerUser($paramater, $paramaterMapAccount, $employerid);
		echo json_encode($output);
	}
	function deleteEmployerRecruitment() {
		$recruitment = json_decode($this->input->post('recruitment'), true);
		$recruitmentid = $recruitment['rec_id'];
		$recruitmenttitle = $recruitment['rec_title'];
		$employerid = $recruitment['rec_map_employer'];
		$parameter = array(
			'rec_is_delete' => true,
		);
		$output = $this->employer->deleteEmployerRecruitment($parameter, $recruitmentid);
		if ($output) {
			$listmail = $this->employer->getListEmployerUser($employerid);
			$employerInfo = $this->employer->detailEmployer($employerid);
			log_message('error', $employerInfo->account_first_name);
			$data = array(
				'name' => $employerInfo->account_first_name . ' ' . $employerInfo->account_last_name,
				'type' => 'delete',
				'multisend' => true,
				'typedelete' => 'tin tuyển dụng  (' . $recruitmenttitle . ')',
				'listmail' => $listmail,
			);

			$result = $this->mail->sendMail($data);
			log_message('error', $result);
			echo json_encode($result);

		} else {
			echo json_encode($output);
		}
	}
}