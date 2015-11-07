<?php
/**
 *
 */
class Jobseeker extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('form_validation', 'session'));
		$this->load->model('UtilModel', 'util');
		$this->load->model('Recruitment_model', 'recruitment');
		$this->load->model('jobseeker/Jobseeker_model', 'jobseeker');
		$this->lang->load('message', 'vi');
		$this->load->helper('language');
	}
	function index() {
		//profile box
		//recruitment category careere
		//info box
		//job highlight
		$styleOption = array('assets/main/css/style_ntv.css');
		$scriptOption = array('assets/main/scroll/jquery.nicescroll.min.js', 'assets/main/js/jquery_ntv.js');
		$user = (isset($this->session->userdata['user'])) ? $this->session->userdata['user'] : null;
		if (isset($user)) {
			$head = $this->load->view('main/head', array('styleOption' => $styleOption, 'scriptOption' => $scriptOption), TRUE);
			$header = $this->load->view('main/header', array('user' => $user, 'showTitle' => true,
			), TRUE);

			$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash(),
			);
			$jobseeker = $this->jobseeker->getJobseeker($user['id']);
			$cvJobseeker = $this->jobseeker->getListCVJobseeker($user['id']);
			$docJobseeker = $this->jobseeker->getListDocumentJobseeker($user['id']);
			$recApp = $this->jobseeker->getListRecruitmentApply($user['id']);

			$content = $this->load->view('main/jobseeker/index', array('csrf' => $csrf, 'jobseeker' => $jobseeker,
				'cvJobseeker' => $cvJobseeker,
				'docJobseeker' => $docJobseeker,
				'recApp' => $recApp), TRUE);
			$footer = $this->load->view('main/footer', array(), TRUE);
			$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer, 'isGray' => true));
		} else {
			redirect(base_url('404'), 'refresh');
		}

	}
}