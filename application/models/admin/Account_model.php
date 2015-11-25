<?php
class Account_model extends CI_Model {

	function __construct() {
		# code...
		parent::__construct();
		$this->load->model('Dbutil', 'dbutil');
	}
	public function getAccount($id) {
		$data = array(
			'from' => 'account',
			'where' => 'account_id = ' . $id);
		return $this->dbutil->getOneRowFromDb($data);
	}
	public function changePassword($admin) {
		if ($admin['option'] == 1) {
			$data = array('from' => 'account',
				'where' => 'account_id = ' . $admin['adminId'],
				'data' => array('account_password' => md5($admin['password']), 'account_update_at' => date('Y-m-d')));
		} else {
			$jsonUpdate = '{"id":"' . $admin['adminId'] . '","email":"' . $admin['adminEmail'] . '","password":"' . md5($admin['password']) . '"}';
			$data = array('from' => 'config',
				'where' => 'config_content = ' . $admin['adminId'] . ' and config_map_attribute = 13',
				'data' => array('config_data_json' => $jsonUpdate));
		}

		return $this->dbutil->updateDb($data);
	}
}