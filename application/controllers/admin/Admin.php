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
		$this->load->model('admin/Mail_model', 'mail');
		if (!$this->session->userdata['user']['isLogged']) {
			redirect(base_url() . 'admin/login'); // no session established, kick back to login page
		} else if ($this->session->userdata['user']['role'] != 5 && $this->session->userdata['user']['role'] != 1) {
			redirect(base_url('error/403'));
		}
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
		// $scripts = array(
		// 	"assets/admin/angularjs/app.js", "assets/admin/angularjs/service/appservice.js");

		$head = $this->load->view('admin/head', array(), TRUE);
		$header = $this->load->view('admin/header', array(), TRUE);
		$content = $this->load->view('admin/content', array(), TRUE);
		$footer = $this->load->view('admin/footer', array(), TRUE);
		$sidemenu = $this->load->view('admin/sidemenu', array('email' => $this->session->userdata['user']['email'],
			'role' => $this->session->userdata['user']['role']), TRUE);

		$this->load->view('admin/layout', array('head' => $head,
			'header' => $header,
			'sidemenu' => $sidemenu,
			'content' => $content,
			'footer' => $footer,
		));
	}
	/**
	manager jobseeker
	 **/
	function jobseekerManager() {
		$scripts = array(
			"assets/admin/angularjs/controller/jobseeker.controller.js", "assets/admin/angularjs/service/jobseeker.service.js");
		$head = $this->load->view('admin/head', array(), TRUE);
		$header = $this->load->view('admin/header', array(), TRUE);
		$content = $this->load->view('admin/jobseeker/jobseeker', array(), TRUE);
		$footer = $this->load->view('admin/footer', array(), TRUE);
		$sidemenu = $this->load->view('admin/sidemenu', array('email' => $this->session->userdata['user']['email'],
			'role' => $this->session->userdata['user']['role'],
			'selected' => 'userManager',
			'sub' => 'jobseeker'), TRUE);

		$this->load->view('admin/layout', array('head' => $head,
			'header' => $header,
			'sidemenu' => $sidemenu,
			'content' => $content,
			'footer' => $footer,
			'scripts' => $scripts));

	}
	function jobseeker($section = 'default') {
		$output = $this->jobseeker->getListJobseeker();
		echo json_encode($output);
	}
	function createJobseeker() {
		$jobseeker = json_decode($this->input->post('jobseeker'), true);
		//$account_id = $jobseeker['account_id'];
		$account_email = $jobseeker['account_email'];
		$account_password = $jobseeker['account_password'];
		$account_first_name = $jobseeker['account_first_name'];
		$account_last_name = $jobseeker['account_last_name'];
		//$account_is_disabled = $jobseeker['account_is_disabled'];

		$paramater = array(
			'account_email' => $account_email,
			'account_password' => md5(trim($account_password)),
			'account_first_name' => $account_first_name,
			'account_last_name' => $account_last_name,
			'account_is_get_news' => 0,
			'account_map_role' => 4,
			'account_is_delete' => 0,
			'account_is_disabled' => 0,
			'account_update_at' => date('Y-m-d H:m'),
			'account_created_at' => date('Y-m-d H:m'));
		$output = $this->jobseeker->createJobseeker($paramater);
		//var_dump($ouput);
		$obJobseeker = $this->jobseeker->getJobseeker($output);
		echo json_encode($obJobseeker[0]);
	}
	function updateJobseeker() {
		//$jobseeker_id = $$this->input->post('jobseeker');
		$jobseeker = json_decode($this->input->post('jobseeker'), true);
		$account_id = $jobseeker['account_id'];
		$account_email = $jobseeker['account_email'];
		$account_password = $jobseeker['account_password'];
		$account_first_name = $jobseeker['account_first_name'];
		$account_last_name = $jobseeker['account_last_name'];
		$account_is_disabled = $jobseeker['account_is_disabled'];

		$paramater = array(
			'account_first_name' => $account_first_name,
			'account_last_name' => $account_last_name,
			'account_is_disabled' => $account_is_disabled);
		if ($account_password) {
			//array_push($paramater, 'account_password'=>md5(trim($account_password)));
			$paramater['account_password'] = md5(trim($account_password));
		}
		$output = $this->jobseeker->updateJobseeker($paramater, $account_id);
		log_message('error', $output);
		echo json_encode($output);
		//var_dump($jobseeker('account_id'));
	}
	function deleteJobseeker() {
		//$jobseeker_id = $$this->input->post('jobseeker');
		$jobseeker = json_decode($this->input->post('jobseeker'), true);
		$account_id = $jobseeker['account_id'];
		$account_name = $jobseeker['account_first_name'] . ' ' . $jobseeker['account_last_name'];
		$account_email = $jobseeker['account_email'];
		$paramater = array(
			'account_is_delete' => true);
		$output = $this->jobseeker->updateJobseeker($paramater, $account_id);
		//$user = $this->account->getAccount($account_id);
		//log_message('error', $user);
		if ($output) {
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
			echo json_encode($output);
		}
		//echo json_encode($output);
		//var_dump($jobseeker('account_id'));
	}
	function detailJobseeker($idJobseeker = '') {
		//var_dump($idJobseeker);
		$scripts = array(
			"assets/admin/angularjs/controller/jobseeker.controller.js", "assets/admin/angularjs/service/jobseeker.service.js");
		$jobseeker = $this->jobseeker->getJobseeker($idJobseeker);
		$cvJobseeker = $this->jobseeker->getListCVJobseeker($idJobseeker);
		$docJobseeker = $this->jobseeker->getListDocumentJobseeker($idJobseeker);
		$recApp = $this->jobseeker->getListRecruitmentApply($idJobseeker);

		$head = $this->load->view('admin/head', array(), TRUE);
		$header = $this->load->view('admin/header', array(), TRUE);
		$content = $this->load->view('admin/jobseeker/jobseeker-detail', array(
			'jobseeker' => $jobseeker,
			'cvJobseeker' => $cvJobseeker,
			'docJobseeker' => $docJobseeker,
			'recApp' => $recApp), TRUE);
		$footer = $this->load->view('admin/footer', array(), TRUE);
		$sidemenu = $this->load->view('admin/sidemenu', array('email' => $this->session->userdata['user']['email'],
			'role' => $this->session->userdata['user']['role'],
			'selected' => 'userManager',
			'sub' => 'jobseeker'), TRUE);

		$this->load->view('admin/layout', array('head' => $head,
			'header' => $header,
			'sidemenu' => $sidemenu,
			'content' => $content,
			'footer' => $footer,
			'scripts' => $scripts));
	}
	public function documentJobseeker($id) {
		$doc = $this->jobseeker->getDocumentJobseeker($id);
		echo json_encode($doc);
	}
	function getToken() {
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		echo json_encode($csrf);
	}
	function checkEmailExits($email) {
		$output = $this->jobseeker->checkEmailExits($email);

		if ($output) {
			echo json_encode($output);
		} else {
			echo json_encode(false);
		}

	}
}