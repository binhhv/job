<?php
class Test_controller extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('My_PHPMailer');
	}
}