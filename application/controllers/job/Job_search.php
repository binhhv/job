<?php
/**
 *
 */
class Job_search extends CI_Controller {

	function __construct() {
		# code...
		parent::__construct();
		//$this->load->helper('url');
		$this->load->model('Contact_model', 'contact');
		$this->load->model('job/Job_model', 'job');
		$this->load->model('job/Job_province_model', 'jobprovince');
		//$this->load->model('job/Search_model', 'search');
		$this->load->model('Recruitment_model', 'recruitment');
		$this->load->helper('security');
		$this->load->helper(array('form', 'url', 'cookie'));
		$this->load->library(array('form_validation', 'session'));
		$this->load->library('pagination');

	}
	function index($value1, $value2 = "", $value3 = "") {
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

		//$url = htmlspecialchars("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]", ENT_QUOTES, 'UTF-8');
		$keyArr = array(array("p" => 0),
			array("s" => 0),
			array("x" => -1),
			array("l" => 0),
			array("t" => 0),
			array("c" => 0));
		if (strlen($value3) > 0) {
			$keyRegex = array('p', 's', 'x', 'l', 't', 'c');
			// $keyArr = array(array("p" => 0),
			// 	array("s" => 0),
			// 	array("x" => 0),
			// 	array("l" => 0),
			// 	array("t" => 0),
			// 	array("c" => 0)); //array_fill(0, 5, 0);
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
		$jobSearch = $this->job->searchJob(urldecode($value1), $keyArr);

		//$url = 'province/' . $provinceName . '-' . $id . '.html';
		$url = $this->uri->segment(1) . '/' . $this->uri->segment(2);
		$config['base_url'] = site_url($url);
		$config['total_rows'] = count($jobSearch);
		$config['per_page'] = "10";
		$config["uri_segment"] = 3;
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
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		// if ($page * $config["per_page"] >= count($jobSearch)) {
		// 	$page = 0;
		// }
		//call the model function to get the department data
		$jobSearchPagingnation = $this->job->searchJob(urldecode($value1), $keyArr, $config["per_page"], $page);
		//log_message('error', count($listRecruitmentProvincePage));
		$pagination = $this->pagination->create_links();

		$user = (isset($this->session->userdata['user'])) ? $this->session->userdata['user'] : null;

		$head = $this->load->view('main/head', array('scriptJob' => $scriptJob, 'styleJob' => $styleJob, 'user' => $user, 'titlePage' => 'JOB7VN Group|Contact'), TRUE);

		//get value to search
		$arr_job_form = $this->recruitment->getAllJob_Form();
		$job_form_child = $this->recruitment->getAllJob_Form_Child();
		$job_level = $this->recruitment->getAllJob_Job_Level();
		$salary = $this->recruitment->getAllJob_Salary();
		$province = $this->recruitment->getAllProvince();
		$career = $this->recruitment->getAllJob_Career();
		//var_dump($keyArr[0]['p']);
		$searchHorizontal = $this->load->view('main/search-horizontal', array(
			'province' => $province,
			'jobform' => $arr_job_form,
			'jobformchild' => $job_form_child,
			'salary' => $salary,
			'level' => $job_level,
			'career' => $career,
			'keyArr' => $keyArr,
			'keyWord' => $value1), TRUE);

		$header = $this->load->view('main/header', array(
			'logo' => 'img/header/allSHIGOTO.png',
			'showTitle' => true,
			'logoWidth' => '170px',
			'logoHeight' => '70px',
			'user' => $user,
			'menu' => 'search',
		), TRUE);
		//$jobDetail = $this->job->getDetailRecruitment($job);
		// if ($keyArr[0]['p'] != 0) {
		// 	//var_dump($keyArr[0]['p']);
		// } else {

		// }
		$centerMap = json_encode($this->job->getCenterMap($keyArr[0]['p']));
		$jobMap = json_encode($this->job->getAllRecruitmentForMap());
		//$jobSames = $this->job->getSameRecruitment($job);
		$content = $this->load->view('main/job/job-search', array('centerMap' => $centerMap, 'jobMap' => $jobMap, 'searchHorizontal' => $searchHorizontal, 'listJob' => $jobSearchPagingnation, 'numjob' => count($jobSearch), 'pagination' => $pagination), TRUE);

		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('isGray' => true, 'head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer));
	}

}