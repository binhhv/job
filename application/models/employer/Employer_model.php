<?php
/**
Contact model
 **/

/**
 *
 */
class Employer_model extends CI_Model {

	function __construct() {
		# code...
		parent::__construct();
		$this->load->model('Dbutil', 'dbutil');
	}
	public function insertRecruitment($data) {
		return $this->dbutil->insertDb($data, 'recruitment');
	}
	public function insertRecruitment_Map_Welfare($data) {
		return $this->dbutil->insertDb($data, 'recruitment_map_welfare');
	}
	public function insertRecruitment_Map_Province($data) {
		return $this->dbutil->insertDb($data, 'recruitment_map_province');
	}
	public function updateImfomationEmployer($data, $condition) {
		$dataObject = array(
			'from' => 'employer',
			'where' => 'employer_id = ' . $this->dbutil->escape($condition),
			'data' => $data);

		return $this->dbutil->updateDb($dataObject);
	}
	public function updateAccountEmployer($data, $condition) {
		$dataObject = array(
			'from' => 'account',
			'where' => 'account_id = ' . $this->dbutil->escape($condition),
			'data' => $data);

		return $this->dbutil->updateDb($dataObject);
	}
	public function getInfoEmployer($id) {
		$sql = "select a.*,IFNULL(d.numrecs, 0) as numrecs, IFNULL(c.numuser, 0)  as numuser,e.account_email as 	employer_admin_email,
				CONCAT(e.account_first_name, ' ', e.account_last_name) as employer_admin_name,
				e.*,
				f.*, g.*
				from employer_map_account g
				left join employer a on g.emac_map_employer = a.employer_id
				left join (select rec_map_employer,count(rec_id) as numrecs from recruitment where rec_is_delete = 0 group by rec_map_employer ) as d on d.rec_map_employer = a.employer_id
				left join (select emac_map_employer,count(emac_id) as numuser from employer_map_account where emac_is_delete = 0 group by emac_map_employer ) as c on c.emac_map_employer = a.employer_id
				left join account e on e.account_id = a.employer_map_account and e.account_is_delete = 0
				left join province f on f.province_id = a.employer_map_province and f.province_is_delete = 0
				where a.employer_is_delete = 0  and g.emac_is_delete = 0 and g.emac_map_account = " . $id;
		return $this->dbutil->getOneRowQueryFromDb($sql, array());
	}
	public function getAllProvince() {
		$sql = "select a.*
				from province a where a.province_is_delete = 0";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}

	public function getAllProvinceByCountry($country_id) {
		$sql = "select a.*
				from province a where a.province_is_delete = 0 and a.province_map_country = " . $country_id;
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
}