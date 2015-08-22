<?php
class Manager_model extends CI_Model {

	function __construct() {
		# code...
		parent::__construct();
		$this->load->model('Dbutil', 'dbutil');
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
		return $this->dbutil->insertDb($data, 'account');
	}
	function getManager($id) {
		$data = array(
			'from' => 'account',
			'where' => 'account_id = ' . $this->dbutil->escape($id));
		return $this->dbutil->getFromDb($data);
	}
}