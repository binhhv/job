<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//require "vendor/autoload.php";

class Home extends CI_Controller {
	public function __construct(  ){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		
	}
	public function index(){
		$slide = array('slide1.jpg','slide1.jpg','slide1.jpg','slide1.jpg'
			);
			$head = $this->load->view('view1/head',array(),TRUE);
			$header = $this->load->view('view1/header',array(
										'logo'=>'img/header/logo.jpg',
										'showTitle'=>true,
										'logoWidth'=>'70px',
										'logoHeight'=>'70px'
										),TRUE);
			$content = $this->load->view('view1/content',array('slides'=>$slide,'userprofile'=>$this->session->userdata('fb')),TRUE);
			$footer = $this->load->view('view1/footer',array(),TRUE);
			$this->load->view('view1/layout',array('head'=>$head,'header'=>$header,'content'=>$content,'footer'=>$footer));
	}
}