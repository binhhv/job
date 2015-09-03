<?php
class UploadCv extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('security');
		$this->load->model('Uploadcv_model', 'upload_cv');
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
		$content = $this->load->view('main/upload_cv_online', array('csrf' => $csrf), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer));
	}
	///upload cv online
	public function upload_cv_online() {
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('matches', $this->lang->line('matches'));
		$this->form_validation->set_message('regex_match', $this->lang->line('regex_match'));

		$this->form_validation->set_error_delimiters('<label class="error alert-danger">', '</label>');
		$this->form_validation->set_rules('docon_career', $this->lang->line('docon_career'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('docon_salary', $this->lang->line('docon_salary'), 'callback_check_default|trim|required|xss_clean');
		$this->form_validation->set_rules('docon_degree', $this->lang->line('docon_degree'), 'trim|callback_check_default|required|xss_clean');
		$this->form_validation->set_rules('docon_education', $this->lang->line('docon_education'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('docon_experience', $this->lang->line('docon_experience'), 'trim|callback_check_default|required|xss_clean');
		$this->form_validation->set_rules('docon_healthy', $this->lang->line('docon_healthy'), 'trim|callback_check_default|required|xss_clean');
		$this->form_validation->set_rules('docon_advance', $this->lang->line('docon_advance'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('docon_reason_apply', $this->lang->line('docon_reason_apply'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('docon_address', $this->lang->line('docon_address'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('docon_phone', $this->lang->line('docon_phone'), 'trim|required|xss_clean');
		//$this->form_validation->set_rules('docon_birthday', $this->lang->line('docon_birthday'), 'trim|required|xss_clean');

		if ($this->form_validation->run()) {
			$docon_career = $this->security->xss_clean($this->input->post('docon_career'));
			$docon_salary = $this->security->xss_clean($this->input->post('docon_salary'));
			$docon_degree = $this->security->xss_clean($this->input->post('docon_degree'));
			$docon_education = $this->security->xss_clean($this->input->post('docon_education'));
			$docon_experience = $this->security->xss_clean($this->input->post('docon_experience'));
			$docon_healthy = $this->security->xss_clean($this->input->post('docon_healthy'));
			$docon_advance = $this->security->xss_clean($this->input->post('docon_advance'));
			$docon_reason_apply = $this->security->xss_clean($this->input->post('docon_reason_apply'));
			$docon_address = $this->security->xss_clean($this->input->post('docon_address'));
			$docon_phone = $this->security->xss_clean($this->input->post('docon_phone'));
			//$docon_birthday = $this->security->xss_clean($this->input->post('docon_birthday'));
			$docon_skill = $this->security->xss_clean($this->input->post('docon_skill'));
			$id_account = '100';
			$dataupload = array(
				'docon_map_user' => $id_account,
				'docon_birthday' => date('Y-m-d'),
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
				'docon_is_delete' => '0',
				'docon_update_at' => date('Y-m-d'),
				'docon_created_at' => date('Y-m-d'),
			);
			$id_create_cv_online = $this->upload_cv->insertcvOnlineUser($dataupload);
			if ($id_create_cv_online) {
				echo json_encode(array('status' => 'success', 'content' => 'Register complete'));
			}
		} else {
			$dataerr = array(
				'docon_phone' => form_error('docon_phone'),
				'docon_career' => form_error('docon_career'),
				'docon_degree' => form_error('docon_degree'),
				'docon_education' => form_error('docon_education'),
				'docon_address' => form_error('docon_address'),
				'docon_experience' => form_error('docon_experience'),
				'docon_healthy' => form_error('docon_healthy'),
				'docon_reason_apply' => form_error('docon_reason_apply'),
				'docon_salary' => form_error('docon_salary'),
				'docon_advance' => form_error('docon_advance'),
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash(),
			);
			echo json_encode(array('status' => 'errvalid', 'content' => $dataerr));
		}

	}
	function check_default($post_string) {
		if ($post_string == '0') {
			$this->form_validation->set_message('check_default', 'Bạn chưa chọn ' . '\'%s\'.');
			return FALSE;
		}
		return TRUE;
	}
	//upload cv
	public function upload_cv() {
		$id_account = '100';
		$file_img_upload = $this->do_upload($id_account);
		if ($file_img_upload['status'] == 'success') {
			//upload images
			$doccv_file_tmp = $file_img_upload['name_new']; //$this->uploadImages($file_img_upload, $id_account);
			$doccv_file_name = $file_img_upload['name_old']; //$_FILES["image"]["name"];

			$dataupload = array(
				'doccv_map_user' => $id_account,
				'doccv_file_tmp' => $doccv_file_tmp,
				'doccv_file_name' => $doccv_file_name,
				'doccv_is_delete' => '0',
				'doccv_created_at' => date('Y-m-d'),
				'doccv_update_at' => date('Y-m-d'),
			);
			$id_upload = $this->upload_cv->insertcvUser($dataupload);
			echo json_encode(array('status' => 'success', 'content' => 'upload success'));
		} else {

			$arr_err = array(
				'contente' => $file_img_upload['content'],
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash(),
			);
			echo json_encode(array('status' => 'error', 'content' => $arr_err));
		}
	}

	public function do_upload($id_account) {
		$arr_upload;
		$path = './uploads/cv_user/' . $id_account . "/";
		if (!file_exists($path)) {
			mkdir($path, 0777, true);
		}
		$this->load->library('upload');

		// Define file rules
		$this->upload->initialize(array(
			'upload_path' => $path,
			'allowed_types' => "doc|docx|pdf",
			'overwrite' => TRUE,
			'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			// 'max_height' => "768",
			// 'max_width' => "1024"
		));
		$file_upload = 'userfile';

		if ($this->upload->do_upload($file_upload)) {
			$your_file_new_name = 'hinh_new';
			$data = $this->upload->data();
			$arr_upload['status'] = 'success';
			$arr_upload['name_old'] = $data['file_name'];
			$file_path = $data['file_path'];
			$file = $data['full_path'];
			$file_ext = $data['file_ext'];
			$final_file_name = md5($file_upload . "_" . time()) . $file_ext;
			// here is the renaming functon
			rename($file, $file_path . $final_file_name);
			$arr_upload['name_new'] = $final_file_name;

			return $arr_upload;
			// echo json_encode(array('status' => 'ss', 'content' => 'success'));

		} else {
			$arr_upload['status'] = 'error';
			$error = array('error' => $this->upload->display_errors());
			$arr_upload['content'] = $error;
			return $arr_upload;

		}
	}

}