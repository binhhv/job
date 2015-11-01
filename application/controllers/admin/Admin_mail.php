<?php
/**
 *
 */
class Admin_mail extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('form_validation', 'session'));
		$this->load->model('admin/Jobseeker_model', 'jobseeker');
		$this->load->model('admin/Mail_model', 'mail');
		$this->load->model('admin/Admin_api_model', 'api');
		$this->load->model('admin/Admin_mail_model', 'mailmd');
		$this->load->model('admin/Category_model', 'category');
		$this->load->model('UtilModel', 'util');
		// if (!$this->session->userdata['user']['isLogged']) {
		// 	redirect(base_url() . 'admin/login'); // no session established, kick back to login page
		// } else if ($this->session->userdata['user']['role'] != 5 && $this->session->userdata['user']['role'] != 1) {
		// 	redirect(base_url('error/403'));
		// }
		if (!$this->session->userdata['user']['isLogged']) {
			redirect(base_url('404'));
			//redirect(base_url() . 'admin/login'); // no session established, kick back to login page
		} else if ($this->session->userdata['user']['role'] != 5 && $this->session->userdata['user']['role'] != 1) {
			//redirect(base_url('error/403'));
			redirect(base_url('404'));
		}
	}
	function mailJobseeker() {
		$styles = array(
			'assets/admin/fileupload/jquery.fileupload.css'); //assets/admin/editor/editor.css
		$scripts = array(
			'assets/admin/tinymce/jscripts/tiny_mce/tiny_mce.js',
			'assets/admin/fileupload/vendor/jquery.ui.widget.js',
			'assets/admin/fileupload/jquery.fileupload.js',
			'assets/admin/angularjs/controller/mail.controller.js',
			'assets/admin/angularjs/service/mail.service.js',
			'assets/admin/dist/js/admin-send-mail.js',
		);
		//$countries = $this->category->getListCountry();
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		$head = $this->load->view('admin/head', array('styles' => $styles), TRUE);
		$header = $this->load->view('admin/header', array(), TRUE);
		$content = $this->load->view('admin/mail/mail', array('csrf' => $csrf), TRUE);
		$footer = $this->load->view('admin/footer', array(), TRUE);
		$sidemenu = $this->load->view('admin/sidemenu', array('email' => $this->session->userdata['user']['email'],
			'role' => $this->session->userdata['user']['role'],
			'selected' => 'mailbox',
			'sub' => 'sendmail',
			'subChild' => 'smJobseeker'), TRUE);

		$this->load->view('admin/layout', array('head' => $head,
			'header' => $header,
			'sidemenu' => $sidemenu,
			'content' => $content,
			'footer' => $footer,
			'scripts' => $scripts,
			'scriptOption' => 1,
		));

	}
	function getListMailJobseeker() {
		$output = $this->mailmd->getListMailJobseeker();
		echo json_encode($output);
	}
	function mailEmployer() {
		$styles = array(
			'assets/admin/fileupload/jquery.fileupload.css'); //assets/admin/editor/editor.css
		$scripts = array(
			'assets/admin/tinymce/jscripts/tiny_mce/tiny_mce.js',
			'assets/admin/fileupload/vendor/jquery.ui.widget.js',
			'assets/admin/fileupload/jquery.fileupload.js',
			'assets/admin/angularjs/controller/mail.controller.js',
			'assets/admin/angularjs/service/mail.service.js',
			'assets/admin/dist/js/admin-send-mail.js',
		);
		//$countries = $this->category->getListCountry();
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		$head = $this->load->view('admin/head', array('styles' => $styles), TRUE);
		$header = $this->load->view('admin/header', array(), TRUE);
		$content = $this->load->view('admin/mail/mail-employer', array('csrf' => $csrf), TRUE);
		$footer = $this->load->view('admin/footer', array(), TRUE);
		$sidemenu = $this->load->view('admin/sidemenu', array('email' => $this->session->userdata['user']['email'],
			'role' => $this->session->userdata['user']['role'],
			'selected' => 'mailbox',
			'sub' => 'sendmail',
			'subChild' => 'smEmployer'), TRUE);

		$this->load->view('admin/layout', array('head' => $head,
			'header' => $header,
			'sidemenu' => $sidemenu,
			'content' => $content,
			'footer' => $footer,
			'scripts' => $scripts,
			'scriptOption' => 1,
		));

	}
	function getListMailEmployer() {
		$output = $this->mailmd->getListMailEmployer();
		echo json_encode($output);
	}
	function sendMail() {
		$listMail = $this->input->post('email');
		$subject = $this->input->post('subject');
		$content = $this->input->post('content');
		$file = $this->input->post('file');
		$fileTmp = $this->input->post('fileTmp');
		$form = $this->input->post('form');
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		$data = array(
			'listmail' => $listMail,
			'subject' => $subject,
			'content' => $content,
			'file' => $file,
			'fileTmp' => $fileTmp);
		//echo json_encode($data);
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		$output = $this->mail->sendMailJobseeker($data);
		if ($output) {
			echo json_encode(array('status' => 'success', 'csrf' => $csrf));
		} else {
			echo json_encode(array('status' => 'error', 'csrf' => $csrf));
		}

	}
}