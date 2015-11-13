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
		// if (!$this->session->userdata['user']['isLogged']) {
		// 	redirect(base_url() . 'login'); // no session established, kick back to login page
		// }
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
		$scriptOption = array('assets/main/scroll/jquery.nicescroll.min.js', 'assets/main/js/employer/jquery_account.js');

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
		$view = $this->load->view('main/employer/partial/profile', array('employerInfo' => $employerInfo), TRUE);
		echo $view;
	}
	function getAccountsEmployer() {
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
		$listAccount = $this->employer->getListAccount($employerInfo->employer_id);
		$view = $this->load->view('main/employer/partial/accounts', array('employerInfo' => $employerInfo, 'listAccount' => $listAccount), TRUE);
		echo $view;
	}
	function deleteAccount() {
		$idUser = $this->input->post('idUser');
		if (is_numeric($idUser)) {
			$result = $this->employer->deleteAccount($idUser);
			$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash(),
			);
			if ($result) {
				echo json_encode(array('content' => array('status' => 'success', 'modal' => 'modal-delete-account-em', 'csrf' => $csrf)));
			} else {
				echo json_encode(array('content' => array('status' => 'error', 'modal' => 'modal-delete-account-em', 'csrf' => $csrf)));
			}
		} else {
			redirect(base_url('404'), 'refresh');
		}
	}
	function disableAccount() {
		$idUser = $this->input->post('idUser');
		if (is_numeric($idUser)) {
			$result = $this->employer->disableAccount($idUser, true);
			$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash(),
			);
			if ($result) {
				echo json_encode(array('content' => array('status' => 'success', 'modal' => 'modal-disable-account-em', 'csrf' => $csrf)));
			} else {
				echo json_encode(array('content' => array('status' => 'error', 'modal' => 'modal-disable-account-em', 'csrf' => $csrf)));
			}
		} else {
			redirect(base_url('404'), 'refresh');
		}
	}
	function enableAccount() {
		$idUser = $this->input->post('idUser');
		if (is_numeric($idUser)) {
			$result = $this->employer->disableAccount($idUser, false);
			$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash(),
			);
			if ($result) {
				echo json_encode(array('content' => array('status' => 'success', 'modal' => 'modal-enable-account-em', 'csrf' => $csrf)));
			} else {
				echo json_encode(array('content' => array('status' => 'error', 'modal' => 'modal-enable-account-em', 'csrf' => $csrf)));
			}
		} else {
			redirect(base_url('404'), 'refresh');
		}
	}
	function getViewAccountEmployer($idUser) {
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		if ($idUser != 0) {
			$userEdit = $this->employer->getInfoAccountEmployer($idUser);
			$view = $this->load->view('main/employer/partial/account', array('userEdit' => $userEdit, 'idUser' => $idUser, 'csrf' => $csrf), TRUE);
		} else {
			$view = $this->load->view('main/employer/partial/account', array('idUser' => $idUser, 'csrf' => $csrf), TRUE);
		}
		echo $view;
	}

	function createAccount() {
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('valid_email', $this->lang->line('invalid-email'));
		$this->form_validation->set_message('matches', $this->lang->line('matches'));
		$this->form_validation->set_message('regex_match', $this->lang->line('regex_match'));
		$this->form_validation->set_message('min_length', $this->lang->line('min_length'));

		$this->form_validation->set_rules('firstname', $this->lang->line('first_name'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('lastname', $this->lang->line('last_name'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', $this->lang->line('email'), 'callback_email_check|trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('password', $this->lang->line('password'), 'trim|required|min_length[6]|matches[passconf]|xss_clean|md5');
		$this->form_validation->set_rules('passconf', $this->lang->line('passconf'), 'trim|required|min_length[6]|xss_clean|md5');
		$user = $this->session->userdata['user'];
		if ($this->form_validation->run()) {
			$firstname = $this->security->xss_clean($this->input->post('firstname'));
			$lastname = $this->security->xss_clean($this->input->post('lastname'));
			$email = $this->security->xss_clean($this->input->post('email'));
			$password = $this->security->xss_clean($this->input->post('password'));
			$data = array(
				'account_first_name' => $firstname,
				'account_last_name' => $lastname,
				'account_update_at' => date('Y-m-d'),
				'account_created_at' => date('Y-m-d'),
				'account_is_disabled' => false,
				'account_is_delete' => false,
				'account_map_role' => 3,
				'account_is_get_news' => false,
				'account_password' => $password,
				'account_email' => $email);
			$user = $this->session->userdata['user'];
			$employerInfo = $this->employer->getInfoEmployer($user['id']);

			$result = $this->employer->createAccountEmployer($data, $employerInfo);
			if ($result) {
				echo json_encode(array('status' => 'success', 'content' => array('csrf' => array(
					'name' => $this->security->get_csrf_token_name(),
					'hash' => $this->security->get_csrf_hash()))));
			} else {
				redirect(base_url('404'), 'refresh');
			}

		} else {
			$dataerr = array(
				'firstname' => form_error('firstname'),
				'lastname' => form_error('lastname'),
				'email' => form_error('email'),
				'password' => form_error('password'),
				'passconf' => form_error('passconf'),
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash(),
			);
			echo json_encode(array('status' => 'errvalid', 'content' => $dataerr));
		}
	}
	public function email_check($account_email) {
		# check email exits
		$checkemail = $this->account->checkEmailExits($account_email);
		if ($checkemail) {
			$this->form_validation->set_message('email_check', $this->lang->line('email_exist'));
			return FALSE;
		} else {
			return TRUE;
		}
	}
	function updateAccount() {
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('valid_email', $this->lang->line('invalid-email'));
		$this->form_validation->set_message('matches', $this->lang->line('matches'));
		$this->form_validation->set_message('regex_match', $this->lang->line('regex_match'));
		$this->form_validation->set_message('min_length', $this->lang->line('min_length'));

		$this->form_validation->set_rules('firstname', $this->lang->line('first_name'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('lastname', $this->lang->line('last_name'), 'trim|required|xss_clean');
		//$this->form_validation->set_rules('email', $this->lang->line('email'), 'callback_email_check|trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('password', $this->lang->line('password'), 'trim|required|min_length[6]|matches[passconf]|xss_clean|md5');
		$this->form_validation->set_rules('passconf', $this->lang->line('passconf'), 'trim|required|min_length[6]|xss_clean|md5');
		$user = $this->session->userdata['user'];
		if ($this->form_validation->run()) {
			$firstname = $this->security->xss_clean($this->input->post('firstname'));
			$lastname = $this->security->xss_clean($this->input->post('lastname'));
			$idUser = $this->security->xss_clean($this->input->post('idUser'));
			$password = $this->security->xss_clean($this->input->post('password'));
			$data = array(
				'from' => 'account',
				'where' => 'account_id = ' . $idUser,
				'data' => array(
					'account_first_name' => $firstname,
					'account_last_name' => $lastname,
					'account_update_at' => date('Y-m-d'),
					'account_password' => $password));
			//$user = $this->session->userdata['user'];
			//$employerInfo = $this->employer->getInfoEmployer($user['id']);

			$result = $this->employer->updateUserEmployer($data);
			if ($result) {
				echo json_encode(array('status' => 'success', 'content' => array('csrf' => array(
					'name' => $this->security->get_csrf_token_name(),
					'hash' => $this->security->get_csrf_hash()))));
			} else {
				redirect(base_url('404'), 'refresh');
			}

		} else {
			$dataerr = array(
				'firstname' => form_error('firstname'),
				'lastname' => form_error('lastname'),
				'email' => '',
				'password' => form_error('password'),
				'passconf' => form_error('passconf'),
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash(),
			);
			echo json_encode(array('status' => 'errvalid', 'content' => $dataerr));
		}
	}

}