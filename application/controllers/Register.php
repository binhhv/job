<?php
class Register extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('security');
		$this->load->model('Register_model', 'account');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->lang->load('message', 'vi');
		$this->load->helper('language');
		$this->load->library('session');

	}

	public function index() {
		$head = $this->load->view('main/head', array('titlePage' => 'JOB7VN Group|user register'), TRUE);
		$header = $this->load->view('main/header', array(
			'logo' => 'img/header/logo.jpg',
			'showTitle' => true,
			'logoWidth' => '70px',
			'logoHeight' => '70px',
		), TRUE);

		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		//register empoyer
		$provinceData = $this->account->getAllProvinceByCountry();

		$content = $this->load->view('main/employer_register', array('csrf' => $csrf, 'province' => $provinceData), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer));
	}
	//deployer
	public function insertEmployer() {
		// log_message('error', $file_element_name);
		//set validate
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('valid_email', $this->lang->line('invalid-email'));
		$this->form_validation->set_message('matches', $this->lang->line('matches'));
		$this->form_validation->set_message('regex_match', $this->lang->line('regex_match'));

		$this->form_validation->set_error_delimiters('<label class="error alert-danger">', '</label>');
		$this->form_validation->set_rules('account_email', $this->lang->line('email'), 'callback_email_check|trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('account_password', $this->lang->line('password'), 'trim|required|min_length[6]|xss_clean|matches[confirm_password]|md5');
		$this->form_validation->set_rules('confirm_password', $this->lang->line('passconf'), 'trim|required|min_length[6]|xss_clean');
		$this->form_validation->set_rules('employer_name', $this->lang->line('employer_name_re_depl'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('employer_size', $this->lang->line('employer_size_re_depl'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('employer_phone', $this->lang->line('employer_phone_re_depl'), 'trim|required|regex_match[/^[0-9]{10}$/]|xss_clean');
		$this->form_validation->set_rules('employer_fax', $this->lang->line('employer_fax_re_depl'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('employer_about', $this->lang->line('employer_about_re_depl'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('employer_address', $this->lang->line('employer_address_re_depl'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('employer_map_province', $this->lang->line('employer_map_province_re_depl'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('employer_contact', $this->lang->line('employer_contact_name_re_depl'), 'trim|required|xss_clean');
		$this->form_validation->set_rules('employer_contact_email', $this->lang->line('employer_contact_email_re_depl'), 'trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('employer_contact_phone', $this->lang->line('employer_contact_phone_re_depl'), 'trim|required|regex_match[/^[0-9]{10}$/]|xss_clean');
		$this->form_validation->set_rules('employer_contact_mobile', $this->lang->line('employer_contact_mobile_re_depl'), 'trim|required|regex_match[/^[0-9]{10}$/]|xss_clean');

		if ($this->form_validation->run()) {
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
					$employer_contact_name = $this->security->xss_clean($this->input->post('employer_contact_name'));
					$employer_contact_email = $this->security->xss_clean($this->input->post('employer_contact_email'));
					$employer_contact_phone = $this->security->xss_clean($this->input->post('employer_contact_phone'));
					$employer_contact_mobile = $this->security->xss_clean($this->input->post('employer_contact_mobile'));

					$file_img_upload = $this->do_upload($id_account);
					if ($file_img_upload > 0) {
						//upload images
						$employer_logo = $file_img_upload['name_new']; //$this->uploadImages($file_img_upload, $id_account);
						$employer_logo_tmp = $file_img_upload['name_old']; //$_FILES["image"]["name"];
					} else {
						$employer_logo = '';
						$employer_logo_tmp = '';
					}
					$employer_is_approve = '0';
					$employer_is_delete = '0';

					$datadeploy = array(
						'employer_map_account' => $id_account,
						'employer_name' => $employer_name,
						'employer_address' => $employer_address,
						'employer_phone' => $employer_phone,
						'employer_map_province' => $employer_map_province,
						'employer_size' => $employer_size,
						'employer_about' => $employer_about,
						'employer_fax' => $employer_fax,
						'employer_website' => $employer_website,
						'employer_contact_name' => $employer_contact_name,
						'employer_contact_email' => $employer_contact_email,
						'employer_contact_phone' => $employer_contact_phone,
						'employer_contact_mobile' => $employer_contact_mobile,
						'employer_logo' => $employer_logo,
						'employer_logo_tmp' => $employer_logo_tmp,
						'employer_is_approve' => $employer_is_approve,
						'employer_is_delete' => $employer_is_delete,
						'employer_created_at' => date('Y-m-d'),
						'employer_update_at' => date('Y-m-d'),
					);
					$id_employer = $this->account->insertEmployer($datadeploy);
					if ($id_employer > 0) {
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
				'employer_map_province' => form_error('employer_map_province'),
				'employer_contact' => form_error('employer_contact'),
				'employer_contact_email' => form_error('employer_contact_email'),
				'employer_contact_phone' => form_error('employer_contact_phone'),
				'employer_contact_mobile' => form_error('employer_contact_mobile'),
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash(),
			);
			echo json_encode(array('status' => 'errvalid', 'content' => $dataerr));

			log_message('error', json_encode(array('status' => 'errvalid', 'content' => $dataerr)));
		}
	}

	function check_default($post_string) {
		return $post_string == '0' ? FALSE : TRUE;
	}

	//check phonenumber
	public function _check_phone($phone) {
		if (preg_match('/^([0-9]( |-)?)?((?[0-9]{3})?|[0-9]{3})( |-)?([0-9]{3}( |-)?[0-9]{4}|[a-zA-Z0-9]{7})$/', $phone)) {
			return true;
		} else {
			$this->form_validation->set_message('_check_phone', '%s ' . $phone . ' is invalid format');
			return false;
		}
	}

	//check select
	// function check_default($array)
	// {
	//   foreach($array as $element)
	//   {
	//     if($element == '0')
	//     {
	//       return FALSE;
	//     }
	//   }
	//  return TRUE;
	// }

	//Add accountarrau
	public function insertAccount() {
		//set validate
		$this->form_validation->set_message('required', $this->lang->line('required'));
		$this->form_validation->set_message('valid_email', $this->lang->line('invalid-email'));
		$this->form_validation->set_message('matches', $this->lang->line('matches'));

		$this->form_validation->set_error_delimiters('<label class="error alert-danger">', '</label>');
		$this->form_validation->set_rules('account_email', 'lang:email', 'callback_email_check|trim|required|valid_email|xss_clean');
		$this->form_validation->set_rules('account_password', 'lang:password', 'trim|required|min_length[6]|xss_clean|matches[confirm_password]|md5');
		$this->form_validation->set_rules('confirm_password', 'lang:passconf', 'trim|required|min_length[6]|xss_clean');
		$this->form_validation->set_rules('account_first_name', 'lang:first_name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('account_last_name', 'lang:last_name', 'trim|required|xss_clean');

		if ($this->form_validation->run()) {
			$account_email = $this->security->xss_clean($this->input->post('account_email'));
			$account_password = $this->security->xss_clean($this->input->post('account_password'));
			$account_first_name = $this->security->xss_clean($this->input->post('account_first_name'));
			$account_last_name = $this->security->xss_clean($this->input->post('account_last_name'));
			$account_is_get_news = '0';
			$account_map_role = '4';
			$account_is_delete = '0';
			$account_is_disabled = '0';
			// $account_updated_at = new date('Y-m-d')
			// $account_created_at = new date('Y-m-d')
			$data = array(
				'account_email' => $account_email,
				'account_password' => md5($account_password),
				'account_first_name' => $account_first_name,
				'account_last_name' => $account_last_name,
				'account_is_get_news' => $account_is_get_news,
				'account_is_delete' => $account_is_delete,
				'account_is_disabled' => $account_is_disabled,
				'account_map_role' => $account_map_role,
				'account_created_at' => date('Y-m-d'),
			);
			$id_account = 0;
			try {
				$id_account = $this->account->insertAccount($data);
			} catch (Exception $e) {

			}
			echo json_encode(array('status' => 'success', 'content' => 'Register complete'));

		} else {
			$data = array(
				// 'roll' => form_error('roll'),
				'account_email' => form_error('account_email'),
				'account_password' => form_error('account_password'),
				'confirm_password' => form_error('confirm_password'),
				'account_first_name' => form_error('account_first_name'),
				'account_last_name' => form_error('account_last_name'),
				'name' => $this->security->get_csrf_token_name(),
				'hash' => $this->security->get_csrf_hash(),
			);

			echo json_encode(array('status' => 'errvalid', 'content' => $data));
		}
	}

	public function email_check($account_email) {
		# check email exits
		$checkemail = $this->account->checkEmailExits($account_email);
		if ($checkemail) {
			$this->form_validation->set_message('email_check', '\'%s\' này đã tồn tại vui lòng đăng nhập hoặc nhập tài khoản khác.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	//upload images
	public function uploadImages($file, $id_account) {
		$check = $file;
		if ($check > 0) {
			$target_dir = "uploads/logodeployer/" . $id_account . "/";
			if (!file_exists('uploads/logodeployer/' . $id_account . "/")) {
				mkdir('path/to/directory', 0777, true);
			}
			$picId = rand(10000, 500000);
			$image_path = $picId . basename($_FILES["image"]["name"]);

			$target_file = $target_dir . $image_path;
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
			// Check if file already exists
			if (file_exists($target_file)) {
				echo "Sorry, file already exists.";
				$uploadOk = 0;
			}
			// Check file size
			if ($_FILES["image"]["size"] > 500000) {
				$message_error = "Sorry, your file is too large.";
				$uploadOk = 0;
			}
			// Allow certain file formats
			if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif") {
				$message_error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				echo "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
					// echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
				} else {
					$message_error = "Sorry, there was an error uploading your file.";
				}
			}
			// if upload file error
			if ($message_error != "") {
				$this->session->set_flashdata('error_msg', $message_error);
				$data['i18n'] = $this->lang->mci_current();
				//   redirect('admintration', $data);
				$this->load->view('admintration', $data);
			} else {
				return $image_path;
			}
		} else {
			return '';
		}
	}

	public function do_upload($id_account) {
		$arr_upload;
		$path = './uploads/logo_empoyer/' . $id_account . "/";
		if (!file_exists($path)) {
			mkdir($path, 0777, true);
		}
		$this->load->library('upload');

		// Define file rules
		$this->upload->initialize(array(
			'upload_path' => $path,
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'overwrite' => TRUE,
			'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			// 'max_height' => "768",
			// 'max_width' => "1024"
		));
		$file_upload = 'userfile';

		if ($this->upload->do_upload($file_upload)) {
			$your_file_new_name = 'hinh_new';
			$data = $this->upload->data();
			$arr_upload['name_old'] = $data['file_name'];
			$file_path = $data['file_path'];
			$file = $data['full_path'];
			$file_ext = $data['file_ext'];
			$final_file_name = md5($file_upload . "_" . time()) . $file_ext;
			// here is the renaming functon
			rename($file, $file_path . $final_file_name);
			$arr_upload['name_new'] = $final_file_name;
			return $arr_upload;
			// echo json_encode(array('status' => 'ss', 'content' => 'success'));

		} else {
			return "";
			// Output the errors
			// $errors = array('error' => $this->upload->display_errors('<p class = "bg-danger">', '</p>'));

			// foreach($errors as $k => $error){

			// echo json_encode(array('status' => 'ss', 'content' => 'err'));
			// }

		}
	}

}