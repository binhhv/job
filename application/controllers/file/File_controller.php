<?php
/**
 *
 */
class File_controller extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('file');
		$this->load->helper('download');
		$this->load->library(array('form_validation', 'session'));
		// if (!$this->session->userdata['user']['isLogged']) {
		// 	redirect(base_url() . 'admin/login'); // no session established, kick back to login page
		// }
		// else if ($this->session->userdata['user']['role'] != 5 && $this->session->userdata['user']['role'] != 1) {
		// 	redirect(base_url('error/403'));
		// }
	}
	function download($value1, $value2, $value3) {
		echo "file" . $value1 . '-' . $value2 . '-' . $value3;
	}
	function downloadcv($foldername, $filenameTemp, $filename, $doccvtype) {
		//$file = json_decode($this->input->post('file'), true);
		///$filenameTemp = $file['doccv_file_tmp'];
		//$filename = $file['doccv_file_name'];
		$path = '';
		$pathCheck = '';
		if ($doccvtype == 2) {
			$path .= base_url() . "uploads/cv/store/" . $foldername . '/' . $filenameTemp;
			$pathCheck = "uploads/cv/store/" . $foldername . '/' . $filenameTemp;
		} else {
			$path .= base_url() . "uploads/cv/" . $foldername . '/' . $filenameTemp;
			$pathCheck = "uploads/cv/" . $foldername . '/' . $filenameTemp;
		}

		$check = file_exists($pathCheck);
		if ($check) {
			$data = file_get_contents($path);
			force_download($filename, $data);
		} else {
			redirect(base_url('file-not-found'), 'refresh');
		}
	}
}