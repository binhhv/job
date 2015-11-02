<?php
class Recruitment_model extends CI_Model {

	function __construct() {
		# code...
		parent::__construct();
		$this->load->model('Dbutil', 'dbutil');
		$this->load->model('UtilModel', 'util');
	}
	public function getListEmployer() {
		$data = array(
			'fields' => 'employer_id,employer_name',
			'from' => 'employer',
			'where' => 'employer_is_delete = 0');
		return $this->dbutil->getFromDb($data);
	}
	public function getListSalary() {
		$data = array(
			'fields' => 'salary_id,salary_value',
			'from' => 'salary',
			'where' => 'salary_is_delete = 0');
		return $this->dbutil->getFromDb($data);
	}
	public function createRecruitment($data, $dataWelfare, $dateProvince, $iduser) {
		$idRec = $this->dbutil->insertDb($data, 'recruitment');
		$code = $this->util->General_Code('recruitment', $idRec, 5);
		$this->util->update_Code('recruitment', 'rec_code', $code, 'rec_id', $idRec);
		if ($idRec) {
			$resultWelfare = $this->insertEmployerRecruitmentWelfare($dataWelfare, $idRec);
			$resultProvince = $this->insertEmployerRecruitmentProvince($dateProvince, $idRec);
			$resultApprove = $this->insertEmployerApprove($idRec, $iduser);
			if ($resultWelfare && $resultProvince && $resultApprove) {
				return 1;
			} else {
				return 0;
			}

		} else {
			return $idRec;
		}
	}

	public function insertEmployerRecruitmentWelfare($data, $condition) {

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

	}

	public function insertEmployerRecruitmentProvince($data, $condition) {

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

	}
	public function insertEmployerApprove($idrec, $iduser) {
		$data = array(
			'recapprove_map_account' => $iduser,
			'recapprove_map_recruitment' => $idrec,
			'recapprove_is_delete' => false,
			'recapprove_created_at' => date('Y-m-d H:m'));
		return $this->dbutil->insertDb($data, 'recruitment_approve');
	}
	public function getListRecruitment($type) {
		$condition = '';
		switch ($type) {
		case 1:
			$condition = ' a.rec_is_delete = 0 and a.rec_is_approve = 1 and a.rec_is_disabled = 0';
			break;
		case 2:
			$condition = ' a.rec_is_delete = 0 and a.rec_is_approve = 0 and a.rec_is_disabled = 0';
			break;
		default:
			$condition = ' a.rec_is_delete = 0 and a.rec_is_approve = 1 and a.rec_is_disabled = 1';
			break;
		}
		$sql = "select a.*,IFNULL(d.numapply, 0) as numapply ,e.*,f.*,g.*,k.*
				from recruitment a
				left join (select c.recapp_map_recruitment, count(recapp_map_user) as numapply from recruitment_apply c where c.recapp_is_delete = 0 group by c.recapp_map_recruitment) d
				on d.recapp_map_recruitment = a.rec_id
				left join job_form e on e.fjob_id = a.rec_job_map_form
				left join job_form_child f on f.jcform_id = a.rec_job_map_form_child
				left join contact_form g on g.contact_form_id = a.rec_contact_form and g.contact_form_is_delete = 0
				left join salary k on k.salary_id = a.rec_map_salary and k.salary_is_delete = 0
				where " . $condition;
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	public function getDetailRecruitment($idrecruitment) {
		$sql = "select a.* from recruitment a left join ";

	}
	public function getRecruitmentApply($idrecruitment) {
		//doc type  on recruitment_apply
		//1: cv
		//2: doc online

		//document_online on docon_type
		//1: docon with user
		//2: docon without user

		//document_cv on doccv_type
		//1: doccv with user
		//2: doccv without user

		$sql = "select a.*,b.*,c.doccv_id,c.doccv_map_user ,c.doccv_map_jobseeker,c.doccv_type,c.doccv_file_name,c.doccv_file_tmp,d.docon_id,d.docon_map_user
				from recruitment_apply a
				left join account b on b.account_id = a.recapp_map_user and  b.account_is_delete = 0
				left join document_cv c on c.doccv_id = a.recapp_map_doc and a.recapp_is_delete = 0 and c.doccv_type = 1 and a.recapp_doc_type =1
				left join document_online d on d.docon_id = a.recapp_map_doc and a.recapp_is_delete = 0 and d.docon_type =1
				and a.recapp_doc_type = 2
				where a.recapp_is_delete = 0 and recapp_map_recruitment = ?";
		$data = array($idrecruitment);
		return $this->dbutil->getFromDbQueryBinding($sql, $data);
	}
	function editShowRecruitment($data) {
		return $this->dbutil->updateDb($data);
	}
	function disabledRecruitment($data) {
		return $this->dbutil->updateDb($data);
	}
	function getRecruitmentShow($type) {
		$sql = "select a.*,IFNULL(d.numapply, 0) as numapply ,e.*,f.*,g.*,k.*
				from recruitment a
				left join (select c.recapp_map_recruitment, count(recapp_map_user) as numapply from recruitment_apply c where c.recapp_is_delete = 0 group by c.recapp_map_recruitment) d
				on d.recapp_map_recruitment = a.rec_id
				left join job_form e on e.fjob_id = a.rec_job_map_form
				left join job_form_child f on f.jcform_id = a.rec_job_map_form_child
				left join contact_form g on g.contact_form_id = a.rec_contact_form and g.contact_form_is_delete = 0
				left join salary k on k.salary_id = a.rec_map_salary and k.salary_is_delete = 0
				where a.rec_is_delete = 0 and a.rec_is_approve = 1 and a.rec_is_disabled = 0 ";
		//get 50% view and 50% select
		switch ($type) {
		case 1:
			# code...
			$sql .= 'and a.rec_is_top = 1 and a.rec_is_show_another = 1';
			break;
		case 2:
			# code...
			break;
		default:
			# code...
			break;
		}
	}
}