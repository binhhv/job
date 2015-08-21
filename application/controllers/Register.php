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
	//Add accountarrau
	public function insertAccount(){
		// $output = json_encode(array('email'=> $this->input->post('account_email')));
		// echo json_encode($output);

		$account_email = $this->input->post('account_email');
		$account_password = $this->input->post('account_password');
		$account_first_name = $this->input->post('account_first_name');
		$account_last_name = $this->input->post('account_last_name');
		$account_is_get_news = '0';
		$account_map_role = '0';
		$account_is_delete = '0';
		$account_is_disabled = '0';
		// $account_updated_at = new date('Y-m-d')
		// $account_created_at = new date('Y-m-d')
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
		$id_account = 0;
		try {
			$id_account = $this->account->insertAccount($data);
		} catch (Exception $e) {
			
		}
		$msg = 'register success';
		$output = json_encode(array("id" => $id_account,
			"msg" => $msg));
		$this->output->set_content_type('application/json');
		$this->output->set_output($output);
	}
	
}