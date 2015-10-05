<?php
class Recruitment_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->model('Dbutil', 'dbutil');
		$this->load->model('UtilModel', 'util');
	}
	public function insertRecruitment($data) {
		$id_recruitment = $this->dbutil->insertDb($data, 'recruitment');
		$update_code = $this->util->General_Code('recruitment', $id_recruitment, 0);
		$this->util->update_Code('recruitment', 'rec_code', $update_code, 'rec_id', $id_recruitment);
		return $id_recruitment;
	}
	public function insertRecruitment_Map_Welfare($data) {
		return $this->dbutil->insertDb($data, 'recruitment_map_welfare');
	}
	public function insertRecruitment_Map_Province($data) {
		return $this->dbutil->insertDb($data, 'recruitment_map_province');
	}

	public function getAllProvinceByCountry($country_id) {
		$sql = "select a.*
				from province a where a.province_is_delete = 0 and a.province_map_country = " . $country_id;
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	public function getAllProvinceByCountryRegion($region, $country_id) {
		$sql = "select a.*
				from province a where a.province_is_delete = 0 and a.province_map_country = " . $country_id . " and a.province_map_region = " . $region;
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	public function getAllProvince() {
		$sql = "select a.*
				from province a where a.province_is_delete = 0 ";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	public function getAllRecruitment() {
		$sql = "select a.* from recruitmentn a, employer b, province c";
	}
	public function getAllCountry() {
		$sql = "select a.country_id, a.country_name
				from country a where a.country_is_delete = 0";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	public function getAllWelfare() {
		$sql = "select a.welfare_id, a.welfare_title
				from welfare a where a.welfare_is_delete = 0";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	public function getAllJob_Form() {
		$sql = "select a.fjob_id, a.fjob_type
				from job_form a where a.fjob_is_delete = 0";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	public function getAllJob_Form_Child() {
		$sql = "select a.jcform_id, a.jcform_type
				from job_form_child a where a.jcform_is_delete = 0";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	public function getAllJob_Job_Level() {
		$sql = "select a.ljob_id, a.ljob_level
				from job_level a where a.ljob_is_delete = 0";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	public function getAllJob_Contact_Form() {
		$sql = "select a.contact_form_id, a.contact_form_type
				from contact_form a where a.contact_form_is_delete = 0";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}

	public function getAllJob_Salary() {
		$sql = "select a.salary_value, a.salary_id
				from salary a where a.salary_is_delete = 0";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	public function getAllJob_Career() {
		$sql = "select a.career_id, a.career_name
				from career a where a.career_is_delete = 0";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	public function getAllSalary() {
		$sql = "select a.salary_id, a.salary_value, a.salary_type
				from salary a where a.salary_is_delete = 0";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}

	public function getNewsRecruitment($data) {
		return $this->dbutil->insertDb($data, 'recruitment_email_get_news');
	}
}