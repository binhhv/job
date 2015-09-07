<?php
/**
Contact model
 **/

/**
 *
 */
class Job_province_model extends CI_Model {

	function __construct() {
		# code...
		parent::__construct();
		$this->load->model('Dbutil', 'dbutil');
		$this->load->model('UtilModel', 'util');
	}
	function getProvince($id) {
		$sql = "select * from
		province where province_is_delete = 0 and province_id = " . $id;
		return $this->dbutil->getOneRowQueryFromDb($sql, array());
	}
	function getListRecruitmentProvince($id) {
		$sql = "select a.*,b.*,c.*,d.*
			from recruitment_map_province a
			left join recruitment b on a.recmp_map_rec = b.rec_id and b.rec_is_delete = 0
			left join career c on c.career_id = b.rec_job_map_career and c.career_is_delete = 0
			left join employer d on d.employer_id = b.rec_map_employer and d.employer_is_delete = 0
			where a.recmp_is_delete = 0 and a.recmp_map_province = ?";
		return $this->dbutil->getFromDbQueryBinding($sql, array($id));
	}
}