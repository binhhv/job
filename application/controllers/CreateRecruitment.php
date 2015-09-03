<?php
class CreateRecruitment extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('security');
		$this->load->model('Recruitment_model', 'recruitment');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->lang->load('message', 'vi');
		$this->load->helper('language');
		$this->load->library('session');
	}

	public function index() {
		$head = $this->load->view('main/head', array('titlePage' => 'JOB7VN Group|user register'), TRUE);
		$header = $this->load->view('main/header', array(
			'logo' => 'img/header/logo.jpg',
			'showTitle' => true,
			'logoWidth' => '70px',
			'logoHeight' => '70px',
		), TRUE);

		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		$arr_country = $this->recruitment->getAllCountry();
		$arr_welfare = $this->recruitment->getAllWelfare();
		$arr_job_form = $this->recruitment->getAllJob_Form();
		$job_form_child = $this->recruitment->getAllJob_Form_Child();
		$job_level = $this->recruitment->getAllJob_Job_Level();
		$contact_form = $this->recruitment->getAllJob_Contact_Form();
		$content = $this->load->view('main/create_recruitment', array('csrf' => $csrf, 'arr_country' => $arr_country,
			'arr_welfare' => $arr_welfare, 'arr_job_form' => $arr_job_form, 'job_form_child' => $job_form_child, 'job_level' => $job_level,
			'contact_form' => $contact_form), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer));
	}

	//get province by country
	public function buildDropProvince() {
		$rec_job_map_country = $this->security->xss_clean($this->input->post('rec_job_map_country'));
		$modelData = $this->recruitment->getAllProvinceByCountry($rec_job_map_country);
		$arr_data = array(
			'name_data' => $modelData,
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		echo json_encode(array('status' => 'success', 'content' => $arr_data));
	}

	function check_default($post_string) {
		if ($post_string == '0') {
			$this->form_validation->set_message('check_default', 'Bạn chưa chọn ' . '\'%s\'.');
			return FALSE;
		}
		return TRUE;
	}
	//upload cv
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
		$this->form_validation->set_rules('rec_contact_email', $this->lang->line('rec_contact_email'), 'trim|required|xss_clean');
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

			$datainsert = array(
				'rec_title' => $rec_title,
				'rec_salary' => $rec_salary,
				'rec_job_content' => $rec_job_content,
				'rec_job_time' => $rec_job_time,
				'rec_job_regimen' => $rec_job_regimen,
				'rec_job_require' => $rec_job_require,
				'rec_job_priority' => $rec_job_priority,
				'rec_job_map_form' => $rec_job_map_form,
				'rec_job_map_form_child' => $rec_job_map_form_child,
				'rec_job_map_level' => $rec_job_map_level,
				'rec_job_map_country' => $rec_job_map_country,
				'rec_contact_name' => $rec_contact_name,
				'rec_contact_email' => $rec_contact_email,
				'rec_contact_address' => $rec_contact_address,
				'rec_contact_phone' => $rec_contact_phone,
				'rec_contact_mobile' => $rec_contact_mobile,
				'rec_contact_form' => $rec_contact_form,

				'rec_map_employer' => '1',
				'rec_map_user_employer' => '1',
				'rec_is_approve' => '0',
				'rec_is_delete' => '0',
				'rec_is_disabled' => '0',
				'rec_update_at' => date('Y-m-d'),
				'rec_created_at' => date('Y-m-d'),
			);
			$id_rec = $this->recruitment->insertRecruitment($datainsert);
			//insert welfare maps
			$arr_welfare_data = $this->security->xss_clean($this->input->post('welfare'));
			foreach ($arr_welfare_data as $rows) {
				$arr_welfare = array(
					'recmj_map_rec' => $id_rec,
					'recmj_map_welfare' => $rows,
					'recmj_is_delete' => '0',
					'recmj_created_at' => date('Y-m-d'),
				);
				$id_welfare = $this->recruitment->insertRecruitment_Map_Welfare($arr_welfare);
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
				$id_province = $this->recruitment->insertRecruitment_Map_Province($arr_province);
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
				'rec_job_time' => form_error('rec_job_time'),
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

}