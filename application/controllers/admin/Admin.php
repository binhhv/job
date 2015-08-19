<?php
/**
 *
 */
class Admin extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('form_validation', 'session'));
		$this->load->model('admin/Jobseeker_model', 'jobseeker');
	}
	public function index() {

		if (isset($this->session->userdata['user']['id'])) {
			$this->loadViewAdmin();
		} else {
			#check autologin
			$cookie_name = 'siteAuth';
			// Check if the cookie exists
			if (isset($_COOKIE[$cookie_name])) {
				$a_User = parse_str($_COOKIE[$cookie_name]);
				// Register the session
				$user_info = array(
					'email' => $a_User['email'],
					'password' => $a_User['password'],
					'role' => $a_User['role'],
				);
				$this->session->set_userdata('user', $user_info);
				loadViewAdmin();
			} else {
				redirect(base_url('admin/login'));
			}
		}

	}
	public function loadViewAdmin() {
		$head = $this->load->view('admin/head', array(), TRUE);
		$header = $this->load->view('admin/header', array(), TRUE);
		$content = $this->load->view('admin/content', array(), TRUE);
		$footer = $this->load->view('admin/footer', array(), TRUE);
		$sidemenu = $this->load->view('admin/sidemenu', array('email' => $this->session->userdata['user']['email']), TRUE);

		$this->load->view('admin/layout', array('head' => $head,
			'header' => $header,
			'sidemenu' => $sidemenu,
			'content' => $content,
			'footer' => $footer));
	}
	/**
	manager jobseeker
	 **/
	function jobseekerManager() {
		$head = $this->load->view('admin/head', array(), TRUE);
		$header = $this->load->view('admin/header', array(), TRUE);
		$content = $this->load->view('admin/jobseeker/jobseeker', array(), TRUE);
		$footer = $this->load->view('admin/footer', array(), TRUE);
		$sidemenu = $this->load->view('admin/sidemenu', array('email' => $this->session->userdata['user']['email'],
			'selected' => 'userManager',
			'sub' => 'jobseeker'), TRUE);

		$this->load->view('admin/layout', array('head' => $head,
			'header' => $header,
			'sidemenu' => $sidemenu,
			'content' => $content,
			'footer' => $footer));

	}
	function jobseeker($section = 'default') {

	}
}