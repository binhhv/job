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
		} else if ($type == "member") {
			$code_genaral = "MEMBER" . $id . $randomString;
		} else if ($type == "video") {
			$code_genaral = "VIDEO" . $id . $randomString;
		} else if ($type == "imageRec") {
			$code_genaral = "IMGREC" . $id . $randomString;
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
	function insertLog($table, $idRecord = 0, $dataChange, $dataMap, $type, $account) {
		//type 1: login
		//type 2: edit
		//type 3: delete
		//type 4: approve recruitment
		//type 5: create recruitment
		//type 6: apply job

		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$code_genaral = "";
		$randomString = '';
		for ($i = 0; $i < 6; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		switch ($type) {
		case 1:
			$code_genaral .= "LOGIN" . $randomString;
			break;
		case 2:
			$code_genaral .= "EDIT" . $randomString;
			break;
		case 3:
			$code_genaral .= "DEL" . $randomString;
			break;
		case 4:
			$code_genaral .= "ACP" . $randomString;
			break;
		case 5:
			$code_genaral .= "CR" . $randomString;
			break;
		default:
			# code...
			$code_genaral .= "APP" . $randomString;
			break;
		}
		$log_content = '';
		switch ($table) {
		case 'recruitment':
			//$title = 'Tin tuyển dụng :';
			$content = $this->getRowDataLog('recruitment', 'rec_id', $idRecord);
			$log_content .= "Tin tuyển dụng : " . $content->rec_title; //.= '{"title":"' . $title . '","content":"' . $content->rec_title . '"}';
			# code...
			break;
		case 'account':
			$log_content .= "Đăng nhập website";
		default:
			$content = $this->getRowDataLog('recruitment', 'rec_id', $idRecord);
			$log_content .= "Tin tuyển dụng : " . $content->rec_title; //.= '{"title":"' . $title . '","content":"' . $content->rec_title . '"}';
			# code...
			break;
		}
		$data = array(
			'log_code' => $code_genaral,
			'log_content' => $log_content,
			'log_table' => $table,
			'log_record' => $idRecord,
			'log_data_change' => $dataChange,
			'log_data_map' => $dataMap,
			'log_type' => $type,
			'log_map_account' => $account,
			'log_create_at' => date('Y-m-d H:m:s'));
		return $this->dbutil->insertDb($data, 'log');
	}

	function getRowDataLog($table, $idCondition, $id) {
		$sql = 'select * from ' . $table . ' where ' . $idCondition . ' = ' . $id;
		log_message('error', 'sql ' . $sql);
		return $this->dbutil->getOneRowQueryFromDb($sql, array());
	}
}