<?php
class Support_model extends CI_Model {

	function __construct() {
		# code...
		parent::__construct();
		$this->load->model('Dbutil', 'dbutil');
		$this->load->model('UtilModel', 'util');
	}
	function getMessage($cookie_id) {
		$data = array(
			"from" => "support_chat",
			"where" => "schat_is_delete = 0 and schat_cookie_id = " . '"' . $cookie_id . '"');
		return $this->dbutil->getFromDb($data);
	}
	function getMessageClient($cookie_id) {
		$parameter = array(
			"from" => "support_chat",
			"where" => "schat_cookie_id = " . "'" . $cookie_id . "'",
			"data" => array('schat_is_view_ad' => 1));
		$this->dbutil->updateDb($parameter);
		$data = array(
			"from" => "support_chat",
			"where" => "schat_is_delete = 0 and schat_cookie_id = " . '"' . $cookie_id . '"');
		return $this->dbutil->getFromDb($data);
	}
	function insertChat($data) {
		return $this->dbutil->insertDb($data, 'support_chat');
	}
	function getMessageReply($cookie_id, $schat_id) {
		$data = array(
			"from" => "support_chat",
			"where" => "schat_is_delete = 0 and schat_cookie_id = " . '"' . $cookie_id . '"' . " and schat_id > " . $schat_id . " and schat_type = 1");
		return $this->dbutil->getFromDb($data);
	}
	function getMessageReplyUser($cookie_id, $schat_id) {
		$data = array(
			"from" => "support_chat",
			"where" => "schat_is_delete = 0 and schat_cookie_id = " . '"' . $cookie_id . '"' . " and schat_id > " . $schat_id . " and schat_type = 0");
		return $this->dbutil->getFromDb($data);
	}
}