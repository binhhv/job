<?php
class Manager_model extends CI_Model {

	function __construct() {
		# code...
		parent::__construct();
		$this->load->model('Dbutil', 'dbutil');
		$this->load->model('UtilModel', 'util');
	}

	public function getListManager() {
		$data = array(
			'from' => 'account',
			'where' => 'account_is_delete = 0 and account_map_role = 5');
		return $this->dbutil->getFromDb($data);
	}
	function updateManager($data, $condition) {
		$dataObject = array(
			'from' => 'account',
			'where' => 'account_id = ' . $this->dbutil->escape($condition),
			'data' => $data);
		return $this->dbutil->updateDb($dataObject);
	}
	function createManager($data) {
		$result = $this->dbutil->insertDb($data, 'account');
		$code = $this->util->General_Code('account', $result, 5);
		$this->util->update_Code('account', 'account_code', $code, 'account_id', $result);
		return $result;
	}
	function getManager($id) {
		$data = array(
			'from' => 'account',
			'where' => 'account_id = ' . $this->dbutil->escape($id));
		return $this->dbutil->getFromDb($data);
	}
}