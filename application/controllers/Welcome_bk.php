<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//require "vendor/autoload.php";
require FCPATH.'/src/facebook.php';
class Welcomebk extends CI_Controller {
	public function __construct(  ){
		parent::__construct();
		$this->load->helper('url');
		 //$this->load->library(array('session', 'lib_login'));
		//$this->load->library('facebook'); 
		$this->config->load('facebook');
		
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
	public function index($section ='default')

	{

		//require FCPATH.'/src/facebook.php';

// $config['appId']   = '1494342414191651';
// $config['secret']  = '775288a56787896f92da0f2096c6de7c';
// Create our Application instance (replace this with your appId and secret).
				
// $this->facebook = new Facebook(array(
// 				  'appId'  => '1494342414191651',
// 				  'secret' => '775288a56787896f92da0f2096c6de7c',
// 				));
				// Get User ID
				//$user = $this->facebook->getUser();
				//var_dump($user);
				// We may or may not have this data based on whether the user is logged in.
				//
				// If we have a $user id here, it means we know the user is logged into
				// Facebook, but we don't know if the access token is valid. An access
				// token is invalid if the user logged out of Facebook.

				if ($user) {
				  try {
				    // Proceed knowing you have a logged in user who's authenticated.
				    $user_profile = $this->facebook->api('/me');
				  } catch (FacebookApiException $e) {
				    error_log($e);
				    $user = null;
				  }
				}

				// Login or logout url will be needed depending on current user state.
				if ($user) {
				  $logoutUrl = $this->facebook->getLogoutUrl();
				
				 // var_dump($user);
				  if($section == 'default'){
			
		//'logo'=>'img/header/logo.jpg',
			$slide = array('slide1.jpg','slide1.jpg','slide1.jpg','slide1.jpg'
			);
			$head = $this->load->view('view1/head',array(),TRUE);
			$header = $this->load->view('view1/header',array(
										'logo'=>'img/header/logo.jpg',
										'showTitle'=>true,
										'logoWidth'=>'70px',
										'logoHeight'=>'70px'
										),TRUE);
			$content = $this->load->view('view1/content',array('slides'=>$slide,'userprofile'=>$user_profile),TRUE);
			$footer = $this->load->view('view1/footer',array(),TRUE);
			$this->load->view('view1/layout',array('head'=>$head,'header'=>$header,'content'=>$content,'footer'=>$footer));
		}




				} else {
				  $loginUrl = $this->facebook->getLoginUrl();
				  //header($loginUrl);
				  header('Location:'.$loginUrl);
				}


		// $code = parse_str($_SERVER['code'], $_GET);
		// if(isset($code)){
		// 	redirect('/job/');
		// }


				// $facebook = new Facebook(array(
				//   'appId'  => '1494342414191651',
				//   'secret' => '775288a56787896f92da0f2096c6de7c',
				// ));

				// Get User ID
				//$user = $this->facebook->getUser();

				// We may or may not have this data based on whether the user is logged in.
				//
				// If we have a $user id here, it means we know the user is logged into
				// Facebook, but we don't know if the access token is valid. An access
				// token is invalid if the user logged out of Facebook.

		// 		if ($user) {
		// 		  try {
		// 		    // Proceed knowing you have a logged in user who's authenticated.
		// 		    $user_profile = $this->facebook->api('/me');
		// 		  } catch (FacebookApiException $e) {
		// 		    error_log($e);
		// 		    $user = null;
		// 		  }
		// 		}

		// 		// Login or logout url will be needed depending on current user state.
		// 		if ($user) {
		// 		  $logoutUrl = $this->facebook->getLogoutUrl();
				
		// $loginUrl ='';
		// var_dump($user_profile);
		// if($section == 'default'){
			
		// //'logo'=>'img/header/logo.jpg',
		// 	$slide = array('slide1.jpg','slide1.jpg','slide1.jpg','slide1.jpg'
		// 	);
		// 	$head = $this->load->view('view1/head',array(),TRUE);
		// 	$header = $this->load->view('view1/header',array(
		// 								'logo'=>'img/header/logo.jpg',
		// 								'showTitle'=>true,
		// 								'logoWidth'=>'70px',
		// 								'logoHeight'=>'70px',
		// 								'loginUrl'=>$loginUrl),TRUE);
		// 	$content = $this->load->view('view1/content',array('slides'=>$slide),TRUE);
		// 	$footer = $this->load->view('view1/footer',array(),TRUE);
		// 	$this->load->view('view1/layout',array('head'=>$head,'header'=>$header,'content'=>$content,'footer'=>$footer));
		// }
		// } else {
		// 		  //$loginUrl = $this->facebook->getLoginUrl();
		// 			//var_dump($loginUrl);
		// 			//redirect($loginUrl);
		// 		  $myurl = site_url('');

		// 			redirect($this->facebook->getLoginUrl(array('scope' => 'email', 'redirect_uri' => $myurl)));
		// 		}
		//var_dump($user);
		// else if($section =='view2'){
		// 	$head = $this->load->view('view2/head',array(),TRUE);
		// 	$header = $this->load->view('view2/header',array(),TRUE);
		// 	$content = $this->load->view('view2/content',array(),TRUE);
		// 	$footer = $this->load->view('view2/footer',array(),TRUE);

		// 	$this->load->view('view2/layout',array('head'=>$head,'header'=>$header,'content'=>$content,'footer'=>$footer));
		// }
	}
	public function loadview(){
		$head = $this->load->view('view2/head',array(),TRUE);
		$header = $this->load->view('view2/header',array(),TRUE);
		$content = $this->load->view('view2/content',array(),TRUE);
		$footer = $this->load->view('view2/footer',array(),TRUE);

		$this->load->view('view2/layout',array('head'=>$head,'header'=>$header,'content'=>$content,'footer'=>$footer));
	}

	 public function logout(){

       // $this->load->library('facebook');
        // Logs off session from website
       // $this->facebook->destroysession();
        // $this->facebook->destroySession();       
        //$this->session->sess_destroy();  // Assuming you have session helper loaded
        //$this->load->view('logout');
        // Make sure you destory website session as well.
        //redirect('/');
        $signed_request_cookie = 'fbsr_' . $this->config->item('appId');
setcookie($signed_request_cookie, '', time() - 3600, "/");
$this->session->sess_destroy();  //session destroy
redirect('/job', 'refresh');
    }
    public function example(){
    	$this->load->view('example');
    }
    public function fblogin() {
 
$facebook = new Facebook(array(
'appId' => $this->config->item('appId'),
'secret' => $this->config->item('secret'),
));
// We may or may not have this data based on whether the user is logged in.
// If we have a $user id here, it means we know the user is logged into
// Facebook, but we don't know if the access token is valid. An access
// token is invalid if the user logged out of Facebook.
$user = $facebook->getUser(); // Get the facebook user id
$profile = NULL;
$logout = NULL;
 
if ($user) {
try {
$profile = $facebook->api('/me');  //Get the facebook user profile data
$access_token = $facebook->getAccessToken();
$params = array('next' => base_url('job/logout/'), 'access_token' => $access_token);
$logout = $facebook->getLogoutUrl($params);
 
} catch (FacebookApiException $e) {
error_log($e);
$user = NULL;
}
 
$data['user_id'] = $user;
$data['name'] = $profile['name'];
$data['logout'] = $logout;
$this->session->set_userdata($data);
redirect('/job');
}

}
