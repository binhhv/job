<?php
class Log_model extends CI_Model {

	function __construct() {
		# code...
		parent::__construct();
		$this->load->model('Dbutil', 'dbutil');
	}
	public function getLogs() {
		// $data = array(
		// 	'from' => 'contact',
		// 	'where' => 'cont_is_delete = 0');
		$sql = "select log.*,account.account_email from log
				left join account on account_id = log_map_account
				order by log_create_at";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
}