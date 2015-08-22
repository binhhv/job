<?php
class Employer_model extends CI_Model {

	function __construct() {
		# code...
		parent::__construct();
		$this->load->model('Dbutil', 'dbutil');
	}

	public function getListEmployer() {
		$sql = "select a.*,IFNULL(d.numrecs, 0) as numrecs, IFNULL(c.numuser, 0) + 1 as numuser
				from employer a
				left join (select rec_map_employer,count(rec_id) as numrecs from recruitment where rec_is_delete = 0 group by rec_map_employer ) as d on d.rec_map_employer = a.employer_id
				left join (select emac_map_employer,count(emac_id) as numuser from employer_map_account where emac_is_delete = 0 group by emac_map_employer ) as c on c.emac_map_employer = a.employer_id
				where employer_is_delete = 0 ";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
}