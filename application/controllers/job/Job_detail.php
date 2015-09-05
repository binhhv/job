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
		$user = (isset($this->session->userdata['user'])) ? $this->session->userdata['user'] : null;
		$scriptJob = array(
			"assets/main/js/map/markerwithlabel.js");
		$head = $this->load->view('main/head', array('user' => $user, 'scriptJob' => $scriptJob, 'titlePage' => 'JOB7VN Group|Contact'), TRUE);
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

		$content = $this->load->view('main/job/job', array('job' => $job,
			'jobDetail' => $jobDetail,
			'centerMap' => $centerMap,
			'jobMap' => $jobMap,
			'jobSames' => $jobSames,
			'user' => $user,
			'csrf' => $csrf), TRUE);

		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer));

	}
}