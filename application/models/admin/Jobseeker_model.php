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
				left join (select a.doccv_map_user as user, count(a.doccv_id) as numcv from document_cv a where a.doccv_is_delete = ? group by a.doccv_map_user) as b on b.user = a.account_id
				left join(select a.docon_map_user as user, count(a.docon_id) as numdocon from document_online a where a.docon_is_delete = ? group by a.docon_map_user ) as c on c.user = a.account_id
				left join ( select a.recapp_map_user as user , count(a.recapp_id) as numapp from recruitment_apply a where a.recapp_is_delete = ? group by a.recapp_map_user ) as d on d.user = a.account_id
				where a.account_is_delete = ? and a.account_map_role = ? and a.account_id = ?";
		$data = array(0, 0, 0, 0, 4, $id);
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
			'where' => 'doccv_map_user =' . $this->dbutil->escape($id) . ' and doccv_is_delete = 0');
		return $this->dbutil->getFromDb($data);
	}
	function getListDocumentJobseeker($id) {
		$data = array('from' => 'document_online',
			'where' => 'docon_map_user =' . $this->dbutil->escape($id) . ' and docon_is_delete = 0');
		return $this->dbutil->getFromDb($data);
	}
	function getListRecruitmentApply($id) {
		$sql = "select a.*,b.* from recruitment_apply a
				inner join (select c.*,d.employer_name as name,d.employer_address as address from recruitment as c, employer as d where c.rec_map_employer = d.employer_id
					group by c.rec_id) as b on a.recapp_map_recruitment = b.rec_id and b.rec_is_delete = 0
				where a.recapp_map_user = ? and recapp_is_delete = ?";
		$data = array($id, 0);
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

}