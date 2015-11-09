<?php
class Jobseeker_model extends CI_Model {

	function __construct() {
		# code...
		parent::__construct();
		$this->load->model('Dbutil', 'dbutil');
		$this->load->model('UtilModel', 'util');
	}

	function getListJobseeker() {
		$sql = "select a.*, IFNULL(b.numcv, 0) as numcv ,
				IFNULL(c.numdocon, 0) as numdocon,IFNULL(d.numapp, 0) as numapp
				from account a
				left join (select a.doccv_map_user as user, count(a.doccv_id) as numcv from document_cv a where a.doccv_is_delete = ? group by a.doccv_map_user) as b on b.user = a.account_id
				left join(select a.docon_map_user as user, count(a.docon_id) as numdocon from document_online a where a.docon_is_delete = ? group by a.docon_map_user ) as c on c.user = a.account_id
				left join ( select a.recapp_map_user as user , count(a.recapp_id) as numapp from recruitment_apply a where a.recapp_is_delete = ? group by a.recapp_map_user ) as d on d.user = a.account_id
				where a.account_is_delete = ? and a.account_map_role = ?";
		$data = array(0, 0, 0, 0, 4);
		return $this->dbutil->getFromDbQueryBinding($sql, $data);
	}
	function getJobseeker($id) {
		$sql = "select a.*, IFNULL(b.numcv, 0) as numcv ,
				IFNULL(c.numdocon, 0) as numdocon,IFNULL(d.numapp, 0) as numapp
				from account a
				left join (select a.doccv_map_user as user, count(a.doccv_id) as numcv from document_cv a where a.doccv_is_delete = ? and a.doccv_is_delete_user = ? group by a.doccv_map_user) as b on b.user = a.account_id
				left join(select a.docon_map_user as user, count(a.docon_id) as numdocon from document_online a where a.docon_is_delete = ? and a.docon_is_delete_user = ? group by a.docon_map_user ) as c on c.user = a.account_id
				left join ( select a.recapp_map_user as user , count(a.recapp_id) as numapp from recruitment_apply a where a.recapp_is_delete = ? group by a.recapp_map_user ) as d on d.user = a.account_id
				where a.account_is_delete = ? and a.account_map_role = ? and a.account_id = ?";
		$data = array(0, 0, 0, 0, 0, 0, 4, $id);
		return $this->dbutil->getFromDbQueryBinding($sql, $data);
	}
	function createJobseeker($data) {
		$result = $this->dbutil->insertDb($data, 'account');
		$code = $this->util->General_Code('account', $result, 4);
		$this->util->update_Code('account', 'account_code', $code, 'account_id', $result);
		return $result;
	}
	function updateJobseeker($data, $condition) {
		$dataObject = array(
			'from' => 'account',
			'where' => 'account_id = ' . $this->dbutil->escape($condition),
			'data' => $data);
		return $this->dbutil->updateDb($dataObject);
	}
	function getListCVJobseeker($id) {
		$data = array('from' => 'document_cv',
			'where' => 'doccv_map_user =' . $this->dbutil->escape($id) . ' and doccv_is_delete = 0 and doccv_type = 1 and doccv_is_delete_user = 0');
		return $this->dbutil->getFromDb($data);
	}
	function getListDocumentJobseeker($id) {
		$data = array('from' => 'document_online',
			'where' => 'docon_map_user =' . $this->dbutil->escape($id) . ' and docon_is_delete = 0 and docon_is_delete_user = 0');
		return $this->dbutil->getFromDb($data);
	}
	function getListRecruitmentApply($id) {
		$sql = "select a.*,b.* from recruitment_apply a
				inner join (select c.*,d.employer_name as name,d.employer_address as address from recruitment as c, employer as d where c.rec_map_employer = d.employer_id
					group by c.rec_id) as b on a.recapp_map_recruitment = b.rec_id and b.rec_is_delete = 0
				where a.recapp_map_user = ? and recapp_is_delete = ? and recapp_is_delete_user = ?";
		$data = array($id, 0, 0);
		return $this->dbutil->getFromDbQueryBinding($sql, $data);
	}
	function getDocumentJobseeker($id) {
		$sql = "select a.*,b.account_email as email, CONCAT(b.account_first_name, ' ', b.account_last_name) as name,DATE_FORMAT(a.docon_birthday,'%d/%m/%Y') as birthday,c.*,d.*
				from document_online a
				left join account as b on b.account_id = a.docon_map_user
				left join healthy c  on c.healthy_id = docon_healthy
				left join career d on d.career_id = a.docon_career and d.career_is_delete = 0
				where a.docon_id = ? and a.docon_is_delete = ?";

		$data = array($id, 0);
		return $this->dbutil->getOneRowQueryFromDb($sql, $data);
	}
	function checkEmailExits($email) {
		return $this->dbutil->checkIfExists('account_email', $email, 'account');
	}

