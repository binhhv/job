<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

/**
 *
 */
class Globals {

	// function __construct($config = array()) {
	// 	foreach ($config as $key => $value) {
	// 		$data[$key] = $value;
	// 	}
	// 	$CI = &get_instance();
	// 	$CI->load->vars($data);

	// }
	function __construct() {
		$this->ci = &get_instance();
		$this->ci->load->library('session');
		//$ci->session->unset_userdata('lang');

		//1: logo page
		//2: slide page
		//3: ads page
		//4: slogan page
		//5: title page

	}
	function getTitlePage() {
		$sql = "select * from config where config_is_delete = 0 and config_is_active = 1 and config_map_attribute = 5";
		$row = $this->getOneRowQueryFromDb($sql, array());
		return isset($row->config_content) ? $row->config_content : '';
	}
	function getSloganPage() {
		$sql = "select * from config where config_is_delete = 0 and config_is_active = 1 and config_map_attribute = 4";
		$row = $this->getOneRowQueryFromDb($sql, array());
		return isset($row->config_content) ? $row->config_content : '';
	}
	function getSlidePage() {
		$sql = "select * from config where config_is_delete = 0 and config_is_active = 1 and config_map_attribute = 2";
		$output = $this->getFromDbQueryBinding($sql, array());
		return count($output) > 0 ? $output : null;
	}
	function getLogoPage() {
		$sql = "select * from config where config_is_delete = 0 and config_is_active = 1 and config_map_attribute = 1";
		$row = $this->getOneRowQueryFromDb($sql, array());
		return isset($row->config_data_json) ? $row->config_data_json : '';
	}
	function getAdsPage() {
		$sql = "select * from config where config_is_delete = 0 and config_is_active = 1 and config_map_attribute = 3";
		$output = $this->getFromDbQueryBinding($sql, array());
		return count($output) > 0 ? $output : null;
	}
	function getVideoIntro() {
		$sql = "select * from config where config_is_delete = 0 and config_is_active = 1 and config_map_attribute = 8";
		$output = $this->getOneRowQueryFromDb($sql, array());
		return isset($output) ? $output : null;
	}
	function getAdwords() {
		$sql = "select * from config where config_is_delete = 0 and config_is_active = 1 and config_map_attribute = 6";
		$output = $this->getFromDbQueryBinding($sql, array());
		return count($output) > 0 ? $output : null;
	}
	function getMembers() {
		$sql = "select * from config where config_is_delete = 0 and config_is_active = 1 and config_map_attribute = 7 order by config_content asc";
		$output = $this->getFromDbQueryBinding($sql, array());
		return count($output) > 0 ? $output : null;
	}
	function getImageBackgroundRecruitment() {
		$sql = "select * from config where config_is_delete = 0 and config_is_active = 1 and config_map_attribute = 11";
		$row = $this->getOneRowQueryFromDb($sql, array());
		return isset($row->config_data_json) ? $row->config_data_json : '';
	}
	function getRecruitmentShow($type) {
		//get total recruitment config.
		$numShowTop = $this->getNumRecruitmentShowTop();
		$numShowAnother = $this->getNumRecruitmentShowAnother();
		$maxView = $this->getNumRecruitmentView();

		$sql = "select a.*,IFNULL(d.numapply, 0) as numapply ,e.*,f.*,g.*,k.*,m.*,n.*,l.*
				from recruitment a
				left join (select c.recapp_map_recruitment, count(recapp_map_user) as numapply from recruitment_apply c where c.recapp_is_delete = 0 group by c.recapp_map_recruitment) d
				on d.recapp_map_recruitment = a.rec_id
				left join job_form e on e.fjob_id = a.rec_job_map_form
				left join job_form_child f on f.jcform_id = a.rec_job_map_form_child
				left join contact_form g on g.contact_form_id = a.rec_contact_form and g.contact_form_is_delete = 0
				left join salary k on k.salary_id = a.rec_map_salary and k.salary_is_delete = 0
				left join (select province.*,recmp_map_rec from recruitment_map_province
				join province on province_id = recmp_map_province and recmp_is_delete = 0 group by recmp_map_rec) m on m.recmp_map_rec = a.rec_id
				left join employer n on n.employer_id = a.rec_map_employer and n.employer_is_delete = 0
				left join career l on l.career_id = a.rec_job_map_career and l.career_is_delete = 0
				where a.rec_is_delete = 0 and a.rec_is_approve = 1 and a.rec_is_disabled = 0 ";
		$conditionFirst = '';
		$conditionSecond = '';
		//get 50% view and 50% select
		switch ($type) {
		case 1:
			# code...
			$conditionFirst .= ' and a.rec_is_show_top = 1  order by a.rec_update_at desc limit ' . round($numShowTop / 2);
			$conditionSecond .= ' and a.rec_is_show_top = 0 and a.rec_is_show_another = 0 and a.rec_view >= ' . $maxView . '  order by a.rec_view desc limit ' . round($numShowTop / 2);
			break;
		case 2:
			# code...
			$conditionFirst .= ' and a.rec_is_show_another = 1 order by a.rec_update_at desc limit ' . round($numShowAnother / 2);
			$conditionSecond .= ' and a.rec_is_show_another = 0 and a.rec_is_show_top = 0 and a.rec_view >= ' . $maxView . ' order by a.rec_view desc limit ' . round($numShowAnother / 2);
			break;
		default:
			# code...
			$conditionFirst .= ' and a.rec_is_show_top = 1 and a.rec_is_show_another = 1 order by a.rec_update_at desc';
			$conditionSecond .= ' and (a.rec_is_show_top = 0 or a.rec_is_show_another = 0) and a.rec_view >= ' . $maxView . ' order by a.rec_view desc  ';
			break;
		}
		$sqlQuery = '(' . $sql . $conditionFirst . ') union (' . $sql . $conditionSecond . ') order by rec_view desc';
		return $this->getFromDbQueryBinding($sqlQuery, array());
	}
	function getNumRecruitmentShowTop() {
		$sql = "select * from config where config_is_delete = 0 and config_is_active = 1 and config_map_attribute = 9";
		$row = $this->getOneRowQueryFromDb($sql, array());
		if (isset($row->config_data_json)) {
			$rowJson = json_decode($row->config_data_json, true);
			return $rowJson['number'];
		} else {
			return 0;
		}
	}
	function getNumRecruitmentShowAnother() {
		$sql = "select * from config where config_is_delete = 0 and config_is_active = 1 and config_map_attribute = 10";
		$row = $this->getOneRowQueryFromDb($sql, array());
		if (isset($row->config_data_json)) {
			$rowJson = json_decode($row->config_data_json, true);
			return $rowJson['number'];
		} else {
			return 0;
		}
	}
	function getNumRecruitmentView() {
		$sql = "select * from config where config_is_delete = 0 and config_is_active = 1 and config_map_attribute = 12";
		$row = $this->getOneRowQueryFromDb($sql, array());
		if (isset($row->config_data_json)) {
			$rowJson = json_decode($row->config_data_json, true);
			return $rowJson['number'];
		} else {
			return 0;
		}

	}
	function getTagJob() {
		$sql = "select a.career_id,a.career_name,IFNULL(b.numJob,0) as numJob
			   from career a
			   left join (select rec_job_map_career,count(rec_id) as numJob from recruitment where rec_is_delete = 0 and rec_is_disabled = 0 group by rec_job_map_career) as b
			   on a.career_id = b.rec_job_map_career
			   where a.career_is_delete = 0";
		return $this->getFromDbQueryBinding($sql, array());
	}
	function getCurrentLang() {
		$site_lang = $this->ci->session->userdata('lang');
		if ($site_lang) {
			return $this->ci->session->userdata('lang');
		} else {
			return 'vi';
		}
	}
	function getFAQ() {
		$sql = "select * from faq where faq_is_delete = 0";
		return $this->getFromDbQueryBinding($sql, array());
	}
	public function getLoginUrl() {
		require FCPATH . '/facebook/autoload.php';
		$fb = new Facebook\Facebook([
			'app_id' => APP_ID,
			'app_secret' => SECRET_KEY,
			'default_graph_version' => 'v2.5',
			//'default_access_token' => '{access-token}', // optional
		]);

		$helper = $fb->getRedirectLoginHelper();
		$permissions = ['email', 'user_likes']; // optional
		$loginUrl = $helper->getLoginUrl(base_url('login-callback'), $permissions);
		return $loginUrl;
	}
	public function getFromDb($projections) {

		if ($projections != null) {
			if (isset($projections["fields"])) {
				$this->ci->db->select($projections["fields"]);
			} else {
				$this->ci->db->select('*');
			}
			$this->ci->db->from($projections["from"]);
			if (isset($projections["where"])) {
				$this->ci->db->where($projections["where"]);
			}

			if (isset($projections["orderkey"]) && isset($projections["order"])) {
				$this->ci->db->order_by($projections["orderkey"], $projections["order"]);
			}

			if (isset($projections["num"]) && isset($projections["startfrom"])) {
				$this->ci->db->limit($projections["num"], $projections["startfrom"]); // 5 records starting from 1st record
			}
			$query = $this->ci->db->get();

			return $query->result();
		}
	}
	public function insert_batch($data, $tbl) {
		return $this->ci->db->insert_batch($data, $tbl);
	}
	public function getOneRowFromDb($projections) {

		if ($projections != null) {
			if (isset($projections["fields"])) {
				$this->ci->db->select($projections["fields"]);
			} else {
				$this->ci->db->select('*');
			}
			$this->ci->db->from($projections["from"]);
			if (isset($projections["where"])) {
				$this->ci->db->where($projections["where"]);
			}

			if (isset($projections["orderkey"]) && isset($projections["order"])) {
				$this->ci->db->order_by($projections["orderkey"], $projections["order"]);
			}

			if (isset($projections["num"]) && isset($projections["startfrom"])) {
				$this->ci->db->limit($projections["num"], $projections["startfrom"]); // 5 records starting from 1st record
			}
			$query = $this->ci->db->get();

			return $query->row();
		}
	}

	public function getFromDbQueryBinding($sql, $data) {
		$query = $this->ci->db->query($sql, $data);
		return $query->result();
	}
	public function getOneRowQueryFromDb($sql, $data) {
		$query = $this->ci->db->query($sql, $data);
		return $query->row();
	}
	public function updateDb($projections) {
		if ($projections != null) {
			$this->ci->db->where($projections["where"]);
			return $this->ci->db->update($projections["from"], $projections["data"]);
		}
	}
}