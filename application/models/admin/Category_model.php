<?php
class Category_model extends CI_Model {

	function __construct() {
		# code...
		parent::__construct();
		$this->load->model('Dbutil', 'dbutil');
	}
	function getListCountry() {
		$data = array(
			'from' => "country",
			'where' => "country_is_delete = 0");
		return $this->dbutil->getFromDb($data);
	}
	function getListProvinceCountry($countrid) {
		$sql = "select a.*,b.*
			from province a
			left join region b on b.region_id = a.province_map_region and b.region_is_delete  = 0
			where a.province_map_country = ? and a.province_is_delete = 0";
		return $this->dbutil->getFromDbQueryBinding($sql, array($countrid));
	}
	function getListRegionCountry($country) {
		$data = array(
			"fields" => "region_id,region_name",
			"from" => "region",
			"where" => "region_is_delete = 0 and region_map_country = " . $country);
		return $this->dbutil->getFromDb($data);
	}
	function updateProvince($data, $id) {
		$param = array(
			'from' => 'province',
			'where' => 'province_id = ' . $id,
			'data' => $data,
		);
		return $this->dbutil->updateDb($param);
	}
	function createProvince($data) {
		return $this->dbutil->insertDb($data, 'province');
	}
	function deleteProvince($data, $id) {
		$param = array(
			'from' => 'province',
			'where' => 'province_id = ' . $id,
			'data' => $data,
		);
		return $this->dbutil->updateDb($param);
	}
	function getListHealth() {
		$data = array(
			"from" => "healthy",
			"where" => "healthy_is_delete = 0 ");
		return $this->dbutil->getFromDb($data);
	}
	function createHealth($data) {
		return $this->dbutil->insertDb($data, 'healthy');
	}
	function updateHealth($data, $id) {
		$param = array(
			'from' => 'healthy',
			'where' => 'healthy_id = ' . $id,
			'data' => $data,
		);
		return $this->dbutil->updateDb($param);
	}
	function deleteHealth($data, $id) {
		$param = array(
			'from' => 'healthy',
			'where' => 'healthy_id = ' . $id,
			'data' => $data,
		);
		return $this->dbutil->updateDb($param);
	}
	function getListForm() {
		$data = array(
			"from" => "job_form",
			"where" => "fjob_is_delete = 0 ");
		return $this->dbutil->getFromDb($data);
	}
	function createForm($data) {
		return $this->dbutil->insertDb($data, 'job_form');
	}
	function updateForm($data, $id) {
		$param = array(
			'from' => 'job_form',
			'where' => 'fjob_id = ' . $id,
			'data' => $data,
		);
		return $this->dbutil->updateDb($param);
	}
	function getListLevel() {
		$data = array(
			"from" => "job_level",
			"where" => "ljob_is_delete = 0 ");
		return $this->dbutil->getFromDb($data);
	}
	function createLevel($data) {
		return $this->dbutil->insertDb($data, 'job_level');
	}
	function updateLevel($data, $id) {
		$param = array(
			'from' => 'job_level',
			'where' => 'ljob_id = ' . $id,
			'data' => $data,
		);
		return $this->dbutil->updateDb($param);
	}

	//faq
	function getListFAQ() {
		$data = array(
			"from" => "faq",
			"where" => "faq_is_delete = 0 ");
		return $this->dbutil->getFromDb($data);
	}
	function createFAQ($data) {
		return $this->dbutil->insertDb($data, 'faq');
	}
	function updateFAQ($data, $id) {
		$param = array(
			'from' => 'faq',
			'where' => 'faq_id = ' . $id,
			'data' => $data,
		);
		return $this->dbutil->updateDb($param);
	}

	//career
	function getListCareer() {
		$data = array(
			"from" => "career",
			"where" => "career_is_delete = 0 ");
		return $this->dbutil->getFromDb($data);
	}
	function createCareer($data) {
		return $this->dbutil->insertDb($data, 'career');
	}
	function updateCareer($data, $id) {
		$param = array(
			'from' => 'career',
			'where' => 'career_id = ' . $id,
			'data' => $data,
		);
		return $this->dbutil->updateDb($param);
	}

	//contact-form
	function getListContactForm() {
		$data = array(
			"from" => "contact_form",
			"where" => "contact_form_is_delete = 0 ");
		return $this->dbutil->getFromDb($data);
	}
	function createContactForm($data) {
		return $this->dbutil->insertDb($data, 'contact_form');
	}
	function updateContactForm($data, $id) {
		$param = array(
			'from' => 'contact_form',
			'where' => 'contact_form_id = ' . $id,
			'data' => $data,
		);
		return $this->dbutil->updateDb($param);
	}

	//salary
	function getListSalary() {
		$data = array(
			"from" => "salary",
			"where" => "salary_is_delete = 0 ");
		return $this->dbutil->getFromDb($data);
	}
	function createSalary($data) {
		return $this->dbutil->insertDb($data, 'salary');
	}
	function updateSalary($data, $id) {
		$param = array(
			'from' => 'salary',
			'where' => 'salary_id = ' . $id,
			'data' => $data,
		);
		return $this->dbutil->updateDb($param);
	}

	//welfare
	function getListWelfare() {
		$data = array(
			"from" => "welfare",
			"where" => "welfare_is_delete = 0 ");
		return $this->dbutil->getFromDb($data);
	}
	function createWelfare($data) {
		return $this->dbutil->insertDb($data, 'welfare');
	}
	function updateWelfare($data, $id) {
		$param = array(
			'from' => 'welfare',
			'where' => 'welfare_id = ' . $id,
			'data' => $data,
		);
		return $this->dbutil->updateDb($param);
	}

	//icon
	function getListIcon() {
		$data = array(
			"from" => "icon-awesome",
			"where" => "icon_is_delete = 0 ");
		return $this->dbutil->getFromDb($data);
	}

}
