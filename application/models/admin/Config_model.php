<?php
class Config_model extends CI_Model {

	function __construct() {
		# code...
		parent::__construct();
		$this->load->model('Dbutil', 'dbutil');
	}
	function getListLogo() {
		$sql = "select * from config where config_is_delete = 0 and config_map_attribute = 1";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	function activeDeleteLogo($logo) {
		$type = $logo['typeAction'];

		if ($type == '0') {
			$dataActive = array(
				'from' => 'config',
				'where' => 'config_map_attribute = 1',
				'data' => array('config_is_active' => false));
			$result = $this->dbutil->updateDb($dataActive);
			$data = array(
				'from' => 'config',
				'where' => 'config_id = ' . $logo['config_id'] . ' and config_map_attribute = 1',
				'data' => array('config_is_active' => true));
		} else {
			$data = array(
				'from' => 'config',
				'where' => 'config_id = ' . $logo['config_id'] . ' and config_map_attribute = 1',
				'data' => array('config_is_delete' => true));
		}
		return $this->dbutil->updateDb($data);
	}
	function uploadLogo($data) {
		return $this->dbutil->insertDb($data, 'config');
	}
	function getListSlide($type) {
		$config_map_attribute = 2;
		if ($type == 1) {
			$config_map_attribute = 3;
		}
		$sql = "select * from config where config_is_delete = 0 and config_map_attribute = " . $config_map_attribute;
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	function deleteSlide($slide, $type) {
		$config_map_attribute = 2;
		if ($type == 1) {
			$config_map_attribute = 3;
		}
		$data = array(
			'from' => 'config',
			'where' => 'config_id = ' . $slide['config_id'] . ' and config_map_attribute = ' . $config_map_attribute,
			'data' => array('config_is_delete' => true));
		return $this->dbutil->updateDb($data);
	}
	function uploadSlideModel($data) {
		return $this->dbutil->insertDb($data, 'config');
	}
	function activeSlide($id, $type) {
		$config_map_attribute = 2;
		if ($type == 1) {
			$config_map_attribute = 3;
		}
		$data = array(
			'from' => 'config',
			'where' => 'config_id = ' . $id . ' and config_map_attribute = ' . $config_map_attribute,
			'data' => array('config_is_active' => true));
		return $this->dbutil->updateDb($data);
	}
	function deactiveSlide($id, $type) {
		$config_map_attribute = 2;
		if ($type == 1) {
			$config_map_attribute = 3;
		}
		$data = array(
			'from' => 'config',
			'where' => 'config_id = ' . $id . ' and config_map_attribute = ' . $config_map_attribute,
			'data' => array('config_is_active' => false));
		return $this->dbutil->updateDb($data);
	}
	function getListTitleSite() {
		$sql = "select * from config where config_is_delete = 0 and config_map_attribute = 4";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	function deleteTitleSite($site) {
		$data = array(
			'from' => 'config',
			'where' => 'config_id = ' . $site['config_id'] . ' and config_map_attribute = 4',
			'data' => array('config_is_delete' => true));
		return $this->dbutil->updateDb($data);
	}
	function selectedTitleSite($site, $active = 0) {
		$dataUpdate = array(
			'from' => 'config',
			'where' => 'config_map_attribute = 4',
			'data' => array('config_is_active' => false));
		$this->dbutil->updateDb($dataUpdate);
		$config_is_active = true;
		if ($active == 0) {
			$config_is_active = false;
		}

		$data = array(
			'from' => 'config',
			'where' => 'config_id = ' . $site . ' and config_map_attribute = 4',
			'data' => array('config_is_active' => $active));
		return $this->dbutil->updateDb($data);
	}
	function createTitleSite($data) {
		return $this->dbutil->insertDb($data, 'config');
	}
}