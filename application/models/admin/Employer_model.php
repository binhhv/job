<?php
class Employer_model extends CI_Model {

	function __construct() {
		# code...
		parent::__construct();
		$this->load->model('Dbutil', 'dbutil');
	}

	public function getListEmployer() {
		$sql = "select a.*,IFNULL(d.numrecs, 0) as numrecs, IFNULL(c.numuser, 0)  as numuser,e.account_email as employer_admin_email,
				CONCAT(e.account_first_name, ' ', e.account_last_name) as employer_admin_name,
				f.*
				from employer a
				left join (select rec_map_employer,count(rec_id) as numrecs from recruitment where rec_is_delete = 0 group by rec_map_employer ) as d on d.rec_map_employer = a.employer_id
				left join (select emac_map_employer,count(emac_id) as numuser from employer_map_account where emac_is_delete = 0 group by emac_map_employer ) as c on c.emac_map_employer = a.employer_id
				left join account e on e.account_id = a.employer_map_account and e.account_is_delete = 0
				left join province f on f.province_id = a.employer_map_province and f.province_is_delete = 0
				where employer_is_delete = 0 ";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	public function detailEmployer($id) {
		$sql = "select a.*,b.*,c.*
				from employer a
				left join account b on b.account_id = a.employer_map_account
				left join province c on c.province_id = a.employer_map_province
				where a.employer_is_delete = 0 and a.employer_id = " . $id;
		return $this->dbutil->getOneRowQueryFromDb($sql, array());
	}
	public function getListEmployerUser($id) {
		$sql = "select a.*,b.*
				from employer_map_account a
				inner join account b on b.account_id =  a.emac_map_account and b.account_is_delete = 0
				where a.emac_map_employer = " . $id . " and emac_is_delete = 0";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	public function getListEmployerRecruitment($id) {
		$sql = "select a.*,IFNULL(d.numapply, 0) as numapply ,e.*,f.*,g.*
				from recruitment a
				left join (select c.recapp_map_recruitment, count(recapp_map_user) as numapply from recruitment_apply c where c.recapp_is_delete = 0 group by c.recapp_map_recruitment) d
				on d.recapp_map_recruitment = a.rec_id
				left join job_form e on e.fjob_id = a.rec_job_map_form
				left join job_form_child f on f.jcform_id = a.rec_job_map_form_child
				left join contact_form g on g.contact_form_id = a.rec_contact_form and g.contact_form_is_delete = 0
				where a.rec_map_employer = " . $id . " and a.rec_is_delete = 0";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	public function checkAdminEmployerExits($idemployer) {
		$sql = "select a.*,b.*
				from employer_map_account a
				left join account b on b.account_id = a.emac_map_account and b.account_is_delete = 0
				where b.account_map_role = 2 and a.emac_is_delete = 0 and a.emac_map_employer = " . $idemployer;
		$output = $this->dbutil->getFromDbQueryBinding($sql, array());
		return count($output);
	}
	public function setRoleAdminEmployer($employerid, $employeruser) {
		$paramter = array(
			'account_map_role' => 2);
		$data = array(
			'where' => 'account_id = ' . $employeruser,
			'from' => 'account',
			'data' => $paramter);
		$output = $this->dbutil->updateDb($data);
		if ($output) {
			$dataValue = array(
				'employer_map_account' => $employeruser);
			$dataEmployer = array(
				'where' => 'employer_id = ' . $employerid,
				'from' => 'employer',
				'data' => $dataValue);
			$result = $this->dbutil->updateDb($dataEmployer);
			return $result;
		} else {
			return $output;
		}
	}
	public function createEmployer($data) {
		return $this->dbutil->insertDb($data, 'employer');
	}
	public function createAdminEmployer($data) {
		return $this->dbutil->insertDb($data, 'account');
	}
	public function insertMapEmployerAccount($data) {
		return $this->dbutil->insertDb($data, 'employer_map_account');
	}
	public function updateEmployer($data, $condition) {
		$dataObject = array(
			'from' => 'employer',
			'where' => 'employer_id = ' . $this->dbutil->escape($condition),
			'data' => $data);

		return $this->dbutil->updateDb($dataObject);
	}
	public function updateEmployerUser($data, $condition) {
		$dataObject = array(
			'from' => 'employer_map_account',
			'where' => 'emac_id = ' . $this->dbutil->escape($condition),
			'data' => $data);

		return $this->dbutil->updateDb($dataObject);
	}
	public function createEmployerUser($parameter, $parameterMapAccount, $employerid) {
		$result = 0;
		$idUser = $this->dbutil->insertDb($parameter, 'account');
		if ($idUser) {
			$parameterMapAccount['emac_map_account'] = $idUser;
			$idMapAccount = $this->dbutil->insertDb($parameterMapAccount, 'employer_map_account');
			$result = $idMapAccount;
		} else {
			$result = 0;
		}
		echo json_encode($result);
	}
	public function deleteEmployerRecruitment($data, $condition) {
		$dataObject = array(
			'from' => 'recruitment',
			'where' => 'rec_id = ' . $this->dbutil->escape($condition),
			'data' => $data);
		$dataMapProvince = array(
			'from' => 'recruitment_map_province',
			'where' => 'recmp_map_rec = ' . $condition,
			'data' => array('recmp_is_delete' => true));
		$dataMapWelfare = array(
			'from' => 'recruitment_map_welfare',
			'where' => 'recmj_map_rec = ' . $condition,
			'data' => array('recmj_is_delete' => true));

		$result = $this->dbutil->updateDb($dataObject);
		$resultProvince = $this->dbutil->updateDb($dataMapProvince);
		$resultWelfare = $this->dbutil->updateDb($dataMapWelfare);
		if ($result && $resultProvince && $resultWelfare) {
			return true;
		} else {
			return false;
		}

	}

