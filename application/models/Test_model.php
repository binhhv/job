<?php
/**
Contact model
 **/

/**
 *
 */
class Test_model extends CI_Model {

	function __construct() {
		# code...
		parent::__construct();
		$this->load->model('Dbutil', 'dbutil');
	}
	public function getAllProvince() {
		$data = array(
			'from' => 'province',
			'where' => 'province_is_delete = 0');
		return $this->dbutil->getFromDb($data);
	}
	public function updateProvince($id, $longlat) {
		$data = array(
			'from' => 'province',
			'where' => 'province_id = ' . $id,
			'data' => array('province_long' => $longlat['long'],
				'province_lat' => $longlat['lat']));
		return $this->dbutil->updateDb($data);

	}
	public function getEmployer
}