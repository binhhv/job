<?php
class Account_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->model('Dbutil', 'dbutil');
		$this->load->model('Utilmodel', 'util');
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
	function checkExistAccountFB($data) {
		$projection = array('from' => 'account', 'where' => "account_email = " . $this->dbutil->escape($data->getEmail()) . " AND account_facebook = " . $this->dbutil->escape($data->getId()) . " AND account_is_delete = 0 AND account_is_disabled = 0" . "");
		$a_UserChecking = $this->dbutil->getFromDb($projection);
		if ($a_UserChecking) {
			return $a_UserChecking[0]->account_id;
		} else {
			return 0;
		}

	}
	function checkEmailExist($email) {
		//$projection = array('from' => 'account', 'where' => "account_email = " . $email . " ");
		$sql = "select account_id,account_email from account where account_email = ?";
		$a_UserChecking = $this->dbutil->getFromDbQueryBinding($sql, array($email));
		if ($a_UserChecking) {
			//return true;
			return true;
		} else {
			return false;
		}
	}
	function checkEmailSyncExist($email) {
		$sql = "select * from account where account_email = ?";
		$a_UserChecking = $this->dbutil->getOneRowQueryFromDb($sql, array($email));
		return $a_UserChecking;
	}
	function getInfoAccount($email) {
		$sql = "select * from account where account_email = ?";
		$row = $this->dbutil->getOneRowQueryFromDb($sql, array($email));
		return $row;
	}
	function insertToken($email) {
		$timestamp = time() - 86400;
		$date = strtotime("+7 day", $timestamp);
		$user = $this->getInfoAccount($email);
		$token = md5($user->account_id . $user->account_email);
		$data = array('from' => 'account',
			'where' => 'account_id = ' . $user->account_id,
			'data' => array('account_token' => $token, 'account_token_exp' => date('Y-m-d h:m:s', $date)));
		$this->dbutil->updateDb($data);
		$result = array('name' => $user->account_first_name . $user->account_last_name, 'email' => $email, 'token' => $token);
		return $result;
		//echo datate('Y-m-d h:m:s', $date);

	}
	function registerAccountFB($data) {
		$dataFB = array(
			'account_email' => $data->getEmail(),
			'account_first_name' => $data->getName(),
			'account_last_name' => '',
			'account_facebook' => $data->getId(),
			'account_password' => '',
			'account_is_get_news' => false,
			'account_map_role' => 4,
			'account_is_delete' => false,
			'account_is_disabled' => false,
			'account_update_at' => date('Y-m-d H:m:s'),
			'account_created_at' => date('Y-m-d H:m:s'),
			'account_code' => '',
			'account_is_sync' => true);
		//print_r($dataFB);
		$result = $this->dbutil->insertDb($dataFB, 'account');
		$code = $this->util->General_Code('account', $result, 4);
		$this->util->update_Code('account', 'account_code', $code, 'account_id', $result);

		return $result;
	}
	function checkTokenExp($token) {
		$sql = "select * from account where account_token = ? and account_token_exp >= CURDATE();";
		// $today = date("Y-m-d");
		// $expire = $employerInfo->employer_exp_search_rs; //from db

		// $today_time = strtotime($today);
		// $expire_time = strtotime($expire);
		$row = $this->dbutil->getOneRowQueryFromDb($sql, $token);
		return $row;
		//$expire_time > $today_time
	}

	function changeForgotPassword($data) {
		return $this->dbutil->updateDb($data);
	}
	function syncAccount($idFacebook, $email) {
		//print_r($idFacebook . '---' . $email);
		$data = array('from' => 'account', 'where' => 'account_email = "' . $email . '" ', 'data' => array('account_facebook' => $idFacebook, 'account_is_sync' => true));
		$result = $this->dbutil->updateDb($data);
		if ($data) {
			return $this->getInfoAccount($email);} else {
			return null;
		}
	}
}