<?php
class UtilModel extends CI_Model {
	function General_Code($table_create, $id_create, $role) {
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
		}
		return $code_genaral;
	}
}