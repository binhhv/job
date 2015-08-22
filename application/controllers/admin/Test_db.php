<?php
/**
 *
 */
class Test_db extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('form_validation', 'session'));
		$this->load->model('admin/Jobseeker_model', 'jobseeker');

	}
	function insertDB() {
		for ($i = 1; $i < 500; $i++) {
			$paramater = array(
				'account_email' => 'ga' . $i . 'teo@gmail.com',
				'account_password' => md5(trim('conga123')),
				'account_first_name' => 'first' . $i,
				'account_last_name' => 'last' . $i,
				'account_is_get_news' => 0,
				'account_map_role' => 4,
				'account_is_delete' => 0,
				'account_is_disabled' => 0,
				'account_update_at' => date('Y-m-d H:m'),
				'account_created_at' => date('Y-m-d H:m'));
			echo $this->jobseeker->createJobseeker($paramater);
			//echo 'finish';
		}

		echo 'finish';
	}
}