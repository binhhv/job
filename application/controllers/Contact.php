<?php
/**
 *
 */
class Contact extends CI_Controller {

	function __construct() {
		# code...
		parent::__construct();
		//$this->load->helper('url');
		$this->load->model('Contact_model', 'contact');
		$this->load->helper('security');
		$this->load->helper(array('form', 'url', 'cookie'));
		$this->load->library(array('form_validation', 'session'));

	}
	public function index() {
		// $user = $this->session->userdata['user'];
		$user = (isset($this->session->userdata['user'])) ? $this->session->userdata['user'] : null;
		$head = $this->load->view('main/head', array('titlePage' => 'JOB7VN Group|Contact'), TRUE);
		$header = $this->load->view('main/header', array(
			'logo' => 'img/header/allSHIGOTO.png',
			'showTitle' => true,
			'logoWidth' => '170px',
			'logoHeight' => '70px',
			'menu' => 'contact',
			'user' => $user,
		), TRUE);
		//$ab = m;

		$csrf = array(
			'name' => $this->security->get_csrf_token_name(),
			'hash' => $this->security->get_csrf_hash(),
		);
		$content = $this->load->view('main/contact', array('csrf' => $csrf), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header, 'content' => $content, 'footer' => $footer));

	}
	public function insertContact() {
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$subject = $this->input->post('subject');
		$message = $this->input->post('message');
		$data = array(
			'cont_name' => $name,
			'cont_email' => $email,
			'cont_subject' => $subject,
			'cont_message' => $message,
			'cont_is_view' => '0',
			'cont_is_delete' => '0',
			'cont_created_at' => date('Y-m-d'),
		);
		//print("123123");
		$id = 0;
		try {
			$id = $this->contact->insertContact($data);
		} catch (Exception $e) {
		}
		$msg = 'Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất. Cảm ơn bạn. <br> Nhấn vào <a href="\". echo base_url("") ."\" ><strong>đây</strong></a> để về trang chủ.';
		$output = json_encode(array("id" => $id,
			"msg" => $msg));

		$this->output->set_content_type('application/json');
		$this->output->set_output($output);
		//$status = array("id" => $id);
		//echo json_encode($status);

	}
	public function insertExample() {
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$subject = $this->input->post('subject');
		$message = $this->input->post('message');
		$data = array(
			'cont_name' => 'a',
			'cont_email' => 'b',
			'cont_subject' => 'c',
			'cont_message' => 'd',
			'cont_is_view' => '0',
			'cont_is_delete' => '0',
			'cont_created_at' => date('Y-m-d'),
		);
		$a = $this->contact->insertContact($data);
		echo $a;
	}
	function sendContact() {

		$this->form_validation->set_message('required', " '%s' không được để trống");
		$this->form_validation->set_message('valid_email', "email không hợp lệ");
		// $this->form_validation->set_message('numeric', "số điện thoại không hợp lệ");
		// $this->form_validation->set_message('max_length', "số điện thoại nhỏ hơn 12 số");
		// $this->form_validation->set_message('min_length', "số điện thoại lớn hơn 10 số");

		# Thiết lập các quy tắc cho từng trường trong form
		$this->form_validation->set_rules('name', 'Họ tên', 'trim|required|xss_clean');
		//$this->form_validation->set_rules('jobseeker_phone', 'Số điện thoại', 'trim|required|numeric|max_length[12]|min_length[10]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('subject', 'Tiêu đề', 'trim|required|xss_clean');
		$this->form_validation->set_rules('message', 'Nội dung', 'trim|required|xss_clean');
		$error = array();
		if ($this->form_validation->run() == TRUE) {
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$subject = $this->input->post('subject');
			$message = $this->input->post('message');
			$data = array(
				'cont_name' => $name,
				'cont_email' => $email,
				'cont_subject' => $subject,
				'cont_message' => $message,
				'cont_view' => '0',
				'cont_reply' => '0',
				'cont_is_delete' => '0',
				'cont_created_at' => date('Y-m-d'),
			);
			//print("123123");

			$id = $this->contact->insertContact($data);

			$msg = 'Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất. Cảm ơn bạn. <br> Nhấn vào <a style = "color:blue !important;" href="\". echo base_url("") ."\" ><strong>ĐÂY</strong></a> để về trang chủ.';
			if ($id) {
				$output = json_encode(array("status" => 'success',
					"msg" => $msg));
			} else {
				$output = json_encode(array("status" => 'error',
				));
			}
			$this->output->set_content_type('application/json');
			$this->output->set_output($output);
		} else {
			$error['name'] = form_error('name');
			$error['email'] = form_error('email');
			$error['subject'] = form_error('subject');
			$error['message'] = form_error('message');
			$output = json_encode(array("status" => 'error', 'error' => $error));
			$this->output->set_content_type('application/json');
			$this->output->set_output($output);
		}

	}

}