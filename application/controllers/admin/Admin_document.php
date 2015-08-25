<?php
class Admin_document extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('form_validation', 'session'));
		$this->load->model('admin/Document_model', 'document');
		$this->load->model('admin/Account_model', 'account');
		$this->load->model('admin/Mail_model', 'mail');
		$this->load->model('admin/Healthy_model', 'healthy');
		if (!$this->session->userdata['user']['isLogged']) {
			redirect(base_url() . 'admin/login'); // no session established, kick back to login page
		} else if ($this->session->userdata['user']['role'] != 5 && $this->session->userdata['user']['role'] != 1) {
			redirect(base_url('error/403'));
		}
	}
	function cvManager() {
		$scripts = array(
			"assets/admin/angularjs/controller/document.controller.js", "assets/admin/angularjs/service/document.service.js");
		$head = $this->load->view('admin/head', array(), TRUE);
		$header = $this->load->view('admin/header', array(), TRUE);
		$content = $this->load->view('admin/document/cv', array(), TRUE);
		$footer = $this->load->view('admin/footer', array(), TRUE);
		$sidemenu = $this->load->view('admin/sidemenu', array('email' => $this->session->userdata['user']['email'],
			'role' => $this->session->userdata['user']['role'],
			'selected' => 'documentManager',
			'sub' => 'doccv'), TRUE);

		$this->load->view('admin/layout', array('head' => $head,
			'header' => $header,
			'sidemenu' => $sidemenu,
			'content' => $content,
			'footer' => $footer,
			'scripts' => $scripts));
	}
	function formManager() {
		$scripts = array(
			"assets/admin/angularjs/controller/document.controller.js", "assets/admin/angularjs/service/document.service.js");
		$head = $this->load->view('admin/head', array(), TRUE);
		$header = $this->load->view('admin/header', array(), TRUE);
		$content = $this->load->view('admin/document/form', array(), TRUE);
		$footer = $this->load->view('admin/footer', array(), TRUE);
		$sidemenu = $this->load->view('admin/sidemenu', array('email' => $this->session->userdata['user']['email'],
			'role' => $this->session->userdata['user']['role'],
			'selected' => 'documentManager',
			'sub' => 'docon'), TRUE);

		$this->load->view('admin/layout', array('head' => $head,
			'header' => $header,
			'sidemenu' => $sidemenu,
			'content' => $content,
			'footer' => $footer,
			'scripts' => $scripts));
	}
	function getCV() {
		$output = $this->document->getCV();
		echo json_encode($output);
	}
	function getForm() {
		$output = $this->document->getForm();
		echo json_encode($output);
	}
	function getDetailForm($idForm) {
		$doc = $this->document->getDetailForm($idForm);
		echo json_encode($doc);
	}
	function updateForm() {
		$form = json_decode($this->input->post('form'), true);
		$docon_id = $form['docon_id'];
		$docon_birthday = $form['docon_birthday'];
		$docon_phone = $form['docon_phone'];
		$docon_career = $form['docon_career'];
		$docon_degree = $form['docon_degree'];
		$docon_education = $form['docon_education'];
		$docon_address = $form['docon_address'];
		$docon_experience = $form['docon_experience'];
		$docon_skill = $form['docon_skill'];
		$docon_healthy = $form['docon_healthy'];
		$docon_reason_apply = $form['docon_reason_apply'];
		$docon_salary = $form['docon_salary'];
		$docon_advance = $form['docon_advance'];
		$docon_update_at = date('Y-m-d H:m');
		log_message('error', $message);
		$paramater = array(
			'docon_birthday' => $docon_birthday,
			'docon_phone' => $docon_phone,
			'docon_career' => $docon_career,
			'docon_degree' => $docon_degree,
			'docon_education' => $docon_education,
			'docon_address' => $docon_address,
			'docon_experience' => $docon_experience,
			'docon_skill' => $docon_skill,
			'docon_healthy' => $docon_healthy,
			'docon_reason_apply' => $docon_reason_apply,
			'docon_salary' => $docon_salary,
			'docon_advance' => $docon_advance,
			'docon_update_at' => $docon_update_at,
		);
		$output = $this->document->updateForm($paramater, $docon_id);
		echo json_encode($output);
	}
	function deleteCV() {
		$cv = json_decode($this->input->post('cv'), true);
		$doccv_id = $cv['doccv_id'];
		$account_id = $cv['doccv_map_user'];
		log_message('error', $message);
		$paramater = array(
			'doccv_is_delete' => true);
		$output = $this->document->updateCV($paramater, $doccv_id);
		$file_cv = $cv['doccv_file_name'];
		$user = $this->account->getAccount($account_id);
		//log_message('error', $user);
		if ($output) {
			$data = array(
				'mailsend' => $user->account_email,
				'name' => $user->account_first_name . $user->account_last_name,
				'type' => 'delete',
				'typedelete' => 'CV : ' . $file_cv,
			);

			$result = $this->mail->sendMail($data);
			log_message('error', $result);
			echo json_encode($result);

		}
		//$this->sendmail();
		else {
			echo json_encode($output);
		}

	}

	function deleteForm() {
		$docon = json_decode($this->input->post('docform'), true);
		$docon_id = $docon['docon_id'];
		$account_id = $docon['docon_map_user'];
		log_message('error', $docon);
		$paramater = array(
			'docon_is_delete' => true);
		$output = $this->document->updateForm($paramater, $docon_id);
		//$file_cv = $cv['doccv_file_name'];
		$user = $this->account->getAccount($account_id);
		//log_message('error', $user);
		if ($output) {
			$data = array(
				'mailsend' => $user->account_email,
				'name' => $user->account_first_name . $user->account_last_name,
				'type' => 'delete',
				'typedelete' => 'hồ sơ với mã số : ' . $docon_id,
			);

			$result = $this->mail->sendMail($data);
			log_message('error', $result);
			echo json_encode($result);

		}
		//$this->sendmail();
		else {
			echo json_encode($output);
		}

	}
	public function getListHealthy() {
		$output = $this->healthy->getListHealthy();
		echo json_encode($output);
	}

}