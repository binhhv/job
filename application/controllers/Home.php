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
		//$this->load->model('job/Job_model', 'job');
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

		$popup_redirect_login = $this->load->view('main/popup_redirect_login', array('csrf' => $csrf), TRUE);
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

		$arr_career = $this->recruitment->getAllJob_Career();
		$salary = $this->recruitment->getAllJob_Salary();
		$province = $this->recruitment->getAllProvince();
		$empoyer_create_recruitment = $this->load->view('main/create_recruitment', array('csrf' => $csrf, 'arr_country' => $arr_country,
			'arr_welfare' => $arr_welfare, 'arr_job_form' => $arr_job_form, 'job_form_child' => $job_form_child, 'job_level' => $job_level,
			'contact_form' => $contact_form, 'arr_career' => $arr_career, 'salary' => $salary), TRUE);

		$newJob = $this->load->view('main/new-job', array(), TRUE);
		$jobseeker = $this->load->view('main/jobseeker', array(), TRUE);
		$employer = $this->load->view('main/employer', array(), TRUE);
		$search = $this->load->view('main/search', array(
			'province' => $province,
			'salary' => $salary,
			'level' => $job_level,
			'jobform' => $arr_job_form,
			'jobformchild' => $job_form_child), TRUE);
		$partner = $this->load->view('main/partner', array(), TRUE);
		$popup = $this->load->view('main/popup', array('csrf' => $csrf), TRUE);
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
			'popup_redirect_login' => $popup_redirect_login,
			'user_upload_cv_online' => $user_upload_cv_online,
			'empoyer_register' => $empoyer_register,
			'empoyer_create_recruitment' => $empoyer_create_recruitment,
		), TRUE);
		$footer = $this->load->view('main/footer', array('popup' => $popup), TRUE);
		$supportOnline = $this->load->view('main/support-online', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head,
			'header' => $header,
			'content' => $content,
			'footer' => $footer,
			'supportOnline' => $supportOnline));
	}
	public function getData() {
		echo json_encode(array("status" => "true"));
	}
	public function postData() {
		echo json_encode(array("status" => "true"));
	}
	function about() {
		$user = (isset($this->session->userdata['user'])) ? $this->session->userdata['user'] : null;
		$styleOption = array(
			'assets/main/css/style-about.css', 'assets/main/owl-carousel/owl.carousel.css');
		$scriptOption = array('assets/main/owl-carousel/owl.carousel.min.js', 'assets/main/js/about.js');
		$head = $this->load->view('main/head', array('titlePage' => 'JOB7VN Group|Contact', 'styleOption' => $styleOption), TRUE);
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
		$footer = $this->load->view('main/footer', array('scriptOption' => $scriptOption), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer));

	}
	function aboutTeam($code) {
		if ($code == "WA09423B63D") {
			$user = (isset($this->session->userdata['user'])) ? $this->session->userdata['user'] : null;
			$styleOption = array(
				'assets/main/css/style-about.css');
			$scriptOption = array();
			$head = $this->load->view('main/head', array('titlePage' => 'JOB7VN Group|Contact', 'styleOption' => $styleOption), TRUE);
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
			$content = $this->load->view('main/about-team', array('csrf' => $csrf), TRUE);
			$footer = $this->load->view('main/footer', array('scriptOption' => $scriptOption), TRUE); //'scriptOption' => $scriptOption
			$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer));

		} else {
			redirect(base_url('error/404'));
		}
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
		$styleOption = array(
			'assets/main/css/style-about.css');
		$scriptOption = array('assets/main/js/service.js');
		$user = (isset($this->session->userdata['user'])) ? $this->session->userdata['user'] : null;
		$head = $this->load->view('main/head', array('titlePage' => 'JOB7VN Group|Contact', 'styleOption' => $styleOption), TRUE);
		$header = $this->load->view('main/header', array(
			'logo' => 'img/header/allSHIGOTO.png',
			'showTitle' => true,
			'logoWidth' => '170px',
			'logoHeight' => '70px',
			'menu' => 'service',
			'user' => $user,
		), TRUE);
		//$ab = m;

		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		$content = $this->load->view('main/service', array('csrf' => $csrf), TRUE);
		$footer = $this->load->view('main/footer', array('scriptOption' => $scriptOption), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer));

	}

	function getNewsRecruitment() {
		$firstname = $this->security->xss_clean($this->input->post('firstname', true));
		$lastname = $this->security->xss_clean($this->input->post('lastname', true));
		$email = $this->security->xss_clean($this->input->post('email-popup-user', true));
		$data = array(
			'rece_email' => $email,
			'rece_first_name' => $firstname,
			'rece_last_name' => $lastname,
			'rece_is_reply' => 0,
			'rece_is_delete' => 0,
			'rece_created_at' => date('Y-m-d H:m'));
		$result = $this->recruitment->getNewsRecruitment($data);
		if ($result) {
			$output = array('status' => 'success');
			echo json_encode($output);
		} else {
			$output = array('status' => 'error');
			echo json_encode($output);
		}
	}
	function term() {
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
		$content = $this->load->view('main/term', array('csrf' => $csrf), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer));

	}

	function adwords() {
		$styleOption = array('assets/main/css/style-adwords.css');
		$user = (isset($this->session->userdata['user'])) ? $this->session->userdata['user'] : null;
		$head = $this->load->view('main/head', array('titlePage' => 'JOB7VN Group|Contact', 'styleOption' => $styleOption), TRUE);
		$header = $this->load->view('main/header', array(
			'logo' => 'img/header/allSHIGOTO.png',
			'showTitle' => true,
			'logoWidth' => '170px',
			'logoHeight' => '70px',
			'menu' => '',
			'user' => $user,
		), TRUE);
		//$ab = m;

		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		$content = $this->load->view('main/adwords', array('csrf' => $csrf), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer));


	public function checkLogin() {
		if ($this->session->userdata['user'] == null) {

		}

	}

}