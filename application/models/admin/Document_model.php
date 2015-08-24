<?php
class Document_model extends CI_Model {

	function __construct() {
		# code...
		parent::__construct();
		$this->load->model('Dbutil', 'dbutil');
	}
	public function getCV() {
		$sql = "select a.*,b.account_email as jobseeker_name
				from document_cv a
				left join account b on b.account_id = a.doccv_map_user
				where a.doccv_is_delete = 0";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	public function getForm() {
		$sql = "select a.*,CONCAT(b.account_first_name, ' ', b.account_last_name) as jobseeker_name,b.account_email as jobseeker_email,b.*,c.*
				from document_online a
				left join account b on b.account_id = a.docon_map_user
				left join healthy c on c.healthy_id = a.docon_healthy
				where a.docon_is_delete = 0";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	function updateCV($data, $condition) {
		$dataObject = array(
			'from' => 'document_cv',
			'where' => 'doccv_id = ' . $this->dbutil->escape($condition),
			'data' => $data);
		return $this->dbutil->updateDb($dataObject);
	}
	function updateForm($data, $condition) {
		$dataObject = array(
			'from' => 'document_online',
			'where' => 'docon_id = ' . $this->dbutil->escape($condition),
			'data' => $data);
		return $this->dbutil->updateDb($dataObject);
	}

	function getDetailForm($id) {
		$sql = "select a.*,b.account_email as email, CONCAT(b.account_first_name, ' ', b.account_last_name) as name,DATE_FORMAT(a.docon_birthday,'%d/%m/%Y') as birthday,c.*
				from document_online a
				left join account as b on b.account_id = a.docon_map_user
				left join healthy c on c.healthy_id = a.docon_healthy
				where a.docon_id = ? and a.docon_is_delete = ?";

		$data = array($id, 0);
		return $this->dbutil->getOneRowQueryFromDb($sql, $data);
	}

}