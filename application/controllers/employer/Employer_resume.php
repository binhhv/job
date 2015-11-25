<?php
/**
 *
 */
class Employer_resume extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('form_validation', 'session'));
		$this->load->model('employer/Employer_model', 'employer');
		$this->load->model('employer/Recruitment_model', 'recruitment');
		$this->load->model('employer/Resume_model', 'resume');
		$this->load->helper('security');
		$this->load->helper('language');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->lang->load('message', 'vi');
		$this->load->model('UtilModel', 'util');
		$this->load->library('pagination');
		$this->load->model('Register_model', 'account');
		if (!$this->session->userdata['user']['isLogged'] || !($this->session->userdata['user']['role'] == 2 || $this->session->userdata['user']['role'] == 3)) {
			redirect(base_url('404'), 'refresh');
		}
	}
	function index() {
		$user = $this->session->userdata['user'];
		$employerInfo = $this->employer->getInfoEmployer($user['id']);
		$numRecruitmentPub = $this->employer->getNumRecruitmentAccout($employerInfo->employer_id, $user['id']);
		$employerInfo->numRecruitmentAccount = $numRecruitmentPub;
		$employerInfo->user = $user;
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		$employerInfo->csrf = $csrf;
		$update_account_employer = $this->load->view('main/employer/modal_update_account_employer', array('employerInfo' => $employerInfo, 'csrf' => $csrf), TRUE);
		$employer_menu = $this->load->view('main/employer/employer_menu', array('employerInfo' => $employerInfo, 'menu' => 'accounts', 'sub' => 'managerAccount'), TRUE);
		$styleOption = array('assets/main/datatables/dataTables.bootstrap.css');
		$scriptOption = array('assets/main/scroll/jquery.nicescroll.min.js', 'assets/main/js/employer/jquery_recruitment.js');

		$head = $this->load->view('main/head', array('title' => 'Quản lý tin tuyển dụng', 'scriptOption' => $scriptOption, 'styleOption' => $styleOption, 'scriptTable' => true), TRUE);
		$header = $this->load->view('main/header', array('user' => $user, 'showTitle' => true,
		), TRUE);
		//get list account of employer
		//$listAccount = $this->employer->getListAccount($employerInfo->employer_id);
		$breadcrumbs = array(
			array('isLink' => true,
				'title' => $this->lang->line('breadcrumbs_home'),
				'link' => base_url()),
			array('isLink' => true,
				'title' => $this->lang->line('breadcrumbs_employer'),
				'link' => base_url('employer')),
			array('isLink' => false,
				'title' => $this->lang->line('breadcrumbs_search_resume'),
				'link' => ''));
		$breadcrumb = $this->load->view('main/employer/breadcrumb', array('breadcrumbs' => $breadcrumbs), TRUE);
		$listProvince = $this->recruitment->getAllProvince();
		$listCareer = $this->recruitment->getAllJob_Career();
		$listLevel = $this->recruitment->getAllJob_Job_Level();
		$contentEmployer = $this->load->view('main/employer/search-resume', array('csrf' => $csrf, 'employerInfo' => $employerInfo,
			'listProvince' => $listProvince, 'listCareer' => $listCareer, 'listLevel' => $listLevel), TRUE);
		$content = $this->load->view('main/employer/layout', array('contentEmployer' => $contentEmployer, 'update_account_employer' => $update_account_employer,
			'employer_menu' => $employer_menu, 'breadcrumb' => $breadcrumb), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer, 'isGray' => true));

	}
	function search($value1, $value2 = "", $value3 = "") {
		$user = (isset($this->session->userdata['user'])) ? $this->session->userdata['user'] : null;
		$employerInfo = $this->employer->getInfoEmployer($user['id']);
		$numRecruitmentPub = $this->employer->getNumRecruitmentAccout($employerInfo->employer_id, $user['id']);
		$employerInfo->numRecruitmentAccount = $numRecruitmentPub;
		$employerInfo->user = $user;
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		$employerInfo->csrf = $csrf;
		$keyArr = array(array("p" => 0),
			array("l" => 0),
			array("c" => 0));
		if (strlen($value3) > 0) {
			$keyRegex = array('p', 'l', 'c');
			$keyValue = $value3;
			$valueSearch = str_replace($keyRegex, "|", $value3);
			$valueSearchArray = explode("|", $valueSearch);
			$index = 1;
			$indexKey = 0;

			foreach ($keyRegex as $value) {
				if (strpos($keyValue, $value) !== false) {
					$keyArr[$indexKey][$value] = $valueSearchArray[$index];
					$index++;
				}
				$indexKey++;

			}
			//$jobSearch = $this->search->searchJob(urldecode($value1), $keyArr);
		} else {
			$valueSearch = null;
			//$keyArr = null;

		}
		$resumeSearch = $this->resume->searchResume($employerInfo->employer_id, urldecode($value1), $keyArr);

		//$url = 'province/' . $provinceName . '-' . $id . '.html';
		$url = $this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4);
		$config['base_url'] = site_url($url);
		$config['total_rows'] = count($resumeSearch);
		$config['per_page'] = "10";
		$config["uri_segment"] = 5;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);

		//config for bootstrap pagination class integration
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
		// if ($page * $config["per_page"] >= count($jobSearch)) {
		// 	$page = 0;
		// }
		//call the model function to get the department data
		$resumeSearchPagingnation = $this->resume->searchResume($employerInfo->employer_id, urldecode($value1), $keyArr, $config["per_page"], $page);
		//log_message('error', count($listRecruitmentProvincePage));
		$pagination = $this->pagination->create_links();

		//$head = $this->load->view('main/head', array('user' => $user), TRUE);

		// $searchHorizontal = $this->load->view('main/search-horizontal', array(
		// 	'province' => $province,
		// 	'jobform' => $arr_job_form,
		// 	'jobformchild' => $job_form_child,
		// 	'salary' => $salary,
		// 	'level' => $job_level,
		// 	'career' => $career,
		// 	'keyArr' => $keyArr,
		// 	'keyWord' => $value1), TRUE);

		// $header = $this->load->view('main/header', array(
		// 	'logo' => 'img/header/allSHIGOTO.png',
		// 	'showTitle' => true,
		// 	'logoWidth' => '170px',
		// 	'logoHeight' => '70px',
		// 	'user' => $user,
		// 	'menu' => 'search',
		// ), TRUE);
		//$jobDetail = $this->job->getDetailRecruitment($job);
		// if ($keyArr[0]['p'] != 0) {
		// 	//var_dump($keyArr[0]['p']);
		// } else {

		// }
		//$centerMap = json_encode($this->job->getCenterMap($keyArr[0]['p']));
		//$jobMap = json_encode($this->job->getAllRecruitmentForMap());
		//$jobSames = $this->job->getSameRecruitment($job);
		// $content = $this->load->view('main/job/job-search', array('centerMap' => $centerMap, 'jobMap' => $jobMap, 'searchHorizontal' => $searchHorizontal, 'listJob' => $jobSearchPagingnation, 'numjob' => count($jobSearch), 'pagination' => $pagination), TRUE);

		// $footer = $this->load->view('main/footer', array(), TRUE);
		// $this->load->view('main/layout', array('isGray' => true, 'head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer));

		$update_account_employer = $this->load->view('main/employer/modal_update_account_employer', array('employerInfo' => $employerInfo, 'csrf' => $csrf), TRUE);
		$employer_menu = $this->load->view('main/employer/employer_menu', array('employerInfo' => $employerInfo, 'menu' => 'accounts', 'sub' => 'managerAccount'), TRUE);
		$scriptOption = array('assets/main/js/employer/jquery_resume.js');
		$head = $this->load->view('main/head', array('title' => 'Tìm kiếm hồ sơ ứng viên', 'scriptJob' => $scriptOption, 'scriptTable' => true), TRUE);
		$header = $this->load->view('main/header', array('user' => $user, 'showTitle' => true,
		), TRUE);
		//get list account of employer
		//$listAccount = $this->employer->getListAccount($employerInfo->employer_id);
		$breadcrumbs = array(
			array('isLink' => true,
				'title' => $this->lang->line('breadcrumbs_home'),
				'link' => base_url()),
			array('isLink' => true,
				'title' => $this->lang->line('breadcrumbs_employer'),
				'link' => base_url('employer')),
			array('isLink' => false,
				'title' => $this->lang->line('breadcrumbs_search_resume'),
				'link' => ''));
		$breadcrumb = $this->load->view('main/employer/breadcrumb', array('breadcrumbs' => $breadcrumbs), TRUE);
		$listProvince = $this->recruitment->getAllProvince();
		$listCareer = $this->recruitment->getAllJob_Career();
		$listLevel = $this->recruitment->getAllJob_Job_Level();
		$contentEmployer = $this->load->view('main/employer/search-resume-result', array('csrf' => $csrf, 'employerInfo' => $employerInfo,
			'listProvince' => $listProvince, 'listCareer' => $listCareer, 'listLevel' => $listLevel,
			'listResume' => $resumeSearchPagingnation, 'numResume' => count($resumeSearch), 'pagination' => $pagination,
			'keyArr' => $keyArr,
			'keyWord' => $value1), TRUE);
		$content = $this->load->view('main/employer/layout', array('contentEmployer' => $contentEmployer, 'update_account_employer' => $update_account_employer,
			'employer_menu' => $employer_menu, 'breadcrumb' => $breadcrumb), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer, 'isGray' => true));

	}
	function detail($idResume) {
		if (intval($idResume)) {

			$user = $this->session->userdata['user'];
			$employerInfo = $this->employer->getInfoEmployer($user['id']);
			$numRecruitmentPub = $this->employer->getNumRecruitmentAccout($employerInfo->employer_id, $user['id']);
			$employerInfo->numRecruitmentAccount = $numRecruitmentPub;
			$employerInfo->user = $user;
			$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash(),
			);
			$employerInfo->csrf = $csrf;
			$resume = $this->resume->getDetailForm($idResume, $employerInfo->employer_id);

			$update_account_employer = $this->load->view('main/employer/modal_update_account_employer', array('employerInfo' => $employerInfo, 'csrf' => $csrf), TRUE);
			$employer_menu = $this->load->view('main/employer/employer_menu', array('employerInfo' => $employerInfo, 'menu' => 'accounts', 'sub' => 'managerAccount'), TRUE);
			$styleOption = array('assets/main/datatables/dataTables.bootstrap.css');
			$scriptOption = array('assets/main/js/employer/jquery_resume.js');

			$head = $this->load->view('main/head', array('title' => 'Chi tiết hồ sơ ứng viên', 'scriptJob' => $scriptOption, 'styleOption' => $styleOption, 'scriptTable' => true), TRUE);
			$header = $this->load->view('main/header', array('user' => $user, 'showTitle' => true,
			), TRUE);
			//get list account of employer
			//$listAccount = $this->employer->getListAccount($employerInfo->employer_id);
			$breadcrumbs = array(
				array('isLink' => true,
					'title' => $this->lang->line('breadcrumbs_home'),
					'link' => base_url()),
				array('isLink' => true,
					'title' => $this->lang->line('breadcrumbs_employer'),
					'link' => base_url('employer')),
				array('isLink' => false,
					'title' => $resume->docon_code,
					'link' => ''));

			$breadcrumb = $this->load->view('main/employer/breadcrumb', array('breadcrumbs' => $breadcrumbs), TRUE);
			$listProvince = $this->recruitment->getAllProvince();
			$listCareer = $this->recruitment->getAllJob_Career();
			$listLevel = $this->recruitment->getAllJob_Job_Level();
			$contentEmployer = $this->load->view('main/employer/detail-resume', array('csrf' => $csrf, 'employerInfo' => $employerInfo,
				'listProvince' => $listProvince, 'listCareer' => $listCareer, 'listLevel' => $listLevel,
				'resume' => $resume), TRUE);
			$content = $this->load->view('main/employer/layout', array('contentEmployer' => $contentEmployer, 'update_account_employer' => $update_account_employer,
				'employer_menu' => $employer_menu, 'breadcrumb' => $breadcrumb), TRUE);
			$footer = $this->load->view('main/footer', array(), TRUE);
			$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer, 'isGray' => true));

		} else {
			redirect(base_url('404'), 'refresh');
		}

	}
	function storeResume($idResume) {
		log_message('error', 'result' . $idResume);
		if (intval($idResume)) {
			$user = $this->session->userdata['user'];
			$employerInfo = $this->employer->getInfoEmployer($user['id']);
			$numRecruitmentPub = $this->employer->getNumRecruitmentAccout($employerInfo->employer_id, $user['id']);
			$employerInfo->numRecruitmentAccount = $numRecruitmentPub;
			$employerInfo->user = $user;
			$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash(),
			);
			$employerInfo->csrf = $csrf;
			$result = $this->resume->storeResume($idResume, $employerInfo);

			if ($result) {
				echo json_encode(array('status' => 'success'));
			} else {
				echo json_encode(array('status' => 'error'));
			}
		} else {
			echo json_encode(array('status' => 'error'));
		}

	}

	function store() {
		$user = $this->session->userdata['user'];
		$employerInfo = $this->employer->getInfoEmployer($user['id']);
		$numRecruitmentPub = $this->employer->getNumRecruitmentAccout($employerInfo->employer_id, $user['id']);
		$employerInfo->numRecruitmentAccount = $numRecruitmentPub;
		$employerInfo->user = $user;
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		$employerInfo->csrf = $csrf;
		//$resume = $this->resume->getDetailForm($idResume, $employerInfo->employer_id);

		$update_account_employer = $this->load->view('main/employer/modal_update_account_employer', array('employerInfo' => $employerInfo, 'csrf' => $csrf), TRUE);
		$employer_menu = $this->load->view('main/employer/employer_menu', array('employerInfo' => $employerInfo, 'menu' => 'accounts', 'sub' => 'managerAccount'), TRUE);
		$styleOption = array('assets/main/datatables/dataTables.bootstrap.css');
		$scriptOption = array('assets/main/js/employer/jquery_resume.js');

		$head = $this->load->view('main/head', array('title' => 'Hồ sơ đã lưu', 'scriptJob' => $scriptOption, 'styleOption' => $styleOption, 'scriptTable' => true), TRUE);
		$header = $this->load->view('main/header', array('user' => $user, 'showTitle' => true,
		), TRUE);
		//get list account of employer
		//$listAccount = $this->employer->getListAccount($employerInfo->employer_id);
		$breadcrumbs = array(
			array('isLink' => true,
				'title' => $this->lang->line('breadcrumbs_home'),
				'link' => base_url()),
			array('isLink' => true,
				'title' => $this->lang->line('breadcrumbs_employer'),
				'link' => base_url('employer')),
			array('isLink' => false,
				'title' => $this->lang->line('breadcrumbs_save_resume'),
				'link' => base_url('employer/resume/search')));
		$listResume = $this->resume->getListResumeStore($employerInfo->employer_id);

		$breadcrumb = $this->load->view('main/employer/breadcrumb', array('breadcrumbs' => $breadcrumbs), TRUE);
		$listProvince = $this->recruitment->getAllProvince();
		$listCareer = $this->recruitment->getAllJob_Career();
		$listLevel = $this->recruitment->getAllJob_Job_Level();
		$contentEmployer = $this->load->view('main/employer/store-resume', array('csrf' => $csrf, 'employerInfo' => $employerInfo,
			'listProvince' => $listProvince, 'listCareer' => $listCareer, 'listLevel' => $listLevel, 'listResume' => $listResume), TRUE);
		$content = $this->load->view('main/employer/layout', array('contentEmployer' => $contentEmployer, 'update_account_employer' => $update_account_employer,
			'employer_menu' => $employer_menu, 'breadcrumb' => $breadcrumb), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer, 'isGray' => true));

	}
	function deleteStoreResume($idStore) {
		$result = $this->resume->deleteStoreResume($idStore);
		if ($result) {
			$user = $this->session->userdata['user'];
			$employerInfo = $this->employer->getInfoEmployer($user['id']);
			$numRecruitmentPub = $this->employer->getNumRecruitmentAccout($employerInfo->employer_id, $user['id']);
			$employerInfo->numRecruitmentAccount = $numRecruitmentPub;
			$employerInfo->user = $user;
			$csrf = array(
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash(),
			);
			$employerInfo->csrf = $csrf;
			$listResume = $this->resume->getListResumeStore($employerInfo->employer_id);
			$view = $this->load->view('main/employer/partial/resumes', array('listResume' => $listResume, 'employerInfo' => $employerInfo), TRUE);
			echo $view;
		} else {
			redirect(base_url('404'), 'refresh');
		}
	}
}