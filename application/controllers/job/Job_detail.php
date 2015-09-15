<?php
/**
 *
 */
class Job_detail extends CI_Controller {

	function __construct() {
		# code...
		parent::__construct();
		//$this->load->helper('url');
		$this->load->model('Contact_model', 'contact');
		$this->load->model('job/Job_model', 'job');
		$this->load->helper('security');
		$this->load->helper(array('form', 'url', 'cookie'));
		$this->load->library(array('form_validation', 'session'));

	}
	function index($job = null) {
// 		<script src="js/vendor/jquery.ui.widget.js"></script>
		// <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
		// <script src="js/jquery.iframe-transport.js"></script>
		// <!-- The basic File Upload plugin -->
		// <script src="js/jquery.fileupload.js"></script>
		$user = (isset($this->session->userdata['user'])) ? $this->session->userdata['user'] : null;
		$scriptJob = array(
			"assets/main/js/map/markerwithlabel.js",
			"assets/main/chosen/chosen.jquery.js",
			"assets/main/chosen/prism.js",
			"server_upload/js/vendor/jquery.ui.widget.js",
			"server_upload/js/jquery.iframe-transport.js",
			"server_upload/js/jquery.fileupload.js");
		$styleJob = array(
			// "assets/main/chosen/style.css",
			"assets/main/chosen/prism.css",
			"assets/main/chose/chosen.css");
		$head = $this->load->view('main/head', array('user' => $user, 'scriptJob' => $scriptJob, 'styleJob' => $styleJob, 'titlePage' => 'JOB7VN Group|Contact'), TRUE);
		$header = $this->load->view('main/header', array(
			'logo' => 'img/header/allSHIGOTO.png',
			'showTitle' => true,
			'logoWidth' => '170px',
			'logoHeight' => '70px',
			'user' => $user,
			'menu' => '',
		), TRUE);
		//$ab = m;

		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);

		//$jobid = substr(strrchr($job, "-"), 1);

