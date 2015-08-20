<?php
class Register extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Register_model', 'account');
	}

	public function index(){
		$head = $this->load->view('main/head', array('titlePage' => 'JOB7VN Group|user register'), TRUE);
		$header = $this->load->view('main/header', array(
			'logo' => 'img/header/logo.jpg',
			'showTitle' => true,
			'logoWidth' => '70px',
			'logoHeight' => '70px',
		), TRUE);

		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		$content = $this->load->view('main/user_register', array('csrf' => $csrf), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer));
	}
	//Add account
	public function insertAccount(){
		$account_email = $this->input->post('account_email');
		$account_password = $this->input->post('account_password');
		$account_first_name = $this->input->post('account_first_name');
		$account_last_name = $this->input->post('account_last_name');
		$account_is_get_news = $this->input->post('account_email');
		$account_map_role = $this->input->post('account_map_role');
		$account_is_delete = $this->input->post('account_is_delete');
		$account_is_disabled = $this->input->post('account_is_disabled');
		$account_updated_at = $this->input->post('account_updated_at');
		$account_created_at = $this->input->post('account_created_at');
		$data = array(
			'account_email' => $account_email,
			'account_password' => $account_password,
			'account_first_name' => $account_first_name,
			'account_last_name' => $account_last_name,
			'account_is_get_news' => '0',
			'account_is_delete' => '0',
			'account_is_disabled' => '0',
			'account_map_role' => '1',
			'account_created_at' => date('Y-m-d'),
		);
		$id_account = $this->account->insertAccount($data);
	}
	
}