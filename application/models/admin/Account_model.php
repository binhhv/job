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
}