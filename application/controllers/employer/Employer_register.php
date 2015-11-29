<?php
class Employer_register extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('security');
		$this->load->model('Register_model', 'account');
		$this->load->model('employer/Employer_model', 'employer');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->lang->load('message', 'vi');
		$this->load->helper('language');
		$this->load->library('session');

	}
	function index() {

		$scriptOption = array("server_upload/js/vendor/jquery.ui.widget.js",
			"server_upload/js/jquery.iframe-transport.js",
			"server_upload/js/jquery.fileupload.js", 'assets/main/scroll/jquery.nicescroll.min.js', 'assets/main/js/jquery_ntd.js', 'assets/main/js/ntd_upload.js');
		$provinceData = $this->account->getAllProvinceByCountry();
		$provinceVN = $this->account->getProvinceCountry(1);
		$provinceJP = $this->account->getProvinceCountry(2);
		$user = (isset($this->session->userdata['user'])) ? $this->session->userdata['user'] : null;
		$head = $this->load->view('main/head', array('title' => $this->lang->line('em_title_register'), 'scriptOption' => $scriptOption), TRUE);
		$header = $this->load->view('main/header', array('user' => $user, 'showTitle' => true,
		), TRUE);

		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		$content = $this->load->view('main/employer/register', array('csrf' => $csrf, 'provinceData' => $provinceData,
			'provinceVN' => $provinceVN, 'provinceJP' => $provinceJP), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer, 'isGray' => true));

	}
	public function insertEmployer() {
		// log_message('error', $file_element_name);
		//set validate
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('valid_email', $this->lang->line('invalid-email'));
		$this->form_validation->set_message('matches', $this->lang->line('matches'));
		$this->form_validation->set_message('regex_match', $this->lang->line('regex_match'));
		$this->form_validation->set_message('min_length', $this->lang->line('min_length'));
		//$this->form_validation->set_error_delimiters('<label class="error alert-danger">', '</label>');
		$this->form_validation->set_rules('account_email', $this->lang->line('email'), 'callback_email_check|trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('account_password', $this->lang->line('password'), 'trim|required|min_length[6]|matches[confirm_password]|xss_clean|md5');
		$this->form_validation->set_rules('confirm_password', $this->lang->line('passconf'), 'trim|required|min_length[6]|xss_clean|md5');
		$this->form_validation->set_rules('employer_name', $this->lang->line('employer_name_re_depl'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('employer_size', $this->lang->line('employer_size_re_depl'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('employer_phone', $this->lang->line('employer_phone_re_depl'), 'trim|required|regex_match[/^[0-9().-]+$/]|xss_clean');
		$this->form_validation->set_rules('employer_fax', $this->lang->line('employer_fax_re_depl'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('employer_about', $this->lang->line('employer_about_re_depl'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('employer_address', $this->lang->line('employer_address_re_depl'), 'trim|required|xss_clean');
		//$this->form_validation->set_rules('employer_map_province', $this->lang->line('employer_map_province_re_depl'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('employer_contact', $this->lang->line('employer_contact_name_re_depl'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('employer_contact_email', $this->lang->line('employer_contact_email_re_depl'), 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('employer_contact_phone', $this->lang->line('employer_contact_phone_re_depl'), 'trim|required|regex_match[/^[0-9().-]+$/]|xss_clean');
		$this->form_validation->set_rules('employer_contact_mobile', $this->lang->line('employer_contact_mobile_re_depl'), 'trim|required|regex_match[/^[0-9().-]+$/]|xss_clean');

		//captcha check
		$captcha = $this->input->post('captcha');
		$word = $this->session->userdata('captchaWord');
		$checkCaptcha = false;
		if (strcmp(strtoupper($captcha), strtoupper($word)) == 0) {
			//return true;
			$checkCaptcha = true;
		}
		log_message('error', json_encode($this->form_validation->run()));
		if ($this->form_validation->run() && $checkCaptcha) {
			$account_email = $this->security->xss_clean($this->input->post('account_email'));
			$account_password = $this->security->xss_clean($this->input->post('account_password'));
			$account_is_get_news = '0';
			$account_map_role = '2';
			$account_is_delete = '0';
			$account_is_disabled = '0';
			// $account_updated_at = new date('Y-m-d')
			// $account_created_at = new date('Y-m-d')
			$data = array(
				'account_email' => $account_email,
				'account_password' => md5($account_password),
				'account_is_get_news' => $account_is_get_news,
				'account_is_delete' => $account_is_delete,
				'account_is_disabled' => $account_is_disabled,
				'account_map_role' => $account_map_role,
				'account_created_at' => date('Y-m-d'),
			);
			$id_account = 0;
			try {
				$id_account = $this->account->insertAccount($data);
				if ($id_account > 0) {
					//deployer
					$employer_name = $this->security->xss_clean($this->input->post('employer_name'));
					$employer_address = $this->security->xss_clean($this->input->post('employer_address'));
					$employer_phone = $this->security->xss_clean($this->input->post('employer_phone'));
					$employer_map_province = $this->security->xss_clean($this->input->post('employer_map_province'));
					$employer_size = $this->security->xss_clean($this->input->post('employer_size'));
					$employer_about = $this->security->xss_clean($this->input->post('employer_about'));
					$employer_fax = $this->security->xss_clean($this->input->post('employer_fax'));
					$employer_website = $this->security->xss_clean($this->input->post('employer_website'));
					$employer_contact_name = $this->security->xss_clean($this->input->post('employer_contact'));
					$employer_contact_email = $this->security->xss_clean($this->input->post('employer_contact_email'));
					$employer_contact_phone = $this->security->xss_clean($this->input->post('employer_contact_phone'));
					$employer_contact_mobile = $this->security->xss_clean($this->input->post('employer_contact_mobile'));
					$employer_map_country = $this->input->post('country');
					if ($employer_map_country == 1) {
						$employer_map_province = $this->input->post('employer_map_province_vn');
					} else {
						$employer_map_province = $this->input->post('employer_map_province_jp');
					}

					$employer_logo_file_name = $this->input->post('file-name');
					$employer_logo_file_tmp = $this->input->post('file-tmp');

					$employer_is_approve = '0';
					$employer_is_delete = '0';

					$datadeploy = array(
						'employer_map_account' => $id_account,
						'employer_name' => $employer_name,
						'employer_address' => $employer_address,
						'employer_phone' => $employer_phone,
						'employer_map_country' => $employer_map_country,
						'employer_map_province' => $employer_map_province,
						'employer_size' => $employer_size,
						'employer_about' => $employer_about,
						'employer_fax' => $employer_fax,
						'employer_website' => $employer_website,
						'employer_contact_name' => $employer_contact_name,
						'employer_contact_email' => $employer_contact_email,
						'employer_contact_phone' => $employer_contact_phone,
						'employer_contact_mobile' => $employer_contact_mobile,
						'employer_logo' => $employer_logo_file_name,
						'employer_logo_tmp' => $employer_logo_file_tmp,
						'employer_is_approve' => $employer_is_approve,
						'employer_is_delete' => $employer_is_delete,
						'employer_created_at' => date('Y-m-d'),
						'employer_update_at' => date('Y-m-d'),
					);
					$id_employer = $this->account->insertEmployer($datadeploy);
					if ($id_employer > 0) {
						$tmp_name = 'files/' . $employer_logo_file_tmp;
						$path = 'uploads/logo/' . $id_employer;
						if (!file_exists($path)) {
							mkdir($path, 0777, true);
						}
						copy($tmp_name, 'uploads/logo/' . $id_employer . '/' . $employer_logo_file_tmp);
						$this->session->set_userdata('user', array('id' => $id_account,
							'email' => $account_email,
							'role' => 2,
							'isLogged' => true,
							'firstname' => '',
							'lastname' => ''));

						$datamap = array(
							'emac_map_account' => $id_account,
							'emac_map_employer' => $id_employer,
							'emac_is_delete' => '0',
							'emac_created_at' => date('Y-m-d'),
						);
						$id_map_employer = $this->account->insertMapEmployer($datamap);
					}

				}
			} catch (Exception $e) {

			}
			echo json_encode(array('status' => 'success', 'content' => 'Register complete'));

		} else {
			$dataerr = array(
				'account_email' => form_error('account_email'),
				'account_password' => form_error('account_password'),
				'confirm_password' => form_error('confirm_password'),
				'employer_name' => form_error('employer_name'),
				'employer_size' => form_error('employer_size'),
				'employer_phone' => form_error('employer_phone'),
				'employer_fax' => form_error('employer_fax'),
				'employer_about' => form_error('employer_about'),
				'employer_address' => form_error('employer_address'),
				// 'employer_map_province' => form_error('employer_map_province'),
				'employer_contact' => form_error('employer_contact'),
				'employer_contact_email' => form_error('employer_contact_email'),
				'employer_contact_phone' => form_error('employer_contact_phone'),
				'employer_contact_mobile' => form_error('employer_contact_mobile'),
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash(),
				'captcha' => $checkCaptcha,
			);
			// if (!$checkCaptcha) {
			// 	$dataerr['captcha'] = 'invalid-captcha';
			// }
			echo json_encode(array('status' => 'errvalid', 'content' => $dataerr));

			log_message('error', json_encode(array('status' => 'errvalid', 'content' => $dataerr)));
		}
	}
	public function email_check($account_email) {
		# check email exits
		$checkemail = $this->account->checkEmailExits($account_email);
		if ($checkemail) {
			$this->form_validation->set_message('email_check', '\'%s\' này đã tồn tại vui lòng kiểm tra lại.');
			return FALSE;
		} else {
			return TRUE;
		}
	}
}