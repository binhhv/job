<?php
/**
Contact model
 **/

/**
 *
 */
class Employer_model extends CI_Model {

	function __construct() {
		# code...
		parent::__construct();
		$this->load->model('Dbutil', 'dbutil');
	}
	public function getInfoEmployer($id) {
		$sql = "select a.*,IFNULL(d.numrecs, 0) as numrecs, IFNULL(c.numuser, 0)  as numuser,e.account_email as 	employer_admin_email,
				CONCAT(e.account_first_name, ' ', e.account_last_name) as employer_admin_name,
				e.*,
				f.*, g.*
				from employer_map_account g
				left join employer a on g.emac_map_employer = a.employer_id
				left join (select rec_map_employer,count(rec_id) as numrecs from recruitment where rec_is_delete = 0 group by rec_map_employer ) as d on d.rec_map_employer = a.employer_id
				left join (select emac_map_employer,count(emac_id) as numuser from employer_map_account where emac_is_delete = 0 group by emac_map_employer ) as c on c.emac_map_employer = a.employer_id
				left join account e on e.account_id = a.employer_map_account and e.account_is_delete = 0
				left join province f on f.province_id = a.employer_map_province and f.province_is_delete = 0
				where a.employer_is_delete = 0  and g.emac_is_delete = 0 and g.emac_map_account = " . $id;
		return $this->dbutil->getOneRowQueryFromDb($sql, array());
	}
}