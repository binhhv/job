<?php
class Admin_mail_model extends CI_Model {

	function __construct() {
		# code...
		parent::__construct();
		$this->load->model('Dbutil', 'dbutil');
	}

	function getListMailJobseeker() {
		$sql = "
			select a.account_email  as email , a.account_first_name as firstname, a.account_last_name as lastname
			from account a
			where a.account_is_delete = 0 and a.account_map_role = 4
			union all
			select b.rece_email as email, b.rece_first_name as firstname, b.rece_last_name as lastname
			from recruitment_email_get_news b
			where b.rece_is_delete = 0";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	function getListMailEmployer() {
		$sql = "select a.*,b.account_email as email,b.account_first_name as firstname, b.account_last_name as lastname
				from employer a
				left join account b on b.account_id = a.employer_map_account and b.account_is_delete = 0
				where a.employer_is_delete = 0";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}

}