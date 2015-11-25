<?php
class Admin_recruitment extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('form_validation', 'session'));
		$this->load->model('admin/Employer_model', 'employer');
		$this->load->model('admin/Jobseeker_model', 'jobseeker');
		$this->load->model('admin/Mail_model', 'mail');
		$this->load->model('UtilModel', 'util');
		$this->load->model('admin/Recruitment_model', 'recruitment');
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
		//set value to call page
		//active:1
		//aprrove:2
		//disabled:3
	}

	function recruitmentActive() {
		$scripts = array(

			"assets/admin/angularjs/service/recruitment.service.js",
			"assets/admin/angularjs/service/jobseeker.service.js",
			"assets/admin/angularjs/service/employer.service.js",
			"assets/admin/angularjs/controller/recruitment.controller.js");

		$listCountries = $this->employer->getListCountry();
		$head = $this->load->view('admin/head', array(), TRUE);
		$header = $this->load->view('admin/header', array(), TRUE);
		$content = $this->load->view('admin/recruitment/recruitment', array("type" => 1), TRUE);
		$footer = $this->load->view('admin/footer', array(), TRUE);
		$sidemenu = $this->load->view('admin/sidemenu', array('email' => $this->session->userdata['user']['email'],
			'role' => $this->session->userdata['user']['role'],
			'selected' => 'recruitmentManager',
			'sub' => 'recruitmentActive'), TRUE);

		$this->load->view('admin/layout', array('head' => $head,
			'header' => $header,
			'sidemenu' => $sidemenu,
			'content' => $content,
			'footer' => $footer,
			'scripts' => $scripts,
		));
	}
	function recruitmentApprove() {
		$scripts = array(

			"assets/admin/angularjs/service/recruitment.service.js",
			"assets/admin/angularjs/service/jobseeker.service.js",
			"assets/admin/angularjs/service/employer.service.js",
			"assets/admin/angularjs/controller/recruitment.controller.js");

		$listCountries = $this->employer->getListCountry();
		$head = $this->load->view('admin/head', array(), TRUE);
		$header = $this->load->view('admin/header', array(), TRUE);
		$content = $this->load->view('admin/recruitment/recruitment', array("type" => 2), TRUE);
		$footer = $this->load->view('admin/footer', array(), TRUE);
		$sidemenu = $this->load->view('admin/sidemenu', array('email' => $this->session->userdata['user']['email'],
			'role' => $this->session->userdata['user']['role'],
			'selected' => 'recruitmentManager',
			'sub' => 'recruitmentApprove'), TRUE);

		$this->load->view('admin/layout', array('head' => $head,
			'header' => $header,
			'sidemenu' => $sidemenu,
			'content' => $content,
			'footer' => $footer,
			'scripts' => $scripts,
		));
	}
	function recruitmentDisabled() {
		$scripts = array(

			"assets/admin/angularjs/service/recruitment.service.js",
			"assets/admin/angularjs/service/jobseeker.service.js",
			"assets/admin/angularjs/service/employer.service.js",
			"assets/admin/angularjs/controller/recruitment.controller.js");

		$listCountries = $this->employer->getListCountry();
		$head = $this->load->view('admin/head', array(), TRUE);
		$header = $this->load->view('admin/header', array(), TRUE);
		$content = $this->load->view('admin/recruitment/recruitment', array("type" => 3), TRUE);
		$footer = $this->load->view('admin/footer', array(), TRUE);
		$sidemenu = $this->load->view('admin/sidemenu', array('email' => $this->session->userdata['user']['email'],
			'role' => $this->session->userdata['user']['role'],
			'selected' => 'recruitmentManager',
			'sub' => 'recruitmentDisabled'), TRUE);

		$this->load->view('admin/layout', array('head' => $head,
			'header' => $header,
			'sidemenu' => $sidemenu,
			'content' => $content,
			'footer' => $footer,
			'scripts' => $scripts,
		));
	}
	function recruitmentCreate() {
		$scripts = array(
			"assets/admin/angularjs/service/recruitment.service.js",
			"assets/admin/angularjs/service/jobseeker.service.js",
			"assets/admin/angularjs/service/employer.service.js",
			"assets/admin/angularjs/controller/recruitment.controller.js",
		);

		$listCountries = $this->employer->getListCountry();
		$head = $this->load->view('admin/head', array(), TRUE);
		$header = $this->load->view('admin/header', array(), TRUE);
		$content = $this->load->view('admin/recruitment/recruitment-create', array("countryGET" => $listCountries[0]), TRUE);
		$footer = $this->load->view('admin/footer', array(), TRUE);
		$sidemenu = $this->load->view('admin/sidemenu', array('email' => $this->session->userdata['user']['email'],
			'role' => $this->session->userdata['user']['role'],
			'selected' => 'recruitmentManager',
			'sub' => 'recruitmentCreate'), TRUE);

		$this->load->view('admin/layout', array('head' => $head,
			'header' => $header,
			'sidemenu' => $sidemenu,
			'content' => $content,
			'footer' => $footer,
			'scripts' => $scripts,
		));
	}
	function getListEmployer() {
		$output = $this->recruitment->getListEmployer();
		echo json_encode($output);
	}
	function createRecruitment() {
		$rec = json_decode($this->input->post('rec'), true);
		log_message('error', json_encode($rec));
		$welfareSelected = $rec['welfareSelected'];
		$employer = $rec['object_employer'];
		$idmapcountry = $rec['rec_job_map_country'];
		$provinceSelected = $rec['provinceSelected'];
		$object_contact_form = $rec['object_contact_form'];
		$object_form = $rec['object_form'];
		$object_form_child = $rec['object_form_child'];
		$object_level = $rec['object_level'];
		$object_salary = $rec['object_salary'];
		$iduser = $this->session->userdata['user']['id'];
		$idemployer = $employer['employer_id'];
		log_message('error', $iduser);
		$data = array(
			'rec_title' => $rec['rec_title'],
			'rec_salary' => "",
			'rec_map_salary' => $object_salary['salary_id'],
			'rec_job_content' => $rec['rec_job_content'],
			'rec_job_time' => $rec['rec_job_time'],
			'rec_job_regimen' => $rec['rec_job_regimen'],
			'rec_job_require' => $rec['rec_job_require'],
			'rec_job_priority' => $rec['rec_job_priority'],
			'rec_job_map_form' => $object_form['fjob_id'], //$rec['rec_job_map_form'],
			'rec_job_map_form_child' => $object_form_child['jcform_id'], //$rec['rec_job_map_form_child'],
			'rec_job_map_level' => $object_level['ljob_id'], //$rec['rec_job_map_level'],
			'rec_job_map_country' => $rec['rec_job_map_country'],
			'rec_job_map_career' => $rec['object_career']['career_id'],
			'rec_contact_name' => $rec['rec_contact_name'],
			'rec_contact_email' => $rec['rec_contact_email'],
			'rec_contact_address' => $rec['rec_contact_address'],
			'rec_contact_phone' => $rec['rec_contact_phone'],
			'rec_contact_mobile' => (isset($rec['rec_contact_mobile'])) ? $rec['rec_contact_mobile'] : '',
			'rec_contact_form' => $object_contact_form['contact_form_id'], //$rec['rec_contact_form'],
			'rec_map_employer' => $employer['employer_id'],
			'rec_is_approve' => true,
			'rec_is_disabled' => false,
			'rec_is_delete' => false,
			'rec_update_at' => date('Y-m-d H:m'),
			'rec_created_at' => date('Y-m-d H:m'));
		$result = $this->recruitment->createRecruitment($data, $welfareSelected, $provinceSelected, $iduser);
		$this->util->insertLog('recruitment', $result, '', '', 5, $iduser);
		//$result = $this->employer->updateEmployerRecruitmentWelfare($rec['welfareSelected'], $rec['rec_id']);
		log_message('error', $result);
		echo json_encode($result);
	}
	function getListRecruitment($type) {
		$output = $this->recruitment->getListRecruitment($type);
		echo json_encode($output);
	}
	function getRecruitmentApply($idrecruitment) {
		$output = $this->recruitment->getRecruitmentApply($idrecruitment);
		echo json_encode($output);
	}
	function getListSalary() {
		$output = $this->recruitment->getListSalary();
		echo json_encode($output);
	}
	function recruitmentHighLight() {
		$scripts = array(
			"assets/admin/angularjs/service/recruitment.service.js",
			"assets/admin/angularjs/service/jobseeker.service.js",
			"assets/admin/angularjs/service/employer.service.js",
			"assets/admin/angularjs/controller/recruitment.controller.js",
		);

		$listCountries = $this->employer->getListCountry();
		$head = $this->load->view('admin/head', array(), TRUE);
		$header = $this->load->view('admin/header', array(), TRUE);
		$content = $this->load->view('admin/recruitment/recruitment-highlight', array("countryGET" => $listCountries[0]), TRUE);
		$footer = $this->load->view('admin/footer', array(), TRUE);
		$sidemenu = $this->load->view('admin/sidemenu', array('email' => $this->session->userdata['user']['email'],
			'role' => $this->session->userdata['user']['role'],
			'selected' => 'recruitmentManager',
			'sub' => 'recruitmentHighLight'), TRUE);

		$this->load->view('admin/layout', array('head' => $head,
			'header' => $header,
			'sidemenu' => $sidemenu,
			'content' => $content,
			'footer' => $footer,
			'scripts' => $scripts,
		));
	}
	function editShowRecruitment() {
		$rec = json_decode($this->input->post('rec'), true);
		$rec_id = $rec['rec_id'];
		$rec_is_show_top = $rec['rec_is_show_top'];
		$rec_is_show_another = $rec['rec_is_show_another'];
		$data = array(
			'from' => 'recruitment',
			'where' => 'rec_id = ' . $rec_id,
			'data' => array('rec_is_show_top' => $rec_is_show_top, 'rec_is_show_another' => $rec_is_show_another, 'rec_update_at' => date('Y-m-d')));
		$output = $this->recruitment->editShowRecruitment($data);
		echo json_encode($output);
	}

	function disabledRecruitment() {
		$rec = json_decode($this->input->post('rec'), true);
		$rec_id = $rec['rec_id'];
		//$rec_is_show_top = $rec['rec_is_show_top'];
		//$rec_is_show_another = $rec['rec_is_show_another'];
		$data = array(
			'from' => 'recruitment',
			'where' => 'rec_id = ' . $rec_id,
			'data' => array('rec_is_disabled' => $rec['option'], 'rec_update_at' => date('Y-m-d')));
		$output = $this->recruitment->disabledRecruitment($data);
		echo json_encode($output);
	}
	function getRecruitmentShow($type) {
		$output = $this->recruitment->getRecruitmentShow($type);
		echo json_encode($output);
	}
	function getMaxViewRecruitment() {
		$output = $this->recruitment->getNumRecruitmentView();
		echo json_encode($output);
	}
	function removeAllRecruitmentShow() {
		$recruitmentShow = json_decode($this->input->post('recruitmentShow'), true);
		$output = $this->recruitment->removeAllRecruitmentShow($recruitmentShow);
		echo json_encode($output);
	}
	function addRecruitmentShow($recid, $typeShow) {
		$output = $this->recruitment->addRecruitmentShow($recid, $typeShow);
		echo json_encode($output);
	}
	function removeRecruitmentShow() {
		$rec = json_decode($this->input->post('rec'), true);
		$output = $this->recruitment->removeRecruitmentShow($rec);
		echo json_encode($output);
	}
}