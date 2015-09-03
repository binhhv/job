<?php
class Uploadcv_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->model('Dbutil', 'dbutil');
	}
	public function insertcvUser($data) {
		return $this->dbutil->insertDb($data, 'document_cv');
	}
	public function insertcvOnlineUser($data) {
		return $this->dbutil->insertDb($data, 'document_online');
	}
	public function getAllHealthy() {
		$sql = "select a.*
			from healthy a where a.healthy_is_delete = 0";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
}