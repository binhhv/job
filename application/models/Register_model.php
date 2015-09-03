<?php
class Register_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->model('Dbutil', 'dbutil');
	}
	//register account
	public function insertAccount($data) {
		return $this->dbutil->insertDb($data, 'account');
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
		return $this->dbutil->insertDb($data, 'employer');
	}
	public function getAllProvinceByCountry() {
		$sql = "select a.*
			from province a where a.province_is_delete = 0";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
}