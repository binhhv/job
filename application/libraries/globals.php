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