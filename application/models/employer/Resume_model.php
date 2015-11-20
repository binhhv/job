<?php
class Resume_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->model('Dbutil', 'dbutil');
		$this->load->model('UtilModel', 'util');
	}

	public function searchResume($idEmployer, $keySearch, $option = null, $perpage = 0, $page = 0) {
		$likeQuery = "";
		if ($keySearch != "all") {
			$likeQuery = " and (b.docon_degree REGEXP '(%s)' or b.docon_education REGEXP '(%s)' or b.docon_address REGEXP '(%s)'";
			$likeQuery .= " or b.docon_experience REGEXP '(%s)' or b.docon_skill REGEXP '(%s)' or b.docon_reason_apply REGEXP '(%s)' or b.docon_salary REGEXP '(%s)' ";
			$likeQuery .= " or b.docon_wish REGEXP '(%s)' or  b.docon_advance REGEXP '(%s)' )";
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
						$andQuery .= " and b.docon_id in (
							select doconmp_map_docon from document_online_map_province
							where doconmp_is_delete = 0 and doconmp_map_province = " . $optionValue . ")";
					}
					break;
				case 'l':
					if ($optionValue != 0) {
						$andQuery .= " and b.docon_map_job_level = " . $optionValue;
					}
					break;
				default:
					if ($optionValue != 0) {
						$andQuery .= " and b.docon_career = " . $optionValue;
					}
					break;
				}
			}
		}
		$query = 'b.docon_is_delete = 0 and b.docon_type = 1 ' . $likeQuery . $andQuery;
		$queryLimit = '';
		if ($perpage > 0 || $page > 0) {
			$queryLimit .= ' limit ' . $page . ', ' . $perpage; //'. $page . ', ' . $perpage';
		}
		$sql = "select b.*,c.*,d.*,f.*,g.*,IFNULL(k.emstore_map_document,0) as existStore
			from document_online b
			left join career c on c.career_id = b.docon_career and c.career_is_delete = 0
			left join job_level d on d.ljob_id = b.docon_map_job_level and d.ljob_is_delete = 0
			left join account g on g.account_id = b.docon_map_user
			left join employer_store_document_online k on k.emstore_map_document = b.docon_id and k.emstore_is_delete = 0 and k.emstore_map_employer = ?
			left join (select province.*,doconmp_map_docon from document_online_map_province
			join province on province_id = doconmp_map_province and doconmp_is_delete = 0 group by doconmp_map_docon) f on f.doconmp_map_docon = b.docon_id
			where  " . $query . " and b.docon_is_delete_user = 0 " . " order by b.docon_created_at DESC " . $queryLimit;
		//print_r($sql);
		return $this->dbutil->getFromDbQueryBinding($sql, array($idEmployer));
	}

	function getDetailForm($id, $idEmployer) {
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
				d.province,e.*,f.*,IFNULL(k.emstore_map_document,0) as existStore
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
				left join employer_store_document_online k on k.emstore_map_document = a.docon_id and k.emstore_is_delete = 0 and k.emstore_map_employer = ?
				where a.docon_is_delete = 0 and a.docon_type = " . $doctype . " and docon_id = ?";
		$data = array($idEmployer, $id);
		//print_r($sql);
		return $this->dbutil->getOneRowQueryFromDb($sql, $data);
	}
	function storeResume($idResume, $employer) {
		$data = array(
			'emstore_map_employer' => $employer->employer_id,
			'emstore_map_document' => $idResume,
			'emstore_map_user_employer' => $employer->user['id'],
			'emstore_is_delete' => false,
			'emstore_update_at' => date('Y-m-d'),
			'emstore_created_at' => date('Y-m-d'));
		return $this->dbutil->insertDb($data, 'employer_store_document_online');
	}
	function getListResumeStore($idEmployer) {
		$sql = "select b.*,c.*,d.*,f.*,g.*,m.*
			from employer_store_document_online m
			left join document_online b on b.docon_id = m.emstore_map_document
			left join career c on c.career_id = b.docon_career and c.career_is_delete = 0
			left join job_level d on d.ljob_id = b.docon_map_job_level and d.ljob_is_delete = 0
			left join account g on g.account_id = b.docon_map_user
			left join (select province.*,doconmp_map_docon from document_online_map_province
			join province on province_id = doconmp_map_province and doconmp_is_delete = 0 group by doconmp_map_docon) f on f.doconmp_map_docon = b.docon_id
			where m.emstore_map_employer = ? and m.emstore_is_delete = 0";
		return $this->dbutil->getFromDbQueryBinding($sql, array($idEmployer));
	}
	function deleteStoreResume($idStore) {
		$data = array('from' => 'employer_store_document_online',
			'where' => 'emstore_id = ' . $idStore,
			'data' => array("emstore_is_delete" => true));
		return $this->dbutil->updateDb($data);
	}
}