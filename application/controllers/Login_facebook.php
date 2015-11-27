<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Login_facebook extends CI_Controller {
	function __construct() {
		parent::__construct();
	}
	public function index() {
		if (isset($_GET['code']) AND !empty($_GET['code'])) {
			$code = $_GET['code'];
			// parsing the result to getting access token.
			parse_str($this->get_fb_contents("https://graph.facebook.com/oauth/access_token?client_id=1672938849618450&redirect_uri=" . urlencode(base_url('login')) . "&client_secret=c508e7f3406fabac62dbe84f23d8a2c6&code=" . urlencode($code)));
			redirect('login?access_token=' . $access_token);
		}
		if (!empty($_GET['access_token'])) {
			// getting all user info using access token.
			$fbuser_info = json_decode($this->get_fb_contents("https://graph.facebook.com/me?access_token=" . $_GET['access_token']), true);
			print_r($fbuser_info);
			// you can get all user info from print_r($fbuser_info);
			if (!empty($fbuser_info['email'])) {
				echo $fbuser_info['first_name'];
				echo $fbuser_info['last_name'];
				echo $fbuser_info['email'];
				echo $fbuser_info['gender'];
				echo $fbuser_info['location']['name'];
				echo $fbuser_info['hometown']['name'];
				echo $fbuser_info['birthday'];
				// do your stuff.
				//
				//save the data in db save session and redirect.
			} else {
				$this->session->set_flashdata('message', 'Error while facebook user information.');
				redirect(base_url());
			}
		}
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login'); // loading default view.
		}
	}

/**
 * calling facebook api using curl and return response.
 */
	function get_fb_contents($url) {
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		$response = curl_exec($curl);
		curl_close($curl);
		return $response;
	}
}