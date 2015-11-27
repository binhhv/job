<?php
/**
 *
 */
require FCPATH . '/facebook/autoload.php';
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
		$this->load->model('Utilmodel', 'util');
		$this->load->model('Account/Account_model', 'account');
		$this->load->model('admin/Mail_model', 'mail');
		$this->lang->load('message', 'vi');
		// if (!isset($this->session->userdata['user'])) {
		// 	$this->session->set_userdata('last_page', current_url());
		// }

		// $fb_config = array(
		// 	'appId' => APP_ID, //APP_ID và SECRET_KEY 2 biến này bạn đã define trong constants nên sử dụng rất dễ dàng
		// 	'secret' => SECRET_KEY,
		// 	'cookie' => TRUE,
		// );
		// // load library facebook để có thể sử dụng SDK của facebook nhé
		// $this->load->library('facebook', $fb_config);

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
		} else {
			redirect(base_url(), 'refresh');
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
		$fb = new Facebook\Facebook([
			'app_id' => APP_ID,
			'app_secret' => SECRET_KEY,
			'default_graph_version' => 'v2.5',
			//'default_access_token' => '{access-token}', // optional
		]);

		$helper = $fb->getRedirectLoginHelper();
		$permissions = ['email', 'user_likes']; // optional
		$loginUrl = $helper->getLoginUrl(base_url('login-callback'), $permissions);

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
		$content = $this->load->view('main/login', array('errors' => $error, 'csrf' => $csrf, 'loginUrl' => $loginUrl), TRUE);
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
		$email = $this->security->xss_clean($this->input->post('email', true));
		if ($this->form_validation->run() == TRUE) {
			$a_UserInfo['email'] = $this->security->xss_clean($this->input->post('email', true));
			$a_UserInfo['password'] = md5($this->security->xss_clean($this->input->post('password', true)));
			$autologin = ($this->input->post('remember_me') == 'on') ? 1 : 0;
			$projection = array('from' => 'account', 'where' => "account_email = " . $this->DBUtil->escape($a_UserInfo['email']) . " AND account_password = " . $this->DBUtil->escape($a_UserInfo['password']) . " AND account_is_delete = 0 AND account_is_disabled = 0" . "");
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
				$this->util->insertLog('account', $a_UserChecking[0]->account_id, '', '', 1, $a_UserChecking[0]->account_id);

				//redirect(base_url('admin'));
			} else {
				$check = false;
			}

		} else {
			$check = false;

		}
		if (!$check) {

			$errorsMessage = array('msg' => 'Email hoặc mật khẩu không đúng.', 'email' => $email);
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
				if (strpos($url, "login") > 0 || strpos($url, "register_uv") || strpos($url, "register_ntd") || strpos($url, "forgot-password")) {
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
	// function loginFacebook() {
	// 	$fbuser = $this->facebook->getUser();
	// 	if ($fbuser) {
	// 		try {
	// 			$user_profile = $this->facebook->api('/me');
	// 		} catch (Exception $e) {
	// 			echo $e->getMessage();
	// 			exit();
	// 		}
	// 		log_message('error', 'data' . json_encode($user_profile));
	// 		// $check = $this->m_login->get_user_profile_by_email($user_profile['email']);
	// 		// if (!$check) {
	// 		// 	$member = $this->save_member($user_profile);
	// 		// 	$this->session->set_userdata('user_facebook', $member);
	// 		// } else {
	// 		// 	$this->session->set_userdata('user_facebook', $check);
	// 		// }
	// 		// redirect(base_url());
	// 	}
	// }

	public function loginFacebook() {

		// $facebook = new Facebook(array(
		// 	'appId' => '1672938849618450',
		// 	'secret' => 'c508e7f3406fabac62dbe84f23d8a2c6',
		// 	'sharedSession' => true,
		// 	'trustForwarded' => true,
		// 	'cookie' => true,
		// ));
		$fb = new Facebook\Facebook([
			'app_id' => '1090634494280675',
			'app_secret' => '0007b52d7e40ed5e30827aa119f994b0',
			'default_graph_version' => 'v2.5',
			//'default_access_token' => '{access-token}', // optional
		]);

		$helper = $fb->getRedirectLoginHelper();
		$permissions = ['email', 'user_likes']; // optional
		$loginUrl = $helper->getLoginUrl(base_url('login-callback'), $permissions);

		echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';

// 		$helper = $fb->getRedirectLoginHelper();
		// 		try {
		// 			$accessToken = $helper->getAccessToken();
		// 		} catch (Facebook\Exceptions\FacebookResponseException $e) {
		// 			// When Graph returns an error
		// 			echo 'Graph returned an error: ' . $e->getMessage();
		// 			exit;
		// 		} catch (Facebook\Exceptions\FacebookSDKException $e) {
		// 			// When validation fails or other local issues
		// 			echo 'Facebook SDK returned an error: ' . $e->getMessage();
		// 			exit;
		// 		}

// 		if (isset($accessToken)) {
		// 			// Logged in!
		// 			$_SESSION['facebook_access_token'] = (string) $accessToken;

// 			// Now you can redirect to another page and use the
		// 			// access token from $_SESSION['facebook_access_token']
		// 		}

// // Use one of the helper classes to get a Facebook\Authentication\AccessToken entity.
		// 		//   $helper = $fb->getRedirectLoginHelper();
		// 		//   $helper = $fb->getJavaScriptHelper();
		// 		//   $helper = $fb->getCanvasHelper();
		// 		//   $helper = $fb->getPageTabHelper();

// 		try {
		// 			// Get the Facebook\GraphNodes\GraphUser object for the current user.
		// 			// If you provided a 'default_access_token', the '{access-token}' is optional.
		// 			$response = $fb->get('/me');
		// 		} catch (Facebook\Exceptions\FacebookResponseException $e) {
		// 			// When Graph returns an error
		// 			echo 'Graph returned an error: ' . $e->getMessage();
		// 			exit;
		// 		} catch (Facebook\Exceptions\FacebookSDKException $e) {
		// 			// When validation fails or other local issues
		// 			echo 'Facebook SDK returned an error: ' . $e->getMessage();
		// 			exit;
		// 		}

// 		$me = $response->getGraphUser();
		// 		//echo 'Logged in as ' . $me->getName();
		// 		print_r($me);

		// if (!is_null($this->session->userdata('fb'))) {
		// 	//redirect('/');
		// 	redirect('/home');
		// } else {
		// $user = $facebook->getUser();
		// if ($user) {
		// 	$user_profile = null;
		// 	try {
		// 		//Proceed knowing you have a logged in user who's authenticated.
		// 		$user_profile = $facebook->api('/me?fields=name,email');
		// 		var_dump($user_profile);
		// 	} catch (FacebookApiException $e) {
		// 		error_log($e);
		// 		//$user = null;
		// 		//$this->loadview('404');
		// 		redirect('/');
		// 	}

		// 	// $logoutUrl = $facebook->getLogoutUrl();
		// 	// $data = array('fb' => array(
		// 	// 	'user_id' => $user,
		// 	// 	'name' => $user_profile['name'],
		// 	// 	'logout' => $logoutUrl,
		// 	// ),
		// 	// );
		// 	// $this->session->set_userdata($data);
		// 	print_r($user);
		// 	$idUserCheck = $this->account->checkExistAccountFB($user_profile);
		// 	if (!$idUserCheck) {
		// 		$result = $this->account->registerAccountFB($user_profile);
		// 		$idUserCheck = $result;
		// 	}
		// 	$this->session->set_userdata('user', array('id' => $idUserCheck,
		// 		'email' => $user_profile['email'],
		// 		'role' => 4,
		// 		'isLogged' => true,
		// 		'firstname' => $user_profile['name'],
		// 		'lastname' => ''));
		// 	$this->util->insertLog('account', $idUserCheck, '', '', 1, $idUserCheck);
		// 	redirect(base_url(), 'refresh');
		// } else {
		// 	$loginUrl = $facebook->getLoginUrl(
		// 		array(
		// 			'scope' => 'email',
		// 		)
		// 	);
		// 	header('Location:' . $loginUrl);
		// 	//$this->load->view('404');
		// 	//$this->loadview('404');
		// }

		//}
	}
	function loginCallback() {
		$fb = new Facebook\Facebook([
			'app_id' => '1090634494280675',
			'app_secret' => '0007b52d7e40ed5e30827aa119f994b0',
			'default_graph_version' => 'v2.5',
			//'default_access_token' => '{access-token}', // optional
		]);

		$helper = $fb->getRedirectLoginHelper();
		try {
			$accessToken = $helper->getAccessToken();
		} catch (Facebook\Exceptions\FacebookResponseException $e) {
			// When Graph returns an error
			echo 'Graph returned an error: ' . $e->getMessage();
			exit;
		} catch (Facebook\Exceptions\FacebookSDKException $e) {
			// When validation fails or other local issues
			echo 'Facebook SDK returned an error: ' . $e->getMessage();
			exit;
		}

		$fb->setDefaultAccessToken($accessToken);

		try {
			$response = $fb->get('/me?fields=name,email');
			$userNode = $response->getGraphUser();
		} catch (Facebook\Exceptions\FacebookResponseException $e) {
			// When Graph returns an error
			//echo 'Graph returned an error: ' . $e->getMessage();
			//exit;
			redirect(base_url(), 'refresh');
		} catch (Facebook\Exceptions\FacebookSDKException $e) {
			// When validation fails or other local issues
			//echo 'Facebook SDK returned an error: ' . $e->getMessage();
			//exit;
			redirect(base_url(), 'refresh');
		}

		if ($userNode) {
			$emailSyncs = $this->account->checkEmailSyncExist($userNode->getEmail());

			if ($emailSyncs) {
				if ($emailSyncs->account_is_sync) {
					$this->session->set_userdata('user', array('id' => $emailSyncs->account_id,
						'email' => $emailSyncs->account_email,
						'role' => $emailSyncs->account_map_role,
						'isLogged' => true,
						'firstname' => $emailSyncs->account_first_name,
						'lastname' => $emailSyncs->account_last_name));
					redirect(base_url(), 'refresh');
				} else {
					//sync account
					$this->loadViewSyncAccount($userNode->getEmail(), $userNode->getId());
				}

			} else {
				$idUserCheck = $this->account->checkExistAccountFB($userNode);
				if (!$idUserCheck) {
					$result = $this->account->registerAccountFB($userNode);
					$idUserCheck = $result;
					//echo 'Logged in as ' . $result;
				}
				$this->session->set_userdata('user', array('id' => $idUserCheck,
					'email' => $userNode->getEmail(),
					'role' => 4,
					'isLogged' => true,
					'firstname' => $userNode->getName(),
					'lastname' => ''));
				$this->util->insertLog('account', $idUserCheck, '', '', 1, $idUserCheck);
				redirect(base_url(), 'refresh');
			}

		}
		//echo 'Logged in as ' . $idUserCheck;
		//print_r($userNode['id']);

	}
	function loadViewSyncAccount($email, $idFacebook) {
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
		$content = $this->load->view('main/sync-account', array('csrf' => $csrf, 'email' => $email, 'idFacebook' => $idFacebook), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('isGray' => true, 'head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer));

	}
	function syncAccount($idFacebook, $email) {
		$result = $this->account->syncAccount(base64_decode($idFacebook), base64_decode($email));
		if ($result) {
			$this->session->set_userdata('user', array('id' => $result->account_id,
				'email' => $result->account_email,
				'role' => $result->account_map_role,
				'isLogged' => true,
				'firstname' => $result->account_first_name,
				'lastname' => $result->account_last_name));
			redirect(base_url(), 'refresh');
		} else {
			redirect(base_url('login'), 'refresh');
		}
	}
	function getForgotPassword() {
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
		$content = $this->load->view('main/forgot-password', array('csrf' => $csrf), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('isGray' => true, 'head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer));

	}
	function forgotPassword() {
		$this->form_validation->set_message('required', " '%s' không được để trống");
		$this->form_validation->set_message('valid_email', "email không hợp lệ");
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
		$check = true;
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		$errorsMessage = array();
		if ($this->form_validation->run() == TRUE) {
			$email = $this->security->xss_clean($this->input->post('email', true));
			$existAccount = $this->account->checkEmailExist($email);
			if (!$existAccount) {
				$check = false;
				$errorsMessage['msg'] = 'Email không tồn tại';
				$errorsMessage['status'] = 'error';
			} else {
				$dataToken = $this->account->insertToken($email);
				$msg = 'Xin chào anh/chị. <br> Để lây lại mật khẩu vui lòng nhấn vào link bên dưới . <br>';
				$msg .= '<a href="' . base_url('get-password') . '/token-' . $dataToken['token'] . '">' . base_url('get-password') . '/token-' . $dataToken['token'] . '</a> <br>';
				$msg .= 'Chân thành cảm ơn anh/chị đã tin tưởng sử dụng dịch vụ của website chúng tôi.<br>';
				$msg .= 'Trân trọng. <br> Ban quản trị website.';
				$subject = 'QUÊN MẬT KHẨU WEBSITE ALLSHIGOTO';
				$this->mail->sendMailForgotPassword($email, $subject, $msg, $dataToken['name']);
				$errorsMessage['status'] = 'success';
			}

		} else {
			$check = false;
			$errorsMessage['msg'] = form_error('email');
			$errorsMessage['status'] = 'error';
		}
		$errorsMessage['csrf'] = $csrf;
		echo json_encode($errorsMessage);
	}
	function getChangeForgotPassword($token) {
		$tokenValidate = $this->account->checkTokenExp($token);
		//print_r($tokenValidate);
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
		$content = $this->load->view('main/change-fpassword', array('csrf' => $csrf, 'tokenValidate' => $tokenValidate), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('isGray' => true, 'head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer));

	}
	function changeForgotPassword() {
		//$this->form_validation->set_message('valid_email', $this->lang->line('invalid-email'));
		$this->form_validation->set_message('matches', $this->lang->line('matches'));
		$this->form_validation->set_message('required', $this->lang->line('required'));
		//$this->form_validation->set_message('valid_email', $this->lang->line('invalid-email'));
		$this->form_validation->set_message('min_length', $this->lang->line('min_length'));
		//$this->form_validation->set_error_delimiters('<label class="error alert-danger">', '</label>');
		//$this->form_validation->set_rules('account_email', 'lang:email', 'callback_email_check|trim|required|valid_email|xss_clean');
		// $this->form_validation->set_rules('old-password', 'lang:passold', 'callback_password_check|trim|required|xss_clean|md5');
		$this->form_validation->set_rules('password', 'lang:password', 'trim|required|min_length[6]|xss_clean|matches[passwordcf]|md5');
		$this->form_validation->set_rules('passwordcf', 'lang:passconf', 'trim|required|min_length[6]|xss_clean|md5');
		//$this->form_validation->set_rules('new-password', 'lang:first_name', 'trim|required|xss_clean');
		//$this->form_validation->set_rules('account_last_name', 'lang:last_name', 'trim|required|xss_clean');
		//$this->form_validation->set_rules('account_captcha', 'lang:captcha', 'trim|invalid-captcha');
		$msg = array();
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		if ($this->form_validation->run()) {
			$password = $this->security->xss_clean($this->input->post('password', true));
			$passwordcf = $this->security->xss_clean($this->input->post('passwordcf', true));
			$idUser = $this->security->xss_clean($this->input->post('idUser', true));

			$data = array('from' => 'account',
				'where' => 'account_id = ' . $idUser,
				'data' => array('account_password' => $password, 'account_token' => '', 'account_token_exp' => date('Y-m-d')));
			log_message('error', json_encode($data));
			$result = $this->account->changeForgotPassword($data);
			if ($result) {
				$msg['status'] = 'success';
			} else {
				$msg['status'] = 'error';
				$msg['error'] = 'KHông thể thay đổi mật khẩu';
			}
		} else {
			$msg['error'] = form_error('password') . '' . form_error('passwordcf');
			$msg['status'] = 'error';
		}
		$msg['csrf'] = $csrf;
		echo json_encode($msg);
	}
}