<?php
class Register_model extends CI_Model{
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
	//update account
	public function updateAccount($data){
		return $this->dbutil->insertDb($data, 'account');
	}
	//delete account
}