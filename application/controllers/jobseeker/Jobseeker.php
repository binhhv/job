<?php
/**
 *
 */
class Jobseeker extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('form_validation', 'session'));
		$this->load->model('UtilModel', 'util');
		$this->load->model('Recruitment_model', 'recruitment');
		$this->load->model('jobseeker/Jobseeker_model', 'jobseeker');
		$this->load->model('account/Account_model', 'account');
		$this->load->model('job/Job_model', 'job');
		$this->lang->load('message', 'vi');
		$this->load->helper('language');
		$this->load->helper('security');
		$this->load->helper('form');
		//$user = (isset($this->session->userdata['user'])) ? $this->session->userdata['user'] : null;
		if (!$this->session->userdata['user']['isLogged']) {
			redirect(base_url('404'));
			//redirect(base_url() . 'admin/login'); // no session established, kick back to login page
		} else if ($this->session->userdata['user']['role'] != 4) {
			//redirect(base_url('error/403'));
			redirect(base_url('404'));
		}
	}
	function index() {
		//profile box
		//recruitment category careere
		//info box
		//job highlight
		$styleOption = array('assets/main/css/style_ntv.css', 'assets/main/chosen/chosen.css', 'assets/main/chosen/prism.css');
		$scriptOption = array('assets/main/scroll/jquery.nicescroll.min.js', 'assets/main/chosen/chosen.jquery.js',
			'assets/main/chosen/prism.js', 'assets/main/js/jquery_ntv.js');
		$user = (isset($this->session->userdata['user'])) ? $this->session->userdata['user'] : null;
		if (isset($user)) {
			$head = $this->load->view('main/head', array('styleOption' => $styleOption, 'scriptOption' => $scriptOption), TRUE);
			$header = $this->load->view('main/header', array('user' => $user, 'showTitle' => true,
			), TRUE);

			$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash(),
			);
			$jobseeker = $this->jobseeker->getJobseeker($user['id']);
			$cvJobseeker = $this->jobseeker->getListCVJobseeker($user['id']);
			$docJobseeker = $this->jobseeker->getListDocumentJobseeker($user['id']);
			$recApp = $this->jobseeker->getListRecruitmentApply($user['id']);
			$contentJobseeker = $this->load->view('main/jobseeker/index', array('csrf' => $csrf, 'jobseeker' => $jobseeker,
				'cvJobseeker' => $cvJobseeker,
				'docJobseeker' => $docJobseeker,
				'recApp' => $recApp), TRUE);
			$content = $this->load->view('main/jobseeker/layout', array('contentJobseeker' => $contentJobseeker), TRUE); //array('csrf' => $csrf, 'jobseeker' => $jobseeker,
			/*'cvJobseeker' => $cvJobseeker,
			'docJobseeker' => $docJobseeker,
			'recApp' => $recApp), TRUE);*/
			$footer = $this->load->view('main/footer', array(), TRUE);

			$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer, 'isGray' => true));
		} else {
			redirect(base_url('404'), 'refresh');
		}

	}
	public function changePassword() {
		$user = (isset($this->session->userdata['user'])) ? $this->session->userdata['user'] : null;
		//set validate
		$this->form_validation->set_message('required', $this->lang->line('required'));
		//$this->form_validation->set_message('valid_email', $this->lang->line('invalid-email'));
		$this->form_validation->set_message('matches', $this->lang->line('matches'));

		$this->form_validation->set_error_delimiters('<label class="error alert-danger">', '</label>');
		//$this->form_validation->set_rules('account_email', 'lang:email', 'callback_email_check|trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('old-password', 'lang:passold', 'callback_password_check|trim|required|xss_clean|md5');
		$this->form_validation->set_rules('new-password', 'lang:password', 'trim|required|min_length[6]|xss_clean|matches[confirm-password]|md5');
		$this->form_validation->set_rules('confirm-password', 'lang:passconf', 'trim|required|min_length[6]|xss_clean|md5');
		//$this->form_validation->set_rules('new-password', 'lang:first_name', 'trim|required|xss_clean');
		//$this->form_validation->set_rules('account_last_name', 'lang:last_name', 'trim|required|xss_clean');
		//$this->form_validation->set_rules('account_captcha', 'lang:captcha', 'trim|invalid-captcha');
		$captcha = $this->input->post('captcha');
		$word = $this->session->userdata('captchaWord');
		$checkCaptcha = false;
		if (strcmp(strtoupper($captcha), strtoupper($word)) == 0) {
			//return true;
			$checkCaptcha = true;
		}
		if ($this->form_validation->run() && $checkCaptcha) {
			$password_old = $this->security->xss_clean($this->input->post('old-password'));
			$password_new = $this->security->xss_clean($this->input->post('new-password'));
			$password_confirm = $this->security->xss_clean($this->input->post('confirm-password'));
			// log_message('error', $password_old);
			// log_message('error', $password_new);
			// log_message('error', $password_confirm);
			$data = array(
				'from' => 'account',
				'where' => 'account_email = "' . $user['email'] . '" and account_is_delete = 0 and account_is_disabled = 0',
				'data' => array(
					'account_password' => $password_new,
					'account_update_at' => date('Y-m-d')),
			);

			$result = $this->account->changePassword($data);

			echo json_encode(array('status' => ($result) ? 'success' : 'error'));

		} else {
			$data = array(
				// 'roll' => form_error('roll'),
				'password_old' => form_error('old-password'),
				'password_new' => form_error('password_new'),
				'password_confirm' => form_error('confirm_password'),
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash(),

			);
			if (!$checkCaptcha) {
				$data['captcha'] = 'invalid-captcha';
			}

			echo json_encode(array('status' => 'errvalid', 'content' => $data));
		}
	}
	public function password_check($password_old) {
		# check email exits
		log_message('error', $password_old);
		$user = (isset($this->session->userdata['user'])) ? $this->session->userdata['user'] : null;
		$checkPassword = $this->account->checkPassword($user['email'], md5($password_old));
		if (!$checkPassword) {
			$this->form_validation->set_message('password_check', $this->lang->line("invalid-old-password"));
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function getFormCreateResume() {
		$listLevel = $this->job->getListLevel();
		$listHealthy = $this->job->getListHealthy();
		$listCountry = $this->job->getListCountry();
		$listCareer = $this->job->getListCareer();
		$user = (isset($this->session->userdata['user'])) ? $this->session->userdata['user'] : null;
		$listProvinceVN = $this->job->getListProvinceCountry($listCountry[0]->country_id);
		$listProvinceJP = $this->job->getListProvinceCountry($listCountry[1]->country_id);
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		$view = $this->load->view('main/jobseeker/partial/modal-create-resume', array(
			'listLevel' => $listLevel,
			'listHealthy' => $listHealthy,
			'listCountry' => $listCountry,
			'listCareer' => $listCareer,
			'user' => $user,
			'listProvinceVN' => $listProvinceVN,
			'listProvinceJP' => $listProvinceJP,
			'csrf' => $csrf), TRUE);
		echo $view;
		exit;
	}

	function createResumeForm() {
		$styleOption = array('assets/main/css/style_ntv.css', 'assets/main/chosen/chosen.css', 'assets/main/chosen/prism.css');
		$scriptOption = array('assets/main/scroll/jquery.nicescroll.min.js', 'assets/main/chosen/chosen.jquery.js',
			'assets/main/chosen/prism.js', 'assets/main/js/jquery_ntv.js');
		$user = (isset($this->session->userdata['user'])) ? $this->session->userdata['user'] : null;
		if (isset($user)) {
			$head = $this->load->view('main/head', array('styleOption' => $styleOption, 'scriptOption' => $scriptOption), TRUE);
			$header = $this->load->view('main/header', array('user' => $user, 'showTitle' => true,
			), TRUE);

			$listLevel = $this->job->getListLevel();
			$listHealthy = $this->job->getListHealthy();
			$listCountry = $this->job->getListCountry();
			$listCareer = $this->job->getListCareer();
			$user = (isset($this->session->userdata['user'])) ? $this->session->userdata['user'] : null;
			$listProvinceVN = $this->job->getListProvinceCountry($listCountry[0]->country_id);
			$listProvinceJP = $this->job->getListProvinceCountry($listCountry[1]->country_id);
			$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash(),
			);
			$numResumeOnline = $this->jobseeker->getNumResumeOnline($user['id']);
			$contentJobseeker = $this->load->view('main/jobseeker/create-resume', array(
				'listLevel' => $listLevel,
				'listHealthy' => $listHealthy,
				'listCountry' => $listCountry,
				'listCareer' => $listCareer,
				'user' => $user,
				'listProvinceVN' => $listProvinceVN,
				'listProvinceJP' => $listProvinceJP,
				'csrf' => $csrf,
				'numResumeOnline' => $numResumeOnline), TRUE);
			$content = $this->load->view('main/jobseeker/layout', array('contentJobseeker' => $contentJobseeker), TRUE); //array('csrf' => $csrf, 'jobseeker' => $jobseeker,
			/*'cvJobseeker' => $cvJobseeker,
			'docJobseeker' => $docJobseeker,
			'recApp' => $recApp), TRUE);*/
			$footer = $this->load->view('main/footer', array(), TRUE);

			$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer, 'isGray' => true));
		} else {
			redirect(base_url('404'), 'refresh');
		}
	}
	function createResume() {
		$user = (isset($this->session->userdata['user'])) ? $this->session->userdata['user'] : null;
		if (isset($user) && $user['role'] == 4) {
			$this->form_validation->set_message('required', " '%s' không được để trống");
			//$this->form_validation->set_message('valid_email', "email không hợp lệ");

			//$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
			$this->form_validation->set_rules('date', 'Ngày sinh', 'required');
			$this->form_validation->set_rules('year', 'Năm sinh', 'required');
			$this->form_validation->set_rules('phone', 'Số điện thoại', 'required');
			$this->form_validation->set_rules('degree', 'Bằng cấp', 'required');
			$this->form_validation->set_rules('education', 'Học vấn', 'required');
			$this->form_validation->set_rules('address', 'Nơi ở hiện tại', 'required');
			$this->form_validation->set_rules('experience', 'Kinh nghiệm', 'required');
			$this->form_validation->set_rules('skill', 'Kỹ năng', 'required');
			$this->form_validation->set_rules('reason-apply', 'Lý do ứng tuyển', 'required');
			$this->form_validation->set_rules('salary', 'Mức lương', 'required');

			$province = $this->input->post('province');
			$year = $this->input->post('year');
			$month = $this->input->post('month');
			$date = $this->input->post('date');
			$dayofMonth = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
			$checkBirthday = true;
			if ($year < 0 || $date < 0 || !isset($date) || !isset($year)) {
				$checkBirthday = false;
			} else {
				if ((($year % 4 == 0) && ($year % 100 != 0)) || ($year % 400 == 0)) {
					$dayofMonth[1] = 29;
				}
				if ($date > $dayofMonth[$month - 1]) {
					$checkBirthday = false;
				}

			}
			$error = array();
			if (!$checkBirthday) {
				$error['birthday'] = "ngày tháng không hợp lệ.";
			}
			if (strlen($province) <= 0) {
				$error['province'] = "chưa chọn tỉnh thành nào";
			}
			$captcha = $this->input->post('captcha');
			$word = $this->session->userdata('captchaWord');
//			log_message('error', 'captcha' . $captchaWord . 'input' . $captcha);
			$checkCaptcha = false;
			if (strcmp(strtoupper($captcha), strtoupper($word)) == 0) {
				//return true;
				$checkCaptcha = true;
			} else {
				$error['captcha'] = 'invalid-captcha';
			}
			if ($this->form_validation->run() == TRUE && strlen($province) > 0 && $checkBirthday && $checkCaptcha) {

				$idjobseeker = $user['id'];
				//$idjob = $this->input->post('idjob');
				$datetimeBirthday = $year . '/' . $month . '/' . $date;
				log_message('error', $datetimeBirthday);
				$date = new DateTime($datetimeBirthday);
				$birthday = date_format($date, 'Y-m-d H:i:s'); // 2011-03-03 00:00:00
				//$date = date_create("'" . $datetimeBirthday . "'");
				//$birthday = date_format($date, "Y-m-d");
				//$datetime = new DateTime();
				//$birthday = $datetime->createFromFormat('Y-m-d', $datetimeBirthday);
				//$birthday = $date = new DateTime('' '');
				$phone = $this->input->post('phone');
				$level = $this->input->post('level');
				$career = $this->input->post('career');
				$degree = $this->input->post('degree');
				$education = $this->input->post('education');
				$address = $this->input->post('address');
				$experience = $this->input->post('experience');
				$skill = $this->input->post('skill');
				$healthy = $this->input->post('healthy');
				$reason = $this->input->post('reason-apply');
				$salary = $this->input->post('salary');
				$advance = $this->input->post('advance');
				$wish = $this->input->post('wish');
				$country = $this->input->post('country');
				$paramater = array(
					'docon_birthday' => $birthday,
					'docon_phone' => $phone,
					'docon_career' => $career,
					'docon_degree' => $degree,
					'docon_education' => $education,
					'docon_address' => $address,
					'docon_experience' => $experience,
					'docon_skill' => $skill,
					'docon_healthy' => $healthy,
					'docon_reason_apply' => $reason,
					'docon_salary' => $salary,
					'docon_advance' => $advance,
					'docon_map_job_level' => $level,
					'docon_wish' => $wish,
					'docon_map_country' => $country,
					'docon_is_delete' => false,
					'docon_update_at' => date('Y-m-d H:m'),
					'docon_created_at' => date('Y-m-d H:m'),
					'docon_type' => 1,
					'docon_map_user' => $idjobseeker,
					'docon_map_jobseeker' => 0,
				);

				$provinceSelected = explode(",", $this->input->post('province'));
				$result = $this->job->insertDocument($paramater, $provinceSelected);
				if ($result) {

					$resultArr = array(
						'status' => 'success',
						'msg' => 'Bạn đã tạo hồ sơ thành công.');
					echo json_encode($resultArr);

				} else {
					$resultArr = array(
						'status' => 'error',
						'type' => 'data',
						'msg' => 'Đã có lỗi xảy ra vui lòng thử lại sau');
					echo json_encode($resultArr);
				}

			} else {
				$error['phone'] = form_error('phone');
				$error['degree'] = form_error('degree');
				$error['education'] = form_error('education');
				$error['address'] = form_error('address');
				$error['experience'] = form_error('experience');
				$error['skill'] = form_error('skill');
				$error['reasonapply'] = form_error('reason-apply');
				$error['salary'] = form_error('salary');
				// if (!$checkCaptcha) {
				// 	$error['captcha'] = 'invalid-captcha';
				// }
				$csrf = array(
					'name' => $this->security->get_csrf_token_name(),
					'hash' => $this->security->get_csrf_hash(),
				);
				$reusult = array(
					'status' => 'error',
					'error' => $error,
					'csrf' => $csrf);
				echo json_encode($reusult);
				exit;
			}
		} else {
			redirect(base_url('404'), 'refresh');
		}
	}
	function uploadResumeForm() {
		$styleOption = array('assets/main/css/style_ntv.css'); //, 'assets/main/chosen/chosen.css', 'assets/main/chosen/prism.css');
		$scriptOption = array('assets/main/scroll/jquery.nicescroll.min.js', "server_upload/js/vendor/jquery.ui.widget.js",
			"server_upload/js/jquery.iframe-transport.js",
			"server_upload/js/jquery.fileupload.js", 'assets/main/js/jquery_ntv.js', 'assets/main/js/ntv_upload.js'); // 'assets/main/chosen/chosen.jquery.js',
		//'assets/main/chosen/prism.js', 'assets/main/js/jquery_ntv.js');
		$user = (isset($this->session->userdata['user'])) ? $this->session->userdata['user'] : null;

		$head = $this->load->view('main/head', array('styleOption' => $styleOption, 'scriptOption' => $scriptOption), TRUE);
		$header = $this->load->view('main/header', array('user' => $user, 'showTitle' => true,
		), TRUE);
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		$numResumeUpload = $this->jobseeker->getNumResumeUpload($user['id']);
		$contentJobseeker = $this->load->view('main/jobseeker/upload-resume', array(
			'user' => $user,
			'csrf' => $csrf,
			'numResumeUpload' => $numResumeUpload), TRUE);
		$content = $this->load->view('main/jobseeker/layout', array('contentJobseeker' => $contentJobseeker), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);

		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer, 'isGray' => true));

	}
	function uploadResume() {
		$file_name = $this->input->post('file-name');
		$file_name_upload = $this->input->post('file-tmp');
		$user = (isset($this->session->userdata['user'])) ? $this->session->userdata['user'] : null;
		$dataCV = array(
			'doccv_type' => 1,
			'doccv_map_user' => $user['id'],
			'doccv_map_jobseeker' => 0,
			'doccv_file_tmp' => $file_name_upload,
			'doccv_file_name' => $file_name,
			'doccv_is_delete' => false,
			'doccv_update_at' => date('Y-m-d H:m'),
			'doccv_created_at' => date('Y-m-d H:m'));
		$cv = $this->job->insertCV($dataCV);
		$tmp_name = 'files/' . $file_name_upload;
		$path = 'uploads/cv/' . $user['id'];
		if (!file_exists($path)) {
			mkdir($path, 0777, true);
		}
		copy($tmp_name, 'uploads/cv/' . $user['id'] . '/' . $file_name_upload);
		if ($cv) {
			echo json_encode(array('status' => 'success'));
		} else {
			echo json_encode(array('status' => 'error', 'msg' => 'Không thể upload file. Vui lòng kiểm tra lại.'));
		}
	}
	function deleteRecruitmentApply($idRec) {
		if (is_numeric($idRec)) {

			$user = (isset($this->session->userdata['user'])) ? $this->session->userdata['user'] : null;
			$result = $this->jobseeker->deleteRecruitmentApply($idRec, $user['id']);
			if ($result) {
				echo json_encode(array('status' => 'success'));
			} else {
				echo json_encode(array('status' => 'error'));
			}

		} else {
			redirect(base_url('404'), 'refresh');
		}
	}
	function deleteResumeUpload($idCv) {
		if (is_numeric($idCv)) {

			$user = (isset($this->session->userdata['user'])) ? $this->session->userdata['user'] : null;
			$result = $this->jobseeker->deleteResumeUpload($idCv, $user['id']);
			if ($result) {
				echo json_encode(array('status' => 'success'));
			} else {
				echo json_encode(array('status' => 'error'));
			}

		} else {
			redirect(base_url('404'), 'refresh');
		}
	}

	function getDetailForm($idResume) {
		$resume = $this->jobseeker->getDetailForm($idResume);
		$view = $this->load->view('main/jobseeker/partial/modal-view-resume', array('resume' => $resume), TRUE);
		echo $view;
	}
	function getEditlForm($idResume) {
		$listLevel = $this->job->getListLevel();
		$listHealthy = $this->job->getListHealthy();
		$listCountry = $this->job->getListCountry();
		$listCareer = $this->job->getListCareer();
		$user = (isset($this->session->userdata['user'])) ? $this->session->userdata['user'] : null;
		$listProvinceVN = $this->job->getListProvinceCountryWithResume($listCountry[0]->country_id, $idResume);
		$listProvinceJP = $this->job->getListProvinceCountryWithResume($listCountry[1]->country_id, $idResume);
		$listProvinceResume = $this->jobseeker->getListProvinceResume($idResume);
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		//$numResumeOnline = $this->jobseeker->getNumResumeOnline($user['id']);
		// $contentJobseeker = $this->load->view('main/jobseeker/create-resume', array(

		// 	'numResumeOnline' => $numResumeOnline), TRUE);
		$user = (isset($this->session->userdata['user'])) ? $this->session->userdata['user'] : null;
		$resume = $this->jobseeker->getDetailForm($idResume);
		$view = $this->load->view('main/jobseeker/partial/modal-edit-resume', array('resume' => $resume,
			'user' => $user,
			'listLevel' => $listLevel,
			'listHealthy' => $listHealthy,
			'listCountry' => $listCountry,
			'listCareer' => $listCareer,
			'user' => $user,
			'listProvinceVN' => $listProvinceVN,
			'listProvinceJP' => $listProvinceJP,
			'csrf' => $csrf,
			'listProvinceResume' => $listProvinceResume), TRUE);
		echo $view;
	}
	function deleteResumeOnline($idResume) {
		if (is_numeric($idResume)) {

			$user = (isset($this->session->userdata['user'])) ? $this->session->userdata['user'] : null;
			$result = $this->jobseeker->deleteResumeOnline($idResume, $user['id']);
			if ($result) {
				echo json_encode(array('status' => 'success'));
			} else {
				echo json_encode(array('status' => 'error'));
			}

		} else {
			redirect(base_url('404'), 'refresh');
		}
	}
	function editResume() {
		$this->form_validation->set_message('required', " '%s' không được để trống");
		//$this->form_validation->set_message('valid_email', "email không hợp lệ");

		//$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('date', 'Ngày sinh', 'required');
		$this->form_validation->set_rules('year', 'Năm sinh', 'required');
		$this->form_validation->set_rules('phone', 'Số điện thoại', 'required');
		$this->form_validation->set_rules('degree', 'Bằng cấp', 'required');
		$this->form_validation->set_rules('education', 'Học vấn', 'required');
		$this->form_validation->set_rules('address', 'Nơi ở hiện tại', 'required');
		$this->form_validation->set_rules('experience', 'Kinh nghiệm', 'required');
		$this->form_validation->set_rules('skill', 'Kỹ năng', 'required');
		$this->form_validation->set_rules('reason-apply', 'Lý do ứng tuyển', 'required');
		$this->form_validation->set_rules('salary', 'Mức lương', 'required');

		$province = $this->input->post('province');
		$year = $this->input->post('year');
		$month = $this->input->post('month');
		$date = $this->input->post('date');
		$dayofMonth = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
		$checkBirthday = true;
		if ($year < 0 || $date < 0 || !isset($date) || !isset($year)) {
			$checkBirthday = false;
		} else {
			if ((($year % 4 == 0) && ($year % 100 != 0)) || ($year % 400 == 0)) {
				$dayofMonth[1] = 29;
			}
			if ($date > $dayofMonth[$month - 1]) {
				$checkBirthday = false;
			}

		}
		$error = array();
		if (!$checkBirthday) {
			$error['birthday'] = "ngày tháng không hợp lệ.";
		}
		if (strlen($province) <= 0) {
			$error['province'] = "chưa chọn tỉnh thành nào";
		}
		if ($this->form_validation->run() == TRUE && strlen($province) > 0 && $checkBirthday) {

			$idjobseeker = $this->input->post('idjobseeker');
			$idResume = $this->input->post('idResume');
			$datetimeBirthday = $year . '/' . $month . '/' . $date;
			log_message('error', $datetimeBirthday);
			$date = new DateTime($datetimeBirthday);
			$birthday = date_format($date, 'Y-m-d H:i:s'); // 2011-03-03 00:00:00
			//$date = date_create("'" . $datetimeBirthday . "'");
			//$birthday = date_format($date, "Y-m-d");
			//$datetime = new DateTime();
			//$birthday = $datetime->createFromFormat('Y-m-d', $datetimeBirthday);
			//$birthday = $date = new DateTime('' '');
			$phone = $this->input->post('phone');
			$level = $this->input->post('level');
			$career = $this->input->post('career');
			$degree = $this->input->post('degree');
			$education = $this->input->post('education');
			$address = $this->input->post('address');
			$experience = $this->input->post('experience');
			$skill = $this->input->post('skill');
			$healthy = $this->input->post('healthy');
			$reason = $this->input->post('reason-apply');
			$salary = $this->input->post('salary');
			$advance = $this->input->post('advance');
			$wish = $this->input->post('wish');
			$country = $this->input->post('country');
			$paramater = array(
				'docon_birthday' => $birthday,
				'docon_phone' => $phone,
				'docon_career' => $career,
				'docon_degree' => $degree,
				'docon_education' => $education,
				'docon_address' => $address,
				'docon_experience' => $experience,
				'docon_skill' => $skill,
				'docon_healthy' => $healthy,
				'docon_reason_apply' => $reason,
				'docon_salary' => $salary,
				'docon_advance' => $advance,
				'docon_map_job_level' => $level,
				'docon_wish' => $wish,
				'docon_map_country' => $country,
				'docon_update_at' => date('Y-m-d H:m'),
			);

			$provinceSelected = explode(",", $this->input->post('province'));
			$result = $this->jobseeker->updateResume($paramater, $provinceSelected, $idResume);
			//log_message('error', 'idrecruitment' . $idjob);
			if ($result) {
				echo json_encode(array('status' => 'success'));
			} else {
				echo json_encode(array('status' => 'error'));
			}

		} else {
			$error['phone'] = form_error('phone');
			$error['degree'] = form_error('degree');
			$error['education'] = form_error('education');
			$error['address'] = form_error('address');
			$error['experience'] = form_error('experience');
			$error['skill'] = form_error('skill');
			$error['reasonapply'] = form_error('reason-apply');
			$error['salary'] = form_error('salary');
			$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash(),
			);
			$reusult = array(
				'status' => 'error',
				'error' => $error,
				'csrf' => $csrf);
			echo json_encode($reusult);
			exit;
		}
	}
}