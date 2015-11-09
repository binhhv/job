<?php
class Account_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->model('Dbutil', 'dbutil');
	}
	//register account
	public function changePassword($data) {
		return $this->dbutil->updateDb($data);
	}
	//check email exits
	function checkPassword($email, $password) {
		//return $this->dbutil->checkIfExists('account_password', $email, 'account');
		$sql = "select * from account where account_email = ? and account_password = ? and account_is_delete = 0 and account_is_disabled = 0";
		$row = $this->dbutil->getFromDbQueryBinding($sql, array($email, $password));
		if (count($row) > 0) {
			return true;
		} else {
			return false;
		}

	}

}