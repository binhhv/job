<?php
/**
Contact model
 **/

/**
 *
 */
class Job_model extends CI_Model {

	function __construct() {
		# code...
		parent::__construct();
		$this->load->model('Dbutil', 'dbutil');
	}
	public function insertContact($data) {
		return $this->dbutil->insertDb($data, 'contact');
	}
	public function getDetailRecruitment($idrecruitment) {
		$sql = "select a.*,b.*,c.*,d.*,e.*,
				REPLACE(f.welfares,'\'','\"') as welfares,g.*,
				REPLACE(h.provinces,'\'','\"') as provinces,i.*,j.*
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
				where a.rec_id = " . $idrecruitment;
		return $this->dbutil->getOneRowQueryFromDb($sql, array());

	}
	public function getCenterMapFromRecruitment($idrecruitment) {
		$sql = "select a.*,b.*
				from recruitment_map_province a
				left join province b on b.province_id = a.recmp_map_province  and b.province_is_delete = 0
				where a.recmp_is_delete = 0 and  a.recmp_map_rec = " . $idrecruitment;
		$output = $this->dbutil->getFromDbQueryBinding($sql, array());
		if (count($output) > 0) {
			return $output[0];
		} else {
			return null;
		}

	}
	public function getAllRecruitmentForMap() {
		$sql = "select a.*,b.*,count(a.recmp_id) as numjob
				from recruitment_map_province a
				left join province b on b.province_id = a.recmp_map_province  and b.province_is_delete = 0
                left join recruitment c on c.rec_id = a.recmp_map_rec and c.rec_is_delete = 0 and c.rec_is_disabled = 0
				where a.recmp_is_delete = 0
                group by a.recmp_map_province";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	function getSameRecruitment($idrecruitment) {
		$sql = "select distinct(recmp_map_rec) ,
					  c.employer_name,c.rec_title
			   from recruitment_map_province
			   left join ( select a.rec_id,b.employer_name,a.rec_title
			   				from recruitment a
			   				left join employer b
			   				on b.employer_id = a.rec_map_employer and b.employer_is_delete = 0
			   				where a.rec_is_delete = 0 and a.rec_is_disabled = 0 and a.rec_is_approve = 1 ) as c
			   	 on c.rec_id = recmp_map_rec
			   	 where recmp_map_province in
			   	 (select recmp_map_province
			   	 	from recruitment_map_province
			   	 	where recmp_map_rec = ? and recmp_is_delete = 0)
				and recmp_map_rec <> ? order by recmp_created_at desc limit 10";
		return $this->dbutil->getFromDbQueryBinding($sql, array($idrecruitment, $idrecruitment));
	}
}