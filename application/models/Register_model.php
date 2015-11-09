<?php
class Register_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->model('Dbutil', 'dbutil');
		$this->load->model('UtilModel', 'util');
	}
	//register account
	public function insertAccount($data) {

		$id = $this->dbutil->insertDb($data, 'account');
		$code = $this->util->General_Code('account', $id, $data['account_map_role']);
		$this->util->update_Code('account', 'account_code', $code, 'account_id', $id);
		return $id;
	}
	//check email exits
	function checkEmailExits($email) {
		return $this->dbutil->checkIfExists('account_email', $email, 'account');
	}
	//register deployer
	public function insertMapEmployer($data) {
		return $this->dbutil->insertDb($data, 'employer_map_account');
	}
	public function insertEmployer($data) {
		$idEmployer = $this->dbutil->insertDb($data, 'employer');
		$code = $this->util->General_Code('employer', $idEmployer);
		$this->util->update_Code('employer', 'employer_code', $code, 'employer_id', $idEmployer);
		return $idEmployer;
	}
	public function getAllProvinceByCountry() {
		$sql = "select a.*
			from province a where a.province_is_delete = 0";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	public function getProvinceCountry($country) {
		$sql = "select a.*
			from province a where a.province_is_delete = 0 and a.province_map_country = " . $country;
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
}