<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//require "vendor/autoload.php";

class Home extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
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
			'userprofile' => $this->session->userdata('fb')), TRUE);
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
		$head = $this->load->view('main/head', array('titlePage' => 'JOB7VN Group|Contact'), TRUE);
		$header = $this->load->view('main/header', array(
			'logo' => 'img/header/allSHIGOTO.png',
			'showTitle' => true,
			'logoWidth' => '170px',
			'logoHeight' => '70px',
			'menu' => 'aboutus',
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

}