	// function getNumResumeOnline($id) {
	// 	$sql = "select * from document_online where docon_is_delete = 0 and docon_map_user = ? ";
	// 	$row = $this->dbutil->getFromDbQueryBinding($sql, array($id));
	// 	return count($row);
	// }
	function getNumResumeOnline($id) {
		$sql = "select * from document_online where docon_is_delete = 0 and docon_map_user = ? and docon_type = 1 and docon_is_delete_user = 0";
		$row = $this->dbutil->getFromDbQueryBinding($sql, array($id));
		return count($row);
	}
	function getNumResumeUpload($id) {
		$sql = "select * from document_cv where doccv_is_delete = 0 and doccv_map_user = ? and doccv_type = 1 and doccv_is_delete_user = 0";
		$row = $this->dbutil->getFromDbQueryBinding($sql, array($id));
		return count($row);
	}
	function deleteRecruitmentApply($idRec, $idUser) {
		$data = array(
			'from' => 'recruitment_apply',
			'where' => 'recapp_map_recruitment = ' . $idRec . ' and recapp_map_user = ' . $idUser,
			'data' => array('recapp_is_delete_user' => true));
		return $this->dbutil->updateDb($data);
	}
	function deleteResumeUpload($idResume, $idUser) {
		$data = array(
			'from' => 'document_cv',
			'where' => 'doccv_id = ' . $idResume . ' and doccv_map_user = ' . $idUser,
			'data' => array('doccv_is_delete_user' => true));
		return $this->dbutil->updateDb($data);
	}
	function deleteResumeOnline($idResume, $idUser) {
		$data = array(
			'from' => 'document_online',
			'where' => 'docon_id = ' . $idResume . ' and docon_map_user = ' . $idUser,
			'data' => array('docon_is_delete_user' => true));
		return $this->dbutil->updateDb($data);
	}

	function getDetailForm($id) {
		$doctype = 1;
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
	function getListProvinceResume($idResume) {
		$sql = "select * from document_online_map_province where doconmp_is_delete = 0 and doconmp_map_docon = ?";
		$row = $this->dbutil->getFromDbQueryBinding($sql, array($idResume));
		return $row;
	}
	function updateResume($paramater, $provinceSelected, $idResume) {
		$data = array('from' => 'document_online',
			'where' => 'docon_id = ' . $idResume,
			'data' => $paramater);
		$result = $this->dbutil->updateDb($data);
		$listProvince = $this->job->getListProvinceCountry($paramater['docon_map_country']);
		//$code = $this->util->General_Code('document_online', $result, 0);
		//$this->util->update_Code('document_online', 'docon_code', $code, 'docon_id', $result);
		if ($result) {
			$dataDocProvince = array('from' => 'document_online_map_province',
				'where' => 'doconmp_map_docon = ' . $idResume,
				'data' => array('doconmp_is_delete' => true));
			$this->dbutil->updateDb($dataDocProvince);
			foreach ($provinceSelected as $value) {
				$dataInsertMap[] = array(
					'doconmp_map_docon' => $idResume,
					'doconmp_map_province' => $listProvince[$value - 1]->province_id,
					'doconmp_is_delete' => false,
					'doconmp_created_at' => date('Y-m-d H:m'));
			}
			$resultInsert = $this->dbutil->insert_batch('document_online_map_province', $dataInsertMap);
			if ($resultInsert) {
				return $result;
			} else {
				return 0;
			}

		} else {
			return $result;
		}
	}
}