	public function getDetailEmployerRecruitment($idrecruitment) {
		$sql = "select a.*,b.*,c.*,d.*,e.*,REPLACE(f.welfares,'\'','\"') as welfares,g.*,REPLACE(h.provinces,'\'','\"') as provinces
				from recruitment a
				left join job_form b on b.fjob_id = a.rec_job_map_form and b.fjob_is_delete = 0
				left join job_form_child c on c.jcform_id = a.rec_job_map_form_child and c.jcform_is_delete = 0
				left join job_level d on d.ljob_id = a.rec_job_map_level and d.ljob_is_delete = 0
				left join contact_form e on e.contact_form_id = a.rec_contact_form and e.contact_form_is_delete = 0
				left join (SELECT CONCAT(\"[\", GROUP_CONCAT( CONCAT(\"{'idwelfare':'\",a.welfare_id,\"'\"),
					concat(\",'iconwelfare':'\",a.welfare_icon,\"'\"),
					concat(\",'titlewelfare':'\",a.welfare_title,\"'}\") ) ,\"]\") AS welfares,b.recmj_map_rec as recruitment_id_ob
					FROM recruitment_map_welfare b
					left join welfare a on a.welfare_id = b.recmj_map_welfare and a.welfare_is_delete = 0
					where b.recmj_is_delete = 0 group by b.recmj_map_rec) as f on f.recruitment_id_ob = a.rec_id
				left join country g on g.country_id = a.rec_job_map_country
				left join (SELECT CONCAT(\"[\",
					GROUP_CONCAT( CONCAT(\"{'idprovince':'\",a.province_id,\"'\"),
					concat(\",'nameprovince':'\",a.province_name,\"'}\")
					 ) ,\"]\") AS provinces,
					b.recmp_map_rec as recruitment_id_ob_p,a.province_map_country as country_ob
					FROM recruitment_map_province b left join province a on a.province_id = b.recmp_map_province
					and a.province_is_delete = 0 where b.recmp_is_delete = 0 group by b.recmp_map_rec) as h on h.recruitment_id_ob_p = a.rec_id
					and h.country_ob = a.rec_job_map_country
				where a.rec_id = " . $idrecruitment;
		return $this->dbutil->getOneRowQueryFromDb($sql, array());

	}
	// public function get
	public function getListWelfare() {
		$dataParameter = array(
			'from' => 'welfare',
			'where' => 'welfare_is_delete = 0');
		return $this->dbutil->getFromDb($dataParameter);
	}
	public function getListForm() {
		$dataParameter = array(
			'fields' => 'fjob_id,fjob_type',
			'from' => 'job_form',
			'where' => 'fjob_is_delete = 0');
		return $this->dbutil->getFromDb($dataParameter);
	}
	public function getListFormChild() {
		$dataParameter = array(
			'fields' => 'jcform_id,jcform_type',
			'from' => 'job_form_child',
			'where' => 'jcform_is_delete = 0');
		return $this->dbutil->getFromDb($dataParameter);
	}
	public function getListLevel() {
		$dataParameter = array(
			'fields' => 'ljob_id,ljob_level',
			'from' => 'job_level',
			'where' => 'ljob_is_delete = 0');
		return $this->dbutil->getFromDb($dataParameter);
	}
	public function getListContactForm() {
		$dataParameter = array(
			'fields' => 'contact_form_id,contact_form_type',
			'from' => 'contact_form',
			'where' => 'contact_form_is_delete = 0');
		return $this->dbutil->getFromDb($dataParameter);
	}
	public function getListWelfareEmployerRecruitment($idrec) {
		$dataParameter = array(
			'from' => 'recruitment_map_welfare',
			'where' => 'recmj_is_delete = 0 and recmj_map_rec = ' . $idrec);
		return $this->dbutil->getFromDb($dataParameter);
	}
	public function getListCountry() {
		$dataParameter = array(
			'from' => 'country',
			'where' => 'country_is_delete = 0');
		return $this->dbutil->getFromDb($dataParameter);
	}
	public function getListProvinceCountry($idcountry) {
		$sql = "select province_id, province_name
				from province where province_is_delete = 0 and province_map_country = " . $idcountry;
		// $dataParameter = array(
		// 	'from' => 'province',
		// 	'where' => 'province_is_delete = 0 and province_map_country = ' . $idcountry);
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	public function getListProvinceRecruitment($idrecruitment, $idcountry = null) {
		//$parameter = '';
		$parameter = "";

		if (!is_null($idcountry) && $idcountry > 0) {
			$parameter = $parameter . " and b.province_map_country = " . $idcountry;
		}
		log_message('error', "country" . $parameter);
		$sql = "select b.province_id,b.province_name
				from recruitment_map_province a
				left join province b on b.province_id = a.recmp_map_province and b.province_is_delete = 0
				where a.recmp_map_rec = " . $idrecruitment . " and a.recmp_is_delete = 0" . $parameter;
		return $this->dbutil->getFromDbQueryBinding($sql, array());

	}
	public function updateEmployerRecruitment($data, $condition, $welfareSelected, $provinceSelected, $idmapcountry) {

		$dataObject = array(
			'from' => 'recruitment',
			'where' => 'rec_id = ' . $this->dbutil->escape($condition),
			'data' => $data);
		$resultRecruitment = $this->dbutil->updateDb($dataObject);
		if ($resultRecruitment) {
			$resultWelfare = $this->updateEmployerRecruitmentWelfare($welfareSelected, $condition);
			$resultProvince = $this->updateEmployerRecruitmentProvince($provinceSelected, $condition);
			if ($resultWelfare && $resultProvince) {
				return true;
			} else {
				return false;
			}
		} else {
			return $resultRecruitment;
		}
	}
	public function createEmployerRecruitment($data, $welfareSelected, $provinceSelected, $idmapcountry, $iduser) {
		$resultRecruitment = $this->dbutil->insertDb($data, 'recruitment');
		if ($resultRecruitment) {
			$resultMapWelfare = $this->insertEmployerRecruitmentWelfare($welfareSelected, $resultRecruitment);
			$resultMapProvince = $this->insertEmployerRecruitmentProvince($provinceSelected, $resultRecruitment);
			$resultMapApprove = $this->insertEmployerRecruitmentApprove($resultRecruitment, $iduser);

			if ($resultMapWelfare && $resultMapProvince && $resultMapApprove) {
				return 1;
			} else {
				return 0;
			}
		} else {
			return 0;
		}
	}
	public function insertEmployerRecruitmentWelfare($data, $idrec) {
		if (isset($data) && count($data) > 0) {
			$dataInsertMap = array();
			foreach ($data as $value) {
				$dataInsertMap[] = array(
					'recmj_map_rec' => $idrec,
					'recmj_map_welfare' => $value,
					'recmj_is_delete' => false,
					'recmj_created_at' => date('Y-m-d H:m'));
			}
			$result = $this->dbutil->insert_batch('recruitment_map_welfare', $dataInsertMap);
			return $result;
		} else {
			return $false;
		}
	}
	public function insertEmployerRecruitmentProvince($data, $idrec) {
		if (isset($data) && count($data) > 0) {
			$dataInsertMap = array();
			foreach ($data as $value) {
				$dataInsertMap[] = array(
					'recmp_map_rec' => $idrec,
					'recmp_map_province' => $value['province_id'],
					'recmp_is_delete' => false,
					'recmp_created_at' => date('Y-m-d H:m'));
			}
			$result = $this->dbutil->insert_batch('recruitment_map_province', $dataInsertMap);
			return $result;
		} else {
			return false;
		}
	}
	public function insertEmployerRecruitmentApprove($idrec, $iduser) {
		$data = array(
			'recapprove_map_account' => $iduser,
			'recapprove_map_recruitment' => $idrec,
			'recapprove_is_delete' => false,
			'recapprove_created_at' => date('Y-m-d H:m'),
		);
		return $this->dbutil->insertDb($data, 'recruitment_approve');
	}
	public function updateEmployerRecruitmentWelfare($data, $condition) {
		$dataMap = array(
			'from' => 'recruitment_map_welfare',
			'where' => 'recmj_map_rec = ' . $condition,
			'data' => array('recmj_is_delete' => true));
		$resultMap = $this->dbutil->updateDb($dataMap);
		if ($resultMap) {
			if (isset($data) && count($data) > 0) {
				$dataInsertMap = array();
				foreach ($data as $value) {
					$dataInsertMap[] = array(
						'recmj_map_rec' => $condition,
						'recmj_map_welfare' => $value,
						'recmj_is_delete' => false,
						'recmj_created_at' => date('Y-m-d H:m'));
				}
				$result = $this->dbutil->insert_batch('recruitment_map_welfare', $dataInsertMap);
				return $result;
			} else {
				return $resultMap;
			}

		} else {
			return false;
		}

	}

	public function updateEmployerRecruitmentProvince($data, $condition) {
		$dataMap = array(
			'from' => 'recruitment_map_province',
			'where' => 'recmp_map_rec = ' . $condition,
			'data' => array('recmp_is_delete' => true));
		$resultMap = $this->dbutil->updateDb($dataMap);
		if ($resultMap) {
			if (isset($data) && count($data) > 0) {
				$dataInsertMap = array();
				foreach ($data as $value) {
					$dataInsertMap[] = array(
						'recmp_map_rec' => $condition,
						'recmp_map_province' => $value['province_id'],
						'recmp_is_delete' => false,
						'recmp_created_at' => date('Y-m-d H:m'));
				}
				$result = $this->dbutil->insert_batch('recruitment_map_province', $dataInsertMap);
				return $result;
			} else {
				return $resultMap;
			}

		} else {
			return false;
		}

	}
	public function approveEmployerRecruitment($data, $idrec, $iduser) {
		$dataObject = array(
			'from' => 'recruitment',
			'where' => 'rec_id = ' . $this->dbutil->escape($idrec),
			'data' => $data);
		$resultRecruitment = $this->dbutil->updateDb($dataObject);
		if ($resultRecruitment) {
			$dataInsertUserApprove = array(
				'recapprove_map_account' => $iduser,
				'recapprove_map_recruitment' => $idrec,
				'recapprove_is_delete' => false,
				'recapprove_created_at' => date('Y-m-d H:m'),
			);
			$resultInsertUserApprove = $this->dbutil->insertDb($dataInsertUserApprove, 'recruitment_approve');
			return $resultInsertUserApprove;
		} else {
			return false;
		}
	}

}