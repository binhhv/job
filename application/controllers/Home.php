<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//require "vendor/autoload.php";

class Home extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('security');
		$this->load->model('Register_model', 'account');
		$this->load->model('Uploadcv_model', 'upload_cv');
		$this->load->model('Recruitment_model', 'recruitment');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->lang->load('message', 'vi');
		$this->load->helper('language');
		$this->load->library('session');

	}
	public function index() {
		$user = (isset($this->session->userdata['user'])) ? $this->session->userdata['user'] : null;
		$slideOb = array('slide1.jpg', 'slide1.jpg', 'slide1.jpg', 'slide1.jpg',
		);
		$head = $this->load->view('main/head', array('titlePage' => 'JOB7VN Group|Trang chủ'), TRUE);
		$header = $this->load->view('main/header', array(
			'logo' => 'img/header/allSHIGOTO.png',
			'showTitle' => true,
			'logoWidth' => '170px',
			'logoHeight' => '70px',
			'menu' => 'home',
			'user' => $user,
		), TRUE);
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		//user register
		$user_register = $this->load->view('main/user_register', array('csrf' => $csrf), TRUE);
		$user_upload_cv = $this->load->view('main/upload_cv', array('csrf' => $csrf), TRUE);
		//upload cv online
		$healthyData = $this->upload_cv->getAllHealthy();
		$user_upload_cv_online = $this->load->view('main/upload_cv_online', array('csrf' => $csrf, 'healthy' => $healthyData), TRUE);

		//empoyer register
		//register empoyer
		$provinceData = $this->account->getAllProvinceByCountry();
		$empoyer_register = $this->load->view('main/employer_register', array('csrf' => $csrf, 'province' => $provinceData), TRUE);
		//create Recruitment
		$arr_country = $this->recruitment->getAllCountry();
		$arr_welfare = $this->recruitment->getAllWelfare();
		$arr_job_form = $this->recruitment->getAllJob_Form();
		$job_form_child = $this->recruitment->getAllJob_Form_Child();
		$job_level = $this->recruitment->getAllJob_Job_Level();
		$contact_form = $this->recruitment->getAllJob_Contact_Form();
		$empoyer_create_recruitment = $this->load->view('main/create_recruitment', array('csrf' => $csrf, 'arr_country' => $arr_country,
			'arr_welfare' => $arr_welfare, 'arr_job_form' => $arr_job_form, 'job_form_child' => $job_form_child, 'job_level' => $job_level,
			'contact_form' => $contact_form), TRUE);

		$newJob = $this->load->view('main/new-job', array(), TRUE);
		$jobseeker = $this->load->view('main/jobseeker', array(), TRUE);
		$employer = $this->load->view('main/employer', array(), TRUE);
		$search = $this->load->view('main/search', array(), TRUE);
		$partner = $this->load->view('main/partner', array(), TRUE);
		$slide = $this->load->view('main/slide', array('slides' => $slideOb), TRUE);

		//$sidebar = $this->load->view('main/sidebar', array(), TRUE);
		$content = $this->load->view('main/content', array(

			'slide' => $slide,
			'search' => $search,
			'newjob' => $newJob,
			'jobseeker' => $jobseeker,
			'employer' => $employer, 'partner' => $partner,
			'userprofile' => $this->session->userdata('fb'),
			'user_register' => $user_register,
			'user_upload_cv' => $user_upload_cv,
			'user_upload_cv_online' => $user_upload_cv_online,
			'empoyer_register' => $empoyer_register,
			'empoyer_create_recruitment' => $empoyer_create_recruitment), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head,
			'header' => $header,
			'content' => $content,
			'footer' => $footer));
	}
	public function getData() {
		echo json_encode(array("status" => "true"));
	}
	public function postData() {
		echo json_encode(array("status" => "true"));
	}
	function about() {
		$user = (isset($this->session->userdata['user'])) ? $this->session->userdata['user'] : null;
		$head = $this->load->view('main/head', array('titlePage' => 'JOB7VN Group|Contact'), TRUE);
		$header = $this->load->view('main/header', array(
			'logo' => 'img/header/allSHIGOTO.png',
			'showTitle' => true,
			'logoWidth' => '170px',
			'logoHeight' => '70px',
			'menu' => 'aboutus',
			'user' => $user,
		), TRUE);
		//$ab = m;

		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		$content = $this->load->view('main/about', array('csrf' => $csrf), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer));

	}
	function structure() {
		$user = (isset($this->session->userdata['user'])) ? $this->session->userdata['user'] : null;
		$head = $this->load->view('main/head', array('titlePage' => 'JOB7VN Group|Contact'), TRUE);
		$header = $this->load->view('main/header', array(
			'logo' => 'img/header/allSHIGOTO.png',
			'showTitle' => true,
			'logoWidth' => '170px',
			'logoHeight' => '70px',
			'menu' => 'aboutus',
			'user' => $user,
		), TRUE);
		//$ab = m;

		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		$content = $this->load->view('main/structure', array('csrf' => $csrf), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer));

	}
	function service() {
		$user = (isset($this->session->userdata['user'])) ? $this->session->userdata['user'] : null;
		$head = $this->load->view('main/head', array('titlePage' => 'JOB7VN Group|Contact'), TRUE);
		$header = $this->load->view('main/header', array(
			'logo' => 'img/header/allSHIGOTO.png',
			'showTitle' => true,
			'logoWidth' => '170px',
			'logoHeight' => '70px',
			'menu' => 'aboutus',
			'user' => $user,
		), TRUE);
		//$ab = m;

		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		$content = $this->load->view('main/service', array('csrf' => $csrf), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer));

	}

}