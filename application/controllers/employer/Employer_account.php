<?php
/**
 *
 */
class Employer_account extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('form_validation', 'session'));
		$this->load->model('employer/Employer_model', 'employer');
		if (!$this->session->userdata['user']['isLogged']) {
			redirect(base_url() . 'login'); // no session established, kick back to login page
		}
		$this->load->helper('security');
		$this->load->helper('language');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->lang->load('message', 'vi');
		$this->load->model('UtilModel', 'util');
		$this->load->model('Register_model', 'account');
	}

	function index() {
		$user = $this->session->userdata['user'];
		$employerInfo = $this->employer->getInfoEmployer($user['id']);
		$numRecruitmentPub = $this->employer->getNumRecruitmentAccout($employerInfo->employer_id, $user['id']);
		$employerInfo->numRecruitmentAccount = $numRecruitmentPub;
		$employerInfo->user = $user;
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		$employerInfo->csrf = $csrf;
		$update_account_employer = $this->load->view('main/employer/modal_update_account_employer', array('employerInfo' => $employerInfo, 'csrf' => $csrf), TRUE);
		$employer_menu = $this->load->view('main/employer/employer_menu', array('employerInfo' => $employerInfo, 'menu' => 'accounts', 'sub' => 'managerAccount'), TRUE);
		$styleOption = array('assets/main/datatables/dataTables.bootstrap.css');
		$scriptOption = array('assets/main/scroll/jquery.nicescroll.min.js');

		$head = $this->load->view('main/head', array('title' => 'Quản lý tài khoản', 'scriptOption' => $scriptOption, 'styleOption' => $styleOption, 'scriptTable' => true), TRUE);
		$header = $this->load->view('main/header', array('user' => $user, 'showTitle' => true,
		), TRUE);
		//get list account of employer
		$listAccount = $this->employer->getListAccount($employerInfo->employer_id);
		$breadcrumbs = array(
			array('isLink' => true,
				'title' => 'Trang chủ',
				'link' => base_url()),
			array('isLink' => true,
				'title' => 'Trang nhà tuyển dụng',
				'link' => base_url('employer')),
			array('isLink' => false,
				'title' => 'Quản lý tài khoản',
				'link' => ''));
		$breadcrumb = $this->load->view('main/employer/breadcrumb', array('breadcrumbs' => $breadcrumbs), TRUE);
		$contentEmployer = $this->load->view('main/employer/accounts', array('csrf' => $csrf, 'employerInfo' => $employerInfo, 'listAccount' => $listAccount), TRUE);
		$content = $this->load->view('main/employer/layout', array('contentEmployer' => $contentEmployer, 'update_account_employer' => $update_account_employer,
			'employer_menu' => $employer_menu, 'breadcrumb' => $breadcrumb), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer, 'isGray' => true));

	}
	function changeNameAccount() {
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_rules('firstname', $this->lang->line('first_name'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('lastname', $this->lang->line('last_name'), 'trim|required|xss_clean');
		$user = $this->session->userdata['user'];
		if ($this->form_validation->run()) {
			$firstname = $this->security->xss_clean($this->input->post('firstname'));
			$lastname = $this->security->xss_clean($this->input->post('lastname'));
			$data = array(
				'account_first_name' => $firstname,
				'account_last_name' => $lastname,
				'account_update_at' => date('Y-m-d'));
			$result = $this->employer->changeNameAccount($data, $user);
			if ($result) {
				echo json_encode(array('status' => 'success', 'content' => array(
					'name' => $this->security->get_csrf_token_name(),
					'hash' => $this->security->get_csrf_hash())));
			} else {
				redirect(base_url('404'), 'refresh');
			}

		} else {
			$dataerr = array(
				'firstname' => form_error('firstname'),
				'lastname' => form_error('lastname'),
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash(),
			);
			echo json_encode(array('status' => 'errvalid', 'content' => $dataerr));
		}
	}
	function getProfileAccount() {
		$user = $this->session->userdata['user'];
		$employerInfo = $this->employer->getInfoEmployer($user['id']);
		$numRecruitmentPub = $this->employer->getNumRecruitmentAccout($employerInfo->employer_id, $user['id']);
		$employerInfo->numRecruitmentAccount = $numRecruitmentPub;
		$employerInfo->user = $user;
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		$employerInfo->csrf = $csrf;
		$view = $this->load->view('main/employer/content-profile', array('employerInfo' => $employerInfo), TRUE);
		echo $view;
	}
}