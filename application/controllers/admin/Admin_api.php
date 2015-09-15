<?php
/**
 *
 */
class Admin_api extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('form_validation', 'session'));
		$this->load->model('admin/Jobseeker_model', 'jobseeker');
		$this->load->model('admin/Admin_api_model', 'api');
		$this->load->model('admin/Mail_model', 'mail');
		$this->load->model('UtilModel', 'util');
		if (!$this->session->userdata['user']['isLogged']) {
			redirect(base_url() . 'admin/login'); // no session established, kick back to login page
		} else if ($this->session->userdata['user']['role'] != 5 && $this->session->userdata['user']['role'] != 1) {
			redirect(base_url('error/403'));
		}
	}

	function getNotifyContact() {
		$output = array(
			'numContact' => $this->api->getNotifyContact(),
			'contacts' => $this->api->getListNotifyContact());
		echo json_encode($output);
	}

	function getNotifySupport() {
		$output = array(
			'numSupport' => $this->api->getNotifySupport(),
			'supports' => $this->api->getListNotifySupport());
		echo json_encode($output);
	}
	function getListSupportChat() {
		$output = $this->api->getListSupportChat();
		echo json_encode($output);
	}
	function getDataChartRecruitment() {
		$arr = array_fill(0, 12, 0);
		$year = date('Y');
		$arrData = $this->api->getDataChartRecruitment($year);
		foreach ($arrData as $value) {
			$arr[$value->month - 1] = $value->numrec;
		}
		echo json_encode($arr);
	}
	function getDataChartJobseekerEmployer() {
		$arr = array_fill(0, 12, 0);
		$arrEmployer = array_fill(0, 12, 0);
		$year = date('Y');
		$arrData = $this->api->getDataChartJobseeker($year);
		$arrDataEmployer = $this->api->getDataChartEmployer($year);
		foreach ($arrData as $value) {
			$arr[$value->month - 1] = $value->num;
		}
		foreach ($arrDataEmployer as $value) {
			$arrEmployer[$value->month - 1] = $value->num;
		}
		$data = array('jobseeker' => $arr,
			'employer' => $arrEmployer);
		echo json_encode($data);
	}
}