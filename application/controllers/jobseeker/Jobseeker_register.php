<?php
/**
 *
 */
class Jobseeker_register extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('form_validation', 'session'));
		$this->load->model('UtilModel', 'util');
		$this->load->model('Recruitment_model', 'recruitment');
		$this->lang->load('message', 'vi');
		$this->load->helper('language');
	}

	function index() {
		$user = (isset($this->session->userdata['user'])) ? $this->session->userdata['user'] : null;
		$head = $this->load->view('main/head', array('title' => 'Đăng ký tài khoản'), TRUE);
		$header = $this->load->view('main/header', array('user' => $user, 'showTitle' => true,
		), TRUE);

		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		$arr_job_form = $this->recruitment->getAllJob_Form();
		$job_form_child = $this->recruitment->getAllJob_Form_Child();
		$job_level = $this->recruitment->getAllJob_Job_Level();
		$salary = $this->recruitment->getAllJob_Salary();
		$province = $this->recruitment->getAllProvince();
		$career = $this->recruitment->getAllJob_Career();

		$searchHorizontal = $this->load->view('main/search-horizontal', array(
			'province' => $province,
			'jobform' => $arr_job_form,
			'jobformchild' => $job_form_child,
			'salary' => $salary,
			'level' => $job_level,
			'career' => $career,
			'keyArr' => null,
			'keyWord' => ''), TRUE);

		//$popup = $this->load->view('main/popup', array('csrf' => $csrf), TRUE);
		$content = $this->load->view('main/jobseeker/register', array('csrf' => $csrf, 'searchHorizontal' => $searchHorizontal), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer, 'isGray' => true));
	}
}