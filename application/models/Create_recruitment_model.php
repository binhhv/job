<?php
class Create_recruitment_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->model('Dbutil', 'dbutil');
	}
	public function insertcvUser($data) {
		return $this->dbutil->insertDb($data, 'document_cv');
	}
	public function insertcvOnlineUser($data) {
		return $this->dbutil->insertDb($data, 'document_online');
	}
	public function getAllProvinceByCountry($country_id) {
		$sql = "select a.*
				from province a where a.province_is_delete = 0 and a.province_map_country = " . $country_id;
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
}