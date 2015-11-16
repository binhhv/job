<?php
class Recruitment_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->model('Dbutil', 'dbutil');
		$this->load->model('UtilModel', 'util');
	}
	public function insertRecruitment($data) {
		$id_recruitment = $this->dbutil->insertDb($data, 'recruitment');
		$update_code = $this->util->General_Code('recruitment', $id_recruitment, 0);
		$this->util->update_Code('recruitment', 'rec_code', $update_code, 'rec_id', $id_recruitment);
		return $id_recruitment;
	}
	public function insertRecruitment_Map_Welfare($data) {
		return $this->dbutil->insertDb($data, 'recruitment_map_welfare');
	}
	public function insertRecruitment_Map_Province($data) {
		return $this->dbutil->insertDb($data, 'recruitment_map_province');
	}

	public function getAllProvinceByCountry($country_id) {
		$sql = "select a.*
				from province a where a.province_is_delete = 0 and a.province_map_country = " . $country_id;
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	public function getAllProvinceByCountryRegion($region, $country_id) {
		$sql = "select a.*
				from province a where a.province_is_delete = 0 and a.province_map_country = " . $country_id . " and a.province_map_region = " . $region;
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	public function getAllProvince() {
		$sql = "select a.*
				from province a where a.province_is_delete = 0 ";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	public function getAllRecruitment() {
		$sql = "select a.* from recruitmentn a, employer b, province c";
	}
	public function getAllCountry() {
		$sql = "select a.country_id, a.country_name
				from country a where a.country_is_delete = 0";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	public function getAllWelfare() {
		$sql = "select a.*
				from welfare a where a.welfare_is_delete = 0";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	public function getAllJob_Form() {
		$sql = "select a.fjob_id, a.fjob_type
				from job_form a where a.fjob_is_delete = 0";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	public function getAllJob_Form_Child() {
		$sql = "select a.jcform_id, a.jcform_type
				from job_form_child a where a.jcform_is_delete = 0";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	public function getAllJob_Job_Level() {
		$sql = "select a.ljob_id, a.ljob_level
				from job_level a where a.ljob_is_delete = 0";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	public function getAllJob_Contact_Form() {
		$sql = "select a.contact_form_id, a.contact_form_type
				from contact_form a where a.contact_form_is_delete = 0";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}

	public function getAllJob_Salary() {
		$sql = "select a.*
				from salary a where a.salary_is_delete = 0";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	public function getAllJob_Career() {
		$sql = "select a.*
				from career a where a.career_is_delete = 0";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	public function getAllSalary() {
		$sql = "select a.salary_id, a.salary_value, a.salary_type
				from salary a where a.salary_is_delete = 0";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}

	public function getNewsRecruitment($data) {
		return $this->dbutil->insertDb($data, 'recruitment_email_get_news');
	}
	public function createRecruitment($data, $dataWelfare, $dateProvince, $iduser) {
		$idRec = $this->dbutil->insertDb($data, 'recruitment');
		$code = $this->util->General_Code('recruitment', $idRec, 5);
		$this->util->update_Code('recruitment', 'rec_code', $code, 'rec_id', $idRec);
		if ($idRec) {
			$resultWelfare = $this->insertEmployerRecruitmentWelfare($dataWelfare, $idRec);
			$resultProvince = $this->insertEmployerRecruitmentProvince(explode(',', $dateProvince), $idRec);
			//$resultApprove = $this->insertEmployerApprove($idRec, $iduser);
			// if ($resultWelfare && $resultProvince && $resultApprove) {
			// 	return 1;
			// } else {
			// 	return 0;
			// }
		}
		return $idRec;
		// } else {
		// 	return $idRec;
		// }
	}

	public function insertEmployerRecruitmentWelfare($data, $condition) {
		log_message('error', json_encode($data));
		if (is_array($data)) {
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
			return false;
		}

	}

	public function insertEmployerRecruitmentProvince($data, $condition) {

		if (is_array($data)) {
			$dataInsertMap = array();
			foreach ($data as $value) {
				$dataInsertMap[] = array(
					'recmp_map_rec' => $condition,
					'recmp_map_province' => $value,
					'recmp_is_delete' => false,
					'recmp_created_at' => date('Y-m-d H:m'));
			}
			$result = $this->dbutil->insert_batch('recruitment_map_province', $dataInsertMap);
			return $result;
		} else {
			return false;
		}

	}
	public function insertEmployerApprove($idrec, $iduser) {
		$data = array(
			'recapprove_map_account' => $iduser,
			'recapprove_map_recruitment' => $idrec,
			'recapprove_is_delete' => false,
			'recapprove_created_at' => date('Y-m-d H:m'));
		return $this->dbutil->insertDb($data, 'recruitment_approve');
	}
	function updateRecruitment($idRec, $data, $dataWelfare, $dateProvince, $iduser) {
		$dataUpdatedRec = array('from' => 'recruitment',
			'where' => 'rec_id = ' . $idRec,
			'data' => $data);
		$result = $this->dbutil->updateDb($dataUpdatedRec);
		if ($result) {
			$resultWelfare = $this->updateWelfareRecruitment($dataWelfare, $idRec);
			$resultProvince = $this->updateProvinceRecruitment(explode(',', $dateProvince), $idRec);
		}
		return $result;
	}
	function updateWelfareRecruitment($data, $idrec) {
		$dataUpdated = array('from' => 'recruitment_map_welfare', 'where' => 'recmj_map_rec = ' . $idrec . ' and recmj_is_delete = 0',
			'data' => array('recmj_is_delete' => true));
		$resultUpdated = $this->dbutil->updateDb($dataUpdated);
		if ($resultUpdated) {
			if (is_array($data)) {
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
				return false;
			}
		} else {
			return false;
		}
	}
	function updateProvinceRecruitment($data, $idrec) {
		$dataUpdated = array('from' => 'recruitment_map_province', 'where' => 'recmp_map_rec = ' . $idrec . ' and recmp_is_delete = 0',
			'data' => array('recmp_is_delete' => true));
		$resultUpdated = $this->dbutil->updateDb($dataUpdated);
		if ($resultUpdated) {
			if (is_array($data)) {
				$dataInsertMap = array();
				foreach ($data as $value) {
					$dataInsertMap[] = array(
						'recmp_map_rec' => $idrec,
						'recmp_map_province' => $value,
						'recmp_is_delete' => false,
						'recmp_created_at' => date('Y-m-d H:m'));
				}
				$result = $this->dbutil->insert_batch('recruitment_map_province', $dataInsertMap);
				return $result;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
	function deleteRecruitment($idRec) {
		$data = array('from' => 'recruitment', 'where' => 'rec_id = ' . $idRec,
			'data' => array('rec_is_delete' => true));
		return $this->dbutil->updateDb($data);
	}
	function getReportRecruitment($idEmployer) {
		$sql = "select rec_id ,count(rec_id) as numRec, MONTH(rec_created_at) as month from recruitment where rec_map_employer = ? and YEAR(rec_created_at) = ?
			group by  MONTH(rec_created_at) order by MONTH(rec_created_at)";
		$row = $this->dbutil->getFromDbQueryBinding($sql, array($idEmployer, date('Y')));
		$object = new stdClass();
		$object->name = '';
		$object->y = 0;
		$object->drilldown = '';
		$arrData = array_fill(0, 12, 0);
		foreach ($row as $key => $value) {
			//$objectAdd = new stdClass();
			//$objectAdd->name = $value->month;
			//$objectAdd->y = $value->numRec;
			//$objectAdd->drilldown = $value->month;
			$arrData[($value->month) - 1] = intval($value->numRec);
			// $arrData[($value->month) - 1]->y = $value->numRec;
			// $arrData[($value->month) - 1]->drilldown = $value->month;
		}
		return json_encode($arrData);
	}
	function getListRecruitmentEmployer($idEmployer) {
		$sql = "select * from recruitment where rec_is_delete = 0";
		return $this->dbutil->getFromDbQueryBinding($sql, array($idEmployer));
	}
	function getDetailRecruitment($idrecruitment) {
		$sql = "select a.*,b.*,c.*,d.*,e.*,
				REPLACE(f.welfares,'\'','\"') as welfares,g.*,
				REPLACE(h.provinces,'\'','\"') as provinces,i.*,j.*,salary_value
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
				left join employer i on i.employer_id = a.rec_map_employer and i.employer_is_delete = 0
				left join career j on j.career_id = a.rec_job_map_career and j.career_is_delete = 0
				left join salary on salary_id = a.rec_map_salary and salary_is_delete = 0
				where a.rec_id = " . $idrecruitment;
		return $this->dbutil->getOneRowQueryFromDb($sql, array());
	}
	function getListProvinceRecruitment($idRec, $country) {
		$sql = "select a.*,IFNULL(c.recmp_map_rec,0) as isProvince from province a
		left join (select b.recmp_map_rec,b.recmp_map_province from recruitment_map_province b where recmp_map_rec = ? and b.recmp_is_delete = 0) as c
		on c.recmp_map_province = a.province_id
		where a.province_is_delete = 0 and a.province_map_country = ?";
		return $this->dbutil->getFromDbQueryBinding($sql, array($idRec, $country));
	}
	function getListWelfareRecruitment($idRec) {
		$sql = "select a.*,IFNULL(c.recmj_map_rec,0) as isWelfare from welfare a left join (select b.recmj_map_rec,b.recmj_map_welfare from recruitment_map_welfare b
			where b.recmj_is_delete  = 0 and b.recmj_map_rec = ?) as c on c.recmj_map_welfare = a.welfare_id
			where a.welfare_is_delete = 0";
		return $this->dbutil->getFromDbQueryBinding($sql, array($idRec));
	}
}