<?php
/**
 *
 */
class Admin_config extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('form_validation', 'session'));
		$this->load->model('admin/Jobseeker_model', 'jobseeker');
		$this->load->model('admin/Mail_model', 'mail');
		$this->load->model('admin/Admin_api_model', 'api');
		$this->load->model('admin/Category_model', 'category');
		$this->load->model('admin/Config_model', 'configPage');
		$this->load->model('UtilModel', 'util');
		if (!$this->session->userdata['user']['isLogged']) {
			redirect(base_url() . 'admin/login'); // no session established, kick back to login page
		} else if ($this->session->userdata['user']['role'] != 5 && $this->session->userdata['user']['role'] != 1) {
			redirect(base_url('error/403'));
		}
	}
	function logo() {
		$scripts = array(

			'assets/admin/angularjs/controller/config.controller.js',
			'assets/admin/angularjs/service/config.service.js',
		);
		$countries = $this->category->getListCountry();
		$head = $this->load->view('admin/head', array(), TRUE);
		$header = $this->load->view('admin/header', array(), TRUE);
		$content = $this->load->view('admin/config/logo', array(
			'countries' => $countries), TRUE);
		$footer = $this->load->view('admin/footer', array(), TRUE);
		$sidemenu = $this->load->view('admin/sidemenu', array('email' => $this->session->userdata['user']['email'],
			'role' => $this->session->userdata['user']['role'],
			'selected' => 'config',
			'sub' => 'logo'), TRUE);

		$this->load->view('admin/layout', array('head' => $head,
			'header' => $header,
			'sidemenu' => $sidemenu,
			'content' => $content,
			'footer' => $footer,
			'scripts' => $scripts,
		));
	}
	function getListLogo() {
		$output = $this->configPage->getListLogo();
		echo json_encode($output);
	}
	function activeDeleteLogo() {
		$logo = json_decode($this->input->post('logo'), true);
		//
		$output = $this->configPage->activeDeleteLogo($logo);
		echo json_encode($output);
	}

	function uploadLogo() {
		$logoObject = $this->input->post('logoObject');
		$logo = json_decode($this->input->post('logo'), true);

		//$employer_id = $employer['employer_id'];
		$logoName = $logo['logoName'];
		$logo_file_name = $logo['logoName'];
		$config_is_active = false;
		$config_is_delete = false;
		$config_created_at = date('Y-m-d H:m');
		$config_code = $this->util->generalCodeConfig('logo', date('YmdHmsu'));
		$data = array(
			'config_map_attribute' => 1,
			'config_is_active' => $config_is_active,
			'config_is_delete' => $config_is_delete,
			'config_code' => $config_code,
			'config_created_at' => $config_created_at,
			'config_content' => '',
		);
		if (isset($logoName) && strlen($logoName) > 0) {
			$extension = substr(strrchr($logoName, '.'), 1); //end(explode(".", $logoName));
			$fileTmp = date('Y') . date('m') . date('d') . date('H') . date('m') . date('s') . date('u');
			$fileTmp = md5($fileTmp . date('YmdHmsu'));
			$file = $fileTmp . '.' . $extension;
			$path = 'uploads/config/logo/' . $file;
			$logo_tmp = $file;

			$uploadResult = $this->uploadLogoImage($logoObject, $path);
			if ($uploadResult) {
				$data['config_data_json'] = '{"file_name":"' . $logo_file_name . '","file_tmp":"' . $logo_tmp . '"}';
				$resultLogo = $this->configPage->uploadLogo($data);
				echo json_encode($resultLogo);
			} else {
				echo json_encode(false);
			}
		} else {
			echo json_encode(false);
		}

	}
	function uploadLogoImage($data, $file, $type = 0) {
		//0 logo
		//1 slide
		//2 ads
		if ($type == 0) {
			if (!file_exists('uploads/config/logo')) {
				mkdir('uploads/config/logo', 0777, true);
			}
		}
		if ($type == 1) {
			if (!file_exists('uploads/config/slide')) {
				mkdir('uploads/config/slide', 0777, true);
			}
		}
		if ($type == 2) {
			if (!file_exists('uploads/config/ads')) {
				mkdir('uploads/config/ads', 0777, true);
			}
		}

		$logo = str_replace('[removed]', '', trim($data));
		log_message('error', $logo);
		$imageData = base64_decode($logo);
		$success = file_put_contents($file, $imageData);
		if ($success) {
			return true;
		} else {
			return false;
		}
	}
	function incrementalHash($len = 6) {
		$charset = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
		$base = strlen($charset);
		$result = '';

		$now = explode(' ', microtime())[1];
		while ($now >= $base) {
			$i = $now % $base;
			$result = $charset[$i] . $result;
			$now /= $base;
		}
		return substr($result, -5);
	}

	function ads() {
		$scripts = array(

			'assets/admin/angularjs/controller/config.controller.js',
			'assets/admin/angularjs/service/config.service.js',
		);
		$countries = $this->category->getListCountry();
		$head = $this->load->view('admin/head', array(), TRUE);
		$header = $this->load->view('admin/header', array(), TRUE);
		$content = $this->load->view('admin/config/ads', array(
			'countries' => $countries), TRUE);
		$footer = $this->load->view('admin/footer', array(), TRUE);
		$sidemenu = $this->load->view('admin/sidemenu', array('email' => $this->session->userdata['user']['email'],
			'role' => $this->session->userdata['user']['role'],
			'selected' => 'config',
			'sub' => 'ads'), TRUE);

		$this->load->view('admin/layout', array('head' => $head,
			'header' => $header,
			'sidemenu' => $sidemenu,
			'content' => $content,
			'footer' => $footer,
			'scripts' => $scripts,
		));
	}

	function slide() {
		$scripts = array(

			'assets/admin/angularjs/controller/config.controller.js',
			'assets/admin/angularjs/service/config.service.js',
		);
		$countries = $this->category->getListCountry();
		$head = $this->load->view('admin/head', array(), TRUE);
		$header = $this->load->view('admin/header', array(), TRUE);
		$content = $this->load->view('admin/config/slides', array(
			'countries' => $countries), TRUE);
		$footer = $this->load->view('admin/footer', array(), TRUE);
		$sidemenu = $this->load->view('admin/sidemenu', array('email' => $this->session->userdata['user']['email'],
			'role' => $this->session->userdata['user']['role'],
			'selected' => 'config',
			'sub' => 'slide'), TRUE);

		$this->load->view('admin/layout', array('head' => $head,
			'header' => $header,
			'sidemenu' => $sidemenu,
			'content' => $content,
			'footer' => $footer,
			'scripts' => $scripts,
		));
	}

	function getListSlide($type) {
		$output = $this->configPage->getListSlide($type);
		echo json_encode($output);
	}
	function uploadSlide() {
		$slideObject = $this->input->post('slideObject');
		$slide = json_decode($this->input->post('slide'), true);
		$type = $this->input->post('type');
		//$employer_id = $employer['employer_id'];
		$logoName = $slide['slideName'];
		$logo_file_name = $slide['slideName'];
		$config_is_active = false;
		$config_is_delete = false;
		$config_created_at = date('Y-m-d H:m');
		$config_code = '';
		$config_map_attribute = 2;
		$path = '';
		if ($type == 0) {
			$path .= 'uploads/config/slide/';
			$config_code .= $this->util->generalCodeConfig('slide', date('YmdHmsu'));
		} else {
			$path .= 'uploads/config/ads/';
			$config_map_attribute = 3;
			$config_code .= $this->util->generalCodeConfig('ads', date('YmdHmsu'));
		}
		$data = array(
			'config_map_attribute' => $config_map_attribute,
			'config_is_active' => $config_is_active,
			'config_is_delete' => $config_is_delete,
			'config_code' => $config_code,
			'config_created_at' => $config_created_at,
			'config_content' => '',
		);
		if (isset($logoName) && strlen($logoName) > 0) {
			$extension = substr(strrchr($logoName, '.'), 1); //end(explode(".", $logoName));
			$fileTmp = date('Y') . date('m') . date('d') . date('H') . date('m') . date('s') . date('u');
			$fileTmp = md5($fileTmp . date('YmdHmsu'));
			$file = $fileTmp . '.' . $extension;
			//$path = 'uploads/config/slide/' . $file;
			$path .= $file;
			$logo_tmp = $file;

			$uploadResult = $this->uploadLogoImage($slideObject, $path, $type);
			log_message('error', $uploadResult);
			if ($uploadResult) {
				$data['config_data_json'] = '{"file_name":"' . $logo_file_name . '","file_tmp":"' . $logo_tmp . '"}';

				$resultSlide = $this->configPage->uploadSlideModel($data);
				echo json_encode($resultSlide);
			} else {
				echo json_encode(false);
			}
		} else {
			echo json_encode(false);
		}
	}
	function deleteSlide() {
		$slide = json_decode($this->input->post('slide'), true);
		$type = $this->input->post('type');
		$output = $this->configPage->deleteSlide($slide, $type);
		echo json_encode($output);
	}
	function activeSlide($id, $type) {
		$output = $this->configPage->activeSlide($id, $type);
		echo json_encode($output);
	}
	function deactiveSlide($id, $type) {
		$output = $this->configPage->deactiveSlide($id, $type);
		echo json_encode($output);
	}
	function site() {
		$scripts = array(

			'assets/admin/angularjs/controller/config.controller.js',
			'assets/admin/angularjs/service/config.service.js',
		);
		$countries = $this->category->getListCountry();
		$head = $this->load->view('admin/head', array(), TRUE);
		$header = $this->load->view('admin/header', array(), TRUE);
		$content = $this->load->view('admin/config/title-site', array(
			'countries' => $countries), TRUE);
		$footer = $this->load->view('admin/footer', array(), TRUE);
		$sidemenu = $this->load->view('admin/sidemenu', array('email' => $this->session->userdata['user']['email'],
			'role' => $this->session->userdata['user']['role'],
			'selected' => 'config',
			'sub' => 'titleSite'), TRUE);

		$this->load->view('admin/layout', array('head' => $head,
			'header' => $header,
			'sidemenu' => $sidemenu,
			'content' => $content,
			'footer' => $footer,
			'scripts' => $scripts,
		));
	}
	function getListTitleSite() {
		$output = $this->configPage->getListTitleSite();
		echo json_encode($output);
	}
	function createTitleSite() {
		$site = json_decode($this->input->post('site'), true);
		$config_is_active = false;
		$config_is_delete = false;
		$config_created_at = date('Y-m-d H:m');
		$config_code = $this->util->generalCodeConfig('site', date('YmdHmsu'));
		$config_map_attribute = 4;
		$data = array(
			'config_map_attribute' => $config_map_attribute,
			'config_is_active' => $config_is_active,
			'config_is_delete' => $config_is_delete,
			'config_code' => $config_code,
			'config_created_at' => $config_created_at,
			'config_content' => $site['config_content'],
			'config_data_json' => '',
		);
		$result = $this->configPage->createTitleSite($data);
		echo json_encode($result);
	}
	function deleteTitleSite() {
		$site = json_decode($this->input->post('site'), true);
		$output = $this->configPage->deleteTitleSite($site);
		echo json_encode($output);
	}
	function selectedTitleSite($site, $active) {
		//$site = json_decode($this->input->post('site'), true);
		log_message('error', $site . '-' . $active);
		$output = $this->configPage->selectedTitleSite($site, $active);
		echo json_encode($output);
	}
	function unselectedTitleSite() {
		$site = json_decode($this->input->post('site'), true);
		$output = $this->configPage->selectedTitleSite($site, 0);
		echo json_encode($output);
	}

}