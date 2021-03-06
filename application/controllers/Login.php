<?php
/**
 *
 */
class Login extends CI_Controller {

	function __construct() {
		# code...
		parent::__construct();
		//$this->load->helper('url');
		$this->load->model('Contact_model', 'contact');
		$this->load->helper('security');
		$this->load->helper(array('form', 'url', 'cookie'));
		$this->load->library(array('form_validation', 'session'));
		$this->load->model('DBUtil');
		// if (!isset($this->session->userdata['user'])) {
		// 	$this->session->set_userdata('last_page', current_url());
		// }

	}
	function index() {
		if (!isset($this->session->userdata['user']) || !$this->session->userdata['user']['isLogged']) {
			$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash(),
			);
			$url = $this->input->get('url');
			log_message('error', $url);
			$this->session->set_userdata('redirect', array('url' => $url));
			$this->loadViewLogin();
		}
		// } else {
		// 	//if ($this->session->userdata['user']['role'] != 5 && $this->session->userdata['user']['role'] != 1) {
		// 	//$current_url = $this->session->userdata('last_page');
		// 	//$this->session->unset_userdata('last_page');
		// 	//redirect(base_url($current_url));
		// 	$url = $this->input->get('url');
		// 	if (strlen($url) > 0) {
		// 		redirect($url);
		// 	} else {
		// 		redirect(base_url('/'));
		// 	}
		// 	//} else {
		// 	//redirect(base_url() . 'admin');
		// 	//}

		// }
	}
	function loadViewLogin($error = null) {
		$head = $this->load->view('main/head', array('titlePage' => 'JOB7VN Group|Contact'), TRUE);
		$header = $this->load->view('main/header', array(
			'logo' => 'img/header/allSHIGOTO.png',
			'showTitle' => true,
			'logoWidth' => '170px',
			'logoHeight' => '70px',
			'menu' => '',
		), TRUE);
		//$ab = m;

		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		$content = $this->load->view('main/login', array('errors' => $error, 'csrf' => $csrf), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('isGray' => true, 'head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer));

	}
	public function checkLogin() {
		$this->form_validation->set_message('required', " '%s' không được để trống");
		$this->form_validation->set_message('valid_email', "email không hợp lệ");
		// $this->form_validation->set_message('numeric', "số điện thoại không hợp lệ");
		// $this->form_validation->set_message('max_length', "số điện thoại nhỏ hơn 12 số");
		// $this->form_validation->set_message('min_length', "số điện thoại lớn hơn 10 số");

		# Thiết lập các quy tắc cho từng trường trong form
		// $this->form_validation->set_rules('name', 'Họ tên', 'trim|required|xss_clean');
		// //$this->form_validation->set_rules('jobseeker_phone', 'Số điện thoại', 'trim|required|numeric|max_length[12]|min_length[10]');
		// $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		// $this->form_validation->set_rules('subject', 'Tiêu đề', 'trim|required|xss_clean');
		// $this->form_validation->set_rules('message', 'Nội dung', 'trim|required|xss_clean');

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required');
		#Kiểm tra điều kiện validate
		$check = true;
		if ($this->form_validation->run() == TRUE) {
			$a_UserInfo['email'] = $this->security->xss_clean($this->input->post('email', true));
			$a_UserInfo['password'] = md5($this->security->xss_clean($this->input->post('password', true)));
			$autologin = ($this->input->post('remember_me') == 'on') ? 1 : 0;
			$projection = array('from' => 'account', 'where' => "account_email = " . $this->DBUtil->escape($a_UserInfo['email']) . " AND account_password = " . $this->DBUtil->escape($a_UserInfo['password']) . "");
			$a_UserChecking = $this->DBUtil->getFromDb($projection);

			if ($a_UserChecking) {
				if ($autologin == 1) {
					$cookie_name = 'siteAuth';
					$cookie_time = 3600 * 24 * 30; // 30 days.
					setcookie('ci-session', 'user=' . "", time() - 3600); // Unset cookie of user
					setcookie($cookie_name, 'user=' . $a_UserChecking[0]->account_email . '&password=' . $a_UserChecking[0]->account_password . '&role=' . $a_UserChecking[0]->account_map_role . '&id=' . $a_UserChecking[0]->account_id, time() + $cookie_time . '$isLogged=1'
						. '&firstname = ' . $a_UserChecking[0]->account_first_name . '&lastname = ' . $a_UserChecking[0]->account_last_name);
				}
				$this->session->set_userdata('user', array('id' => $a_UserChecking[0]->account_id,
					'email' => $a_UserChecking[0]->account_email,
					'role' => $a_UserChecking[0]->account_map_role,
					'isLogged' => true,
					'firstname' => $a_UserChecking[0]->account_first_name,
					'lastname' => $a_UserChecking[0]->account_last_name));

				//redirect(base_url('admin'));
			} else {
				$check = false;
			}

		} else {
			$check = false;

		}
		if (!$check) {

			$errorsMessage = 'Email hoặc mật khẩu không đúng.';
			$this->loadViewLogin($errorsMessage);
		} else {
			//$current_url = $this->session->userdata['last_page'];
			//$this->session->unset_userdata('last_page');
			//redirect($current_url, 'refresh');
			$url = $this->session->userdata['redirect']['url'];
			log_message('error', $url);
			if (isset($url)) {
				//$url = $this->session->userdata['redirect'];
				//unset($_SESSION['redicrect']);
				$this->session->unset_userdata('redirect');
				if (strpos($url, "login") > 0) {
					$url = base_url('/');
				}
				redirect($url);

			} else {
				redirect(base_url());
			}
		}

	}

	public function logout() {
		$this->session->sess_destroy(); // Unset session of user
		$cookiename = "siteAuth";
		setcookie($cookiename, 'user=' . "", time() - 3600); // Unset cookie of user
		redirect(base_url('/'));
	}
}