<?php
class Contact_model extends CI_Model {

	function __construct() {
		# code...
		parent::__construct();
		$this->load->model('Dbutil', 'dbutil');
	}
	public function getListContact() {
		// $data = array(
		// 	'from' => 'contact',
		// 	'where' => 'cont_is_delete = 0');
		$sql = "select * from contact where cont_is_delete = 0
		order by cont_created_at";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	public function deleteContact($id) {
		$data = array(
			'from' => 'contact',
			'where' => 'cont_id = ' . $id,
			'data' => array('cont_is_delete' => true),
		);
		return $this->dbutil->updateDb($data, 'contact');
	}
	public function updateReplyContact($idcontact) {
		$sql = "select cont_reply
				from contact
				where cont_is_delete = 0 and cont_id = " . $idcontact;
		$result = $this->dbutil->getOneRowQueryFromDb($sql, 'contact');
		$numRep = $result->cont_reply + 1;
		$data = array('from' => 'contact',
			'where' => 'cont_id = ' . $idcontact,
			'data' => array('cont_reply' => $numRep));
		return $this->dbutil->updateDb($data, array());
	}
	public function updateContactView($id) {
		$sql = "select cont_view
				from contact
				where cont_is_delete = 0 and cont_id = " . $id;
		$result = $this->dbutil->getOneRowQueryFromDb($sql, 'contact');
		$numRep = $result->cont_view + 1;
		$data = array('from' => 'contact',
			'where' => 'cont_id = ' . $id,
			'data' => array('cont_view' => $numRep));
		return $this->dbutil->updateDb($data, array());
	}

}