<?php
/**
 *
 */
class Employer extends CI_Controller {

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
	function index() {
		$user = $this->session->userdata['user'];
		$employerInfo = $this->employer->getInfoEmployer($user['id']);

		$head = $this->load->view('main/head', array('user' => $user, 'titlePage' => 'JOB7VN Group|Contact'), TRUE);

		$province = $this->employer->getAllProvince();
		//$head = $this->load->view('main/head', array('titlePage' => 'JOB7VN Group|Contact'), TRUE);

		$header = $this->load->view('main/header', array(
			'logo' => 'img/header/allSHIGOTO.png',
			'showTitle' => true,
			'logoWidth' => '170px',
			'logoHeight' => '70px',
			'menu' => '',
			'user' => $user,
		), TRUE);
		//$ab = m;

		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		$update_imfomation_employer = $this->load->view('main/employer/modal_update_information_employer', array('employerInfo' => $employerInfo, 'province' => $province, 'csrf' => $csrf), TRUE);
		$update_contact_employer = $this->load->view('main/employer/modal_update_contact_info_employer', array('employerInfo' => $employerInfo, 'csrf' => $csrf), TRUE);
		$update_account_employer = $this->load->view('main/employer/modal_update_account_employer', array('employerInfo' => $employerInfo, 'csrf' => $csrf), TRUE);

		//create recruitment
		$arr_country = $this->employer->getAllCountry();
		$arr_welfare = $this->employer->getAllWelfare();
		$arr_job_form = $this->employer->getAllJob_Form();
		$job_form_child = $this->employer->getAllJob_Form_Child();
		$job_level = $this->employer->getAllJob_Job_Level();
		$contact_form = $this->employer->getAllJob_Contact_Form();
		$arr_career = $this->employer->getAllCareer();
		$arr_Salary = $this->employer->getAllSalary();

		$recruitment = $this->load->view('main/employer/modal_create_recruitment', array('csrf' => $csrf, 'arr_country' => $arr_country,
			'arr_welfare' => $arr_welfare, 'arr_job_form' => $arr_job_form, 'job_form_child' => $job_form_child, 'job_level' => $job_level,
			'contact_form' => $contact_form, 'arr_career' => $arr_career, 'arr_Salary' => $arr_Salary), TRUE);
		$employer_menu = $this->load->view('main/employer/employer_menu', array('employerInfo' => $employerInfo), TRUE);
		$numRecruitmentActive = count($this->employer->getListRecruitmentEmployer(1, $employerInfo->employer_id));
		$contentEmployer = $this->load->view('main/employer/index', array('employerInfo' => $employerInfo, 'numRecruitmentActive' => $numRecruitmentActive), TRUE);

		$content = $this->load->view('main/employer/layout', array('employer_menu' => $employer_menu, 'contentEmployer' => $contentEmployer, 'csrf' => $csrf, 'update_contact_employer' => $update_contact_employer, 'update_imfomation_employer' => $update_imfomation_employer, 'update_account_employer' => $update_account_employer, 'recruitment' => $recruitment), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer, 'isGray' => true));

	}
	function recruitment_active() {
		$user = $this->session->userdata['user'];
		$employerInfo = $this->employer->getInfoEmployer($user['id']);

		$head = $this->load->view('main/head', array('user' => $user, 'titlePage' => 'JOB7VN Group|Contact'), TRUE);

		$province = $this->employer->getAllProvince();
		//$head = $this->load->view('main/head', array('titlePage' => 'JOB7VN Group|Contact'), TRUE);

		$header = $this->load->view('main/header', array(
			'logo' => 'img/header/allSHIGOTO.png',
			'showTitle' => true,
			'logoWidth' => '170px',
			'logoHeight' => '70px',
			'menu' => '',
			'user' => $user,
		), TRUE);
		//$ab = m;

		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		$update_imfomation_employer = $this->load->view('main/employer/modal_update_information_employer', array('employerInfo' => $employerInfo, 'province' => $province, 'csrf' => $csrf), TRUE);
		$update_contact_employer = $this->load->view('main/employer/modal_update_contact_info_employer', array('employerInfo' => $employerInfo, 'csrf' => $csrf), TRUE);
		$update_account_employer = $this->load->view('main/employer/modal_update_account_employer', array('employerInfo' => $employerInfo, 'csrf' => $csrf), TRUE);

		//create recruitment
		$arr_country = $this->employer->getAllCountry();
		$arr_welfare = $this->employer->getAllWelfare();
		$arr_job_form = $this->employer->getAllJob_Form();
		$job_form_child = $this->employer->getAllJob_Form_Child();
		$job_level = $this->employer->getAllJob_Job_Level();
		$contact_form = $this->employer->getAllJob_Contact_Form();

		$arr_career = $this->employer->getAllCareer();
		$arr_Salary = $this->employer->getAllSalary();
		$recruitment = $this->load->view('main/employer/modal_create_recruitment', array('csrf' => $csrf, 'arr_country' => $arr_country,
			'arr_welfare' => $arr_welfare, 'arr_job_form' => $arr_job_form, 'job_form_child' => $job_form_child, 'job_level' => $job_level,
			'contact_form' => $contact_form, 'arr_career' => $arr_career, 'arr_Salary' => $arr_Salary), TRUE);
		$employer_menu = $this->load->view('main/employer/employer_menu', array('employerInfo' => $employerInfo), TRUE);

		$detail_recruitmnet = $this->load->view('main/employer/modal_detail_recruitment', array('csrf' => $csrf), TRUE);
		//create recruitment
		$arr_rec = $this->employer->getListRecruitment(1);
		$recruitmnet_active = $this->load->view('main/employer/modal_recruitment_active', array('arr_rec' => $arr_rec, 'csrf' => $csrf), TRUE);

		$employer_menu = $this->load->view('main/employer/employer_menu', array('employerInfo' => $employerInfo), TRUE);
		$content = $this->load->view('main/employer/manager_recruitment', array('employer_menu' => $employer_menu, 'employerInfo' => $employerInfo, 'csrf' => $csrf, 'update_contact_employer' => $update_contact_employer, 'update_imfomation_employer' => $update_imfomation_employer, 'update_account_employer' => $update_account_employer, 'recruitment' => $recruitment, 'recruitmnet_active' => $recruitmnet_active, 'detail_recruitmnet' => $detail_recruitmnet), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer));
	}
	function detail_recruitment() {
		$rec_id = $this->input->get('rec_id');
		$detail = $this->employer->getRecruitmentApply($rec_id);
		echo json_encode(array('detail' => 'abc'));

	}

	function update_information_employer() {
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('valid_email', $this->lang->line('invalid-email'));
		$this->form_validation->set_message('matches', $this->lang->line('matches'));
		$this->form_validation->set_message('regex_match', $this->lang->line('regex_match'));

		$this->form_validation->set_error_delimiters('<label class="error alert-danger">', '</label>');
		$this->form_validation->set_rules('employer_name', $this->lang->line('employer_name_re_depl'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('employer_size', $this->lang->line('employer_size_re_depl'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('employer_phone', $this->lang->line('employer_phone_re_depl'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('employer_about', $this->lang->line('employer_about_re_depl'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('employer_address', $this->lang->line('employer_address_re_depl'), 'trim|required|xss_clean');
		//$this->form_validation->set_rules('employer_map_province', $this->lang->line('employer_map_province_re_depl'), 'trim|required|xss_clean');

		if ($this->form_validation->run()) {

			try {
				$user = $this->session->userdata['user'];
				$employerInfo = $this->employer->getInfoEmployer($user['id']);
				//deployer
				$employer_name = $this->security->xss_clean($this->input->post('employer_name'));
				$employer_address = $this->security->xss_clean($this->input->post('employer_address'));
				$employer_phone = $this->security->xss_clean($this->input->post('employer_phone'));
				$employer_map_country = $this->input->post('country');
				if ($employer_map_country == 1) {
					$employer_map_province = $this->security->xss_clean($this->input->post('employer_map_province_vn'));
				} else {
					$employer_map_province = $this->security->xss_clean($this->input->post('employer_map_province_jp'));
				}

				$employer_size = $this->security->xss_clean($this->input->post('employer_size'));
				$employer_about = $this->security->xss_clean($this->input->post('employer_about'));
				$employer_website = $this->security->xss_clean($this->input->post('employer_website'));
				$employer_is_approve = '0';
				$employer_is_delete = '0';

				$datadeploy = array(
					'employer_name' => $employer_name,
					'employer_address' => $employer_address,
					'employer_phone' => $employer_phone,
					'employer_map_province' => $employer_map_province,
					'employer_map_country' => $employer_map_country,
					'employer_size' => $employer_size,
					'employer_about' => $employer_about,
					'employer_website' => $employer_website,
					'employer_update_at' => date('Y-m-d'),
					'employer_code' => $this->util->General_Code('account', $user['id'], 2),
				);
				$employer_logo_file_name = $this->input->post('file-name');
				$employer_logo_file_tmp = $this->input->post('file-tmp');
				if (strlen($employer_logo_file_name) > 0 && strlen($employer_logo_file_tmp) > 0) {
					$datadeploy['employer_logo'] = $employer_logo_file_name;
					$datadeploy['employer_logo_tmp'] = $employer_logo_file_tmp;
					$tmp_name = 'files/' . $employer_logo_file_tmp;
					$path = 'uploads/logo/' . $employerInfo->employer_id;
					if (!file_exists($path)) {
						mkdir($path, 0777, true);
					}
					copy($tmp_name, 'uploads/logo/' . $employerInfo->employer_id . '/' . $employer_logo_file_tmp);
				}
				$this->employer->updateImfomationEmployer($datadeploy, $employerInfo->employer_id);
				// log_message('error', $id_employer);
			} catch (Exception $e) {

			}
			echo json_encode(array('status' => 'success', 'content' => $datadeploy));

		} else {
			$dataerr = array(
				'employer_name' => form_error('employer_name'),
				'employer_size' => form_error('employer_size'),
				'employer_phone' => form_error('employer_phone'),
				'employer_about' => form_error('employer_about'),
				'employer_address' => form_error('employer_address'),
				'employer_map_province' => form_error('employer_map_province'),
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash(),
			);
			echo json_encode(array('status' => 'errvalid', 'content' => $dataerr));

			log_message('error', json_encode(array('status' => 'errvalid', 'content' => $dataerr)));
		}

	}

	function update_contact_info_employer() {
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('valid_email', $this->lang->line('invalid-email'));
		$this->form_validation->set_message('matches', $this->lang->line('matches'));
		$this->form_validation->set_message('regex_match', $this->lang->line('regex_match'));

		$this->form_validation->set_error_delimiters('<label class="error alert-danger">', '</label>');
		$this->form_validation->set_rules('employer_contact_name', $this->lang->line('employer_contact_name_re_depl'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('employer_contact_phone', $this->lang->line('employer_contact_phone_re_depl'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('employer_contact_mobile', $this->lang->line('employer_contact_mobile_re_depl'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('employer_contact_email', $this->lang->line('employer_contact_email_re_depl'), 'trim|required|valid_email|xss_clean');

		if ($this->form_validation->run()) {

			try {
				$user = $this->session->userdata['user'];
				$employerInfo = $this->employer->getInfoEmployer($user['id']);
				//deployer

				$employer_contact_name = $this->security->xss_clean($this->input->post('employer_contact_name'));
				$employer_contact_phone = $this->security->xss_clean($this->input->post('employer_contact_phone'));
				$employer_contact_mobile = $this->security->xss_clean($this->input->post('employer_contact_mobile'));
				$employer_contact_email = $this->security->xss_clean($this->input->post('employer_contact_email'));

				$datadeploy = array(
					'employer_contact_name' => $employer_contact_name,
					'employer_contact_phone' => $employer_contact_phone,
					'employer_contact_mobile' => $employer_contact_mobile,
					'employer_contact_email' => $employer_contact_email,
					'employer_update_at' => date('Y-m-d'),
				);
				$this->employer->updateImfomationEmployer($datadeploy, $employerInfo->employer_id);
				// log_message('error', $id_employer);
			} catch (Exception $e) {

			}
			echo json_encode(array('status' => 'success', 'content' => $datadeploy));

		} else {
			$dataerr = array(
				'employer_contact_name' => form_error('employer_contact_name'),
				'employer_contact_phone' => form_error('employer_contact_phone'),
				'employer_contact_mobile' => form_error('employer_contact_mobile'),
				'employer_contact_email' => form_error('employer_contact_email'),
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash(),
			);
			echo json_encode(array('status' => 'errvalid', 'content' => $dataerr));

			log_message('error', json_encode(array('status' => 'errvalid', 'content' => $dataerr)));
		}

	}
	function update_account_employer() {
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('min_length', $this->lang->line('min_length'));
		$this->form_validation->set_message('matches', $this->lang->line('matches'));
		$this->form_validation->set_message('regex_match', $this->lang->line('regex_match'));
		$this->form_validation->set_error_delimiters('<label class="error alert-danger">', '</label>');
		$this->form_validation->set_rules('account_password', $this->lang->line('password'), 'trim|required|min_length[6]|xss_clean|matches[confirm_password]|md5');
		$this->form_validation->set_rules('confirm_password', $this->lang->line('passconf'), 'trim|required|min_length[6]|xss_clean|md5');
		if ($this->form_validation->run()) {

			try {
				$user = $this->session->userdata['user'];
				$id_account = $user['id'];
				//deployer

				$account_password = $this->security->xss_clean($this->input->post('account_password'));
				$datadeploy = array(
					'account_password' => $account_password,
					'account_update_at' => date('Y-m-d'),
				);
				$this->employer->updateAccountEmployer($datadeploy, $id_account);
				// log_message('error', $id_employer);
			} catch (Exception $e) {

			}
			echo json_encode(array('status' => 'success', 'content' => $datadeploy));

		} else {
			$dataerr = array(
				'account_password' => form_error('account_password'),
				'confirm_password' => form_error('confirm_password'),
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash(),
			);
			echo json_encode(array('status' => 'errvalid', 'content' => $dataerr));

			log_message('error', json_encode(array('status' => 'errvalid', 'content' => $dataerr)));
		}
	}

	//create recruitment
	public function create_recruitment() {
		//validate
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('matches', $this->lang->line('matches'));
		$this->form_validation->set_message('regex_match', $this->lang->line('regex_match'));
		$this->form_validation->set_error_delimiters('<label class="error alert-danger">', '</label>');
		$this->form_validation->set_rules('rec_title', $this->lang->line('rec_title'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('rec_salary', $this->lang->line('rec_salary'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('rec_job_content', $this->lang->line('rec_job_content'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('rec_job_time', $this->lang->line('rec_job_time'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('rec_job_regimen', $this->lang->line('rec_job_regimen'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('rec_job_require', $this->lang->line('rec_job_require'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('rec_job_priority', $this->lang->line('rec_job_priority'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('rec_job_map_form', $this->lang->line('rec_job_map_form'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('rec_job_map_form_child', $this->lang->line('rec_job_map_form_child'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('rec_job_map_level', $this->lang->line('rec_job_map_level'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('rec_job_map_country', $this->lang->line('rec_job_map_country'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('province_name', $this->lang->line('province_name'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('welfare', $this->lang->line('welfare_title'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('rec_contact_name', $this->lang->line('rec_contact_name'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('rec_contact_email', $this->lang->line('rec_contact_email'), 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('rec_contact_address', $this->lang->line('rec_contact_address'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('rec_contact_phone', $this->lang->line('rec_contact_phone'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('rec_contact_mobile', $this->lang->line('rec_contact_mobile'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('rec_contact_form', $this->lang->line('rec_contact_form'), 'trim|required|xss_clean');
		if ($this->form_validation->run()) {
			$rec_title = $this->security->xss_clean($this->input->post('rec_title'));
			$rec_salary = $this->security->xss_clean($this->input->post('rec_salary'));
			$rec_job_content = $this->security->xss_clean($this->input->post('rec_job_content'));
			$rec_job_time = $this->security->xss_clean($this->input->post('rec_job_time'));
			$rec_job_regimen = $this->security->xss_clean($this->input->post('rec_job_regimen'));
			$rec_job_require = $this->security->xss_clean($this->input->post('rec_job_require'));
			$rec_job_priority = $this->security->xss_clean($this->input->post('rec_job_priority'));
			$rec_job_map_form = $this->security->xss_clean($this->input->post('rec_job_map_form'));
			$rec_job_map_form_child = $this->security->xss_clean($this->input->post('rec_job_map_form_child'));
			$rec_job_map_level = $this->security->xss_clean($this->input->post('rec_job_map_level'));
			$rec_job_map_country = $this->security->xss_clean($this->input->post('rec_job_map_country'));
			$rec_contact_name = $this->security->xss_clean($this->input->post('rec_contact_name'));
			$rec_contact_email = $this->security->xss_clean($this->input->post('rec_contact_email'));
			$rec_contact_address = $this->security->xss_clean($this->input->post('rec_contact_address'));
			$rec_contact_phone = $this->security->xss_clean($this->input->post('rec_contact_phone'));
			$rec_contact_mobile = $this->security->xss_clean($this->input->post('rec_contact_mobile'));
			$rec_contact_form = $this->security->xss_clean($this->input->post('rec_contact_form'));

			$rec_job_map_career = $this->security->xss_clean($this->input->post('rec_job_map_career'));
			$rec_day = $this->security->xss_clean($this->input->post('rec_day'));
			$rec_month = $this->security->xss_clean($this->input->post('rec_month'));
			$rec_year = $this->security->xss_clean($this->input->post('rec_year'));
			$rec_job_require_sex = $this->security->xss_clean($this->input->post('rec_job_require_sex'));
			if ($rec_job_require_sex == "") {
				$rec_job_require_sex = -1;
			}
			$user = $this->session->userdata['user'];
			$employerInfo = $this->employer->getInfoEmployer($user['id']);

			$datainsert = array(
				'rec_title' => $rec_title,
				'rec_salary' => $rec_salary,
				'rec_job_content' => $rec_job_content,
				'rec_job_time' => $rec_year . "-" . $rec_month . "-" . $rec_day,
				'rec_job_regimen' => $rec_job_regimen,
				'rec_job_require' => $rec_job_require,
				'rec_job_priority' => $rec_job_priority,
				'rec_job_map_form' => $rec_job_map_form,
				'rec_job_map_form_child' => $rec_job_map_form_child,
				'rec_job_require_sex' => $rec_job_require_sex,
				'rec_job_map_level' => $rec_job_map_level,
				'rec_job_map_country' => $rec_job_map_country,
				'rec_contact_name' => $rec_contact_name,
				'rec_contact_email' => $rec_contact_email,
				'rec_contact_address' => $rec_contact_address,
				'rec_contact_phone' => $rec_contact_phone,
				'rec_contact_mobile' => $rec_contact_mobile,
				'rec_contact_form' => $rec_contact_form,

				'rec_map_employer' => $employerInfo->rec_map_employer,
				'rec_map_user_employer' => $user['id'],
				'rec_is_approve' => '0',
				'rec_is_delete' => '0',
				'rec_is_disabled' => '0',
				'rec_update_at' => date('Y-m-d'),
				'rec_created_at' => date('Y-m-d'),
			);
			$id_rec = $this->employer->insertRecruitment($datainsert);
			//insert welfare maps
			$arr_welfare_data = $this->security->xss_clean($this->input->post('welfare'));
			foreach ($arr_welfare_data as $rows) {
				$arr_welfare = array(
					'recmj_map_rec' => $id_rec,
					'recmj_map_welfare' => $rows,
					'recmj_is_delete' => '0',
					'recmj_created_at' => date('Y-m-d'),
				);
				$id_welfare = $this->employer->insertRecruitment_Map_Welfare($arr_welfare);
			}

			//insert recruitment_map_province
			$arr_province_name = $this->security->xss_clean($this->input->post('province_name'));
			foreach ($arr_province_name as $rows) {
				$arr_province = array(
					'recmp_map_rec' => $id_rec,
					'recmp_map_province' => $rows,
					'recmp_is_delete' => '0',
					'recmp_created_at' => date('Y-m-d'),
				);
				$id_province = $this->employer->insertRecruitment_Map_Province($arr_province);
			}
			echo json_encode(array('status' => 'success', 'content' => 'upload success'));
		} else {
			$dataerr = array(
				'rec_title' => form_error('rec_title'),
				'rec_job_map_country' => form_error('rec_job_map_country'),
				'province_name' => form_error('province_name'),
				'rec_salary' => form_error('rec_salary'),
				'welfare' => form_error('welfare'),
				'rec_job_content' => form_error('rec_job_content'),
				'rec_job_regimen' => form_error('rec_job_regimen'),
				'rec_day' => form_error('rec_day'),
				'rec_month' => form_error('rec_month'),
				'rec_year' => form_error('rec_year'),
				'rec_job_require' => form_error('rec_job_require'),
				'rec_job_priority' => form_error('rec_job_priority'),

				'rec_job_map_form' => form_error('rec_job_map_form'),
				'rec_job_map_form_child' => form_error('rec_job_map_form_child'),
				'rec_job_map_level' => form_error('rec_job_map_level'),

				'rec_contact_name' => form_error('rec_contact_name'),
				'rec_contact_email' => form_error('rec_contact_email'),
				'rec_contact_address' => form_error('rec_contact_address'),
				'rec_contact_phone' => form_error('rec_contact_phone'),
				'rec_contact_mobile' => form_error('rec_contact_mobile'),
				'rec_contact_form' => form_error('rec_contact_form'),
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash(),
			);
			echo json_encode(array('status' => 'errvalid', 'content' => $dataerr));
		}

	}
	//update recruitment
	public function update_recruitment() {
		//validate
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('matches', $this->lang->line('matches'));
		$this->form_validation->set_message('regex_match', $this->lang->line('regex_match'));
		$this->form_validation->set_error_delimiters('<label class="error alert-danger">', '</label>');
		$this->form_validation->set_rules('rec_title', $this->lang->line('rec_title'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('rec_salary', $this->lang->line('rec_salary'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('rec_job_content', $this->lang->line('rec_job_content'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('rec_job_time', $this->lang->line('rec_job_time'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('rec_job_regimen', $this->lang->line('rec_job_regimen'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('rec_job_require', $this->lang->line('rec_job_require'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('rec_job_priority', $this->lang->line('rec_job_priority'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('rec_job_map_form', $this->lang->line('rec_job_map_form'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('rec_job_map_form_child', $this->lang->line('rec_job_map_form_child'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('rec_job_map_level', $this->lang->line('rec_job_map_level'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('rec_job_map_country', $this->lang->line('rec_job_map_country'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('province_name', $this->lang->line('province_name'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('welfare', $this->lang->line('welfare_title'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('rec_contact_name', $this->lang->line('rec_contact_name'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('rec_contact_email', $this->lang->line('rec_contact_email'), 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('rec_contact_address', $this->lang->line('rec_contact_address'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('rec_contact_phone', $this->lang->line('rec_contact_phone'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('rec_contact_mobile', $this->lang->line('rec_contact_mobile'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('rec_contact_form', $this->lang->line('rec_contact_form'), 'trim|required|xss_clean');
		if ($this->form_validation->run()) {
			$rec_title = $this->security->xss_clean($this->input->post('rec_title'));
			$rec_salary = $this->security->xss_clean($this->input->post('rec_salary'));
			$rec_job_content = $this->security->xss_clean($this->input->post('rec_job_content'));
			$rec_job_time = $this->security->xss_clean($this->input->post('rec_job_time'));
			$rec_job_regimen = $this->security->xss_clean($this->input->post('rec_job_regimen'));
			$rec_job_require = $this->security->xss_clean($this->input->post('rec_job_require'));
			$rec_job_priority = $this->security->xss_clean($this->input->post('rec_job_priority'));
			$rec_job_map_form = $this->security->xss_clean($this->input->post('rec_job_map_form'));
			$rec_job_map_form_child = $this->security->xss_clean($this->input->post('rec_job_map_form_child'));
			$rec_job_map_level = $this->security->xss_clean($this->input->post('rec_job_map_level'));
			$rec_job_map_country = $this->security->xss_clean($this->input->post('rec_job_map_country'));
			$rec_contact_name = $this->security->xss_clean($this->input->post('rec_contact_name'));
			$rec_contact_email = $this->security->xss_clean($this->input->post('rec_contact_email'));
			$rec_contact_address = $this->security->xss_clean($this->input->post('rec_contact_address'));
			$rec_contact_phone = $this->security->xss_clean($this->input->post('rec_contact_phone'));
			$rec_contact_mobile = $this->security->xss_clean($this->input->post('rec_contact_mobile'));
			$rec_contact_form = $this->security->xss_clean($this->input->post('rec_contact_form'));

			$rec_job_map_career = $this->security->xss_clean($this->input->post('rec_job_map_career'));
			$rec_day = $this->security->xss_clean($this->input->post('rec_day'));
			$rec_month = $this->security->xss_clean($this->input->post('rec_month'));
			$rec_year = $this->security->xss_clean($this->input->post('rec_year'));
			$rec_job_require_sex = $this->security->xss_clean($this->input->post('rec_job_require_sex'));
			if ($rec_job_require_sex == "") {
				$rec_job_require_sex = -1;
			}
			$user = $this->session->userdata['user'];
			$employerInfo = $this->employer->getInfoEmployer($user['id']);

			$datainsert = array(
				'rec_title' => $rec_title,
				'rec_salary' => $rec_salary,
				'rec_job_content' => $rec_job_content,
				'rec_job_time' => $rec_year . "-" . $rec_month . "-" . $rec_day,
				'rec_job_regimen' => $rec_job_regimen,
				'rec_job_require' => $rec_job_require,
				'rec_job_priority' => $rec_job_priority,
				'rec_job_map_form' => $rec_job_map_form,
				'rec_job_map_form_child' => $rec_job_map_form_child,
				'rec_job_require_sex' => $rec_job_require_sex,
				'rec_job_map_level' => $rec_job_map_level,
				'rec_job_map_country' => $rec_job_map_country,
				'rec_contact_name' => $rec_contact_name,
				'rec_contact_email' => $rec_contact_email,
				'rec_contact_address' => $rec_contact_address,
				'rec_contact_phone' => $rec_contact_phone,
				'rec_contact_mobile' => $rec_contact_mobile,
				'rec_contact_form' => $rec_contact_form,

				'rec_map_employer' => $employerInfo->rec_map_employer,
				'rec_map_user_employer' => $user['id'],
				'rec_is_approve' => '0',
				'rec_is_delete' => '0',
				'rec_is_disabled' => '0',
				'rec_update_at' => date('Y-m-d'),
				'rec_created_at' => date('Y-m-d'),
			);
			$id_rec = $this->employer->insertRecruitment($datainsert);
			//insert welfare maps
			$arr_welfare_data = $this->security->xss_clean($this->input->post('welfare'));
			foreach ($arr_welfare_data as $rows) {
				$arr_welfare = array(
					'recmj_map_rec' => $id_rec,
					'recmj_map_welfare' => $rows,
					'recmj_is_delete' => '0',
					'recmj_created_at' => date('Y-m-d'),
				);
				$id_welfare = $this->employer->insertRecruitment_Map_Welfare($arr_welfare);
			}

			//insert recruitment_map_province
			$arr_province_name = $this->security->xss_clean($this->input->post('province_name'));
			foreach ($arr_province_name as $rows) {
				$arr_province = array(
					'recmp_map_rec' => $id_rec,
					'recmp_map_province' => $rows,
					'recmp_is_delete' => '0',
					'recmp_created_at' => date('Y-m-d'),
				);
				$id_province = $this->employer->insertRecruitment_Map_Province($arr_province);
			}
			echo json_encode(array('status' => 'success', 'content' => 'upload success'));
		} else {
			$dataerr = array(
				'rec_title' => form_error('rec_title'),
				'rec_job_map_country' => form_error('rec_job_map_country'),
				'province_name' => form_error('province_name'),
				'rec_salary' => form_error('rec_salary'),
				'welfare' => form_error('welfare'),
				'rec_job_content' => form_error('rec_job_content'),
				'rec_job_regimen' => form_error('rec_job_regimen'),
				'rec_day' => form_error('rec_day'),
				'rec_month' => form_error('rec_month'),
				'rec_year' => form_error('rec_year'),
				'rec_job_require' => form_error('rec_job_require'),
				'rec_job_priority' => form_error('rec_job_priority'),

				'rec_job_map_form' => form_error('rec_job_map_form'),
				'rec_job_map_form_child' => form_error('rec_job_map_form_child'),
				'rec_job_map_level' => form_error('rec_job_map_level'),

				'rec_contact_name' => form_error('rec_contact_name'),
				'rec_contact_email' => form_error('rec_contact_email'),
				'rec_contact_address' => form_error('rec_contact_address'),
				'rec_contact_phone' => form_error('rec_contact_phone'),
				'rec_contact_mobile' => form_error('rec_contact_mobile'),
				'rec_contact_form' => form_error('rec_contact_form'),
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash(),
			);
			echo json_encode(array('status' => 'errvalid', 'content' => $dataerr));
		}
	}
	//get province by country
	public function buildDropProvince() {
		$rec_job_map_country = $this->security->xss_clean($this->input->post('rec_job_map_country'));
		$modelData = $this->employer->getAllProvinceByCountry($rec_job_map_country);
		$arr_data = array(
			'name_data' => $modelData,
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		echo json_encode(array('status' => 'success', 'content' => $arr_data));
	}

	function getEditContactEmployer() {
		$user = $this->session->userdata['user'];
		if (isset($user) && ($user['role'] == 2 || $user['role'] == 3)) {
			$employerInfo = $this->employer->getInfoEmployer($user['id']);
			$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash(),
			);
			$update_contact_employer = $this->load->view('main/employer/partial/update-contact-employer', array('employerInfo' => $employerInfo, 'csrf' => $csrf), TRUE);
			echo $update_contact_employer;
			exit;
		} else {
			redirect(base_url('404', 'refresh'));
		}

	}

	function getEditInfoEmployer() {
		$user = $this->session->userdata['user'];
		if (isset($user) && ($user['role'] == 2 || $user['role'] == 3)) {
			$employerInfo = $this->employer->getInfoEmployer($user['id']);
			$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash(),
			);
			$update_contact_employer = $this->load->view('main/employer/partial/update-info-employer', array('employerInfo' => $employerInfo, 'csrf' => $csrf), TRUE);
			echo $update_contact_employer;
			exit;
		} else {
			redirect(base_url('404', 'refresh'));
		}
	}

	function editInfo() {
		$user = $this->session->userdata['user'];
		$employerInfo = $this->employer->getInfoEmployer($user['id']);

		// $head = $this->load->view('main/head', array('user' => $user, 'titlePage' => 'JOB7VN Group|Contact'), TRUE);

		// $province = $this->employer->getAllProvince();
		// //$head = $this->load->view('main/head', array('titlePage' => 'JOB7VN Group|Contact'), TRUE);

		// $header = $this->load->view('main/header', array(
		// 	'logo' => 'img/header/allSHIGOTO.png',
		// 	'showTitle' => true,
		// 	'logoWidth' => '170px',
		// 	'logoHeight' => '70px',
		// 	'menu' => '',
		// 	'user' => $user,
		// ), TRUE);
		//$ab = m;

		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		//$update_imfomation_employer = $this->load->view('main/employer/modal_update_information_employer', array('employerInfo' => $employerInfo, 'province' => $province, 'csrf' => $csrf), TRUE);
		//$update_contact_employer = $this->load->view('main/employer/modal_update_contact_info_employer', array('employerInfo' => $employerInfo, 'csrf' => $csrf), TRUE);
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
		//$content = $this->load->view('main/employer/manager_recruitment', array('employer_menu' => $employer_menu, 'employerInfo' => $employerInfo, 'csrf' => $csrf, 'update_contact_employer' => $update_contact_employer, 'update_imfomation_employer' => $update_imfomation_employer, 'update_account_employer' => $update_account_employer, 'recruitment' => $recruitment, 'recruitmnet_active' => $recruitmnet_active, 'detail_recruitmnet' => $detail_recruitmnet), TRUE);
		//$footer = $this->load->view('main/footer', array(), TRUE);
		//$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer));

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
		// $recruitment = $this->load->view('main/employer/modal_create_recruitment', array('csrf' => $csrf, 'arr_country' => $arr_country,
		// 	'arr_welfare' => $arr_welfare, 'arr_job_form' => $arr_job_form, 'job_form_child' => $job_form_child, 'job_level' => $job_level,
		// 	'contact_form' => $contact_form, 'arr_career' => $arr_career, 'arr_Salary' => $arr_Salary), TRUE);

		//$user = (isset($this->session->userdata['user'])) ? $this->session->userdata['user'] : null;
		$head = $this->load->view('main/head', array('title' => 'Thay đổi thông tin nhà tuyển dụng', 'scriptOption' => $scriptOption), TRUE);
		$header = $this->load->view('main/header', array('user' => $user, 'showTitle' => true,
		), TRUE);

		// $csrf = array(
		// 	'name' => $this->security->get_csrf_token_name(),
		// 	'hash' => $this->security->get_csrf_hash(),
		// );
		// $arr_job_form = $this->recruitment->getAllJob_Form();
		// $job_form_child = $this->recruitment->getAllJob_Form_Child();
		// $job_level = $this->recruitment->getAllJob_Job_Level();
		// $salary = $this->recruitment->getAllJob_Salary();
		// $province = $this->recruitment->getAllProvince();
		// $career = $this->recruitment->getAllJob_Career();

		// $searchHorizontal = $this->load->view('main/search-horizontal', array(
		// 	'province' => $province,
		// 	'jobform' => $arr_job_form,
		// 	'jobformchild' => $job_form_child,
		// 	'salary' => $salary,
		// 	'level' => $job_level,
		// 	'career' => $career,
		// 	'keyArr' => null,
		// 	'keyWord' => ''), TRUE);
		$contentEmployer = $this->load->view('main/employer/edit-info', array('csrf' => $csrf, 'employerInfo' => $employerInfo,
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