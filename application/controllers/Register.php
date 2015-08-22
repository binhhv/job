<?php
class Register extends CI_Controller{
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('security');
		$this->load->model('Register_model', 'account');
		$this->load->helper('form');
    	$this->load->library('form_validation');
    	$this->lang->load('vi', 'vietnamese');
    	$this->load->library('session');
	}

	public function index(){
		$this->session->sess_destroy();
		// Create session array and store default language values in array
		$sess_data = array();
		$sess_data['default'] = 'vietnamese';
		$sess_data['title_re_user'] = $this->lang->line('title_re_user');
		$sess_data['email_re_user'] = $this->lang->line('email_re_user');
		$sess_data['password_re_user'] = $this->lang->line('password_re_user');
		$sess_data['passconf_re_user'] = $this->lang->line('passconf_re_user');
		$sess_data['first_name_re_user'] = $this->lang->line('first_name_re_user');
		$sess_data['last_name_re_user'] = $this->lang->line('last_name_re_user');
		$sess_data['btn_register_re_user'] = $this->lang->line('btn_register_re_user');
		// Set values in session
		$this->session->set_userdata('session_data', $sess_data);

		// Retrieve session values
		$set_data = $this->session->all_userdata();

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
		$content = $this->load->view('main/employer_register', array('csrf' => $csrf, 'session_data' => $sess_data), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer));
	}
	//Add accountarrau
	public function insertAccount(){
		//set validate 
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('valid_email', $this->lang->line('invalid-email'));
		$this->form_validation->set_message('matches', $this->lang->line('matches'));


		$this->form_validation->set_error_delimiters('<div class="error-register">', '</div>');
		$this->form_validation->set_rules('account_email', 'lang:email', 'callback_email_check|trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('account_password', 'lang:password', 'trim|required|min_length[6]|xss_clean|matches[confirm_password]|md5');
  		$this->form_validation->set_rules('confirm_password', 'lang:passconf', 'trim|required|min_length[6]|xss_clean');
   		$this->form_validation->set_rules('account_first_name', 'lang:first_name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('account_last_name', 'lang:last_name', 'trim|required|xss_clean');

	    if ($this->form_validation->run()) {
	        $account_email = $this->security->xss_clean($this->input->post('account_email'));
	        $account_password = $this->security->xss_clean($this->input->post('account_password'));
			$account_first_name = $this->security->xss_clean($this->input->post('account_first_name'));
			$account_last_name = $this->security->xss_clean($this->input->post('account_last_name'));
	        $account_is_get_news = '0';
			$account_map_role = '0';
			$account_is_delete = '0';
			$account_is_disabled = '0';
			// $account_updated_at = new date('Y-m-d')
			// $account_created_at = new date('Y-m-d')
			$data = array(
				'account_email' => $account_email,
				'account_password' => md5($account_password),
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
			echo json_encode(array('status' => 'success', 'content' => 'Register complete'));
        	
	    } else {
	        $data = array(
	            // 'roll' => form_error('roll'),
	            'account_email' => form_error('account_email'),
	            'account_password' => form_error('account_password'),
	            'confirm_password' => form_error('confirm_password'),
	            'account_first_name' => form_error('account_first_name'),
	            'account_last_name' => form_error('account_last_name'),
	            'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash(),
	        );
	      
	        echo json_encode(array('status' => 'errvalid', 'content' => $data));
	    }
	}
	//insert account deployer
	public function insertAccountDeployer(){
		//set validate 
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('valid_email', $this->lang->line('invalid-email'));
		$this->form_validation->set_message('matches', $this->lang->line('matches'));


		$this->form_validation->set_error_delimiters('<div class="error-register">', '</div>');
		$this->form_validation->set_rules('account_email', 'lang:email', 'callback_email_check|trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('account_password', 'lang:password', 'trim|required|min_length[6]|xss_clean|matches[confirm_password]|md5');
  		$this->form_validation->set_rules('confirm_password', 'lang:passconf', 'trim|required|min_length[6]|xss_clean');
   		$this->form_validation->set_rules('account_first_name', 'lang:first_name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('account_last_name', 'lang:last_name', 'trim|required|xss_clean');

	    if ($this->form_validation->run()) {
	        $account_email = $this->security->xss_clean($this->input->post('account_email'));
	        $account_password = $this->security->xss_clean($this->input->post('account_password'));
			$account_first_name = $this->security->xss_clean($this->input->post('account_first_name'));
			$account_last_name = $this->security->xss_clean($this->input->post('account_last_name'));
	        $account_is_get_news = '0';
			$account_map_role = '0';
			$account_is_delete = '0';
			$account_is_disabled = '0';
			// $account_updated_at = new date('Y-m-d')
			// $account_created_at = new date('Y-m-d')
			$data = array(
				'account_email' => $account_email,
				'account_password' => md5($account_password),
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
			echo json_encode(array('status' => 'success', 'content' => 'Register complete'));
        	
	    } else {
	        $data = array(
	            // 'roll' => form_error('roll'),
	            'account_email' => form_error('account_email'),
	            'account_password' => form_error('account_password'),
	            'confirm_password' => form_error('confirm_password'),
	            'account_first_name' => form_error('account_first_name'),
	            'account_last_name' => form_error('account_last_name'),
	            'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash(),
	        );
	      
	        echo json_encode(array('status' => 'errvalid', 'content' => $data));
	    }
	}

	public function email_check($account_email){
		# check email exits
		$checkemail = $this->account->checkEmailExits($account_email);
		if($checkemail){
			$this->form_validation->set_message('email_check', '\'%s\' này đã tồn tại vui lòng đăng nhập hoặc nhập tài khoản khác.');
			return FALSE;
		}
		else{
			return TRUE;
		}
	}
	
}