		if (isset($job)) {
			$jobDetail = $this->job->getDetailRecruitment($job);
			$centerMap = json_encode($this->job->getCenterMapFromRecruitment($job));
			$jobMap = json_encode($this->job->getAllRecruitmentForMap());
			$jobSames = $this->job->getSameRecruitment($job);
		} else {
			$jobDetail = null;
			$centerMap = null;
			$jobMap = null;
			$jobSames = null;
		}
		if (isset($user)) {
			$docs = $this->job->getListDoconUser($user['id']);
			$cvs = $this->job->getListCVUser($user['id']);
		} else {
			$docs = null;
			$cvs = null;
		}
		$content = $this->load->view('main/job/job', array('job' => $job,
			'jobDetail' => $jobDetail,
			'centerMap' => $centerMap,
			'jobMap' => $jobMap,
			'jobSames' => $jobSames,
			'user' => $user,
			'csrf' => $csrf,
			'docs' => $docs,
			'cvs' => $cvs), TRUE);

		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer));

	}
	function getListDoconUser() {
		$id = $this->input->post('id');
		$docs = $this->job->getListDoconUser($id);
		$view = $this->load->view('main/job/partial/list-doc-user', array('docs' => $docs), TRUE);
		echo $view;
		exit;
	}
	function getListCVUser() {
		$id = $this->input->post('id');
		$cvs = $this->job->getListCVUser($id);
		$view = $this->load->view('main/job/partial/list-cv-user', array('cvs' => $cvs), TRUE);
		echo $view;
		exit;
	}
	function getToken() {
		$user = (isset($this->session->userdata['user'])) ? $this->session->userdata['user'] : null;
		if (isset($user)) {
			$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash(),
				'id' => $this->session->userdata['user']['id'],
			);
		} else {
			$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash(),
				'id' => 0,
			);
		}

		echo json_encode($csrf);
	}
	function getDocView($id) {
		$doc = $this->job->getDetailForm($id, 1);
		$view = $this->load->view('main/job/partial/modal-detail-document', array('doc' => $doc), TRUE);
		echo $view;
		exit;
	}
	function getTokenView() {
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		$view = $this->load->view('main/job/partial/token-view', array('csrf' => $csrf), TRUE);
		echo $view;
		exit;
	}
	function getCreateForm($id) {
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
		$view = $this->load->view('main/job/partial/modal-create-form', array(
			'listLevel' => $listLevel,
			'listHealthy' => $listHealthy,
			'listCountry' => $listCountry,
			'listCareer' => $listCareer,
			'user' => $user,
			'listProvinceVN' => $listProvinceVN,
			'listProvinceJP' => $listProvinceJP,
			'csrf' => $csrf,
			'idjob' => $id), TRUE);
		echo $view;
		exit;
	}
	function applyJob() {
		$idjobseeker = $this->input->post('idjobseeker');
		$idjob = $this->input->post('idjob');
		$doc = $this->input->post('doc');
		log_message('error', $idjobseeker . '-' . $idjob . '-' . $doc);
		if ($doc == 'doccv') {
			$cv = $this->input->post('cvuser');

			if ($cv != -1) {
				$data = array(
					'recapp_map_recruitment' => $idjob,
					'recapp_map_user' => $idjobseeker,
					'recapp_doc_type' => 1,
					'recapp_map_doc' => $cv,
					'recapp_is_delete' => false,
					'recapp_created_at' => date('Y-m-d H:m'));
				$result = $this->job->applyJob($data);
				if ($result) {
					$resultArr = array(
						'status' => 'success',
						'msg' => 'Bạn đã apply thành công.');
					echo json_encode($resultArr);
				} else {
					$resultArr = array(
						'status' => 'error',
						'type' => 'data',
						'msg' => 'Đã có lỗi xảy ra vui lòng thử lại sau');
					echo json_encode($resultArr);
				}
			} else {
				//$check = $this->input->post('cv');
				//log_message('error', $check);
				// $file_name = $_FILES['cv']['name'];
				if (!file_exists('uploads/cv/' . $idjobseeker)) {
					mkdir('uploads/cv/' . $idjobseeker, 0777, true);
				}
				// $config['upload_path'] = 'uploads/cv/' . $idjobseeker;
				// $config['allowed_types'] = 'doc|docx|pdf';
				// $config['max_size'] = 100000000;
				// $config['encrypt_name'] = TRUE;
				// //$config['max_width'] = 1024;
				// //$config['max_height'] = 768;

				// $this->load->library('upload', $config);

				// if (!$this->upload->do_upload('cv')) {
				// 	$error = array('error' => $this->upload->display_errors());
				// 	// $csrf = array(
				// 	// 	'name' => $this->security->get_csrf_token_name(),
				// 	// 	'hash' => $this->security->get_csrf_hash(),
				// 	// );
				// 	$errorArr = array(
				// 		'status' => 'error',
				// 		'type' => 'file',
				// 		'msg' => "file không đúng định dạng.",
				// 		'name' => $this->security->get_csrf_token_name(),
				// 		'hash' => $this->security->get_csrf_hash());
				// 	echo json_encode($errorArr);
				// 	exit;
				// 	//$this->load->view('upload_form', $error);
				// } else {
				//$upload_data = $this->upload->data();
				//$file_name_upload = $upload_data['file_name'];
				$file_name = substr(strrchr($this->input->post('file-name'), "\\"), 1);
				$file_name_upload = $this->input->post('file-tmp');
				$dataCV = array(
					'doccv_type' => 1,
					'doccv_map_user' => $idjobseeker,
					'doccv_map_jobseeker' => 0,
					'doccv_file_tmp' => $file_name_upload,
					'doccv_file_name' => $file_name,
					'doccv_is_delete' => false,
					'doccv_update_at' => date('Y-m-d H:m'),
					'doccv_created_at' => date('Y-m-d H:m'));
				$cv = $this->job->insertCV($dataCV);
				$tmp_name = 'files/' . $file_name_upload;
				copy($tmp_name, 'uploads/cv/' . $idjobseeker . '/' . $file_name_upload);
				$data = array(
					'recapp_map_recruitment' => $idjob,
					'recapp_map_user' => $idjobseeker,
					'recapp_doc_type' => 1,
					'recapp_map_doc' => $cv,
					'recapp_is_delete' => false,
					'recapp_created_at' => date('Y-m-d H:m'));
				$result = $this->job->applyJob($data);
				if ($result) {
					$resultArr = array(
						'status' => 'success',
						'msg' => 'Bạn đã apply thành công.');
					echo json_encode($resultArr);
					exit;
				} else {
					$resultArr = array(
						'status' => 'error',
						'type' => 'data',
						'msg' => 'Đã có lỗi xảy ra vui lòng thử lại sau');
					echo json_encode($resultArr);
				}

				//$this->load->view('upload_success', $data);
				//}

			}
		} else {
			$doc = $this->input->post('docuser');
			if ($doc != -1) {
				$data = array(
					'recapp_map_recruitment' => $idjob,
					'recapp_map_user' => $idjobseeker,
					'recapp_doc_type' => 2,
					'recapp_map_doc' => $doc,
					'recapp_is_delete' => false,
					'recapp_created_at' => date('Y-m-d H:m'));
				$result = $this->job->applyJob($data);
				if ($result) {
					$resultArr = array(
						'status' => 'success',
						'msg' => 'Bạn đã apply thành công.');
					echo json_encode($resultArr);
				} else {
					$resultArr = array(
						'status' => 'error',
						'type' => 'data',
						'msg' => 'Đã có lỗi xảy ra vui lòng thử lại sau');
					echo json_encode($resultArr);
				}
			} else {

			}
		}
	}
	public function do_upload($id_account) {
		$arr_upload;
		$path = './uploads/cv/' . $id_account;
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
		$file_upload = 'cv';

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

	function getListLevel() {
		$output = $this->job->getListLevel();
		echo json_encode($output);
	}
	function applyCreateFormJob() {

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
			$idjob = $this->input->post('idjob');
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
				$dataApply = array(
					'recapp_map_recruitment' => $idjob,
					'recapp_map_user' => $idjobseeker,
					'recapp_doc_type' => 2,
					'recapp_map_doc' => $result,
					'recapp_is_delete' => false,
					'recapp_created_at' => date('Y-m-d H:m'));
				$resultApply = $this->job->applyJob($dataApply);
				if ($resultApply) {
					$resultArr = array(
						'status' => 'success',
						'msg' => 'Bạn đã apply thành công.');
					echo json_encode($resultArr);
				} else {
					$resultArr = array(
						'status' => 'error',
						'type' => 'data',
						'msg' => 'Đã có lỗi xảy ra vui lòng thử lại sau');
					echo json_encode($resultArr);
				}
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
		//log_message('error', $province);
	}
}