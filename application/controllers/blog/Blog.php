<?php
/**
 *
 */
class Blog extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('form_validation', 'session'));
		$this->load->model('employer/Employer_model', 'employer');
		$this->load->model('employer/Recruitment_model', 'recruitment');
		$this->load->helper('security');
		$this->load->helper('language');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->lang->load('message', 'vi');
		$this->load->model('UtilModel', 'util');
	}
	function index() {
		$head = $this->load->view('main/head', array(), TRUE);
		$header = $this->load->view('main/header', array(
			'logo' => 'img/header/allSHIGOTO.png',
			'showTitle' => true,
			'logoWidth' => '170px',
			'logoHeight' => '70px',
			'menu' => '',
		), TRUE);
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);

		$category = $this->load->view('main/blog/category', array(), TRUE);
		$blog_category = $this->load->view('main/blog/blog-category', array(), TRUE);
		$blog_content = $this->load->view('main/blog/index', array(), TRUE);

		$content = $this->load->view('main/blog/layout', array('blog_content' => $blog_content, 'category' => $category, 'blog_category' => $blog_category, 'csrf' => $csrf), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('isGray' => true, 'head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer));

	}
	function detail($blog) {
		$head = $this->load->view('main/head', array(), TRUE);
		$header = $this->load->view('main/header', array(
			'logo' => 'img/header/allSHIGOTO.png',
			'showTitle' => true,
			'logoWidth' => '170px',
			'logoHeight' => '70px',
			'menu' => '',
		), TRUE);
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);

		$category = $this->load->view('main/blog/category', array(), TRUE);
		$blog_category = $this->load->view('main/blog/blog-category', array(), TRUE);
		$blog_content = $this->load->view('main/blog/blog-detail', array(), TRUE);

		$content = $this->load->view('main/blog/layout', array('blog_content' => $blog_content, 'category' => $category, 'blog_category' => $blog_category, 'csrf' => $csrf), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('isGray' => true, 'head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer));
	}

}