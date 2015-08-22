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
		$sql = "select a.*,CONCAT(b.account_first_name, ' ', b.account_last_name) as jobseeker_name,b.account_email as jobseeker_email
				from document_online a
				left join account b on b.account_id = a.docon_map_user
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

}