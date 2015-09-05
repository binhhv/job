<?php
class Document_model extends CI_Model {

	function __construct() {
		# code...
		parent::__construct();
		$this->load->model('Dbutil', 'dbutil');
	}
	public function getCV() {
		$sql = "select a.doccv_map_user as userid, a.*,b.account_email as jobseeker_email, CONCAT(b.account_first_name, ' ', b.account_last_name) as jobseeker_name
				from document_cv a
				left join account b on b.account_id = a.doccv_map_user
				where a.doccv_is_delete = 0 and a.doccv_type = 1
				union
				select a.doccv_map_jobseeker as userid, a.*,b.jobseeker_mail as jobseeker_email, CONCAT(b.jobseeker_first_name, ' ', b.jobseeker_last_name) as jobseeker_name
				from document_cv a
				left join jobseeker b on b.jobseeker_id = a.doccv_map_jobseeker and b.jobseeker_is_delete = 0
				where a.doccv_is_delete = 0 and a.doccv_type = 2";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	public function getForm($type = 1) {
		$querystatement = "";
		$queryjoin = "";
		if ($type == 1) {
			$querystatement .= "CONCAT(b.account_first_name, ' ', b.account_last_name) as jobseeker_name,
				b.account_email as jobseeker_email";
			$queryjoin .= " account b on b.account_id = a.docon_map_user and b.account_is_delete = 0";
		} else if ($type == 2) {
			$querystatement .= "CONCAT(b.jobseeker_first_name, ' ', b.jobseeker_last_name) as jobseeker_name,
				b.jobseeker_mail as jobseeker_email,b.jobseeker_phone as jobseeker_phone";
			$queryjoin .= "jobseeker b on b.jobseeker_id = a.docon_map_jobseeker and b.jobseeker_is_delete = 0";
		}
		// CONCAT(b.account_first_name, ' ', b.account_last_name) as jobseeker_name,
		// 		b.account_email as jobseeker_email
		//account b on b.account_id = a.docon_map_user
		// $sql = "select a.*,CONCAT(b.account_first_name, ' ', b.account_last_name) as jobseeker_name,
		// 		b.account_email as jobseeker_email,c.*,
		// 		d.province,e.*,d.numprovince
		// 		from document_online a
		// 		left join account b on b.account_id = a.docon_map_user and b.account_is_delete = 0
		// 		left join healthy c on c.healthy_id = a.docon_healthy
		// 		left join (select GROUP_CONCAT(province_name) as province,doconmp_map_docon,count(province_id) as numprovince
		// 					from document_online_map_province
		// 					left join province on province_id = doconmp_map_province and province_is_delete = 0
		// 					where doconmp_is_delete = 0
		// 					group by doconmp_map_docon) as d on d.doconmp_map_docon = a.docon_id
		// 		left join job_level e on e.ljob_id = a.docon_map_job_level and ljob_is_delete = 0
		// 		where a.docon_is_delete = 0 and a.docon_type = 1";
		$sql = "select a.*,CONCAT(b.account_first_name, ' ', b.account_last_name) as jobseeker_name,
				b.account_email as jobseeker_email,b.account_id as user_id,c.*,
				d.province,e.*,d.numprovince
				from document_online a
				left join account b on b.account_id = a.docon_map_user and b.account_is_delete = 0
				left join healthy c on c.healthy_id = a.docon_healthy
				left join (select GROUP_CONCAT(province_name) as province,doconmp_map_docon,count(province_id) as numprovince
							from document_online_map_province
							left join province on province_id = doconmp_map_province and province_is_delete = 0
							where doconmp_is_delete = 0
							group by doconmp_map_docon) as d on d.doconmp_map_docon = a.docon_id
				left join job_level e on e.ljob_id = a.docon_map_job_level and ljob_is_delete = 0
				where a.docon_is_delete = 0 and a.docon_type=1
        		union
				select a.*,CONCAT(b.jobseeker_first_name, ' ', b.jobseeker_last_name) as jobseeker_name,
				b.jobseeker_mail as jobseeker_email,b.jobseeker_id  as user_id,c.*,
				d.province,e.*,d.numprovince
				from document_online a
				left join jobseeker b on b.jobseeker_id = a.docon_map_jobseeker and b.jobseeker_is_delete = 0
				left join healthy c on c.healthy_id = a.docon_healthy
				left join (select GROUP_CONCAT(province_name) as province,doconmp_map_docon,count(province_id) as numprovince
							from document_online_map_province
							left join province on province_id = doconmp_map_province and province_is_delete = 0
							where doconmp_is_delete = 0
							group by doconmp_map_docon) as d on d.doconmp_map_docon = a.docon_id
				left join job_level e on e.ljob_id = a.docon_map_job_level and ljob_is_delete = 0
				where a.docon_is_delete = 0 and a.docon_type=2";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}

	public function getCVStore() {
		$sql = "";

		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	public function getFormStore() {

	}
	function updateCV($data, $condition) {
		$dataObject = array(
			'from' => 'document_cv',
			'where' => 'doccv_id = ' . $this->dbutil->escape($condition),
			'data' => $data);
		return $this->dbutil->updateDb($dataObject);
	}
	function updateFormByAdmin($data, $condition, $provinceSelected, $jobseekerid, $dataJobseeker) {
		$dataObject = array(
			'from' => 'document_online',
			'where' => 'docon_id = ' . $this->dbutil->escape($condition),
			'data' => $data);
		$result = $this->dbutil->updateDb($dataObject);
		$dataObjectJobseeker = array(
			'from' => 'jobseeker',
			'where' => 'jobseeker_id = ' . $jobseekerid,
			'data' => $dataJobseeker);
		$resultJobseeker = $this->dbutil->updateDb($dataObjectJobseeker);
		if ($result && $resultJobseeker) {
			$dataInsertMap = array();
			$dataObjectUpdate = array(
				'from' => 'document_online_map_province',
				'where' => 'doconmp_map_docon = ' . $this->dbutil->escape($condition),
				'data' => array('doconmp_is_delete' => true));
			$resultUpdate = $this->dbutil->updateDb($dataObjectUpdate);
			if ($resultUpdate) {
				foreach ($provinceSelected as $value) {
					$dataInsertMap[] = array(
						'doconmp_map_docon' => $condition,
						'doconmp_map_province' => $value['province_id'],
						'doconmp_is_delete' => false,
						'doconmp_created_at' => date('Y-m-d H:m'));
				}
				$resultInsert = $this->dbutil->insert_batch('document_online_map_province', $dataInsertMap);
			}
			if ($resultUpdate && $resultUpdate) {
				return 1;
			} else {
				return 0;
			}
		} else {
			return $result;
		}
	}
	function insertJobseeker($dataJobseeker) {
		return $this->dbutil->insertDb($dataJobseeker, 'jobseeker');
	}
	function insertDocument($data, $provinceSelected, $jobseeker) {
		$result = $this->dbutil->insertDb($data, 'document_online');
		if ($result) {
			foreach ($provinceSelected as $value) {
				$dataInsertMap[] = array(
					'doconmp_map_docon' => $result,
					'doconmp_map_province' => $value['province_id'],
					'doconmp_is_delete' => false,
					'doconmp_created_at' => date('Y-m-d H:m'));
			}
			$resultInsert = $this->dbutil->insert_batch('document_online_map_province', $dataInsertMap);
			return $resultInsert;
		} else {
			return $result;
		}

	}
	function deleteJobseeker($userid) {
		$data = array(
			'from' => 'jobseeker',
			'where' => 'jobseeker_id = ' . $userid,
			'data' => array('jobseeker_is_delete' => true));
		return $this->dbutil->updateDb($data);
	}
	function updateForm($data, $condition, $provinceSelected) {
		$dataObject = array(
			'from' => 'document_online',
			'where' => 'docon_id = ' . $this->dbutil->escape($condition),
			'data' => $data);
		$result = $this->dbutil->updateDb($dataObject);
		if ($result) {
			$dataInsertMap = array();
			$dataObjectUpdate = array(
				'from' => 'document_online_map_province',
				'where' => 'doconmp_map_docon = ' . $this->dbutil->escape($condition),
				'data' => array('doconmp_is_delete' => true));
			$resultUpdate = $this->dbutil->updateDb($dataObjectUpdate);
			if ($resultUpdate) {
				foreach ($provinceSelected as $value) {
					$dataInsertMap[] = array(
						'doconmp_map_docon' => $condition,
						'doconmp_map_province' => $value['province_id'],
						'doconmp_is_delete' => false,
						'doconmp_created_at' => date('Y-m-d H:m'));
				}
				$resultInsert = $this->dbutil->insert_batch('document_online_map_province', $dataInsertMap);
			}
			if ($resultUpdate && $resultUpdate) {
				return 1;
			} else {
				return 0;
			}
		} else {
			return $result;
		}
	}
	function deleteForm($data, $condition) {
		$dataObject = array(
			'from' => 'document_online',
			'where' => 'docon_id = ' . $this->dbutil->escape($condition),
			'data' => $data);
		$result = $this->dbutil->updateDb($dataObject);
		if ($result) {
			$dataDelete = array(
				'from' => 'document_online_map_province',
				'where' => 'doconmp_map_docon = ' . $condition,
				'data' => array('doconmp_is_delete' => true));
			$resultDelete = $this->dbutil->updateDb($dataDelete);
			return $resultDelete;
		} else {
			return $result;
		}
	}

	function getDetailForm($id, $doctype = 1) {
		// $sql = "select a.*,b.account_email as email, CONCAT(b.account_first_name, ' ', b.account_last_name) as name,
		// 		DATE_FORMAT(a.docon_birthday,'%d/%m/%Y') as birthday,c.*
		// 		from document_online a
		// 		left join account as b on b.account_id = a.docon_map_user
		// 		left join healthy c on c.healthy_id = a.docon_healthy
		// 		left join job_level d on d.ljob_id = a.docon_map_job_level and ljob_is_delete = 0

		// 		where a.docon_id = ? and a.docon_is_delete = ?";
		$querystatement = "";
		$queryjoin = "";
		if ($doctype == 1) {
			$querystatement .= " CONCAT(b.account_first_name, ' ', b.account_last_name) as jobseeker_name,
				b.account_email as jobseeker_email,b.account_id as user_id";
			$queryjoin .= " account b on b.account_id = a.docon_map_user and b.account_is_delete = 0";
		} else if ($doctype == 2) {
			$querystatement .= " CONCAT(b.jobseeker_first_name, ' ', b.jobseeker_last_name) as jobseeker_name,
				b.jobseeker_mail as jobseeker_email, b.jobseeker_id as user_id ";
			$queryjoin .= " jobseeker b on b.jobseeker_id = a.docon_map_jobseeker and b.jobseeker_is_delete = 0";
		}
		$sql = "select a.*," . $querystatement . ",c.*,
				d.province,e.*,f.*
				from document_online a
				left join " . $queryjoin . "
				left join healthy c on c.healthy_id = a.docon_healthy
				left join (select GROUP_CONCAT(province_name) as province,doconmp_map_docon
							from document_online_map_province
							left join province on province_id = doconmp_map_province and province_is_delete = 0
							where doconmp_is_delete = 0
							group by doconmp_map_docon) as d on d.doconmp_map_docon = a.docon_id
				left join job_level e on e.ljob_id = a.docon_map_job_level and ljob_is_delete = 0
				left join career f on f.career_id = a.docon_career and f.career_is_delete = 0
				where a.docon_is_delete = 0 and a.docon_type = " . $doctype . " and docon_id = ?";
		$data = array($id);
		return $this->dbutil->getOneRowQueryFromDb($sql, $data);
	}
	function getListProvinceDocument($iddocument, $idcountry) {
		$sql = "select province_id,province_name
				from document_online_map_province
				left join province on province_id = doconmp_map_province and province_is_delete = 0
				where doconmp_is_delete = 0 and doconmp_map_docon = ? and province_map_country = ?";
		$data = array($iddocument, $idcountry);
		return $this->dbutil->getFromDbQueryBinding($sql, $data);

	}
	function getListCountries() {
		$data = array(
			'fields' => 'country_id,country_name',
			'from' => 'country',
			'where' => 'country_is_delete = 0');
		return $this->dbutil->getFromDb($data);
	}

	function getListCareer() {
		$data = array(
			'fields' => 'career_id,career_name',
			'from' => 'career',
			'where' => 'career_is_delete = 0');
		return $this->dbutil->getFromDb($data);
	}
	//doc type  on recruitment_apply
	//1: cv
	//2: doc online

	//document_online on docon_type
	//1: docon with user
	//2: docon without user

	//document_cv on doccv_type
	//1: doccv with user
	//2: doccv without user

	function insertCV($data) {
		return $this->dbutil->insertDb($data, 'document_cv');
	}

}