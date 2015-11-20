<?php
class Language_switch extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}

	function switchLanguage($language = "") {
		$language = ($language != "") ? $language : "vi";
		$this->session->set_userdata('lang', $language);
		$url = $this->input->get('url');
		// if (isset($url) && strlen($url) > 0) {
		// 	redirect($url, 'refresh');
		// } else {
		// 	redirect(base_url());
		// }
		echo json_encode(array("status" => "change"));
	}
}