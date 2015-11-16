<?php
/**
 *
 */
class Employer_resume extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('form_validation', 'session'));
		$this->load->model('employer/Employer_model', 'employer');
		$this->load->model('employer/Recruitment_model', 'recruitment');
		$this->load->model('employer/Resume_model', 'resume');
		$this->load->helper('security');
		$this->load->helper('language');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->lang->load('message', 'vi');
		$this->load->model('UtilModel', 'util');
		$this->load->model('Register_model', 'account');
		if (!$this->session->userdata['user']['isLogged'] || !($this->session->userdata['user']['role'] == 2 || $this->session->userdata['user']['role'] == 3)) {
			redirect(base_url('404'), 'refresh');
		}
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
		$scriptOption = array('assets/main/scroll/jquery.nicescroll.min.js', 'assets/main/js/employer/jquery_recruitment.js');

		$head = $this->load->view('main/head', array('title' => 'Quản lý tin tuyển dụng', 'scriptOption' => $scriptOption, 'styleOption' => $styleOption, 'scriptTable' => true), TRUE);
		$header = $this->load->view('main/header', array('user' => $user, 'showTitle' => true,
		), TRUE);
		//get list account of employer
		//$listAccount = $this->employer->getListAccount($employerInfo->employer_id);
		$breadcrumbs = array(
			array('isLink' => true,
				'title' => 'Trang chủ',
				'link' => base_url()),
			array('isLink' => true,
				'title' => 'Trang nhà tuyển dụng',
				'link' => base_url('employer')),
			array('isLink' => false,
				'title' => 'Tìm kiếm hồ sơ ứng viên',
				'link' => ''));
		$breadcrumb = $this->load->view('main/employer/breadcrumb', array('breadcrumbs' => $breadcrumbs), TRUE);
		$contentEmployer = $this->load->view('main/employer/search-resume', array('csrf' => $csrf, 'employerInfo' => $employerInfo), TRUE);
		$content = $this->load->view('main/employer/layout', array('contentEmployer' => $contentEmployer, 'update_account_employer' => $update_account_employer,
			'employer_menu' => $employer_menu, 'breadcrumb' => $breadcrumb), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer, 'isGray' => true));

	}
}