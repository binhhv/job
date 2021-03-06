<?php
class Admin_document extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('security');
		$this->load->library(array('form_validation', 'session'));
		$this->load->model('admin/Document_model', 'document');
		$this->load->model('admin/Account_model', 'account');
		$this->load->model('admin/Mail_model', 'mail');
		$this->load->model('admin/Healthy_model', 'healthy');
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
		$countries = $this->document->getListCountries();
		$scripts = array(
			"assets/admin/angularjs/controller/document.controller.js", "assets/admin/angularjs/service/document.service.js");
		$head = $this->load->view('admin/head', array(), TRUE);
		$header = $this->load->view('admin/header', array(), TRUE);
		$content = $this->load->view('admin/document/form', array('country' => $countries[0]), TRUE);
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
	function getDetailForm($idForm, $doctype) {
		$doc = $this->document->getDetailForm($idForm, $doctype);
		echo json_encode($doc);
	}
	function createForm() {
		$form = json_decode($this->input->post('docform'), true);
		//$form = json_decode($this->input->post('form'), true);
		$docon_type = 2;

		$jobseeker_name = $form['jobseeker_name'];
		$jobseeker_mail = $form['jobseeker_email'];
		$jobseeker_phone = $form['docon_phone'];
		$dataJobseeker = array(
			'jobseeker_first_name' => $jobseeker_name,
			'jobseeker_last_name' => '',
			'jobseeker_mail' => $jobseeker_mail,
			'jobseeker_phone' => $jobseeker_phone,
			'jobseeker_update_at' => date('Y-m-d H:m'),
			'jobseeker_is_delete' => false,
			'jobseeker_created_at' => date('Y-m-d H:m'));

		$jobseeker = $this->document->insertJobseeker($dataJobseeker);

		$docon_map_job_level = $form['object_level']['ljob_id'];
		$docon_wish = $form['docon_wish'];
		$docon_id = $form['docon_id'];
		$docon_birthday = $form['docon_birthday'];
		$docon_phone = $form['docon_phone'];
		$docon_career = $form['object_career']['career_id'];
		$docon_degree = $form['docon_degree'];
		$docon_education = $form['docon_education'];
		$docon_address = $form['docon_address'];
		$docon_experience = $form['docon_experience'];
		$docon_skill = $form['docon_skill'];
		$docon_healthy = $form['object_docon_healthy']['healthy_id'];
		$docon_reason_apply = $form['docon_reason_apply'];
		$docon_salary = $form['docon_salary'];
		$docon_advance = $form['docon_advance'];
		$docon_update_at = date('Y-m-d H:m');
		$docon_province_selected = $form['provinceSelected'];
		$docon_map_country = $form['object_country'];
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
			'docon_map_job_level' => $docon_map_job_level,
			'docon_wish' => $docon_wish,
			'docon_map_country' => $docon_map_country,
			'docon_is_delete' => false,
			'docon_update_at' => date('Y-m-d H:m'),
			'docon_created_at' => date('Y-m-d H:m'),
			'docon_type' => 2,
			'docon_map_user' => 0,
			'docon_map_jobseeker' => $jobseeker,
		);

		if ($jobseeker) {
			$output = $this->document->insertDocument($paramater, $docon_province_selected, $jobseeker);
			echo json_encode($output);
		} else {
			echo json_encode($jobseeker);
		}

	}
	function updateForm() {
		$form = json_decode($this->input->post('form'), true);
		$docon_type = $form['docon_type'];

		$docon_map_job_level = $form['object_level']['ljob_id'];
		$docon_wish = $form['docon_wish'];
		$docon_id = $form['docon_id'];
		$docon_birthday = $form['docon_birthday'];
		$docon_phone = $form['docon_phone'];
		$docon_career = $form['object_career']['career_id'];
		$docon_degree = $form['docon_degree'];
		$docon_education = $form['docon_education'];
		$docon_address = $form['docon_address'];
		$docon_experience = $form['docon_experience'];
		$docon_skill = $form['docon_skill'];
		$docon_healthy = $form['object_docon_healthy']['healthy_id'];
		$docon_reason_apply = $form['docon_reason_apply'];
		$docon_salary = $form['docon_salary'];
		$docon_advance = $form['docon_advance'];
		$docon_update_at = date('Y-m-d H:m');
		$docon_province_selected = $form['provinceSelected'];
		$docon_map_country = $form['object_country'];
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
			'docon_map_job_level' => $docon_map_job_level,
			'docon_wish' => $docon_wish,
			'docon_map_country' => $docon_map_country,
		);
		if ($docon_type == 2) {
			$jobseeker_id = $form['user_id'];
			$jobseeker_name = $form['jobseeker_name'];
			$jobseeker_mail = $form['jobseeker_email'];
			$jobseeker_phone = $form['docon_phone'];
			$dataJobseeker = array(
				'jobseeker_first_name' => $jobseeker_name,
				'jobseeker_last_name' => '',
				'jobseeker_mail' => $jobseeker_mail,
				'jobseeker_phone' => $jobseeker_phone,
				'jobseeker_update_at' => date('Y-m-d H:m'));
			$output = $this->document->updateFormByAdmin($paramater, $docon_id, $docon_province_selected, $jobseeker_id, $dataJobseeker);
		} else {
			$output = $this->document->updateForm($paramater, $docon_id, $docon_province_selected);
		}

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
		$docon_type = $docon['docon_type'];
		$user_id = $docon['user_id'];
		log_message('error', $docon);

		$paramater = array(
			'docon_is_delete' => true);
		$output = $this->document->deleteForm($paramater, $docon_id);
		//$file_cv = $cv['doccv_file_name'];
		if ($docon_type == 1) {
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
		} else if ($docon_type == 2) {
			if ($output) {
				$outputJobseeker = $this->document->deleteJobseeker($user_id);

				echo json_encode($outputJobseeker);
			} else {
				echo json_encode($output);
			}

		}

	}
	public function getListHealthy() {
		$output = $this->healthy->getListHealthy();
		echo json_encode($output);
	}
	public function getListCareer() {
		$output = $this->document->getListCareer();
		echo json_encode($output);
	}
	public function cvStoreManager() {
		$scripts = array(
			"assets/admin/angularjs/controller/document.controller.js", "assets/admin/angularjs/service/document.service.js");
		$head = $this->load->view('admin/head', array(), TRUE);
		$header = $this->load->view('admin/header', array(), TRUE);
		$content = $this->load->view('admin/document/cv-store', array(), TRUE);
		$footer = $this->load->view('admin/footer', array(), TRUE);
		$sidemenu = $this->load->view('admin/sidemenu', array('email' => $this->session->userdata['user']['email'],
			'role' => $this->session->userdata['user']['role'],
			'selected' => 'documentManager',
			'sub' => 'doccvad'), TRUE);

		$this->load->view('admin/layout', array('head' => $head,
			'header' => $header,
			'sidemenu' => $sidemenu,
			'content' => $content,
			'footer' => $footer,
			'scripts' => $scripts));
	}
	public function formStoreManager() {
		$scripts = array(
			"assets/admin/angularjs/controller/document.controller.js", "assets/admin/angularjs/service/document.service.js");
		$head = $this->load->view('admin/head', array(), TRUE);
		$header = $this->load->view('admin/header', array(), TRUE);
		$content = $this->load->view('admin/document/form-store', array(), TRUE);
		$footer = $this->load->view('admin/footer', array(), TRUE);
		$sidemenu = $this->load->view('admin/sidemenu', array('email' => $this->session->userdata['user']['email'],
			'role' => $this->session->userdata['user']['role'],
			'selected' => 'documentManager',
			'sub' => 'doconad'), TRUE);

		$this->load->view('admin/layout', array('head' => $head,
			'header' => $header,
			'sidemenu' => $sidemenu,
			'content' => $content,
			'footer' => $footer,
			'scripts' => $scripts));
	}
	public function getListProvinceDocument($iddocon, $idcountry) {
		$output = $this->document->getListProvinceDocument($iddocon, $idcountry);
		echo json_encode($output);
	}
	public function detailDocumentForm($id) {
		$documentData = $this->document->getDetailForm($id);
		$head = $this->load->view('admin/head', array(), TRUE);
		$header = $this->load->view('admin/header', array(), TRUE);
		$content = $this->load->view('admin/document/detail-document-form', array("type" => 1, 'documentData' => $documentData), TRUE);
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

		));
	}
	function uploadCV($error = null, $data = null) {
		//$documentData = $this->document->getDetailForm($id);
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		$head = $this->load->view('admin/head', array(), TRUE);
		$header = $this->load->view('admin/header', array(), TRUE);
		$content = $this->load->view('admin/document/upload-cv', array("type" => 1, 'data' => $data, 'error' => $error, 'csrf' => $csrf), TRUE);
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

		));
	}

	function upload() {
		//set preferences
		# Thiết lập lại các lời báo lỗi cho từng quy tắc được thiết lập ở dưới

		$this->form_validation->set_message('required', "không được để trống");
		$this->form_validation->set_message('valid_email', "email không hợp lệ");
		$this->form_validation->set_message('numeric', "số điện thoại không hợp lệ");
		$this->form_validation->set_message('max_length', "số điện thoại nhỏ hơn 12 số");
		$this->form_validation->set_message('min_length', "số điện thoại lớn hơn 10 số");

		# Thiết lập các quy tắc cho từng trường trong form
		$this->form_validation->set_rules('jobseeker_name', 'Họ tên', 'trim|required|xss_clean');
		$this->form_validation->set_rules('jobseeker_phone', 'Số điện thoại', 'trim|required|numeric|max_length[12]|min_length[10]');
		$this->form_validation->set_rules('jobseeker_mail', 'Email', 'required|valid_email');

		$error = array();
		$data = array();
		if ($this->form_validation->run() == TRUE) {
			$data['jobseeker_name'] = $this->input->post('jobseeker_name', true);
			$data['jobseeker_mail'] = $this->input->post('jobseeker_mail', true);
			$data['jobseeker_phone'] = $this->input->post('jobseeker_phone', true);
			$dataJobseeker = array(
				'jobseeker_first_name' => $data['jobseeker_name'],
				'jobseeker_last_name' => '',
				'jobseeker_mail' => $data['jobseeker_mail'],
				'jobseeker_phone' => $data['jobseeker_phone'],
				'jobseeker_is_delete' => false,
				'jobseeker_update_at' => date('Y-m-d H:m'),
				'jobseeker_created_at' => date('Y-m-d H:m'));
			$jobseeker = $this->document->insertJobseeker($dataJobseeker);

			$file_name = $_FILES["file"]['name'];
			if (!file_exists('uploads/cv/store/' . $jobseeker)) {
				mkdir('uploads/cv/store/' . $jobseeker, 0777, true);
			}
			$config['upload_path'] = './uploads/cv/store/' . $jobseeker;
			$config['allowed_types'] = 'doc|docx|pdf';
			$config['max_size'] = '5000000';
			$config['encrypt_name'] = TRUE;

			//load upload class library
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('file')) {

				$error['file'] = "file không hợp lệ";
				$result = $this->document->deleteJobseeker($jobseeker);
				$this->uploadCV($error, $data);
			} else {
				// case - success
				$upload_data = $this->upload->data();
				$file_name_upload = $upload_data['file_name'];

				$dataCV = array(
					'doccv_type' => 2,
					'doccv_map_user' => 0,
					'doccv_map_jobseeker' => $jobseeker,
					'doccv_file_tmp' => $file_name_upload,
					'doccv_file_name' => $file_name,
					'doccv_is_delete' => false,
					'doccv_update_at' => date('Y-m-d H:m'),
					'doccv_created_at' => date('Y-m-d H:m'));
				$resultCV = $this->document->insertCV($dataCV);
				//$data['success_msg'] = '<div class="alert alert-success text-center">Your file <strong>' . $upload_data['file_name'] . '</strong> was successfully uploaded!</div>';
				//$this->load->view('upload_file_view', $data);
				redirect(base_url('admin/document/cv'), 'refresh');
			}
		} else {

			// 'roll' => form_error('roll'),
			$data['jobseeker_name'] = $this->input->post('jobseeker_name', true);
			$data['jobseeker_mail'] = $this->input->post('jobseeker_mail', true);
			$data['jobseeker_phone'] = $this->input->post('jobseeker_phone', true);
			//$error['file'] = "file không hợp lệ";

			$error['jobseeker_name'] = form_error('jobseeker_name');
			$error['jobseeker_phone'] = form_error('jobseeker_phone');
			$error['jobseeker_mail'] = form_error('jobseeker_mail');

			$this->uploadCV($error, $data);

		}

	}

}