<?php

class Search_model extends CI_Model {

	function __construct() {
		# code...
		parent::__construct();
		$this->load->model('Dbutil', 'dbutil');
	}
	public function getListProvince() {
		$data = array('from' => 'province',
			'where' => 'province_is_delete = 0');
		return $this->dbutil->getFromDb($data);
	}
	public function getListSalary() {
		$data = array('from' => 'salary',
			'where' => 'salary_is_delete = 0');
		return $this->dbutil->getFromDb($data);
	}
	public function getListLevel() {
		$data = array('from' => 'job_level',
			'where' => 'ljob_is_delete = 0');
		return $this->dbutil->getFromDb($data);
	}
	public function getListForm() {
		$data = array('from' => 'job_form',
			'where' => 'fjob_is_delete = 0');
		return $this->dbutil->getFromDb($data);
	}
	public function getListFormChild() {
		$data = array('from' => 'job_form_child',
			'where' => 'jcform_is_delete = 0');
		return $this->dbutil->getFromDb($data);
	}
	public function searchJob($keySearch, $option = null) {
		$likeQuery = " and (rec_title REGEXP '(%s)' or rec_job_content REGEXP '(%s)' or rec_job_quire REGEXP '(%s)') ";
		if (strlen($keySearch) > 0) {
			$keySearch = str_replace("-", "|", ($keySearch . trim()));
			$likeQuery = str_replace("%s", $keySearch, $likeQuery);
		}
		// if (isset($option)) {
		// 	foreach ($variable as $key => $value) {
		// 		# code...
		// 	}
		// }
		return null;

	}
}