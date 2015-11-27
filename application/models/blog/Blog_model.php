 <?php
class Blog_model extends CI_Model {
	function __construct() {
		parent::__construct();
		$this->load->model('Dbutil', 'dbutil');
		$this->load->model('Utilmodel', 'util');
	}
}