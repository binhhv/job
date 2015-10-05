<?php
class Admin_api_model extends CI_Model {

	function __construct() {
		# code...
		parent::__construct();
		$this->load->model('Dbutil', 'dbutil');
	}

	public function getNotifyContact() {
		$sql = "select * from contact where cont_view = 0 and cont_reply = 0 and cont_is_delete = 0";
		$output = $this->dbutil->getFromDbQueryBinding($sql, array());
		return count($output);
	}
	public function getListNotifyContact() {
		$sql = "select * from contact where cont_is_delete = 0 and cont_view = 0 and cont_reply = 0
		order by cont_created_at desc limit 0,5";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	public function getNotifySupport() {
		$sql = "select * from support_chat where schat_is_view_ad = 0 and schat_is_reply_ad = 0 and schat_type = 0 and schat_is_delete = 0 group by schat_cookie_id order by schat_created_at desc";
		$output = $this->dbutil->getFromDbQueryBinding($sql, array());
		return count($output);
	}
	public function getListNotifySupport() {
		$sql = "select * from support_chat where schat_is_view_ad = 0 and schat_is_reply_ad = 0 and schat_is_delete = 0 group by schat_cookie_id order by schat_created_at desc limit 0,5";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	function getListSupportChat() {
		// $sql = "select * ,count(schat_cookie_id) as numsp from support_chat where schat_is_delete = 0 and schat_is_view_ad = 0
		// group by schat_cookie_id order by schat_created_at desc";
		$sql = "select a.*,IFNULL(b.numsp, 0) as numsp
				from support_chat a
				left join (select count(schat_id) as numsp, schat_cookie_id from support_chat where schat_is_delete = 0 and schat_type = 0 and schat_is_view_ad = 0 group by schat_cookie_id) as b on b.schat_cookie_id = a.schat_cookie_id
				group by a.schat_cookie_id order by a.schat_created_at desc";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	function getNumRecruitment() {
		$sql = "select * from recruitment";
		$output = $this->dbutil->getFromDbQueryBinding($sql, array());
		return count($output);
	}
	function getNumEmployer() {
		$sql = "select * from employer";
		$output = $this->dbutil->getFromDbQueryBinding($sql, array());
		return count($output);
	}
	function getNumJobseeker() {
		$sql = "select * from account where account_map_role = 4";
		$output = $this->dbutil->getFromDbQueryBinding($sql, array());
		return count($output);
	}
	function getNumCVDocument() {
		$sql1 = "select * from document_cv ";
		$output1 = $this->dbutil->getFromDbQueryBinding($sql1, array());
		$sql2 = "select * from document_online";
		$output2 = $this->dbutil->getFromDbQueryBinding($sql2, array());

		return count($output1) + count($output2);
	}
	function getRecentRecruitment() {
		$sql = "select a.*,b.*
			from recruitment a
			left join employer b on b.employer_id = a.rec_map_employer and b.employer_is_delete = 0
			where a.rec_is_delete = 0
			order by a.rec_created_at desc limit 0,5";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}

	function getDataChartRecruitment($year) {
		$sql = "select count(*) as numrec,MONTH(rec_created_at) as month from recruitment
				where YEAR(rec_created_at)  = ?
				GROUP BY MONTH(rec_created_at)";
		return $this->dbutil->getFromDbQueryBinding($sql, array($year));
	}

	function getRecentJobseekerAndEmployer() {
		$sql = "select * from account
		left join employer on employer.employer_map_account = account_id and employer_is_delete = 0
		where account_is_delete = 0 and (account_map_role = 2 or account_map_role = 4)
		group by account_id
		order by account_created_at desc limit 0,5";
		return $this->dbutil->getFromDbQueryBinding($sql, array());
	}
	function getDataChartJobseeker($year) {
		$sql = "select count(*) as num,MONTH(account_created_at) as month from account
				where YEAR(account_created_at)  = ? and account_map_role = 4
				GROUP BY MONTH(account_created_at)";
		return $this->dbutil->getFromDbQueryBinding($sql, array($year));
	}
	function getDataChartEmployer($year) {
		$sql = "select count(*) as num,MONTH(employer_created_at) as month from employer
				where YEAR(employer_created_at)  = ?
				GROUP BY MONTH(employer_created_at)";
		return $this->dbutil->getFromDbQueryBinding($sql, array($year));
	}
}