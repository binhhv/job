<?php
class Admin_employer extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('form_validation', 'session'));
		$this->load->model('admin/Employer_model', 'employer');
		$this->load->model('admin/Jobseeker_model', 'jobseeker');
		$this->load->model('admin/Mail_model', 'mail');
		if (!$this->session->userdata['user']['isLogged']) {
			redirect(base_url() . 'admin/login'); // no session established, kick back to login page
		} else if ($this->session->userdata['user']['role'] != 5 && $this->session->userdata['user']['role'] != 1) {
			redirect(base_url('error/403'));
		}
	}
	function index() {
		$scripts = array(
			"assets/admin/angularjs/controller/employer.controller.js",
			"assets/admin/angularjs/service/employer.service.js",
			"assets/admin/angularjs/service/jobseeker.service.js");

		$listCountries = $this->employer->getListCountry();
		$head = $this->load->view('admin/head', array(), TRUE);
		$header = $this->load->view('admin/header', array(), TRUE);
		$content = $this->load->view('admin/employer/employer', array("country" => $listCountries[0]), TRUE);
		$footer = $this->load->view('admin/footer', array(), TRUE);
		$sidemenu = $this->load->view('admin/sidemenu', array('email' => $this->session->userdata['user']['email'],
			'role' => $this->session->userdata['user']['role'],
			'selected' => 'userManager',
			'sub' => 'employer'), TRUE);

		$this->load->view('admin/layout', array('head' => $head,
			'header' => $header,
			'sidemenu' => $sidemenu,
			'content' => $content,
			'footer' => $footer,
			'scripts' => $scripts,
		));
	}
	function getListEmployer() {
		$output = $this->employer->getListEmployer();
		echo json_encode($output);
	}
	function detailEmployer($id) {
		$scripts = array(
			"assets/admin/angularjs/controller/employer.controller.js",
			"assets/admin/angularjs/service/jobseeker.service.js",
			"assets/admin/angularjs/service/employer.service.js",
		);

		// $styles = array(
		// 	"assets/admin/angularjs/lib/select/dist/select.css");

		$employer = $this->employer->detailEmployer($id);
		$countries = $this->employer->getListCountry();
		$head = $this->load->view('admin/head', array(), TRUE);
		$header = $this->load->view('admin/header', array(), TRUE);
		$content = $this->load->view('admin/employer/employer-detail', array('employer' => $employer, 'country' => $countries[0]), TRUE);
		$footer = $this->load->view('admin/footer', array(), TRUE);
		$sidemenu = $this->load->view('admin/sidemenu', array('email' => $this->session->userdata['user']['email'],
			'role' => $this->session->userdata['user']['role'],
			'selected' => 'userManager',
			'sub' => 'employer'), TRUE);

		$this->load->view('admin/layout', array('head' => $head,
			'header' => $header,
			'sidemenu' => $sidemenu,
			'content' => $content,
			'footer' => $footer,
			'scripts' => $scripts,
		));
	}
	function getListEmployerUser($id) {
		$output = $this->employer->getListEmployerUser($id);
		echo json_encode($output);
	}
	function getListEmployerRecruitment($id) {
		$output = $this->employer->getListEmployerRecruitment($id);
		echo json_encode($output);
	}
	function checkAdminEmployerExits($idemployer) {
		$output = $this->employer->checkAdminEmployerExits($idemployer);
		echo json_encode($output);
	}
	function setRoleAdminEmployer() {
		$employeruser = json_decode($this->input->post('employeruser'), true);
		$employerid = json_decode($this->input->post('employerid'), true);
		log_message('error', $employeruser . $employerid);
		$output = $this->employer->setRoleAdminEmployer($employerid, $employeruser);
		echo json_encode($output);
	}
	function deleteEmployerUser() {
		$employeruser = json_decode($this->input->post('employeruser'), true);
		$account_id = $employeruser['account_id'];
		$account_name = $employeruser['account_first_name'] . ' ' . $employeruser['account_last_name'];
		$account_email = $employeruser['account_email'];
		$account_map_id = $employeruser['emac_id'];
		$paramater = array(
			'account_is_delete' => true);
		$paramterAccountMapEmployer = array('emac_is_delete' => true);
		$outputDeleteAccount = $this->jobseeker->updateJobseeker($paramater, $account_id);
		$outputDeleteAccountMap = $this->employer->updateEmployerUser($paramterAccountMapEmployer, $account_map_id);
		//$user = $this->account->getAccount($account_id);
		//log_message('error', $user);
		if ($outputDeleteAccount && $outputDeleteAccountMap) {
			$data = array(
				'mailsend' => $account_email,
				'name' => $account_name,
				'type' => 'delete',
				'typedelete' => 'tài khoản  (' . $account_email . ')',
			);

			$result = $this->mail->sendMail($data);
			log_message('error', $result);
			echo json_encode($result);

		}
		//$this->sendmail();
		else {

			echo json_encode(false);
		}
	}
	function createEmployerUser() {
		$employeruser = json_decode($this->input->post('employeruser'), true);
		$employerid = json_decode($this->input->post('employerid'), true);
		$role = json_decode($this->input->post('role'), true);
		$paramater = array(
			'account_email' => $employeruser['account_email'],
			'account_password' => md5(trim($employeruser['account_password'])),
			'account_first_name' => $employeruser['account_first_name'],
			'account_last_name' => $employeruser['account_last_name'],
			'account_is_get_news' => 0,
			'account_map_role' => $role,
			'account_is_delete' => 0,
			'account_is_disabled' => 0,
			'account_update_at' => date('Y-m-d H:m'),
			'account_created_at' => date('Y-m-d H:m'));
		$paramaterMapAccount = array(
			'emac_map_employer' => $employerid,
			'emac_is_delete' => false,
			'emac_created_at' => date('Y-m-d H:m'));
		//log_message('error', $employerid);

		$output = $this->employer->createEmployerUser($paramater, $paramaterMapAccount, $employerid);
		echo json_encode($output);
	}
	function deleteEmployerRecruitment() {
		$recruitment = json_decode($this->input->post('recruitment'), true);
		$recruitmentid = $recruitment['rec_id'];
		$recruitmenttitle = $recruitment['rec_title'];
		$employerid = $recruitment['rec_map_employer'];
		$parameter = array(
			'rec_is_delete' => true,
		);
		$output = $this->employer->deleteEmployerRecruitment($parameter, $recruitmentid);
		if ($output) {
			$listmail = $this->employer->getListEmployerUser($employerid);
			$employerInfo = $this->employer->detailEmployer($employerid);
			log_message('error', $employerInfo->account_first_name);
			$data = array(
				'name' => $employerInfo->account_first_name . ' ' . $employerInfo->account_last_name,
				'type' => 'delete',
				'multisend' => true,
				'typedelete' => 'tin tuyển dụng  (' . $recruitmenttitle . ')',
				'listmail' => $listmail,
			);

			$result = $this->mail->sendMail($data);
			log_message('error', $result);
			echo json_encode($result);

		} else {
			echo json_encode($output);
		}
	}

	function getDetailEmployerRecruitment($idrec) {
		$output = $this->employer->getDetailEmployerRecruitment($idrec);
		//$welfares = $output->welfares;
		//$listWelfares = json_encode($welfares, true);
		//log_message('error', $welfares);
		echo json_encode($output); //array('output' => $output, 'listWelfares' => $listWelfares));
	}
	function getListWelfare() {
		$output = $this->employer->getListWelfare();
		echo json_encode($output);
	}
	function getListForm() {
		$output = $this->employer->getListForm();
		echo json_encode($output);
	}
	function getListFormChild() {
		$output = $this->employer->getListFormChild();
		echo json_encode($output);
	}
	function getListLevel() {
		$output = $this->employer->getListLevel();
		echo json_encode($output);
	}
	function getListContactForm() {
		$output = $this->employer->getListContactForm();
		echo json_encode($output);
	}
	function getListWelfareEmployerRecruitment($idrec) {
		$output = $this->employer->getListWelfareEmployerRecruitment($idrec);
		echo json_encode($output);
	}
	function getListProvinceCountry($idcountry) {
		$output = $this->employer->getListProvinceCountry($idcountry);
		echo json_encode($output);
	}
	function getListCountry() {
		$output = $this->employer->getListCountry();
		echo json_encode($output);
	}
	function getListProvinceRecruitment($idrec) {
		$output = $this->employer->getListProvinceRecruitment($idrec);
		echo json_encode($output);
	}
	function getListProvinceRecruitmentChange($idrec, $idcountry) {
		log_message('error', "country" . $idcountry);
		$output = $this->employer->getListProvinceRecruitment($idrec, $idcountry);
		echo json_encode($output);
	}
	function updateEmployerRecruitment() {
		$rec = json_decode($this->input->post('rec'), true);
		$welfareSelected = $rec['welfareSelected'];
		$idrec = $rec['rec_id'];
		$idmapcountry = $rec['rec_job_map_country'];
		$provinceSelected = $rec['provinceSelected'];
		$object_contact_form = $rec['object_contact_form'];
		$object_form = $rec['object_form'];
		$object_form_child = $rec['object_form_child'];
		$object_level = $rec['object_level'];
		$data = array(
			'rec_title' => $rec['rec_title'],
			'rec_salary' => $rec['rec_salary'],
			'rec_job_content' => $rec['rec_job_content'],
			'rec_job_time' => $rec['rec_job_time'],
			'rec_job_regimen' => $rec['rec_job_regimen'],
			'rec_job_require' => $rec['rec_job_require'],
			'rec_job_priority' => $rec['rec_job_priority'],
			'rec_job_map_form' => $object_form['fjob_id'], //$rec['rec_job_map_form'],
			'rec_job_map_form_child' => $object_form_child['jcform_id'], //$rec['rec_job_map_form_child'],
			'rec_job_map_level' => $object_level['ljob_id'], //$rec['rec_job_map_level'],
			'rec_job_map_country' => $rec['rec_job_map_country'],
			'rec_contact_name' => $rec['rec_contact_name'],
			'rec_contact_email' => $rec['rec_contact_email'],
			'rec_contact_address' => $rec['rec_contact_address'],
			'rec_contact_phone' => $rec['rec_contact_phone'],
			'rec_contact_mobile' => $rec['rec_contact_mobile'],
			'rec_contact_form' => $object_contact_form['contact_form_id'], //$rec['rec_contact_form'],
			'rec_is_approve' => $rec['rec_is_approve'],
			'rec_update_at' => date('Y-m-d H:m'));
		$result = $this->employer->updateEmployerRecruitment($data, $idrec, $welfareSelected, $provinceSelected, $idmapcountry);
		//$result = $this->employer->updateEmployerRecruitmentWelfare($rec['welfareSelected'], $rec['rec_id']);
		log_message('error', $result);
		echo json_encode($result);
	}
	function createEmployerRecruitment() {
		$rec = json_decode($this->input->post('rec'), true);
		$welfareSelected = $rec['welfareSelected'];
		//$idrec = $rec['rec_id'];
		$idmapcountry = $rec['rec_job_map_country'];
		$provinceSelected = $rec['provinceSelected'];
		$object_contact_form = $rec['object_contact_form'];
		$object_form = $rec['object_form'];
		$object_form_child = $rec['object_form_child'];
		$object_level = $rec['object_level'];
		$iduser = $this->session->userdata['user']['id'];
		$idemployer = $rec['idemployer'];
		log_message('error', $iduser);
		$data = array(
			'rec_title' => $rec['rec_title'],
			'rec_salary' => $rec['rec_salary'],
			'rec_job_content' => $rec['rec_job_content'],
			'rec_job_time' => $rec['rec_job_time'],
			'rec_job_regimen' => $rec['rec_job_regimen'],
			'rec_job_require' => $rec['rec_job_require'],
			'rec_job_priority' => $rec['rec_job_priority'],
			'rec_job_map_form' => $object_form['fjob_id'], //$rec['rec_job_map_form'],
			'rec_job_map_form_child' => $object_form_child['jcform_id'], //$rec['rec_job_map_form_child'],
			'rec_job_map_level' => $object_level['ljob_id'], //$rec['rec_job_map_level'],
			'rec_job_map_country' => $rec['rec_job_map_country'],
			'rec_contact_name' => $rec['rec_contact_name'],
			'rec_contact_email' => $rec['rec_contact_email'],
			'rec_contact_address' => $rec['rec_contact_address'],
			'rec_contact_phone' => $rec['rec_contact_phone'],
			'rec_contact_mobile' => $rec['rec_contact_mobile'],
			'rec_contact_form' => $object_contact_form['contact_form_id'], //$rec['rec_contact_form'],
			'rec_map_employer' => $idemployer,
			'rec_is_approve' => true,
			'rec_is_disabled' => false,
			'rec_is_delete' => false,
			'rec_update_at' => date('Y-m-d H:m'),
			'rec_created_at' => date('Y-m-d H:m'));
		$result = $this->employer->createEmployerRecruitment($data, $welfareSelected, $provinceSelected, $idmapcountry, $iduser);
		//$result = $this->employer->updateEmployerRecruitmentWelfare($rec['welfareSelected'], $rec['rec_id']);
		log_message('error', $result);
		echo json_encode($result);
		//echo json_encode(true);
	}
	function approveEmployerRecruitment() {
		$rec = json_decode($this->input->post('rec'), true);
		$idrec = $rec['rec_id'];
		$iduser = $this->session->userdata['user']['id'];
		$data = array(
			'rec_is_approve' => true,
		);
		$output = $this->employer->approveEmployerRecruitment($data, $idrec, $iduser);
		echo json_encode($output);
	}
	function updateEmployer() {
		$logo = $this->input->post('logo');
		$employer = json_decode($this->input->post('employer'), true);

		$employer_id = $employer['employer_id'];
		$logoName = $employer['logoName'];
		$employer_map_country = $employer['employer_map_country'];
		$employer_name = $employer['employer_name'];
		$employer_address = $employer['employer_address'];
		$employer_phone = $employer['employer_phone'];
		$employer_map_province = $employer['provinceSelected']['province_id'];
		$employer_size = $employer['employer_size'];
		$employer_about = $employer['employer_about'];
		$employer_fax = $employer['employer_fax'];
		$employer_website = $employer['employer_website'];
		$employer_contact_name = $employer['employer_contact_name'];
		$employer_contact_email = $employer['employer_contact_email'];
		$employer_contact_phone = $employer['employer_contact_phone'];
		$employer_contact_mobile = $employer['employer_contact_mobile'];
		$employer_logo = $employer['logoName'];

		$employer_is_approve = true;
		$employer_is_delete = false;
		$employer_update_at = date('Y-m-d H:m');

		$extension = substr(strrchr($logoName, '.'), 1); //end(explode(".", $logoName));
		$fileTmp = date('Y') . date('m') . date('d') . date('H') . date('m') . date('s') . date('u');
		$fileTmp = md5($fileTmp . $employer_id);
		$file = $fileTmp . '.' . $extension;
		$path = 'uploads/logo/' . $employer_id . '/' . $file;
		$employer_logo_tmp = $file;

		$data = array(
			'employer_map_country' => $employer_map_country,
			'employer_name' => $employer_name,
			'employer_address' => $employer_address,
			'employer_phone' => $employer_phone,
			'employer_map_province' => $employer_map_province,
			'employer_size' => $employer_size,
			'employer_about' => $employer_about,
			'employer_fax' => $employer_fax,
			'employer_website' => $employer_website,
			'employer_contact_name' => $employer_contact_name,
			'employer_contact_email' => $employer_contact_email,
			'employer_contact_phone' => $employer_contact_phone,
			'employer_contact_mobile' => $employer_contact_mobile,
			'employer_is_approve' => $employer_is_approve,
			'employer_is_delete' => $employer_is_delete,
			'employer_update_at' => $employer_update_at,
		);
		if (isset($logoName) && strlen($logoName) > 0) {
			$uploadResult = $this->uploadLogo($logo, $path, $employer_id);
			$data['employer_logo'] = $employer_logo;
			$data['employer_logo_tmp'] = $employer_logo_tmp;
			$resultUpdate = $this->employer->updateEmployer($data, $employer_id);
			echo json_encode($resultUpdate);
		} else {
			$resultUpdate = $this->employer->updateEmployer($data, $employer_id);
			echo json_encode($resultUpdate);
		}

		//$img = $_POST['img']; // Your data 'data:image/png;base64,AAAFBfj42Pj4';

		//$logo = str_replace(' ', '+', $logo);
		//$data = base64_decode($logo);
		//file_put_contents('/tmp/image.png', $data);
		//$employer = (array) json_decode($decoded);
		//$employer = json_decode($this->input->post('employer'), true);

		//$source = imagecreatefromstring($imageData);
		//$angle = 90;
		//$rotate = imagerotate($source, $angle, 0); // if want to rotate the image
		//$imageName = "hello1.png";
		//$imageSave = imagejpeg($rotate, $imageName, 100);
		//imagedestroy($source);

		//echo json_encode($logo);
		//$data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $logo));
		// $img = imagecreatefromstring($data);
		// if ($img != false) {
		// 	imagejpeg($img, base_url() . 'upload/logo/1/abbbbbddd.jpg');
		// }
	}
	function createEmployer() {
		$logo = $this->input->post('logo');
		$employer = json_decode($this->input->post('employer'), true);

		//$employer_id = $employer['employer_id'];
		$logoName = $employer['logoName'];
		$employer_map_country = $employer['employer_map_country'];
		$employer_name = $employer['employer_name'];
		$employer_address = $employer['employer_address'];
		$employer_phone = $employer['employer_phone'];
		$employer_map_province = $employer['provinceSelected']['province_id'];
		$employer_size = $employer['employer_size'];
		$employer_about = $employer['employer_about'];
		$employer_fax = $employer['employer_fax'];
		$employer_website = $employer['employer_website'];
		$employer_contact_name = $employer['employer_contact_name'];
		$employer_contact_email = $employer['employer_contact_email'];
		$employer_contact_phone = $employer['employer_contact_phone'];
		$employer_contact_mobile = $employer['employer_contact_mobile'];
		$employer_logo = $employer['logoName'];

		$employer_is_approve = true;
		$employer_is_delete = false;
		$employer_update_at = date('Y-m-d H:m');
		$employer_created_at = date('Y-m-d H:m');
		$employer_password = $this->incrementalHash(6);
		$employer_password_md5 = md5($employer_password);
		$data = array(
			'employer_map_country' => $employer_map_country,
			'employer_name' => $employer_name,
			'employer_address' => $employer_address,
			'employer_phone' => $employer_phone,
			'employer_map_province' => $employer_map_province,
			'employer_size' => $employer_size,
			'employer_about' => $employer_about,
			'employer_fax' => $employer_fax,
			'employer_website' => $employer_website,
			'employer_contact_name' => $employer_contact_name,
			'employer_contact_email' => $employer_contact_email,
			'employer_contact_phone' => $employer_contact_phone,
			'employer_contact_mobile' => $employer_contact_mobile,
			'employer_is_approve' => $employer_is_approve,
			'employer_is_delete' => $employer_is_delete,
			'employer_update_at' => $employer_update_at,
			'employer_created_at' => $employer_created_at,
			'employer_map_account' => 0,
			'employer_logo' => '',
			'employer_logo_tmp' => '',
		);

		$employer_admin_email = $employer['employer_admin_email'];
		$employer_admin_first_name = $employer['employer_admin_first_name'];
		$employer_admin_last_name = $employer['employer_admin_last_name'];
		$dataAccount = array(
			'account_email' => $employer_admin_email,
			'account_first_name' => $employer_admin_first_name,
			'account_last_name' => $employer_admin_last_name,
			'account_password' => $employer_password_md5,
			'account_is_get_news' => false,
			'account_map_role' => 2,
			'account_is_disabled' => false,
			'account_is_delete' => false,
			'account_update_at' => date('Y-m-d H:m'),
			'account_created_at' => date('Y-m-d H:m'),
		);

		$resultAdmin = $this->employer->createAdminEmployer($dataAccount);
		if ($resultAdmin) {
			$resultInsert = $this->employer->createEmployer($data);
			if ($resultInsert) {
				if (isset($logoName) && strlen($logoName) > 0) {
					$extension = substr(strrchr($logoName, '.'), 1); //end(explode(".", $logoName));
					$fileTmp = date('Y') . date('m') . date('d') . date('H') . date('m') . date('s') . date('u');
					$fileTmp = md5($fileTmp . $resultInsert);
					$file = $fileTmp . '.' . $extension;
					$path = 'uploads/logo/' . $resultInsert . '/' . $file;
					$employer_logo_tmp = $file;

					$uploadResult = $this->uploadLogo($logo, $path, $resultInsert);
					$data['employer_logo'] = $employer_logo;
					$data['employer_logo_tmp'] = $employer_logo_tmp;
					$data['employer_map_account'] = $resultAdmin;
					$resultUpdate = $this->employer->updateEmployer($data, $resultInsert);

					if ($resultUpdate) {
						$dataMapEmployerAccount = array(
							'emac_map_account' => $resultAdmin,
							'emac_map_employer' => $resultInsert,
							'emac_is_delete' => false,
							'emac_created_at' => date('Y-m-d H:m'));
						$resultMap = $this->employer->insertMapEmployerAccount($dataMapEmployerAccount);
						$data = array(
							'name' => $employer_admin_first_name . ' ' . $employer_admin_last_name,
							'type' => 'notifyEmployer',
							'multisend' => false,
							'password' => $employer_password,
							'mail' => $employer_admin_email,
							'mailsend' => $employer_admin_email,
						);

						$result = $this->mail->sendMail($data);
					}
					echo json_encode($resultUpdate);
				}

			} else {
				echo json_encode(false);
			}
		} else {
			echo json_encode(false);
		}
	}
	function uploadLogo($data, $file, $employerid) {
		if (!file_exists('uploads/logo/' . $employerid)) {
			mkdir('uploads/logo/' . $employerid, 0777, true);
		}
		$logo = str_replace('[removed]', '', trim($data));
		log_message('error', $logo);
		$imageData = base64_decode($logo);
		$success = file_put_contents($file, $imageData);
		if ($success) {
			return true;
		} else {
			return false;
		}
	}
	function incrementalHash($len = 6) {
		$charset = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
		$base = strlen($charset);
		$result = '';

		$now = explode(' ', microtime())[1];
		while ($now >= $base) {
			$i = $now % $base;
			$result = $charset[$i] . $result;
			$now /= $base;
		}
		return substr($result, -5);
	}

}