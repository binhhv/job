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
		$this->load->model('employer/Recruitment_model', 'recruitment');
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
		$employer_menu = $this->load->view('main/employer/employer_menu', array('employerInfo' => $employerInfo), TRUE);
		$styleOption = array('assets/main/chosen/chosen.css', 'assets/main/chosen/prism.css', 'assets/main/optional/smoothness/jquery-ui.css');
		$scriptOption = array('assets/main/optional/jquery-ui.js', 'assets/main/scroll/jquery.nicescroll.min.js', 'assets/main/chosen/chosen.jquery.js',
			'assets/main/chosen/prism.js', 'assets/main/js/jquery_ntd.js', 'assets/main/js/employer/jquery_recruitment.js');

		$head = $this->load->view('main/head', array('title' => 'Đăng tin tuyển dụng', 'scriptOption' => $scriptOption, 'styleOption' => $styleOption), TRUE);
		$header = $this->load->view('main/header', array('user' => $user, 'showTitle' => true,
		), TRUE);
		//get province country
		$provinceVN = $this->account->getProvinceCountry(1);
		$provinceJP = $this->account->getProvinceCountry(2);
		$listCareer = $this->recruitment->getAllJob_Career();
		$listSalary = $this->recruitment->getAllSalary();
		$listWelfare = $this->recruitment->getAllWelfare();
		$listJobForm = $this->recruitment->getAllJob_Form();
		$listJobFormChild = $this->recruitment->getAllJob_Form_Child();
		$listLevelJP = $this->recruitment->getAllJob_Job_Level();
		$listContactForm = $this->recruitment->getAllJob_Contact_Form();

		$contentEmployer = $this->load->view('main/employer/create-recruitment', array('csrf' => $csrf, 'employerInfo' => $employerInfo,
			'provinceVN' => $provinceVN, 'provinceJP' => $provinceJP,
			'listCareer' => $listCareer, 'listSalary' => $listSalary,
			'listWelfare' => $listWelfare, 'listJobForm' => $listJobForm,
			'listJobFormChild' => $listJobFormChild, 'listLevelJP' => $listLevelJP, 'listContactForm' => $listContactForm), TRUE);
		$breadcrumbs = array(
			array('isLink' => true,
				'title' => 'Trang chủ',
				'link' => base_url()),
			array('isLink' => true,
				'title' => 'Trang nhà tuyển dụng',
				'link' => base_url('employer')),
			array('isLink' => false,
				'title' => 'Đăng tin tuyển dụng',
				'link' => ''));
		$breadcrumb = $this->load->view('main/employer/breadcrumb', array('breadcrumbs' => $breadcrumbs), TRUE);
		$content = $this->load->view('main/employer/layout', array('contentEmployer' => $contentEmployer, 'update_account_employer' => $update_account_employer,
			'employer_menu' => $employer_menu, 'breadcrumb' => $breadcrumb), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer, 'isGray' => true));

	}
	function createRecruitment() {
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('valid_email', $this->lang->line('invalid-email'));
		$this->form_validation->set_message('matches', $this->lang->line('matches'));
		$this->form_validation->set_message('regex_match', $this->lang->line('regex_match'));
		$this->form_validation->set_message('min_length', $this->lang->line('min_length'));
		//$this->form_validation->set_error_delimiters('<label class="error alert-danger">', '</label>');
		$this->form_validation->set_rules('title_recruitment', $this->lang->line('title_recruitment_rec'), 'trim|required|min_length[6]|xss_clean');
		$this->form_validation->set_rules('province', $this->lang->line('province_rec'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('time_work', $this->lang->line('time_work_rec'), 'trim|required|xss_clean'); //'callback_email_check|trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('content_recruitment', $this->lang->line('content_recruitment_rec'), 'trim|required|min_length[6]|xss_clean');
		$this->form_validation->set_rules('regimen_recruitment', $this->lang->line('regimen_recruitment_rec'), 'trim|required|min_length[6]|xss_clean');
		$this->form_validation->set_rules('require_recruitment', $this->lang->line('require_recruitment_rec'), 'trim|required|min_length[6]|xss_clean');
		$this->form_validation->set_rules('priority_recruitment', $this->lang->line('priority_recruitment_rec'), 'trim|required|min_length[6]|xss_clean');
		$this->form_validation->set_rules('contact_name', $this->lang->line('contact_name_rec'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('contact_email', $this->lang->line('contact_email_rec'), 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('contact_address', $this->lang->line('contact_address_rec'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('contact_phone', $this->lang->line('contact_phone_rec'), 'trim|required|regex_match[/^[0-9().-]+$/]|xss_clean');
		$this->form_validation->set_rules('contact_mobile', $this->lang->line('contact_mobile_rec'), 'trim|required|regex_match[/^[0-9().-]+$/]|xss_clean');

		if ($this->form_validation->run()) {
			$title_recruitment = $this->security->xss_clean($this->input->post('title_recruitment'));
			$province = $this->security->xss_clean($this->input->post('province'));
			$time_work = $this->security->xss_clean($this->input->post('time_work'));
			$content_recruitment = $this->security->xss_clean($this->input->post('content_recruitment'));
			$regimen_recruitment = $this->security->xss_clean($this->input->post('regimen_recruitment'));
			$require_recruitment = $this->security->xss_clean($this->input->post('require_recruitment'));
			$priority_recruitment = $this->security->xss_clean($this->input->post('priority_recruitment'));
			$contact_name = $this->security->xss_clean($this->input->post('contact_name'));
			$contact_mobile = $this->security->xss_clean($this->input->post('contact_mobile'));
			$contact_phone = $this->security->xss_clean($this->input->post('contact_phone'));
			$contact_address = $this->security->xss_clean($this->input->post('contact_address'));
			$contact_email = $this->security->xss_clean($this->input->post('contact_email'));
			$salary = $this->security->xss_clean($this->input->post('salary'));
			$career = $this->security->xss_clean($this->input->post('career'));
			$jobFormChild = $this->security->xss_clean($this->input->post('jobFormChild'));
			$jobForm = $this->security->xss_clean($this->input->post('jobForm'));
			$levelJP = $this->security->xss_clean($this->input->post('levelJP'));
			$contact_form = $this->security->xss_clean($this->input->post('contact_form'));
			$country_recruitment = $this->security->xss_clean($this->input->post('country'));
			$employer_id = $this->security->xss_clean($this->input->post('employer_id'));
			$welfare = $this->security->xss_clean($this->input->post('welfare'));
			$time_work_insert = strtotime($time_work);
			$user = $this->session->userdata['user'];
			$data = array(
				'rec_title' => $title_recruitment,
				'rec_salary' => "",
				'rec_map_salary' => $salary,
				'rec_job_content' => $content_recruitment,
				'rec_job_time' => date("Y-m-d", $time_work_insert),
				'rec_job_regimen' => $regimen_recruitment,
				'rec_job_require' => $require_recruitment,
				'rec_job_priority' => $priority_recruitment,
				'rec_job_map_form' => $jobForm, //$rec['rec_job_map_form'],
				'rec_job_map_form_child' => $jobFormChild, //$rec['rec_job_map_form_child'],
				'rec_job_map_level' => $levelJP, //$rec['rec_job_map_level'],
				'rec_job_map_country' => $country_recruitment,
				'rec_job_map_career' => $career,
				'rec_contact_name' => $contact_name,
				'rec_contact_email' => $contact_email,
				'rec_contact_address' => $contact_address,
				'rec_contact_phone' => $contact_phone,
				'rec_contact_mobile' => $contact_mobile,
				'rec_contact_form' => $contact_form, //$rec['rec_contact_form'],
				'rec_map_employer' => $employer_id,
				'rec_map_user_employer' => $user['id'],
				'rec_is_approve' => true,
				'rec_is_disabled' => false,
				'rec_is_delete' => false,
				'rec_update_at' => date('Y-m-d H:m'),
				'rec_created_at' => date('Y-m-d H:m'));

			$result = $this->recruitment->createRecruitment($data, $welfare, $province, $user['id']);

			if ($result) {
				echo json_encode(array('status' => 'success', 'content' => 'Complete'));
			} else {
				echo json_encode(array('status' => 'errvalid', 'content' => 'Errors'));
			}

		} else {
			$dataerr = array(
				'title_recruitment' => form_error('title_recruitment'),
				'time_work' => form_error('time_work'),
				'province' => form_error('province'),
				'content_recruitment' => form_error('content_recruitment'),
				'regimen_recruitment' => form_error('regimen_recruitment'),
				'require_recruitment' => form_error('require_recruitment'),
				'priority_recruitment' => form_error('priority_recruitment'),
				'contact_name' => form_error('contact_name'),
				'contact_email' => form_error('contact_email'),
				'contact_address' => form_error('contact_address'),
				'contact_mobile' => form_error('contact_mobile'),
				'contact_phone' => form_error('contact_phone'),
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash(),
			);

			echo json_encode(array('status' => 'errvalid', 'content' => $dataerr));

		}
	}

}