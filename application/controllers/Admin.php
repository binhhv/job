<?php
/**
 *
 */
class Admin extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}
	public function index() {
		$head = $this->load->view('admin/head', array(), TRUE);
		$header = $this->load->view('admin/header', array(), TRUE);
		$content = $this->load->view('admin/content', array(), TRUE);
		$footer = $this->load->view('admin/footer', array(), TRUE);
		$sidemenu = $this->load->view('admin/sidemenu', array(), TRUE);

		$this->load->view('admin/layout', array('head' => $head,
			'header' => $header,
			'sidemenu' => $sidemenu,
			'content' => $content,
			'footer' => $footer));
	}
}