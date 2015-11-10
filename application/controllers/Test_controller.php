<?php
class Test_controller extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		//$this->load->library('My_PHPMailer');
		$this->load->model('Test_model', 'test');
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

}