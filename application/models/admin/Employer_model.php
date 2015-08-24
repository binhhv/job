<?php
class Employer_model extends CI_Model {

	function __construct() {
		# code...
		parent::__construct();
		$this->load->model('Dbutil', 'dbutil');
	}

	public function getListEmployer() {
		$sql = "select a.*,IFNULL(d.numrecs, 0) as numrecs, IFNULL(c.numuser, 0)  as numuser
				from employer a
				left join (select rec_map_employer,count(rec_id) as numrecs from recruitment where rec_is_delete = 0 group by rec_map_employer ) as d on d.rec_map_employer = a.employer_id
				left join (select emac_map_employer,count(emac_id) as numuser from employer_map_account where emac_is_delete = 0 group by emac_map_employer ) as c on c.emac_map_employer = a.employer_id
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
		$sql = "select a.*,d.numapply,e.*,f.*
				from recruitment a
				left join (select c.recapp_map_recruitment, count(recapp_map_user) as numapply from recruitment_apply c where c.recapp_is_delete = 0 group by c.recapp_map_recruitment) d
				on d.recapp_map_recruitment = a.rec_id
				left join job_form e on e.fjob_id = a.rec_job_map_form
				left join job_form_child f on f.jcform_id = a.rec_job_map_form_child
				where a.rec_map_employer = " . $id . " and a.rec_is_delete = 0";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	public function checkAdminEmployerExits($idemployer) {
		$sql = "select a.*,b.*
				from employer_map_account a
				left join account b on b.account_id = a.emac_map_account and b.account_is_delete = 0 and b.account_is_disabled = 0
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
		return $this->dbutil->updateDb($dataObject);
	}

}