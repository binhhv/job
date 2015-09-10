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
		$this->load->model('UtilModel', 'util');
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
	function getListDoconUser($id) {
		$sql = "select *
				from document_online
				where docon_is_delete = 0 and docon_type = 1 and docon_map_user = " . $id;
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	function getListCVUser($id) {
		$sql = "select *
				from document_cv
				where doccv_is_delete = 0 and doccv_type = 1 and doccv_map_user = " . $id;
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	function getDetailForm($id, $doctype = 1) {
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
	function applyJob($data) {
		return $this->dbutil->insertDb($data, 'recruitment_apply');
	}
	function insertCV($data) {
		$result = $this->dbutil->insertDb($data, 'document_cv');
		$code = $this->util->General_Code('document_cv', $result, 0);
		$this->util->update_Code('document_cv', 'doccv_code', $code, 'doccv_id', $result);
		return $result;
	}
	function getListLevel() {
		$sql = "select *
		from job_level
		where ljob_is_delete = 0";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	function getListCareer() {
		$sql = "select *
		from career
		where career_is_delete = 0";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	function getListHealthy() {
		$sql = "select *
		from healthy
		where healthy_is_delete = 0";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	function getListCountry() {
		$sql = "select *
		from country
		where country_is_delete = 0";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	function getListProvinceCountry($id) {
		$sql = "select *
		from province
		where province_is_delete = 0 and province_map_country = " . $id;
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	function insertDocument($data, $provinceSelected) {
		$result = $this->dbutil->insertDb($data, 'document_online');
		$listProvince = $this->job->getListProvinceCountry($data['docon_map_country']);
		$code = $this->util->General_Code('document_online', $result, 0);
		$this->util->update_Code('document_online', 'docon_code', $code, 'docon_id', $result);
		if ($result) {
			foreach ($provinceSelected as $value) {
				$dataInsertMap[] = array(
					'doconmp_map_docon' => $result,
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
	public function searchJob($keySearch, $option = null, $perpage = 0, $page = 0) {
		$likeQuery = "";
		if ($keySearch != "all") {
			$likeQuery = " and (b.rec_title REGEXP '(%s)' or b.rec_job_content REGEXP '(%s)' or b.rec_job_require REGEXP '(%s)') ";
		}
		if (strlen($keySearch) > 0) {
			$keyRegex = array('*', '?', '(', ')', '+', '\'', "\"", '-', '_', "=");
			$keySearch = str_replace($keyRegex, "|", trim($keySearch));
			$likeQuery = str_replace("%s", $keySearch, $likeQuery);
		}
		$andQuery = "";
		if (isset($option)) {
			foreach ($option as $value) {

				$optionKey = array_keys($value)[0];
				$optionValue = array_values($value)[0];
				switch ($optionKey) {
				case 'p':
					if ($optionValue != 0) {
						$andQuery .= " and b.rec_id in (
							select recmp_map_rec from recruitment_map_province
							where recmp_is_delete = 0 and recmp_map_province = " . $optionValue . ")";
					}
					break;
				case 's':
					if ($optionValue != 0) {
						$andQuery .= " and b.rec_map_salary = " . $optionValue;
					}
					break;
				case 'x':
					if ($optionValue >= 0) {
						$andQuery .= " and b.rec_job_require_sex = " . $optionValue;
					}

					break;
				case 'l':
					if ($optionValue != 0) {
						$andQuery .= " and b.rec_job_map_level = " . $optionValue;
					}
					break;
				case 't':
					if ($optionValue != 0) {
						$arrForm = explode("-", trim($optionValue));
						$andQuery .= " and b.rec_job_map_form = " . $arrForm[0] . " and b.rec_job_map_form_child = " . $arrForm[1];
					}
					break;
				default:
					if ($optionValue != 0) {
						$andQuery .= " and b.rec_job_map_career = " . $optionValue;
					}
					break;
				}
			}
		}
		$query = 'b.rec_is_delete = 0 and b.rec_is_approve = 1 and b.rec_is_disabled = 0 ' . $likeQuery . $andQuery;
		$queryLimit = '';
		if ($perpage > 0 || $page > 0) {
			$queryLimit .= ' limit ' . $page . ', ' . $perpage; //'. $page . ', ' . $perpage';
		}
		$sql = "select b.*,c.*,d.*,e.*,f.*
			from recruitment b
			left join career c on c.career_id = b.rec_job_map_career and c.career_is_delete = 0
			left join employer d on d.employer_id = b.rec_map_employer and d.employer_is_delete = 0
			left join salary e on e.salary_id = b.rec_map_salary and e.salary_is_delete = 0
			left join (select province.*,recmp_map_rec from recruitment_map_province
			join province on province_id = recmp_map_province and recmp_is_delete = 0 group by recmp_map_rec) f on f.recmp_map_rec = b.rec_id
			where  " . $query . " order by b.rec_created_at DESC" . $queryLimit;
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	public function searchJobs($route, $keySearch, $option = null, $perpage = 0, $page = 0) {
		$optionQuery = "";
		$optionRegionQuery = "";
		if (isset($route)) {
			switch ($route) {
			case 'new-jobs':
				$optionQuery .= "";
				break;
			case 'jobs-at-japanese':
				$optionQuery .= " and b.rec_job_map_country = 2";
				break;
			case 'jobs-at-north':
				$optionQuery .= " and f.province_map_region = 3 and b.rec_job_map_country = 1";
				$optionRegionQuery .= "";
				break;
			case 'jobs-at-middle':
				$optionQuery .= " and f.province_map_region = 2 and b.rec_job_map_country = 1";
				$optionRegionQuery .= "";
				break;
			case 'jobs-at-south':
				$optionQuery .= " and f.province_map_region = 1 and b.rec_job_map_country = 1";
				$optionRegionQuery .= "";
				break;
			default:
				$optionQuery .= "";
				break;
			}
		}
		$likeQuery = "";
		if ($keySearch != "all") {
			$likeQuery = " and (b.rec_title REGEXP '(%s)' or b.rec_job_content REGEXP '(%s)' or b.rec_job_require REGEXP '(%s)') ";
		}
		if (strlen($keySearch) > 0) {
			$keyRegex = array('*', '?', '(', ')', '+', '\'', "\"", '-', '_', "=");
			$keySearch = str_replace($keyRegex, "|", trim($keySearch));
			$likeQuery = str_replace("%s", $keySearch, $likeQuery);
		}
		$andQuery = "";
		if (isset($option)) {
			foreach ($option as $value) {

				$optionKey = array_keys($value)[0];
				$optionValue = array_values($value)[0];
				switch ($optionKey) {
				case 'p':
					if ($optionValue != 0) {
						$andQuery .= " and b.rec_id in (
							select recmp_map_rec from recruitment_map_province
							where recmp_is_delete = 0 and recmp_map_province = " . $optionValue . ")";
					}
					break;
				case 's':
					if ($optionValue != 0) {
						$andQuery .= " and b.rec_map_salary = " . $optionValue;
					}
					break;
				case 'x':
					if ($optionValue >= 0) {
						$andQuery .= " and b.rec_job_require_sex = " . $optionValue;
					}

					break;
				case 'l':
					if ($optionValue != 0) {
						$andQuery .= " and b.rec_job_map_level = " . $optionValue;
					}
					break;
				case 't':
					if ($optionValue != 0) {
						$arrForm = explode("-", trim($optionValue));
						$andQuery .= " and b.rec_job_map_form = " . $arrForm[0] . " and b.rec_job_map_form_child = " . $arrForm[1];
					}
					break;
				default:
					if ($optionValue != 0) {
						$andQuery .= " and b.rec_job_map_career = " . $optionValue;
					}
					break;
				}
			}
		}
		$query = 'b.rec_is_delete = 0 and b.rec_is_approve = 1 and b.rec_is_disabled = 0 ' . $likeQuery . $andQuery;
		$queryLimit = '';
		if ($perpage > 0 || $page > 0) {
			$queryLimit .= ' limit ' . $page . ', ' . $perpage; //'. $page . ', ' . $perpage';
		}
		$sql = "select b.*,c.*,d.*,e.*,f.*
			from recruitment b
			left join career c on c.career_id = b.rec_job_map_career and c.career_is_delete = 0
			left join employer d on d.employer_id = b.rec_map_employer and d.employer_is_delete = 0
			left join salary e on e.salary_id = b.rec_map_salary and e.salary_is_delete = 0
			left join (select province.*,recmp_map_rec from recruitment_map_province
			join province on province_id = recmp_map_province and recmp_is_delete = 0 group by recmp_map_rec) f on f.recmp_map_rec = b.rec_id
			where  " . $query . $optionQuery . " order by b.rec_created_at DESC" . $queryLimit;
		log_message('error', $sql);
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
}