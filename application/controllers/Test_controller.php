<?php
class Test_controller extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		//$this->load->library('My_PHPMailer');
		$this->load->model('Test_model', 'test');
		$this->lang->load('message', 'vi');
	}
	function updateProvince() {
		$arrProvince = $this->test->getAllProvince();
		foreach ($arrProvince as $value) {
			$longlat = $value->province_long_lat;
			$arrlonglat = $this->convertLongLat($longlat);
			print_r($arrlonglat);
			$this->test->updateProvince($value->province_id, $arrlonglat);
		}
	}
	function convertLongLat($longlat) {
		$arr = explode(",", $longlat);
		$long = rtrim($arr[0], "N");
		$lat = rtrim($arr[1], "E");

		$arrlong = explode(" ", $long);
		$valuelong = (int) $arrlong[0] + (((int) $arrlong[1]) / 60) + (((int) $arrlong[2]) / 3600);
		$arrlat = explode(" ", $lat);
		$valuelat = (int) $arrlat[1] + (((int) $arrlat[2]) / 60) + (((int) $arrlat[3]) / 3600);
		return array("long" => $valuelong, "lat" => $valuelat);
	}
	function getLongLatFromAddress() {

	}
	function index() {
		$this->load->view('test/index', array());
	}
	function getDataJson() {
		$x = time() * 1000;
// The y value is a random number
		$y = rand(0, 100);

// Create a PHP array and echo it as JSON
		$ret = array($x, $y);
		echo json_encode($ret);
	}

	function changeLanguage() {
		$user = (isset($this->session->userdata['user'])) ? $this->session->userdata['user'] : null;
		$styleOption = array(
			'assets/main/css/style-about.css');
		$scriptOption = array();
		$head = $this->load->view('main/head', array('titlePage' => 'JOB7VN Group|Contact', 'styleOption' => $styleOption), TRUE);
		$header = $this->load->view('main/header', array(
			'logo' => 'img/header/allSHIGOTO.png',
			'showTitle' => true,
			'logoWidth' => '170px',
			'logoHeight' => '70px',
			'menu' => 'aboutus',
			'user' => $user,
		), TRUE);
		//$ab = m;

		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		$content = $this->load->view('main/test/test-language', array('csrf' => $csrf), TRUE);
		$footer = $this->load->view('main/footer', array('scriptOption' => $scriptOption), TRUE); //'scriptOption' => $scriptOption
		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer));

	}

}