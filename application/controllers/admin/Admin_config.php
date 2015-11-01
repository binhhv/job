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
		// if (!$this->session->userdata['user']['isLogged']) {
		// 	redirect(base_url() . 'admin/login'); // no session established, kick back to login page
		// } else if ($this->session->userdata['user']['role'] != 5 && $this->session->userdata['user']['role'] != 1) {
		// 	redirect(base_url('error/403'));
		// }
		if (!$this->session->userdata['user']['isLogged']) {
			redirect(base_url('404'));
			//redirect(base_url() . 'admin/login'); // no session established, kick back to login page
		} else if ($this->session->userdata['user']['role'] != 5 && $this->session->userdata['user']['role'] != 1) {
			//redirect(base_url('error/403'));
			redirect(base_url('404'));
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
		if ($type == 3) {
			if (!file_exists('uploads/config/member')) {
				mkdir('uploads/config/member', 0777, true);
			}
		}
		if ($type == 4) {
			if (!file_exists('uploads/config/imgRecruitment')) {
				mkdir('uploads/config/imgRecruitment', 0777, true);
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
			'sub' => 'slogan'), TRUE);

		$this->load->view('admin/layout', array('head' => $head,
			'header' => $header,
			'sidemenu' => $sidemenu,
			'content' => $content,
			'footer' => $footer,
			'scripts' => $scripts,
		));
	}
	function getListTitleSite($option) {
		$output = $this->configPage->getListTitleSite($option);
		echo json_encode($output);
	}
	function createTitleSite() {
		$site = json_decode($this->input->post('site'), true);
		$option = $this->input->post('option');
		log_message('error', 'option-' . $option);
		$config_is_active = false;
		$config_is_delete = false;
		$config_created_at = date('Y-m-d H:m');
		$config_code = $this->util->generalCodeConfig('site', date('YmdHmsu'));

		if ($option) {
			$config_map_attribute = 5;
		} else {
			$config_map_attribute = 4;
		}

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
		$option = json_decode($this->input->post('option'), true);
		$output = $this->configPage->deleteTitleSite($site, $option);
		echo json_encode($output);
	}
	function selectedTitleSite($site, $active, $option) {
		//$site = json_decode($this->input->post('site'), true);
		log_message('error', $site . '-' . $active);
		$output = $this->configPage->selectedTitleSite($site, $active, $option);
		echo json_encode($output);
	}
	function unselectedTitleSite() {
		$site = json_decode($this->input->post('site'), true);
		$option = json_decode($this->input->post('option'), true);
		$output = $this->configPage->selectedTitleSite($site, 0, $option);
		echo json_encode($output);
	}

	function adwords() {
		$scripts = array(

			'assets/admin/angularjs/controller/config.controller.js',
			'assets/admin/angularjs/service/config.service.js',
			'assets/admin/dist/js/admin-resize.js',
		);
		$countries = $this->category->getListCountry();
		$adwords = $this->configPage->getListAdwords();
		$head = $this->load->view('admin/head', array(), TRUE);
		$header = $this->load->view('admin/header', array(), TRUE);
		$content = $this->load->view('admin/config/adwords', array(
			'countries' => $countries,
			'adwords' => $adwords), TRUE);
		$footer = $this->load->view('admin/footer', array(), TRUE);
		$sidemenu = $this->load->view('admin/sidemenu', array('email' => $this->session->userdata['user']['email'],
			'role' => $this->session->userdata['user']['role'],
			'selected' => 'config',
			'sub' => 'adwords'), TRUE);

		$this->load->view('admin/layout', array('head' => $head,
			'header' => $header,
			'sidemenu' => $sidemenu,
			'content' => $content,
			'footer' => $footer,
			'scripts' => $scripts,
		));
	}
	function getListAdwords() {
		$output = $this->configPage->getListAdwords();
		echo json_encode($output);
	}
	function updateAdword() {
		$adword = json_decode($this->input->post('adword'), true);
		$config_id = $adword['config_id'];
		$config_data_json = '{"title":"' . $adword['title'] . '","type":"' . $adword['type'] . '","view":"' . $adword['view'] . '","highlight":"' . $adword['highlight'] . '","expDate":"' . $adword['expDate'] . '","price":"' . $adword['price'] . '"}';
		$data = array(
			'config_data_json' => $config_data_json);
		$output = $this->configPage->updateAdword($data, $config_id);
		echo json_encode($output);
	}
	function title() {
		$scripts = array(

			'assets/admin/angularjs/controller/config.controller.js',
			'assets/admin/angularjs/service/config.service.js',
		);
		$countries = $this->category->getListCountry();
		$head = $this->load->view('admin/head', array(), TRUE);
		$header = $this->load->view('admin/header', array(), TRUE);
		$content = $this->load->view('admin/config/title', array(
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
	function videoIntro() {
		$styles = array('assets/admin/fileupload/jquery.fileupload.css'); //'assets/admin/fileupload/style.css', 'assets/admin/fileupload/jquery.fileupload.css');
		$scripts = array(
			'assets/admin/fileupload/vendor/jquery.ui.widget.js',
			'assets/admin/fileupload/load-image.all.min.js',
			'assets/admin/fileupload/canvas-to-blob.min.js',
			'assets/admin/fileupload/jquery.iframe-transport.js',
			'assets/admin/fileupload/jquery.fileupload.js',
			'assets/admin/fileupload/jquery.fileupload-process.js',
			'assets/admin/fileupload/jquery.fileupload-image.js',
			'assets/admin/fileupload/jquery.fileupload-audio.js',
			'assets/admin/fileupload/jquery.fileupload-video.js',
			'assets/admin/fileupload/jquery.fileupload-validate.js',
			'assets/admin/dist/js/jquery.base64.js',
			'assets/admin/angularjs/controller/config.controller.js',
			'assets/admin/angularjs/service/config.service.js',
			'assets/admin/dist/js/admin-upload-video.js');
		// 	'assets/admin/fileupload/vendor/jquery.ui.widget.js',
		// 	'assets/admin/fileupload/load-image.all.min.js',
		// 	'assets/admin/fileupload/canvas-to-blob.min.js',
		// 	'assets/admin/fileupload/jquery.blueimp-gallery.min.js',
		// 	'assets/admin/fileupload/jquery.iframe-transport.js',
		// 	'assets/admin/fileupload/jquery.fileupload.js',
		// 	'assets/admin/fileupload/jquery.fileupload-process.js',
		// 	'assets/admin/fileupload/jquery.fileupload-image.js',
		// 	'assets/admin/fileupload/jquery.fileupload-audio.js',
		// 	'assets/admin/fileupload/jquery.fileupload-video.js',
		// 	'assets/admin/fileupload/jquery.fileupload-validate.js',
		// 	'assets/admin/fileupload/jquery.fileupload-angular.js',
		// );
		$countries = $this->category->getListCountry();
		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		$head = $this->load->view('admin/head', array('styles' => $styles), TRUE);
		$header = $this->load->view('admin/header', array(), TRUE);
		$content = $this->load->view('admin/config/aboutus-video', array(
			'countries' => $countries, 'csrf' => $csrf), TRUE);
		$footer = $this->load->view('admin/footer', array(), TRUE);
		$sidemenu = $this->load->view('admin/sidemenu', array('email' => $this->session->userdata['user']['email'],
			'role' => $this->session->userdata['user']['role'],
			'selected' => 'config',
			'sub' => 'aboutus',
			'subChild' => 'upvideo'), TRUE);

		$this->load->view('admin/layout', array('head' => $head,
			'header' => $header,
			'sidemenu' => $sidemenu,
			'content' => $content,
			'footer' => $footer,
			'scripts' => $scripts,
		));
	}
	function structure() {
		$scripts = array(

			'assets/admin/angularjs/controller/config.controller.js',
			'assets/admin/angularjs/service/config.service.js',
		);
		$countries = $this->category->getListCountry();
		$head = $this->load->view('admin/head', array(), TRUE);
		$header = $this->load->view('admin/header', array(), TRUE);
		$content = $this->load->view('admin/config/aboutus-structure', array(
			'countries' => $countries), TRUE);
		$footer = $this->load->view('admin/footer', array(), TRUE);
		$sidemenu = $this->load->view('admin/sidemenu', array('email' => $this->session->userdata['user']['email'],
			'role' => $this->session->userdata['user']['role'],
			'selected' => 'config',
			'sub' => 'aboutus',
			'subChild' => 'structure'), TRUE);

		$this->load->view('admin/layout', array('head' => $head,
			'header' => $header,
			'sidemenu' => $sidemenu,
			'content' => $content,
			'footer' => $footer,
			'scripts' => $scripts,
		));
	}

	function getListMember() {
		$output = $this->configPage->getListMember();
		echo json_encode($output);
	}
	function choiceMember($config_id) {
		$output = $this->configPage->choiceMember($config_id);
		echo json_encode($output);
	}
	function unchoiceMember($config_id) {
		$output = $this->configPage->unchoiceMember($config_id);
		echo json_encode($output);
	}
	function changeMember($idOld, $idNew) {
		$output = $this->configPage->changeMember($idOld, $idNew);
		echo json_encode($output);
	}
	function deleteMember() {
		$member = json_decode($this->input->post('member'), true);
		$member_id = $member['config_id'];
		$output = $this->configPage->deleteMember($member_id);
		echo json_encode($output);
	}
	function createMember() {
		$avatarObject = $this->input->post('avatarObject');
		$member = json_decode($this->input->post('member'), true);
		log_message('error', $member['isActive']);
		//$type = $this->input->post('type');
		//$employer_id = $employer['employer_id'];
		$avatarName = $member['avatarName'];
		$avatar_file_name = $member['avatarName'];
		$config_is_active = $member['isActive'];
		$config_is_delete = false;
		$config_created_at = date('Y-m-d H:m');
		$config_code = '';
		$config_map_attribute = 7;
		$path = 'uploads/config/member/';
		$config_code .= $this->util->generalCodeConfig('member', date('YmdHmsu'));
		$data = array(
			'config_map_attribute' => $config_map_attribute,
			'config_is_active' => $config_is_active,
			'config_is_delete' => $config_is_delete,
			'config_code' => $config_code,
			'config_created_at' => $config_created_at,
			'config_content' => '',
		);
		if (isset($avatarName) && strlen($avatarName) > 0) {
			$extension = substr(strrchr($avatarName, '.'), 1); //end(explode(".", $logoName));
			$fileTmp = date('Y') . date('m') . date('d') . date('H') . date('m') . date('s') . date('u');
			$fileTmp = md5($fileTmp . date('YmdHmsu'));
			$file = $fileTmp . '.' . $extension;
			//$path = 'uploads/config/slide/' . $file;
			$path .= $file;
			$logo_tmp = $file;

			$uploadResult = $this->uploadLogoImage($avatarObject, $path, 3);
			log_message('error', $uploadResult);
			if ($uploadResult) {
				//$data['config_data_json'] = '{"file_name":"' . $avatar_file_name . '","file_tmp":"' . $logo_tmp . '"}';

				$resultMember = $this->configPage->createMember($data, $member, $avatar_file_name, $logo_tmp);
				echo json_encode($resultMember);
			} else {
				echo json_encode(false);
			}
		} else {
			echo json_encode(false);
		}
	}
	function updateMember() {
		$avatarObject = $this->input->post('avatarObject');
		$member = json_decode($this->input->post('member'), true);
		log_message('error', $member['isActive']);
		//$type = $this->input->post('type');
		//$employer_id = $employer['employer_id'];
		$avatarName = $member['avatarName'];
		$avatar_file_name = $member['avatarName'];
		$file_name_update = '';
		$file_tmp_update = '';
		// $file_name = $member['file'];
		// $file_tmp = $member['file_tmp'];
		// $name = $member['name'];
		// $phone = $member['phone']
		//$config_is_active = $member['config'];
		//$config_is_delete = false;
		//$config_created_at = date('Y-m-d H:m');
		//$config_code = '';
		//$config_map_attribute = 7;
		$path = 'uploads/config/member/';
		//$config_code .= $this->util->generalCodeConfig('member', date('YmdHmsu'));
		// $data = array(
		// 	'config_map_attribute' => $config_map_attribute,
		// 	'config_is_active' => $config_is_active,
		// 	'config_is_delete' => $config_is_delete,
		// 	'config_code' => $config_code,
		// 	'config_created_at' => $config_created_at,
		// 	'config_content' => '',
		// );
		if (isset($avatarName) && strlen($avatarName) > 0) {
			$extension = substr(strrchr($avatarName, '.'), 1); //end(explode(".", $logoName));
			$fileTmp = date('Y') . date('m') . date('d') . date('H') . date('m') . date('s') . date('u');
			$fileTmp = md5($fileTmp . date('YmdHmsu'));
			$file = $fileTmp . '.' . $extension;
			//$path = 'uploads/config/slide/' . $file;
			$path .= $file;
			$logo_tmp = $file;

			$uploadResult = $this->uploadLogoImage($avatarObject, $path, 3);
			log_message('error', $uploadResult);
			if ($uploadResult) {
				$file_name_update .= $avatarName;
				$file_tmp_update .= $logo_tmp;
				//$data['config_data_json'] = '{"file_name":"' . $avatar_file_name . '","file_tmp":"' . $logo_tmp . '"}';

				//$resultMember = $this->configPage->updateMember($data, $member, $avatar_file_name, $logo_tmp);
				//echo json_encode($resultMember);
			}
		}
		$output = $this->configPage->updateMember($member, $file_name_update, $file_tmp_update);
		echo json_encode($output);

	}
	function getListVideos() {
		$output = $this->configPage->getListVideos();
		echo json_encode($output);
	}
	function activeDeleteVideo() {
		$video = json_decode($this->input->post('video'), true);
		//
		$output = $this->configPage->activeDeleteVideo($video);
		echo json_encode($output);
	}
	function uploadVideo() {
		$file_name = $this->input->get('file_name');
		$file_tmp = $this->input->get('file_tmp');
		$tmp_name = 'files/' . $file_tmp;
		copy($tmp_name, 'uploads/config/video/' . $file_tmp);
		$config_code = $this->util->generalCodeConfig('video', date('YmdHmsu'));
		$config_data_json = '{"file_name":"' . base64_decode($file_name) . '","file_tmp":"' . $file_tmp . '"}';
		$data = array(
			'config_code' => $config_code,
			'config_content' => '',
			'config_data_json' => $config_data_json,
			'config_is_active' => false,
			'config_is_delete' => false,
			'config_map_attribute' => 8,
			'config_created_at' => date('Y-m-d'));
		$output = $this->configPage->uploadVideo($data);
		echo json_encode(array('status' => $output));
	}
	function numberRecruitment() {
		$scripts = array(

			'assets/admin/angularjs/controller/config.controller.js',
			'assets/admin/angularjs/service/config.service.js',
		);
		$countries = $this->category->getListCountry();
		$head = $this->load->view('admin/head', array(), TRUE);
		$header = $this->load->view('admin/header', array(), TRUE);
		$content = $this->load->view('admin/config/number-recruitment', array(
			'countries' => $countries), TRUE);
		$footer = $this->load->view('admin/footer', array(), TRUE);
		$sidemenu = $this->load->view('admin/sidemenu', array('email' => $this->session->userdata['user']['email'],
			'role' => $this->session->userdata['user']['role'],
			'selected' => 'config',
			'sub' => 'recruitmentConfig',
			'subChild' => 'recruitmentConfig'), TRUE);

		$this->load->view('admin/layout', array('head' => $head,
			'header' => $header,
			'sidemenu' => $sidemenu,
			'content' => $content,
			'footer' => $footer,
			'scripts' => $scripts,
		));
	}
	function getConfigNumRecruitment() {
		$output = $this->configPage->getConfigNumRecruitment();
		echo json_encode($output);
	}
	function updateConfigNumRecruitment() {
		$configRecruitment = json_decode($this->input->post('configRecruitment'), true);
		$config_data_json = json_decode($configRecruitment['config_data_json'], true);
		$config_data_json_update = '{"content":"' . $config_data_json['content'] . '","number":"' . $configRecruitment['number'] . '","updated_at":"' . date('Y-m-d') . '"}';
		$data = array('config_data_json' => $config_data_json_update);
		$output = $this->configPage->updateConfigNumRecruitment($data, $configRecruitment['config_id']);
		echo json_encode($output);
	}
	function imageRecruitment() {
		$scripts = array(

			'assets/admin/angularjs/controller/config.controller.js',
			'assets/admin/angularjs/service/config.service.js',
		);
		$countries = $this->category->getListCountry();
		$head = $this->load->view('admin/head', array(), TRUE);
		$header = $this->load->view('admin/header', array(), TRUE);
		$content = $this->load->view('admin/config/image-recruitment', array(
			'countries' => $countries), TRUE);
		$footer = $this->load->view('admin/footer', array(), TRUE);
		$sidemenu = $this->load->view('admin/sidemenu', array('email' => $this->session->userdata['user']['email'],
			'role' => $this->session->userdata['user']['role'],
			'selected' => 'config',
			'sub' => 'recruitmentImage',
			'subChild' => 'recruitmentImage'), TRUE);

		$this->load->view('admin/layout', array('head' => $head,
			'header' => $header,
			'sidemenu' => $sidemenu,
			'content' => $content,
			'footer' => $footer,
			'scripts' => $scripts,
		));
	}
	function getImageRec() {
		$output = $this->configPage->getImageRec();
		echo json_encode($output);
	}
	function uploadImageRec() {
		$slideObject = $this->input->post('slideObject');
		$slide = json_decode($this->input->post('slide'), true);
		$type = $this->input->post('type');
		//$employer_id = $employer['employer_id'];
		$logoName = $slide['imageRecName'];
		$logo_file_name = $slide['imageRecName'];
		$config_is_active = false;
		$config_is_delete = false;
		$config_created_at = date('Y-m-d H:m');
		$config_code = '';
		$config_map_attribute = 11;
		$path = '';
		//if ($type == 0) {
		$path .= 'uploads/config/imgRecruitment/';
		$config_code .= $this->util->generalCodeConfig('imageRec', date('YmdHmsu'));
		// } else {
		// 	$path .= 'uploads/config/ads/';
		// 	$config_map_attribute = 3;
		// 	$config_code .= $this->util->generalCodeConfig('ads', date('YmdHmsu'));
		// }
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

			$uploadResult = $this->uploadLogoImage($slideObject, $path, 4);
			log_message('error', $uploadResult);
			if ($uploadResult) {
				$data['config_data_json'] = '{"file_name":"' . $logo_file_name . '","file_tmp":"' . $logo_tmp . '"}';

				$resultSlide = $this->configPage->uploadImageRecModel($data);
				echo json_encode($resultSlide);
			} else {
				echo json_encode(false);
			}
		} else {
			echo json_encode(false);
		}
	}
	function deleteImageRec() {
		$slide = json_decode($this->input->post('slide'), true);
		$output = $this->configPage->deleteImageRec($slide);
		echo json_encode($output);
	}
	function activeImageRec($imageRec) {
		$output = $this->configPage->activeImageRec($imageRec);
		echo json_encode($output);
	}
	function deactiveImageRec($imageRec) {
		$output = $this->configPage->deactiveImageRec($imageRec);
		echo json_encode($output);
	}
}