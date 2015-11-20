<?php
class LanguageLoader {
	function initialize() {
		$ci = &get_instance();
		$ci->load->helper('language');
		$ci->load->library('session');
		//$ci->session->unset_userdata('lang');
		$site_lang = $ci->session->userdata('lang');
		if ($site_lang) {
			$ci->lang->load('message', $ci->session->userdata('lang'));
		} else {
			$ci->lang->load('message', 'vi');
		}
		//$ci->lang->load('message', 'vi');
	}
}