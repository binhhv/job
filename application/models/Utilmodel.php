<?php
class UtilModel extends CI_Model {
	function __construct() {
		# code...
		parent::__construct();
		$this->load->model('Dbutil', 'dbutil');
	}
	function generalCodeConfig($type, $id) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$code_genaral = "";
		$randomString = '';
		for ($i = 0; $i < 6; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		if ($type == "logo") {
			$code_genaral = "LOGO" . $id . $randomString;
		} else if ($type == "slide") {
			$code_genaral = "SLIDE" . $id . $randomString;
		} else if ($type == "ads") {
			$code_genaral = "ADS" . $id . $randomString;
		} else if ($type == "site") {
			$code_genaral = "SITE" . $id . $randomString;
		}
		return $code_genaral;
	}

	function General_Code($table_create, $id_create, $role = 0) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$code_genaral = "";
		$randomString = '';
		for ($i = 0; $i < 6; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		//style create
		if ($table_create == "account") {
			if ($role == 1) {
				//admin
				$code_genaral = "AD" . $id_create . $randomString;

			} else if ($role == 2) {
				//employer admin
				$code_genaral = "EAD" . $id_create . $randomString;
			} else if ($role == 3) {
				//employer user
				$code_genaral = "EUS" . $id_create . $randomString;
			} else if ($role == 4) {
				//jobseeker
				$code_genaral = "JUS" . $id_create . $randomString;
			} else if ($role == 5) {
				//admin user
				$code_genaral = "ADS" . $id_create . $randomString;
			}

		} else if ($table_create == "document_cv") {
			$code_genaral = "DCV" . $id_create . $randomString;
		} else if ($table_create == "document_online") {
			$code_genaral = "DCO" . $id_create . $randomString;
		} else if ($table_create == "recruitment") {
			$code_genaral = "REC" . $id_create . $randomString;
		} else if ($table_create == "employer") {
			$code_genaral = "EMP" . $id_create . $randomString;
		} else if ($table_create == "jobseeker") {
			$code_genaral = "JBS" . $id_create . $randomString;
		}
		return $code_genaral;
	}
	function update_Code($table, $field, $value, $fieldcondition, $condition) {
		$data = array(
			'from' => $table,
			'where' => $fieldcondition . '=' . $condition,
			'data' => array($field => $value),
		);
		//log_message('')
		return $this->dbutil->updateDb($data);
	}
}