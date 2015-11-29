<?php
/**
Contact model
 **/

/**
 *
 */
class Facebook_model extends CI_Model {

	function __construct() {
		# code...
		parent::__construct();
		$this->load->model('Dbutil', 'dbutil');
	}
	public function getLoginUrl() {
		require FCPATH . '/facebook/autoload.php';
		$fb = new Facebook\Facebook([
			'app_id' => APP_ID,
			'app_secret' => SECRET_KEY,
			'default_graph_version' => 'v2.5',
			//'default_access_token' => '{access-token}', // optional
		]);

		$helper = $fb->getRedirectLoginHelper();
		$permissions = ['email', 'user_likes']; // optional
		$loginUrl = $helper->getLoginUrl(base_url('login-callback'), $permissions);
		return $loginUrl;
	}
}