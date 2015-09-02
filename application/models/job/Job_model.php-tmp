<?php
/**
Contact model
 **/

/**
 *
 */
class Job_model extends CI_Model {

	function __construct() {
		# code...
		parent::__construct();
		$this->load->model('Dbutil', 'dbutil');
	}
	public function insertContact($data) {
		return $this->dbutil->insertDb($data, 'contact');
	}
}