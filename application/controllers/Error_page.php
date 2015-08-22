<?php
/**
 *
 */
class Error_page extends CI_Controller {

	function __construct() {
		# code...
		parent::__construct();
		$this->load->helper('url');

	}
	function index() {
		$this->load->view('admin/errors/404');
	}
}