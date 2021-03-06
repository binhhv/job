<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//require "vendor/autoload.php";
require FCPATH . '/src/facebook.php';
class Welcome extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->config->load('facebook');
		$this->load->library('session');

	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index($section = 'default') {
		//$this->fblogin();

		//$this->acceptLogin();
		redirect('home');
		// if($section == 'default' ){

		// //var_dump($this->session->userdata('fb'));
		// }
	}
	public function loadviewIndex() {
		$slide = array('slide1.jpg', 'slide1.jpg', 'slide1.jpg', 'slide1.jpg',
		);
		$head = $this->load->view('main/head', array(), TRUE);
		$header = $this->load->view('main/header', array(
			'logo' => 'img/header/logo.jpg',
			'showTitle' => true,
			'logoWidth' => '70px',
			'logoHeight' => '70px',
		), TRUE);
		$content = $this->load->view('main/content', array('slides' => $slide, 'userprofile' => $this->session->userdata('fb')), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer));
	}
	public function loadview() {
		$head = $this->load->view('view2/head', array(), TRUE);
		$header = $this->load->view('view2/header', array(), TRUE);
		$content = $this->load->view('view2/content', array(), TRUE);
		$footer = $this->load->view('view2/footer', array(), TRUE);

		$this->load->view('view2/layout', array('head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer));
	}

	public function logout() {
		$signed_request_cookie = 'fbsr_' . $this->config->item('appId');
		setcookie($signed_request_cookie, '', time() - 3600, "/");
		//$this->session->sess;//unset_userdata('fb');  //session destroy
		$this->session->sess_destroy();
		redirect('/home', 'refresh');
	}
	public function example() {
		$this->load->view('example');
	}

	public function acceptLogin() {
		$facebook = new Facebook(array(
			'appId' => '1494342414191651',
			'secret' => '775288a56787896f92da0f2096c6de7c',
		));

		if (!is_null($this->session->userdata('fb'))) {
			//redirect('/');
			redirect('/home');
		} else {
			$user = $facebook->getUser();
			if ($user) {
				$user_profile = null;
				try {
					//Proceed knowing you have a logged in user who's authenticated.
					$user_profile = $facebook->api('/me');
					var_dump($user_profile);
				} catch (FacebookApiException $e) {
					error_log($e);
					//$user = null;
					$this->loadview('404');
				}

				$logoutUrl = $facebook->getLogoutUrl();
				$data = array('fb' => array(
					'user_id' => $user,
					'name' => $user_profile['name'],
					'logout' => $logoutUrl,
				),
				);
				$this->session->set_userdata($data);
				redirect('/');
			} else {
				header('Location:' . $facebook->getLoginUrl());
				//$this->load->view('404');
				//$this->loadview('404');
			}

		}
	}
	public function page404() {
		$this->load->view('404');
	}

}
