<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//require "vendor/autoload.php";
require FCPATH.'/src/facebook.php';
class Default extends CI_Controller {
	public function __construct(  ){
		parent::__construct();
		$this->load->helper('url');
		$this->config->load('facebook');
		$this->load->library('session');
		
	}
}