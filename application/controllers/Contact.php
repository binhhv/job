<?php
/**
 *
 */
class Contact extends CI_Controller {

	function __construct() {
		# code...
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Contact_model', 'contact');

	}
	public function index() {
		$head = $this->load->view('main/head', array('titlePage' => 'JOB7VN Group|Contact'), TRUE);
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

}