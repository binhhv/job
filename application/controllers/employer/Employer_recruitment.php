<?php
/**
 *
 */
class Employer_recruitment extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('form_validation', 'session'));
		$this->load->model('employer/Employer_model', 'employer');
		if (!$this->session->userdata['user']['isLogged']) {
			redirect(base_url() . 'login'); // no session established, kick back to login page
		}
		$this->load->helper('security');
		$this->load->helper('language');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->lang->load('message', 'vi');
		$this->load->model('UtilModel', 'util');
		$this->load->model('Register_model', 'account');
	}

	function getCreateRecruitment() {
		$user = $this->session->userdata['user'];
		$employerInfo = $this->employer->getInfoEmployer($user['id']);
		$employerInfo->user = $user;

		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);

		$update_account_employer = $this->load->view('main/employer/modal_update_account_employer', array('employerInfo' => $employerInfo, 'csrf' => $csrf), TRUE);

		//create recruitment
		//$arr_country = $this->employer->getAllCountry();
		//$arr_welfare = $this->employer->getAllWelfare();
		//$arr_job_form = $this->employer->getAllJob_Form();
		//$job_form_child = $this->employer->getAllJob_Form_Child();
		//$job_level = $this->employer->getAllJob_Job_Level();
		//$contact_form = $this->employer->getAllJob_Contact_Form();

		//$arr_career = $this->employer->getAllCareer();
		//$arr_Salary = $this->employer->getAllSalary();
		// $recruitment = $this->load->view('main/employer/modal_create_recruitment', array('csrf' => $csrf, 'arr_country' => $arr_country,
		// 	'arr_welfare' => $arr_welfare, 'arr_job_form' => $arr_job_form, 'job_form_child' => $job_form_child, 'job_level' => $job_level,
		// 	'contact_form' => $contact_form, 'arr_career' => $arr_career, 'arr_Salary' => $arr_Salary), TRUE);

		// $employer_menu = $this->load->view('main/employer/employer_menu', array('employerInfo' => $employerInfo), TRUE);

		// $detail_recruitmnet = $this->load->view('main/employer/modal_detail_recruitment', array('csrf' => $csrf), TRUE);
		//create recruitment
		// $arr_rec = $this->employer->getListRecruitment(1);
		// $recruitmnet_active = $this->load->view('main/employer/modal_recruitment_active', array('arr_rec' => $arr_rec, 'csrf' => $csrf), TRUE);

		$employer_menu = $this->load->view('main/employer/employer_menu', array('employerInfo' => $employerInfo), TRUE);

		//$styleOption = array('assets/main/css/style_ntv.css', 'assets/main/chosen/chosen.css', 'assets/main/chosen/prism.css');
		$scriptOption = array("server_upload/js/vendor/jquery.ui.widget.js",
			"server_upload/js/jquery.iframe-transport.js",
			"server_upload/js/jquery.fileupload.js", 'assets/main/scroll/jquery.nicescroll.min.js', 'assets/main/js/jquery_ntd.js', 'assets/main/js/ntd_upload.js');
		// $arr_country = $this->employer->getAllCountry();
		// $arr_welfare = $this->employer->getAllWelfare();
		// $arr_job_form = $this->employer->getAllJob_Form();
		// $job_form_child = $this->employer->getAllJob_Form_Child();
		// $job_level = $this->employer->getAllJob_Job_Level();
		// $contact_form = $this->employer->getAllJob_Contact_Form();
		// $arr_career = $this->employer->getAllCareer();
		// $arr_Salary = $this->employer->getAllSalary();
		$provinceData = $this->account->getAllProvinceByCountry();
		$provinceVN = $this->account->getProvinceCountry(1);
		$provinceJP = $this->account->getProvinceCountry(2);
		$head = $this->load->view('main/head', array('title' => 'Đăng tin tuyển dụng', 'scriptOption' => $scriptOption), TRUE);
		$header = $this->load->view('main/header', array('user' => $user, 'showTitle' => true,
		), TRUE);
		$contentEmployer = $this->load->view('main/employer/create-recruitment', array('csrf' => $csrf, 'employerInfo' => $employerInfo,
			'provinceData' => $provinceData,
			'provinceVN' => $provinceVN, 'provinceJP' => $provinceJP), TRUE);
		//$popup = $this->load->view('main/popup', array('csrf' => $csrf), TRUE);
		/*'arr_country' => $arr_country,
		'arr_welfare' => $arr_welfare, 'arr_job_form' => $arr_job_form, 'job_form_child' => $job_form_child, 'job_level' => $job_level,
		'contact_form' => $contact_form, 'arr_career' => $arr_career, 'arr_Salary' => $arr_Salary*/
		$content = $this->load->view('main/employer/layout', array('contentEmployer' => $contentEmployer, 'update_account_employer' => $update_account_employer,
			'employer_menu' => $employer_menu), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer, 'isGray' => true));

	}
}